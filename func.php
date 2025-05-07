<?php


function getFilmes($filmes, $callBack) {
    $filmesList = array_keys($filmes); 
    $callBack($filmesList);
}


function getAtoresPorFilme($filme, $filmes, $callBack) {
    $callBack($filmes[$filme]['atores']);
}
?>
