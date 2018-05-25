<?php

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class SingleNodeDoubleLinkedListOperationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function uponInsertingANewNodeAtFrontThenTheHeadShouldPointToIt(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $frontNode = $doubleLinkedList->prepend('Beginning');

        $this->assertEquals($frontNode, $doubleLinkedList->head());
    }

    /**
     * @test
     */
    public function uponInsertingANewNodeAtFrontThenTheTailShouldPointToIt(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $firstNode = $doubleLinkedList->prepend('Beginning');

        $this->assertEquals($firstNode, $doubleLinkedList->tail());
    }

    /**
     * @test
     */
    public function uponInsertingASingleNodeAtFrontThenTheSizeShouldBeOne(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend('Beginning');

        $this->assertEquals(1, $doubleLinkedList->getSize());
    }

    /**
     * @test
     */
    public function uponInsertingASingleNodeAtTheBackThenTheHeadShouldPointAtIt(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $node = $doubleLinkedList->append('Last');

        $this->assertEquals($node, $doubleLinkedList->tail());
    }

    /**
     * @test
     */
    public function uponInsertingASingleNodeAtTheBackThenTheTailShouldPointAtIt(): void
    {

    }

    /**
     * @test
     */
    public function uponInsertingASingleNodeAtTheBackThenTheSizeShouldBeOne(): void
    {

    }
}