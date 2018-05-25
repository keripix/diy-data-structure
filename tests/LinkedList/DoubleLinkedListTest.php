<?php

namespace Dyi\DataStructure\Tests\LinkedList;

use Dyi\DataStructure\LinkedList\DoubleLinkedList;

class DoubleLinkedListTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function anEmptyLinkedList()
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEquals(0, $doubleLinkedList->getSize());
    }
}