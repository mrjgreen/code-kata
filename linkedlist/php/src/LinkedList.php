<?php namespace Coding\LinkedList;

class LinkedList {

    /**
     * @var Node
     */
    private $head = null;

    /**
     * Return the item at the front of the list
     *
     * @return mixed
     */
    public function front()
    {
        if($this->head === null){
            throw new \LogicException("List is empty");
        }

        return $this->head->getValue();
    }

    /**
     * Return the item at the back of the list
     *
     * @return mixed
     */
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

    /**
     * Add an item to the front of the list
     *
     * @param $value
     */
    public function pushFront($value)
    {
        $node = new Node($value);

        if($this->head !== null){
            $node->setNext($this->head);
        }

        $this->head = $node;
    }

    /**
     * Add an item to the end of the list
     *
     * @param $value
     */
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

    /**
     * Return the value at the front of the list and remove the item
     *
     * @return mixed
     */
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

    /**
     * Return the value at the end of the list and remove the item
     *
     * @return mixed
     */
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

    /**
     * Check if the list is empty
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->head === null;
    }

    /**
     * Access the value at a particular index
     *
     * @param $index
     * @return mixed
     */
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

    /**
     * Remove the value at a particular index
     *
     * @param $index
     * @return mixed
     */
    public function remove($index)
    {
        $prev = null;
        $node = $this->head;

        if($index < 0){
            throw new \LogicException("Index out of range: $index");
        }

        for($i = 0; $i < $index && $node !== null; $i++){
            $prev = $node;
            $node = $node->getNext();
        }

        if($node === null){
            throw new \LogicException("Index out of range: $index");
        }

        $next = $node->getNext();

        if($prev === null){
            $this->head = $next;
        }else {
            $next ? $prev->setNext($next) : $prev->clearNext();
        }
    }

    /**
     * Set the value at a particular index
     *
     * @param $index
     * @param $value
     */
    public function set($index, $value)
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

        $node->setValue($value);
    }
}
