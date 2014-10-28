<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__ . '/vendor/autoload.php';
require __DIR__.'/_header.php';

$perPage = 6;
$nbArticles = countArticles($link);
$currentPage = !empty($_GET['p']) ? (int)$_GET['p'] : 1;
$nbPages = ceil($nbArticles/$perPage);

$articles = getArticles($db);
$twig->render('articles.html.twig',[
    'articles' => $articles,
]);
require __DIR__.'/_footer.php';
