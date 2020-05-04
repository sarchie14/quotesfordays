<?php 
    require_once('util/valid_admin.php');
?>
<main>
    <h2>Author List</h2>
    <section>
        <?php if ( sizeof($authors) != 0) { ?>
            <table>
                <tr>
                    <th colspan="2">Full Name</th>
                </tr>        
                <?php foreach ($authors as $author) : ?>
                <tr>
                    <td><?php echo $author['fullName']; ?></td>
                    <td>
                        <form action="quotes-admin.php" method="post">
                            <input type="hidden" name="action" value="delete_author">
                            <input type="hidden" name="author_id"
                                value="<?php echo $author['authorID']; ?>"/>
                            <input type="submit" value="Remove" class="button red" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>    
            </table>
        <?php } else { ?>
            <p>
                There are no Authors in your database.
            </p>
        <?php } ?>
    </section>
    <section>
        <h2>Add Author</h2>
        <form action="quotes-admin.php" method="post" id="add_type_form">
            <input type="hidden" name="action" value="add_author">

            <label>Name:</label>
            <input type="text" name="author_name" max="50" required><br>

            <label id="blankLabel">&nbsp;</label>
            <input id="add_type_button" type="submit" class="button blue" value="Add Author"><br>
        </form>
    </section>
    <?php include 'view/admin-links.php'; ?>
</main>