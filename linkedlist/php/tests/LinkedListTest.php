<?php

class LinkedListTest extends PHPUnit_Framework_TestCase {

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage List is empty
     */
    public function testEmptyListThrowsOnFront()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $this->assertNull($list->front());
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage List is empty
     */
    public function testEmptyListThrowsOnBack()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $this->assertNull($list->back());
    }

    /**
     *
     */
    public function testEmptyCheckReturnsExpected()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $this->assertTrue($list->isEmpty());

        $list->pushFront(100);

        $this->assertFalse($list->isEmpty());
    }

    /**
     *
     */
    public function testListCanBePrependedTo()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $list->pushFront(400);

        $this->assertEquals(400, $list->front());
        $this->assertEquals(400, $list->back());

        $list->pushFront(200);

        $this->assertEquals(200, $list->front());
        $this->assertEquals(400, $list->back());
    }

    /**
     *
     */
    public function testListCanBeAppendedTo()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $list->pushFront(300);
        $list->pushFront(200);
        $list->pushFront(100);
        $list->pushBack(400);

        $this->assertEquals(100, $list->get(0));
        $this->assertEquals(200, $list->get(1));
        $this->assertEquals(300, $list->get(2));
        $this->assertEquals(400, $list->get(3));
    }

    /**
     *
     */
    public function testListCanBePoppedFromFront()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $list->pushFront(400);
        $list->pushFront(200);

        $this->assertEquals(200, $list->popFront());
        $this->assertEquals(400, $list->popFront());
        $this->assertTrue($list->isEmpty());
    }

    /**
     *
     */
    public function testListCanBePoppedFromBack()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $list->pushFront(400);
        $list->pushFront(200);

        $this->assertEquals(400, $list->popBack());
        $this->assertEquals(200, $list->popBack());
        $this->assertTrue($list->isEmpty());
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Index out of range: 0
     */
    public function testIndexingEmptyListThrows()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $list->get(0);
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Index out of range: 4
     */
    public function testIndexingOutOfRangeListThrows()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $list->pushFront(400);

        $list->get(4);
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Index out of range: -4
     */
    public function testNegativeIndexingOutOfRangeListThrows()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $list->pushFront(400);

        $list->get(-4);
    }

    public function testListCanBeIndexed()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $list->pushFront(300);
        $list->pushFront(200);
        $list->pushFront(100);

        $this->assertEquals(100, $list->get(0));
        $this->assertEquals(200, $list->get(1));
        $this->assertEquals(300, $list->get(2));
    }

    public function testListCanBeRemoved()
    {
        $list = new \Coding\LinkedList\LinkedList();

        $list->pushFront(300);
        $list->pushFront(200);
        $list->pushFront(100);

        $list->remove(1);
        $this->assertEquals(300, $list->back());
        $this->assertEquals(100, $list->front());

        $list->remove(0);
        $this->assertEquals(300, $list->back());

        $list->remove(0);

        $this->assertTrue($list->isEmpty());
    }
}