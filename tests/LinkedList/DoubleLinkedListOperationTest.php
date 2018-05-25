<?php

namespace Diy\DataStructure\Tests\LinkedList;

class DoubleLinkedListOperationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function uponInsertingANewNodeAtFrontTheHeadShouldPointToIt()
    {
        $doubleLinkedList = new \Diy\DataStructure\LinkedList\DoubleLinkedList();
        $frontNode = $doubleLinkedList->prepend('Beginning');

        $this->assertEquals($frontNode, $doubleLinkedList->head());
    }
}