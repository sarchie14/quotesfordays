<?php 
    require_once('util/valid_admin.php');
?>
<main>
    <h2>Add Quote</h2>
    <form action="quotes-admin.php" method="post" id="add_vehicle_form">
        <input type="hidden" name="action" value="add_quote">

        <label>Author:</label>
        <select name="author_id">
        <?php foreach ($authors as $author) : ?>
            <option value="<?php echo $author['authorID']; ?>">
                <?php echo $author['fullName']; ?>
            </option>
        <?php endforeach; ?>
        </select><br>

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select><br>

        <label for="quote">Quote:</label>
        <input type="text" name="quote" required><br>

        <label id="blankLabel">&nbsp;</label>
        <input type="submit" value="Add Quote" class="button blue"><br>
    </form>
    <?php include 'view/admin-links.php'; ?>
</main>
