<?php

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class DoubleLinkedListTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function anEmptyListShouldBeEmpty()
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEquals(0, $doubleLinkedList->getSize());
    }

    /**
     * @test
     */
    public function anEmptyListCurrentNodeShouldBeNull()
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEmpty($doubleLinkedList->current());
    }

    /**
     * @test
     */
    public function anEmptyListHeadNodeShouldBeNull()
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEmpty($doubleLinkedList->head());
    }

    /**
     * @test
     */
    public function anEmptyListTailNodeShouldBeNull()
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEmpty($doubleLinkedList->tail());
    }

    /**
     * @test
     */
    public function anEmptyListNextNodeShouldBeNull()
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEmpty($doubleLinkedList->next());
    }

    /**
     * @test
     */
    public function anEmptyListPrevNodeShouldBeNull()
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEmpty($doubleLinkedList->previous());
    }
}