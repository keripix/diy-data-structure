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
        $newNode =  $doubleLinkedList->insertBefore(2, $doubleLinkedList->current());

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

        $this->assertNotSame($secondNode, $firstNode->next());
        $this->assertSame($newNode, $firstNode->next());
    }
}