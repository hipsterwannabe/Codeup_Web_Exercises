<?php

function getOffset() {
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    return ($page - 1) * 4;
}


//define which page user is on
if (!empty($_GET)) {
    $pageID = $_GET['page'];
} else {
    $pageID = 1;
}

//function to get parks info
function getParks($dbc){
    
    if (!empty($_GET)) {
        $pageID = $_GET['page'];
    } else {
        $pageID = 1;
    };
    $pageID = getOffset();
    $stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT :LIMIT OFFSET :OFFSET'); 
    $stmt->bindValue(':LIMIT', 4, PDO::PARAM_INT);
    $stmt->bindValue(':OFFSET', $pageID, PDO::PARAM_INT);
    $stmt->execute();
    $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $stmt;
}


$offset = ($pageID * 4);

$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'greg', 'quiero');
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$count = $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();

$numPages = ceil($count / 4);
$prev = $pageID - 1;
$next = $pageID + 1;


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>National Parks</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />

    <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
    <div class="container">
        <h1>National Parks <small>Information</small> </h1>

        <table class="table table-striped table-hover">
            <tr>
            	<th>#</th>
                <th>Name</th>
                <th>State</th>
                <th>Date Established</th>
                <th>Area in Acres</th>
                <th>Park Description</th>
            </tr>

            <?php foreach (getParks($dbc) as $park): ?>
                <tr>
                    <? foreach ($park as $key => $value) { ?>
        		<?= "<td>" . $value . "</td>"; ?>
        		<? } ?> 
                </tr>
            <?php endforeach ?>
        </table>
        <ul class="pager">
            <?  if ($prev > 0) : ?>
                    <li class="previous"><a href="?page=<?=$prev?>">&larr; Previous</a></li>
            <? endif; ?>
            <? if ($pageID < $numPages) : ?>
                <li class="next"><a href="?page=<?=$next?>">Next &rarr;</a></li>
            <? endif; ?>
        </ul>
    </div>
</body>
</html>