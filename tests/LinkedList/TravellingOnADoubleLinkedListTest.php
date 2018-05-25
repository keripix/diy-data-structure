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

        $this->assertSame($thirdNode, $doubleLinkedList->head());
        $this->assertSame($secondNode, $doubleLinkedList->head()->previous());
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

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheFrontThenTheTailShouldPointAtTheCorrectNextNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $firstNode = $doubleLinkedList->prepend(1); // this is the tail
        $secondNode = $doubleLinkedList->prepend(2);
        $doubleLinkedList->prepend(3); // this is the head

        $this->assertSame($firstNode, $doubleLinkedList->tail());
        $this->assertSame($secondNode, $doubleLinkedList->tail()->next());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheBackThenTheTailShouldPointAtTheCorrectNextNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->append(1); // this is the head
        $secondNode = $doubleLinkedList->append(2);
        $thirdNode = $doubleLinkedList->append(3); // this is the tail

        $this->assertSame($thirdNode, $doubleLinkedList->tail());
        $this->assertSame($secondNode, $doubleLinkedList->tail()->next());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheBackThenTheTailPreviousNodeShouldBeEmpty(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->append(1); // this is the head
        $doubleLinkedList->append(2);
        $doubleLinkedList->append(3); // this is the tail

        $this->assertEmpty($doubleLinkedList->tail()->previous());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheBackThenTheHeadShouldPointAtTheCorrectPreviousNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->append(1); // this is the head
        $secondNode = $doubleLinkedList->append(2);
        $doubleLinkedList->append(3); // this is the tail

        $this->assertSame($secondNode, $doubleLinkedList->head()->previous());
    }

    /**
     * @test
     */
    public function uponAppendingMultipleNodesThenItShouldBeAbleToTravelFromHeadToTail(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->append(1); // this is the head
        $doubleLinkedList->append(2);
        $doubleLinkedList->append(3);
        $doubleLinkedList->append(4);
        $doubleLinkedList->append(5);

        $this->assertEquals(2, ($currentNode = $doubleLinkedList->head()->previous())->value());
        $this->assertEquals(3, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(4, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(5, ($currentNode = $currentNode->previous())->value());
    }

    /**
     * @test
     */
    public function uponAppendingMultipleNodesThenItShouldBeAbleToTravelFromTailToHead(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->append(1);
        $doubleLinkedList->append(2);
        $doubleLinkedList->append(3);
        $doubleLinkedList->append(4);
        $doubleLinkedList->append(5); // this is the tail

        $this->assertEquals(4, ($currentNode = $doubleLinkedList->tail()->next())->value());
        $this->assertEquals(3, ($currentNode = $currentNode->next())->value());
        $this->assertEquals(2, ($currentNode = $currentNode->next())->value());
        $this->assertEquals(1, ($currentNode = $currentNode->next())->value());
    }

    /**
     * @test
     */
    public function uponPrependingMultipleNodesThenItShouldBeAbleToTravelFromHeadToTail(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1);
        $doubleLinkedList->prepend(2);
        $doubleLinkedList->prepend(3);
        $doubleLinkedList->prepend(4);
        $doubleLinkedList->prepend(5); // this is the head

        $this->assertEquals(4, ($currentNode = $doubleLinkedList->head()->previous())->value());
        $this->assertEquals(3, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(2, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(1, ($currentNode = $currentNode->previous())->value());
    }

    /**
     * @test
     */
    public function uponPrependingMultipleNodesThenItShouldBeAbleToTravelFromTailToHead(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1); // this is the tail
        $doubleLinkedList->prepend(2);
        $doubleLinkedList->prepend(3);
        $doubleLinkedList->prepend(4);
        $doubleLinkedList->prepend(5);

        $this->assertEquals(2, ($currentNode = $doubleLinkedList->tail()->next())->value());
        $this->assertEquals(3, ($currentNode = $currentNode->next())->value());
        $this->assertEquals(4, ($currentNode = $currentNode->next())->value());
        $this->assertEquals(5, ($currentNode = $currentNode->next())->value());
    }

    /**
     * @test
     */
    public function uponAddingMultipleNodesThenItShouldBeAbleToTravelFromHeadToTail(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1);
        $doubleLinkedList->prepend(2);
        $doubleLinkedList->append(3);
        $doubleLinkedList->prepend(4); // this is the head
        $doubleLinkedList->append(5); // this is the tail

        $this->assertEquals(2, ($currentNode = $doubleLinkedList->head()->previous())->value());
        $this->assertEquals(1, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(3, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(5, ($currentNode = $currentNode->previous())->value());
    }
}
