<?php

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class TravellingOnADoubleLinkedListTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function uponAddingNewNodesFromTheFrontThenTheHeadShouldPointAtTheCorrectPreviousNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1); // this is the tail
        $secondNode = $doubleLinkedList->prepend(2);
        $thirdNode = $doubleLinkedList->prepend(3); // this is the head

        $this->assertEquals($thirdNode, $doubleLinkedList->head());
        $this->assertEquals($secondNode, $doubleLinkedList->head()->previous());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheFrontThenTheHeadShouldHaveNoNextNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1); // this is the tail
        $doubleLinkedList->prepend(2);
        $doubleLinkedList->prepend(3); // this is the head

        $this->assertEmpty($doubleLinkedList->head()->next());
    }
}