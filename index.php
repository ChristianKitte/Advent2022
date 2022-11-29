<?php
require('data.php');

$year = 2022;
$title = 'Minion Adventskalender ' . $year;

$now = time();
$today = date("j");
$listitems = [];

for ($k = 1; $k <= sizeof($data); $k++) :
    $allowed = mktime(0, 0, 0, 12, $k, $year);

    if ($now > $allowed) :
        $listitems[] = '
        <img class="content-image" src=images/' . $k . '.jpg>';
    elseif ($now < $allowed) :
        $listitems[] = '<a class="coming_soon">' . str_replace('##date##', $k, $default) . '</a>';
    else :
        $default = '';
        $listitems[] = '<a class="coming_soon">' . str_replace('##date##', $k, $default) . '</a>';
    endif;
endfor; ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style><?php include('css.php') ?></style>
    <script><?php include('js.php') ?></script>
</head>
<body>
<h1><a href="https://advent.ckitte.de/"><?= $title ?></a></h1>
<ol> <?php
    for ($k = 0; $k < sizeof($listitems); $k++) : ?>
        <li><?= $listitems[$k] ?></li> <?php
    endfor ?>
</ol>
</body>
</html>
