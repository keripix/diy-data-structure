<?php

namespace Diy\Benchmark;

require __DIR__ . '/../bootstrap.php';

try {

//    $splLinkedList = new \SplDoublyLinkedList();
//    $splBenchmark = Benchmark::start('SPL Double Linked List');
//
//    for ($i = 0; $i < 1000000; $i++) {
//        $splLinkedList->push(1);
//    }
//
//    $splBenchmark->end();

//    $doubleLinkedList = new \Diy\DataStructure\LinkedList\DoubleLinkedList();
//    $dyi = Benchmark::start('DYI');
//
//    for ($i = 0; $i < 1000000; $i++) {
//        $doubleLinkedList->append(1);
//    }
//
//    $dyi->end();

//    $dsLinkedList = new \Diyds\LinkedList\DoubleLinkedList();
//    $diyDS = Benchmark::start('DIY DS');
//
//    for ($i = 0; $i < 1000000; $i++) {
//        $dsLinkedList->append(1);
//    }
//
//    $diyDS->end();

} catch (\Exception $exception) {
    dump($exception->getMessage());
}