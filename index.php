<?php
    require('model/database.php'); 
    require('model/quotes_db.php');
    require('model/authors_db.php');
    require('model/categories_db.php');

            $author_id = filter_input(INPUT_GET, 'author_id', FILTER_VALIDATE_INT);
            $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

            $author_name = get_author_name($author_id);
            $category_name = get_category_name($category_id);
           
        $quotes = get_all_quotes();
            // apply Author filter 
            if (!empty($author_name)) {
                $quotes = array_filter($quotes, function($array) use ($author_name) {
                    return $array["fullName"] == $author_name;
                });
            }
            // apply Category filter
            if (!empty($category_id)) {
                $quotes = array_filter($quotes, function($array) use ($category_name) {
                    return $array["categoryName"] == $category_name;
                });
            }

            // *****end new code block*****
            // use in drop menus 
            $authors = get_authors();
            $categories = get_categories();
            include('view/header.php');
            include('quote_list.php');
            include('view/footer.php');

?> 
