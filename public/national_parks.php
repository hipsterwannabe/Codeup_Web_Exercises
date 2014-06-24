<?php

function getOffset() {
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    return ($page - 1) * 4;
}



if (!empty($_GET)) {
    $pageID = $_GET['page'];
} else {
    $pageID = 0;
}


$limit = 4;
$offset = ($pageID * $limit);

$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'greg', 'quiero');
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$parks = $dbc->query('SELECT * FROM national_parks LIMIT ' . $limit . ' OFFSET ' . ($pageID * $limit))->fetchAll(PDO::FETCH_ASSOC);

$count = $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();

$numPages = floor($count / $limit);


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
            </tr>

            <?php foreach ($parks as $park): ?>
                <tr>
                    <? foreach ($park as $key => $value) { ?>
        		<?= "<td>" . $value . "</td>"; ?>
        		<? } ?> 
                </tr>
            <?php endforeach ?>
        </table>
        <ul class="pager">
            <?  if ($pageID != 0) : ?>
                    <li class="previous"><a href="?page=<?=$pageID - 1?>">&larr; Previous</a></li>
            <? endif; ?>
            <? if ($pageID < $numPages) : ?>
                <li class="next"><a href="?page=<?= $pageID + 1 ?>">Next &rarr;</a></li>
            <? endif; ?>
        </ul>
    </div>
</body>
</html>