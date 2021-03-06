<?php

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class MultiNodeDoubleLinkedListTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function uponInsertingTwoNodesFromFrontThenTheHeadShouldPointToTheLaterNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();

        $doubleLinkedList->prepend(1);
        $secondNode = $doubleLinkedList->prepend(2);

        $this->assertSame($secondNode, $doubleLinkedList->head());
    }

    /**
     * @test
     */
    public function uponInsertingTwoNodesFromFrontThenTheTailShouldPointToTheFirstNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();

        $firstNode = $doubleLinkedList->prepend(1);
        $doubleLinkedList->prepend(2);

        $this->assertSame($firstNode, $doubleLinkedList->tail());
    }

    /**
     * @test
     */
    public function uponInsertingTwoNodesFromTheBackThenTheHeadShouldPointToTheFirstNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();

        $firstNode = $doubleLinkedList->append(1);
        $doubleLinkedList->append(2);

        $this->assertSame($firstNode, $doubleLinkedList->head());
    }

    /**
     * @test
     */
    public function uponInsertingTwoNodesFromTheBackThenTheTailShouldPointToTheSecondNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();

        $doubleLinkedList->append(1);
        $secondNode = $doubleLinkedList->append(2);

        $this->assertSame($secondNode, $doubleLinkedList->tail());
    }

    /**
     * @test
     */
    public function upondInsertingTwoNewNodesFromTheFrontThenTheTailAndHeadShouldNotPointAtTheSameNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $first = $doubleLinkedList->prepend(1);
        $second = $doubleLinkedList->prepend(2);

        $this->assertNotSame($first, $second);
        $this->assertNotSame($first, $doubleLinkedList->head());
        $this->assertNotSame($second, $doubleLinkedList->tail());
        $this->assertNotSame($doubleLinkedList->head(), $doubleLinkedList->tail());
    }

    /**
     * @test
     */
    public function upondInsertingTwoNewNodesThenTheSizeShouldBeTwo(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1);
        $doubleLinkedList->append(2);

        $this->assertEquals(2, $doubleLinkedList->size());
    }

    /**
     * @test
     */
    public function insertingThreeNodes(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend('middle');
        $doubleLinkedList->prepend('head');
        $doubleLinkedList->append('tail');

        $this->assertEquals('head', $doubleLinkedList->head()->value());
        $this->assertEquals('tail', $doubleLinkedList->tail()->value());
        $this->assertEquals(3, $doubleLinkedList->size());
    }
}