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
<script defer src="view/js/main.js" type="text/javascript"></script>