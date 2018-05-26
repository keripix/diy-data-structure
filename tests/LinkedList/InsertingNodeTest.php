<?php

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class InsertingNodeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function whenInsertingBeforeANodeThenTheNewNodeShouldBeItsPreviousNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $firstNode = $doubleLinkedList->prepend(1);
        $newNode =  $doubleLinkedList->insertBefore(2, $firstNode);

        $this->assertSame($newNode, $firstNode->previous());
    }

    /**
     * @test
     */
    public function whenInsertingBeforeANodeThenNodeBeforeThatShouldPointNextAtTheNewNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $firstNode = $doubleLinkedList->prepend(1);
        $secondNode = $doubleLinkedList->prepend(3);
        $newNode =  $doubleLinkedList->insertBefore(2, $secondNode);

        $this->assertNotSame($newNode, $firstNode->next());
    }

    /**
     * @test
     */
    public function whenInsertingBeforeANodeThenNewNodeShouldPointNextAtTheOldNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1);
        $secondNode = $doubleLinkedList->prepend(3);
        $newNode =  $doubleLinkedList->insertBefore(2, $secondNode);

        $this->assertSame($secondNode, $newNode->next());
    }

    /**
     * @test
     */
    public function whenInsertingBeforeANodeThenNewNodeShouldPointPreviousAtTheOldNodePreviousNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $firstNode = $doubleLinkedList->prepend(1); // tail (last)
        $secondNode = $doubleLinkedList->prepend(3); // head (first)
        $newNode =  $doubleLinkedList->insertBefore(2, $firstNode);
        // nodes: 3, 2, 1

        $this->assertSame($secondNode, $newNode->previous());
    }

    /**
     * @test
     */
    public function canInsertBeforeATailNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $firstNode = $doubleLinkedList->prepend(1);
        $secondNode = $doubleLinkedList->prepend(3);
        $newNode =  $doubleLinkedList->insertBefore(2, $firstNode);

        $this->assertEmpty($newNode->previous());
        $this->assertSame($firstNode, $newNode->next());
        $this->assertSame($newNode, $doubleLinkedList->tail());
        $this->assertSame($secondNode, $doubleLinkedList->head());
    }
}