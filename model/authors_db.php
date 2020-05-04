<?php 
    function get_authors() {
        global $db;
        $query = 'SELECT * FROM author ORDER BY authorID';
        $statement = $db->prepare($query);
        $statement->execute();
        $authors = $statement->fetchAll();
        $statement->closeCursor();
        return $authors;
    }

    function get_author_name($author_id) {
        if ($author_id == NULL || $author_id == FALSE) {
            return NULL;
        }
        global $db;
        $query = 'SELECT * FROM author WHERE authorID = :author_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':author_id', $author_id);
        $statement->execute();
        $author = $statement->fetch();
        $statement->closeCursor();
        $author_name = $author['fullName'];
        return $author_name;
    }

    function delete_author($author_id) {
        global $db;
        $query = 'DELETE FROM author WHERE authorID = :author_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':author_id', $author_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_author($author_name) {
        global $db;
        $query = 'INSERT INTO author (fullName)
              VALUES
                 (:fullName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':fullName', $author_name);
        $statement->execute();
        $statement->closeCursor();
    }
?>