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
    public function whenInsertingBeforeAHeadThenTheNewNodeShouldBeTheHead(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $firstNode = $doubleLinkedList->prepend(1);
        $secondNode = $doubleLinkedList->prepend(3);
        $newNode =  $doubleLinkedList->insertBefore(2, $secondNode);
        // nodes: 2, 3, 1

        $this->assertEmpty($newNode->previous());
        $this->assertSame($secondNode, $newNode->next());
        $this->assertSame($firstNode, $doubleLinkedList->tail());
        $this->assertSame($newNode, $doubleLinkedList->head());
    }

    /**
     * @test
     */
    public function whenInsertingAfterANodeThenTheNewNodeNextShouldPointsAtOldNodeNextNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $one = $doubleLinkedList->prepend(1);
        $three = $doubleLinkedList->prepend(3);

        $newNode = $doubleLinkedList->insertAfter(4, $three);

        $this->assertSame($one, $newNode->next());
    }

    /**
     * @test
     */
    public function whenInsertingAfterANodeThenTheNewNodePreviousShouldPointsAtOldNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1);
        $three = $doubleLinkedList->prepend(3);

        $newNode = $doubleLinkedList->insertAfter(4, $three);

        $this->assertSame($three, $newNode->previous());
    }
}