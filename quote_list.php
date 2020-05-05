<main>
<nav>
        <form action="." method="get" id="make_selection">
            <!-- uses ternary if statements to determine selected or not -->
            <section id="dropmenus">
                <?php if ( sizeof($authors) != 0) { ?>
                    <label>Authors:</label>
                    <select name="author_id">
                        <option value="0">View Authors</option>
                        <?php foreach ($authors as $author) : ?>
                            <option value="<?php echo $author['authorID']; ?>" <?php echo ($author_name == $author['fullName'] ? "selected" : false)?>>
                                <?php echo $author['fullName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select> 
                <?php } ?>

                <?php if ( sizeof($categories) != 0) { ?>
                    <label>Categories:</label>
                    <select name="category_id">
                        <option value="0">View Categories</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['categoryID']; ?>" <?php echo ($category_name == $category['categoryName'] ? "selected" : false)?>>
                                <?php echo $category['categoryName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select> 
                <?php } ?>
                <div>
                    <!-- uses ternary if statements to determine checked or not -->
                    <input type="submit" value="Search" class="button blue button-slim">
                    <input id="resetQuoteListForm" type="reset" class="button red button-slim">
                </div>
            </section>
        </form>
    </nav>
    <section>
        <?php if( sizeof($quotes) != 0 ) { ?>
            <div id="table-overflow">
                <table>
                    <thead>
                        <tr>
                            <th>Quote</th>
                            <th>Author</th>
                            <th>Cateory</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($quotes as $quote) : ?>
                        <tr>
                            <td><?php echo $quote['quote']; ?></td>
                            <?php if (empty($quote['fullName'])) { ?>
                                <td>None</td>
                            <?php } else { ?>
                                <td><?php echo $quote['fullName']; ?></td>
                            <?php } ?>
                            <?php if (empty($quote['categoryName'])) { ?>
                                <td>None</td>
                            <?php } else { ?>
                                <td><?php echo $quote['categoryName']; ?></td>
                            <?php } ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>  
        <?php } else { ?>
            <p>
                There are no quotes in Quotes For Day&apos;s inventory. 
            </p>     
        <?php } ?>
    </section>
</main>
<script defer src="view/main.js" type="text/javascript"></script>