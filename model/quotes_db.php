<?php 

    function get_all_quotes() {
        global $db;
        $query = 'SELECT Q.quoteID, Q.quote, A.fullName, C.categoryName 
            FROM quote Q 
            LEFT JOIN categories C ON Q.categoryID = C.categoryID 
            LEFT JOIN author A ON Q.authorID = A.authorID';
        $statement = $db->prepare($query);
        $statement->execute();
        $quotes = $statement->fetchAll();
        $statement->closeCursor();
        return $quotes;
    }

    function get_quote($quote_id) {
        global $db;
        $query = 'SELECT * FROM quote WHERE quoteID = :quote_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $quote = $statement->fetch();
        $statement->closeCursor();
        return $quote;
    }

    function delete_quote($quote_id) {
        global $db;
        $query = 'DELETE FROM quote WHERE quoteID = :quote_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_quote($author_id, $category_id, $quote) {
        global $db;
        $query = 'INSERT INTO quote (authorID, categoryID, quote)
              VALUES
                 (:author_id, :category_id, :quote)';
        $statement = $db->prepare($query);
        $statement->bindValue(':author_id', $author_id);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':quote', $quote);
        $statement->execute();
        $statement->closeCursor();
    }
?>