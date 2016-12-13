<?php namespace Coding\LinkedList;

class Node {

    private $next;

    private $value;

    public function __construct($value = null)
    {
        $this->value = $value;
    }

    public function setNext(Node $nextNode)
    {
        $this->next = $nextNode;
    }

    public function clearNext()
    {
        $this->next = null;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
