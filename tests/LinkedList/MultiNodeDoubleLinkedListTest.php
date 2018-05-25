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
}