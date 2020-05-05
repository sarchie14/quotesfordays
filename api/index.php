<?php
   require('../model/database.php'); 
   require('../model/quotes_db.php');
   require('../model/authors_db.php');
   require('../model/categories_db.php');

if($_SERVER['REQUEST_METHOD'] == "GET") {
  
  $author_id = trim(filter_input(INPUT_GET, 'author_id'));
  $data = get_quotes_by_author($author_id);
  header('Content-Type:application/json');
  echo json_encode($data);
}
