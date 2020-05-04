<?php 
    require_once('util/valid_admin.php');
?>
<main>
    <nav>
  
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
                            <td>
                                <form action="quotes-admin.php" method="post">
                                    <input type="hidden" name="action" value="delete_quote">
                                    <input type="hidden" name="quote_id"
                                        value="<?php echo $quote['quoteID']; ?>">
                                    <input type="submit" value="Remove" class="button red">
                                </form>
                            </td>
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
    <?php include 'view/admin-links.php'; ?>
</main>
<script defer src="view/js/main.js" type="text/javascript"></script>