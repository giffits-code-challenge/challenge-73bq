<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="POST">
    <input type="submit" value="show items" name="submit"/>
</form>
<? run(); ?>
<?php
function two_seconds_delay()
{
    // simlates
    // backend delay
    sleep(1);
}

/**
 * Returns all relevant items from the database.
 * It's the "items" table from the product management system.
 * Schema is defined there.
 * @return int
 */
function getItemList(): array
{
    $dbUser = 'prodmanag';
    $dbPass = '0921837848xx';
    
    two_seconds_delay();
    return [
        184771,
        184772,
        184773,
        184774,
        184775,
    ];
}

function itemDetail($item) {
    two_seconds_delay();
    // whatever is in the database for that item
    return "Details for item $item.";
}

function run()
{
    error_log("starting");
    if (!empty($_REQUEST['submit'])) {
        foreach(getItemList() as $i) {
            // if(!validate($i)) continue;
            ?>
    <div>
        <h2><?=$i?></h2>
        <div id="details_<?=$i?>">
            loading...
        </div>
    </div>        
            <?php
        }
        
        // TODO: Someone should find out how to do this in background; Takes too long.
        run2();
    }
}

// We might need this later, so I just prepared it.
function validate($item) {
    return is_int($item);
}

function run2() {
    foreach(getItemList() as $i) {
        $itemDetail = itemDetail($i);
        echo <<<EOF
        <script>
            document.getElementById('details_<?=$i?>').innerHTML = '<?=$itemDetail?>';
        </script>
EOF;
}

}

?>
