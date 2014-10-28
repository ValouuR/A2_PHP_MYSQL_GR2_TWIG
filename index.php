<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/_header.php';

$perPage = 6;
$nbArticles = countArticles($link);
$currentPage = !empty($_GET['p']) ? (int)$_GET['p'] : 1;
$nbPages = ceil($nbArticles/$perPage);


if (0 >= $currentPage) {
    header('Location: index.php?p=1');
}
if ($currentPage > $nbPages) {
    header('Location: index.php?p='.$nbPages);
}

$articles = getEnabledArticles($db, true, null, ($currentPage-1)*$perPage, $perPage);

echo $twig ->render('articles.html.twig',[
    'articles' => $articles,
    'perpage' => $perPage,
    'currentPage' => $currentPage,
    'nbPages' => $nbPages,
    'connected' => isConnected(),
    'username' => 'Valentine',
]);
require __DIR__.'/_footer.php';
