<?php

function counter(\Countable $collection) {
    return $collection->count();
}

class BookRepository implements \Countable {
    public function count() {
        return 10;
    }
}

class Cinema {
    public function getPlaceNumber() {
        return 30;
    }
}

class CinemaCountAdapter implements \Countable {
    private $cinema;

    public function __construct(Cinema $cinema)
    {
        $this->cinema = $cinema;
    }

    public function count()
    {
        return $this->cinema->getPlaceNumber();
    }
}

echo count(new CinemaCountAdapter(new Cinema()));
echo counter(new BookRepository());



