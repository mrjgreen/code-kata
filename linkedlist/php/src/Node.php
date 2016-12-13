<?php namespace Coding\LinkedList;

class Node {

    /**
     * @var Node|null
     */
    private $next;

    /**
     * @var mixed
     */
    private $value;

    /**
     * Node constructor.
     * @param null $value
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * Set the reference to the next node
     *
     * @param Node $nextNode
     */
    public function setNext(Node $nextNode)
    {
        $this->next = $nextNode;
    }

    /**
     * Set the reference to the next node to null
     * Essentially this is "LinkedList::setNext(null)", which is not allowed because of the type hinting.
     *
     * NB. Nullable type hinting in PHP 7 would allow this
     */
    public function clearNext()
    {
        $this->next = null;
    }

    /**
     * Get a reference to the next node
     *
     * @return mixed
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * Set the data value of the node
     *
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get the data value of the node
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
