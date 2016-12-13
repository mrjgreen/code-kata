<?php

class NodeTest extends PHPUnit_Framework_TestCase {

    public function testValueIsNullByDefault()
    {
        $node = new \Coding\LinkedList\Node();

        $this->assertNull($node->getValue());
    }

    public function testItAcceptsAndReturnsAValue()
    {
        $node = new \Coding\LinkedList\Node(300);

        $this->assertEquals(300, $node->getValue());
    }

    public function testItAllowsUpdateToValue()
    {
        $node = new \Coding\LinkedList\Node(300);
        
        $node->setValue(400);

        $this->assertEquals(400, $node->getValue());
    }

    public function testNextNodeIsNullByDefault()
    {
        $node = new \Coding\LinkedList\Node();

        $this->assertNull($node->getNext());
    }

    public function testNextNodeCanBeSetAndReturned()
    {
        $node = new \Coding\LinkedList\Node();

        $nextNode = new \Coding\LinkedList\Node();

        $node->setNext($nextNode);

        $this->assertSame($nextNode, $node->getNext());
    }
}