<?php

ini_set('memory_limit', '2G');

require __DIR__ . '/../bootstrap.php';

$doubleLinkedList = new \Diy\DataStructure\LinkedList\DoubleLinkedList();
$start = memory_get_usage();

try {
    for ($i = 0; $i < 60000; $i++) {
        $doubleLinkedList->prepend(random_int(0, 10));
    }
} catch (Exception $exception) {
    dump($exception);
}

$finished = memory_get_usage();
$delta = $finished - $start;

dump([
    'Start' => $start,
    'Finish' => $finished,
    'Delta' => $delta,
    'Peak' => memory_get_peak_usage()
]);