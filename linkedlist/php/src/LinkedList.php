<?php namespace Coding\LinkedList;

class LinkedList {

    /**
     * @var Node
     */
    private $head = null;

    public function front()
    {
        if($this->head === null){
            throw new \LogicException("List is empty");
        }

        return $this->head->getValue();
    }

    public function back()
    {
        if($this->head === null){
            throw new \LogicException("List is empty");
        }

        $node = $this->head;

        while($next = $node->getNext()){
            $node =  $next;
        }

        return $node->getValue();
    }

    public function pushFront($value)
    {
        $node = new Node($value);

        if($this->head !== null){
            $node->setNext($this->head);
        }

        $this->head = $node;
    }

    public function pushBack($value)
    {
        $newNode = new Node($value);

        if($this->head === null){
            $this->head = $newNode;
        }else {
            $node = $this->head;

            while($next = $node->getNext()){
                $node = $next;
            }

            $node->setNext($newNode);
        }
    }

    public function popFront()
    {
        if($this->head === null){
            throw new \LogicException("List is empty");
        }

        $next = $this->head->getNext();

        $value = $this->head->getValue();

        $this->head = $next;

        return $value;
    }

    public function popBack()
    {
        if($this->head === null){
            throw new \LogicException("List is empty");
        }

        $prev = null;
        $node = $this->head;

        while($next = $node->getNext()){
            $prev = $node;
            $node = $next;
        }

        $value = $node->getValue();

        if($prev === null){
            $this->head = null;
        }else {
            $prev->clearNext();
        }

        return $value;
    }

    public function isEmpty()
    {
        return $this->head === null;
    }

    public function get($index)
    {
        $node = $this->head;

        if($index < 0){
            throw new \LogicException("Index out of range: $index");
        }

        for($i = 0; $i < $index && $node !== null; $i++){
            $node = $node->getNext();
        }

        if($node === null){
            throw new \LogicException("Index out of range: $index");
        }

        return $node->getValue();
    }
}
