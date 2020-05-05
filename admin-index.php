<?php
    session_start();
    //require_once('util/secure_conn.php');
    require('model/database.php'); 
    require_once('util/valid_admin.php');
    require('model/quotes_db.php');
    require('model/authors_db.php');
    require('model/categories_db.php');

    $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'list_quotes';

    switch ($action) {
        case 'list_quotes':
            $author_id = filter_input(INPUT_GET, 'author_id', FILTER_VALIDATE_INT);
            $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
           // $sort = filter_input(INPUT_GET, 'sort');

            // ternary statement replaces the switch statement from previous solution
           // $sort = ($sort == "year") ? "year" : "price";


            $category_name = get_category_name($category_id);
            $author_name = get_author_name($author_id);

           
        // $quotes = get_all_quotes($sort);
            // apply make filter 
         /*   if (!empty($make_name)) {
                $vehicles = array_filter($vehicles, function($array) use ($make_name) {
                    return $array["make"] == $make_name;
                });
            }
            // apply type filter
            if (!empty($type_id)) {
                $vehicles = array_filter($vehicles, function($array) use ($type_name) {
                    return $array["typeName"] == $type_name;
                });
            }
            // apply class filter 
            if (!empty($class_id)) {
                $vehicles = array_filter($vehicles, function($array) use ($class_name) {
                    return $array["className"] == $class_name;
                });
            }*/
            // *****end new code block*****
            // use in drop menus 
            $authors = get_authors();
            $categories = get_categories();
            $quotes = get_all_quotes();
            include('view/header-admin.php');
            include('admin_quote_list.php');
            include('view/footer.php');
            break;
        case 'list_authors':
            $authors = get_authors();
            include('view/header-admin.php');
            include('author_list.php');
            include('view/footer.php');
            break;
        case 'list_categories':
            $categories = get_categories();
            include('view/header-admin.php');
            include('category_list.php');
            include('view/footer.php');
            break;
        case 'delete_quote':
            $quote_id = filter_input(INPUT_POST, 'quote_id', FILTER_VALIDATE_INT);
            if (empty($quote_id)) {
                $error = "Missing or incorrect quote id.";
                include('view/header-admin.php');
                include('errors/error.php');
                include('view/footer.php');
            } else {
                delete_quote($quote_id);
                header("Location: quotes-admin.php"); 
            }
            break;
        case 'delete_author':
            $author_id = filter_input(INPUT_POST, 'author_id', FILTER_VALIDATE_INT);
            if (empty($author_id)) {
                $error = "Missing or incorrect author id.";
                include('view/header-admin.php');
                include('errors/error.php');
                include('view/footer.php');
            } else {
                delete_author($author_id);
                header("Location: quotes-admin.php?action=list_authors");
            }
            break;
        case 'delete_category':
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            if (empty($category_id)) {
                $error = "Missing or incorrect category id.";
                include('view/header-admin.php');
                include('errors/error.php');
                include('view/footer.php');
            } else {
                delete_category($category_id);
                header("Location: quotes-admin.php?action=list_categories");
            }
            break;
        case 'show_add_form':
            $categories = get_categories();
            $authors = get_authors();
            include('view/header-admin.php');
            include('add_quote_form.php');
            include('view/footer.php');
            break;
        case 'add_quote':
            $author_id = filter_input(INPUT_POST, 'author_id', FILTER_VALIDATE_INT);
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            $quote = filter_input(INPUT_POST, 'quote');
            if (empty($author_id) || empty($category_id)) {
                $error = "Invalid data. Check all fields and try again.";
                include('view/header-admin.php');
                include('errors/error.php');
                include('view/footer.php');
            } else {
                add_quote($author_id, $category_id, $quote);
                header("Location: quotes-admin.php");
            }
            break;
        case 'add_author':
            $author_name = filter_input(INPUT_POST, 'author_name');
            add_author($author_name);
            header("Location: quotes-admin.php?action=list_authors");
            break;
        case 'add_category':
            $category_name = filter_input(INPUT_POST, 'category_name');
            add_category($category_name);
            header("Location: quotes-admin.php?action=list_categories");
            break;
        case 'logout':
            $_SESSION = array();
            session_destroy();
            header("Location: admin-login.php");
    }
?> 

   