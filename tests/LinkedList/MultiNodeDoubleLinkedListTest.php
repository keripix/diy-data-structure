<?php

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class MultiNodeDoubleLinkedListTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function uponInsertingTwoNodesFromFrontThenTheHeadShouldPointToTheSecondNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();

        $doubleLinkedList->prepend(1);
        $secondNode = $doubleLinkedList->prepend(2);

        $this->assertEquals($secondNode, $doubleLinkedList->head());
    }

    /**
     * @test
     */
    public function uponInsertingTwoNodesFromFrontThenTheTailShouldPointToTheFirstNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();

        $firstNode = $doubleLinkedList->prepend(1);
        $doubleLinkedList->prepend(2);

        $this->assertEquals($firstNode, $doubleLinkedList->tail());
    }

    /**
     * @test
     */
    public function uponInsertingTwoNodesFromTheBackThenTheHeadShouldPointToTheFirstNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();

        $firstNode = $doubleLinkedList->append(1);
        $doubleLinkedList->append(2);

        $this->assertEquals($firstNode, $doubleLinkedList->head());
    }

    /**
     * @test
     */
    public function uponInsertingTwoNodesFromTheBackThenTheTailShouldPointToTheSecondNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();

        $firstNode = $doubleLinkedList->prepend(1);
        $doubleLinkedList->prepend(2);

        $this->assertEquals($firstNode, $doubleLinkedList->tail());
    }
}