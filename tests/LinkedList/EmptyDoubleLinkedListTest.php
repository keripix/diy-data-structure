<?php

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class EmptyDoubleLinkedListTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function anEmptyListShouldBeEmpty(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEquals(0, $doubleLinkedList->getSize());
    }

    /**
     * @test
     */
    public function anEmptyListCurrentNodeShouldBeNull(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEmpty($doubleLinkedList->current());
    }

    /**
     * @test
     */
    public function anEmptyListHeadNodeShouldBeNull(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEmpty($doubleLinkedList->head());
    }

    /**
     * @test
     */
    public function anEmptyListTailNodeShouldBeNull(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEmpty($doubleLinkedList->tail());
    }

    /**
     * @test
     */
    public function anEmptyListNextNodeShouldBeNull(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEmpty($doubleLinkedList->next());
    }

    /**
     * @test
     */
    public function anEmptyListPrevNodeShouldBeNull(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $this->assertEmpty($doubleLinkedList->previous());
    }
}