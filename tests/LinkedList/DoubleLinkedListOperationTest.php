<?php

namespace Diy\DataStructure\Tests\LinkedList;

class DoubleLinkedListOperationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function uponInsertingANewNodeAtFrontTheHeadShouldPointToIt(): void
    {
        $doubleLinkedList = new \Diy\DataStructure\LinkedList\DoubleLinkedList();
        $frontNode = $doubleLinkedList->prepend('Beginning');

        $this->assertEquals($frontNode, $doubleLinkedList->head());
    }

    /**
     * @test
     */
    public function uponInsertingANewNodeAtFrontTheTailShouldPointToIt(): void
    {
        $doubleLinkedList = new \Diy\DataStructure\LinkedList\DoubleLinkedList();
        $firstNode = $doubleLinkedList->prepend('Beginning');

        $this->assertEquals($firstNode, $doubleLinkedList->tail());
    }

    /**
     * @test
     */
    public function uponInsertingASingleNodeAtFrontTheSizeShouldBeOne(): void
    {
        $doubleLinkedList = new \Diy\DataStructure\LinkedList\DoubleLinkedList();
        $doubleLinkedList->prepend('Beginning');

        $this->assertEquals(1, $doubleLinkedList->getSize());
    }
}