<?php
   require('../model/database.php'); 
   require('../model/quotes_db.php');
   require('../model/authors_db.php');
   require('../model/categories_db.php');

if($_SERVER['REQUEST_METHOD'] == "GET") {
  if(trim(filter_input(INPUT_GET, 'author_id')) == 'all') {
    //Gets all authors
    global $db;
    $query = 'SELECT * FROM author ORDER BY authorID';
    $statement = $db->prepare($query);
    $statement->execute();
    $authors = $statement->fetchall();
    $statement->closeCursor();

    echo json_encode($authors);
  }else if(trim(filter_input(INPUT_GET, 'category_id')) == 'all') {
    //Gets all categories
    global $db;
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchall();
    $statement->closeCursor();

    echo json_encode($categories);
  }else if(!empty(trim(filter_input(INPUT_GET, 'author_id'))) && empty(trim(filter_input(INPUT_GET, 'category_id')))){
  //Gets Quotes by author id
  $author_id = trim(filter_input(INPUT_GET, 'author_id'));
  global $db;
  $query = 'SELECT * FROM quote
            WHERE authorID = :author_id
            ORDER BY authorID';
  $statement = $db->prepare($query);
  $statement->bindValue(':author_id', $author_id);
  $statement->execute();
  $result = $statement->fetchAll();
  $statement->closeCursor();

  echo json_encode($result);
  }else if(!empty(trim(filter_input(INPUT_GET, 'author_id'))) && !empty(trim(filter_input(INPUT_GET, 'category_id')))) {
    //Gets quotes by Author that are in a certain category
    $author_id = trim(filter_input(INPUT_GET, 'author_id'));
    $category_id = trim(filter_input(INPUT_GET, 'category_id'));

    global $db;
    $query = 'SELECT * FROM quote
              WHERE (authorID = :author_id AND categoryId = :category_id)
              ORDER BY authorID';
    $statement = $db->prepare($query);
    $statement->bindValue(':author_id', $author_id);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    echo json_encode($result);
  }else {
    //api will output all quotes
    $quotes = get_all_quotes();

    echo json_encode($quotes);
  }
}
