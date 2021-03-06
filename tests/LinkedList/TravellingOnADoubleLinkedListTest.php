<?php

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class TravellingOnADoubleLinkedListTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function uponAddingNewNodesFromTheFrontThenTheHeadShouldHaveNoPreviousNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1); // this is the tail
        $doubleLinkedList->prepend(2);
        $thirdNode = $doubleLinkedList->prepend(3); // this is the head

        $this->assertSame($thirdNode, $doubleLinkedList->head());
        $this->assertEmpty($doubleLinkedList->head()->previous());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheFrontThenTheHeadNextNodeWillBeThePreviousHead(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1); // this is the tail
        $second = $doubleLinkedList->prepend(2);
        $doubleLinkedList->prepend(3); // this is the head

        $this->assertSame($second, $doubleLinkedList->head()->next());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheFrontThenThePreviousHeadShouldNowPointsPreviouslyAtTheNewHead(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1); // this is the tail
        $second = $doubleLinkedList->prepend(2);
        $doubleLinkedList->prepend(3); // this is the head

        $this->assertSame($doubleLinkedList->head(), $second->previous());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheFrontThenTheTailShouldPointAtTheCorrectPreviousNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $firstNode = $doubleLinkedList->prepend(1); // this is the tail
        $secondNode = $doubleLinkedList->prepend(2);
        $doubleLinkedList->prepend(3); // this is the head

        $this->assertSame($firstNode, $doubleLinkedList->tail());
        $this->assertSame($secondNode, $doubleLinkedList->tail()->previous());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheFrontThenTheTailShouldHaveNoNextNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1); // this is the tail
        $doubleLinkedList->prepend(2);
        $doubleLinkedList->prepend(3); // this is the head

        $this->assertEmpty($doubleLinkedList->tail()->next());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheBackThenTheTailShouldHaveNoNextNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->append(1); // this is the head
        $doubleLinkedList->append(2);
        $thirdNode = $doubleLinkedList->append(3); // this is the tail

        $this->assertSame($thirdNode, $doubleLinkedList->tail());
        $this->assertEmpty($doubleLinkedList->tail()->next());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheBackThenTheTailPreviousNodeShouldBeTheOldTail(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->append(1); // this is the head
        $oldTail = $doubleLinkedList->append(2);
        $doubleLinkedList->append(3); // this is the tail

        $this->assertSame($oldTail, $doubleLinkedList->tail()->previous());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheBackThenTheHeadShouldPointAtTheCorrectPNextNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->append(1); // this is the head
        $secondNode = $doubleLinkedList->append(2);
        $doubleLinkedList->append(3); // this is the tail

        $this->assertSame($secondNode, $doubleLinkedList->head()->next());
    }

    /**
     * @test
     */
    public function uponAddingNewNodesFromTheBackThenTheHeadShouldHaveNoPreviousNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->append(1); // this is the head
        $doubleLinkedList->append(2);
        $doubleLinkedList->append(3); // this is the tail

        $this->assertEmpty($doubleLinkedList->head()->previous());
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
        $doubleLinkedList->append(5); // this is the tail

        $this->assertEquals(2, ($currentNode = $doubleLinkedList->head()->next())->value());
        $this->assertEquals(3, ($currentNode = $currentNode->next())->value());
        $this->assertEquals(4, ($currentNode = $currentNode->next())->value());
        $this->assertEquals(5, ($currentNode = $currentNode->next())->value());
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

        $this->assertEquals(4, ($currentNode = $doubleLinkedList->tail()->previous())->value());
        $this->assertEquals(3, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(2, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(1, ($currentNode = $currentNode->previous())->value());
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

        $this->assertEquals(4, ($currentNode = $doubleLinkedList->head()->next())->value());
        $this->assertEquals(3, ($currentNode = $currentNode->next())->value());
        $this->assertEquals(2, ($currentNode = $currentNode->next())->value());
        $this->assertEquals(1, ($currentNode = $currentNode->next())->value());
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

        $this->assertEquals(2, ($currentNode = $doubleLinkedList->tail()->previous())->value());
        $this->assertEquals(3, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(4, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(5, ($currentNode = $currentNode->previous())->value());
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

        $this->assertEquals(2, ($currentNode = $doubleLinkedList->head()->next())->value());
        $this->assertEquals(1, ($currentNode = $currentNode->next())->value());
        $this->assertEquals(3, ($currentNode = $currentNode->next())->value());
        $this->assertEquals(5, ($currentNode = $currentNode->next())->value());
    }

    /**
     * @test
     */
    public function uponAddingMultipleNodesThenItShouldBeAbleToTravelFromTailToHead(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $doubleLinkedList->prepend(1);
        $doubleLinkedList->append(2);
        $doubleLinkedList->append(3);
        $doubleLinkedList->prepend(4); // this is the head
        $doubleLinkedList->append(5); // this is the tail
        // position: 4, 1, 2, 3, 5

        $this->assertEquals(4, $doubleLinkedList->head()->value());
        $this->assertEquals(5, $doubleLinkedList->tail()->value());
        $this->assertEquals(3, ($currentNode = $doubleLinkedList->tail()->previous())->value());
        $this->assertEquals(2, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(1, ($currentNode = $currentNode->previous())->value());
        $this->assertEquals(4, ($currentNode = $currentNode->previous())->value());
    }

    /**
     * @test
     */
    public function canBeAnIterable(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $first = $doubleLinkedList->prepend(1); // tail
        $second = $doubleLinkedList->prepend(2);
        $third = $doubleLinkedList->prepend(3);
        $fourth = $doubleLinkedList->prepend(4);
        $fifth = $doubleLinkedList->prepend(5); // head
        $nodes = [$fifth, $fourth, $third, $second, $first];

        // starts from the tail
        $i = 0;
        foreach ($doubleLinkedList as $node) {
            $this->assertSame($nodes[$i], $node);
            $this->assertSame($nodes[$i], $doubleLinkedList->current());
            $this->assertEquals($i, $doubleLinkedList->key());
            $i++;
        }
        $this->assertEquals(5, $doubleLinkedList->size());
        $this->assertEquals(5, $i);
    }

    /**
     * @test
     */
    public function uponAddingMultipleNodesWithInsertThenItShouldBeAbleToTravelFromTailToHead(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $one = $doubleLinkedList->prepend(1);
        $four = $doubleLinkedList->append(4);
        $three = $doubleLinkedList->insertBefore(3, $four);
        $two = $doubleLinkedList->insertBefore(2, $three);
        $five = $doubleLinkedList->prepend(5); // head
        $zero = $doubleLinkedList->insertBefore(0, $one);
        $hello = $doubleLinkedList->insertBefore('hello', $two);
        $seven = $doubleLinkedList->insertAfter(7, $hello);
        $eight = $doubleLinkedList->insertAfter(8, $four);
        // nodes: 5, 0, 1, 'hello', 7, 2, 3, 4, 8

        $this->assertSame($eight, $doubleLinkedList->tail());
        $this->assertSame($four, $current = $doubleLinkedList->tail()->previous());
        $this->assertSame($three, $current = $current->previous());
        $this->assertSame($two, $current = $current->previous());
        $this->assertSame($seven, $current = $current->previous());
        $this->assertSame($hello, $current = $current->previous());
        $this->assertSame($one, $current = $current->previous());
        $this->assertSame($zero, $current = $current->previous());
        $this->assertSame($five, $current = $current->previous());
    }

    /**
     * @test
     */
    public function canIterateProperlyWhenUsingInsertBefore(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $one = $doubleLinkedList->prepend(1);
        $four = $doubleLinkedList->append(4);
        $three = $doubleLinkedList->insertBefore(3, $four);
        $two = $doubleLinkedList->insertBefore(2, $three);
        $five = $doubleLinkedList->prepend(5); // head
        $zero = $doubleLinkedList->insertBefore(0, $one);
        $hello = $doubleLinkedList->insertBefore('hello', $two);
        $seven = $doubleLinkedList->insertAfter(7, $hello);
        $eight = $doubleLinkedList->insertAfter(8, $four);
        $nodes = [$five, $zero, $one, $hello, $seven, $two, $three, $four, $eight];

        // starts from the tail
        $i = 0;
        foreach ($doubleLinkedList as $node) {
            $this->assertSame($nodes[$i++], $node);
        }
        $this->assertEquals(9, $doubleLinkedList->size());
        $this->assertEquals(9, $i);
    }
}
