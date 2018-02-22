<?php

require 'vendor/autoload.php';

$manager = array(
    new \Ipssi\Poo\BookRepo(),
    new \Ipssi\Poo\CarRepo(),
);

foreach ($manager as $repoIterator) {
    foreach($repoIterator as $product) {
        echo $product . '<br>';
    }
}

foreach (new \Ipssi\Poo\BookRepo() as $product) {
    echo $product . '<br>';
}

echo '<br>';

$book = new \Ipssi\Poo\BookRepo();

while($book->valid()) {
    echo 'While: ' . $book->current() . '<br>';
    $book->next();
}
