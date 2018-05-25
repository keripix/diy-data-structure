<?php

namespace Dyi\DataStructure\Tests\LinkedList;

use Dyi\DataStructure\LinkedList\DoubleLinkedList;

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