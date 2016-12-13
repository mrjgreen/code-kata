package main

import "errors"

type Node struct {
	value interface{}
	next *Node
}

func newNode(v interface{}) *Node{
	return &Node{value: v}
}

type LinkedList struct {
	head *Node
}

func newLinkedList() LinkedList {
	return LinkedList{}
}

func (l LinkedList) pushFront(v interface{}){

	node := newNode(v)

	if(l.head != nil){
		node.next = l.head
	}

	l.head = node
}

func (l LinkedList) front() (interface{}, error){

	if(l.head == nil){
		return nil, errors.New("List is empty")
	}

	return l.head.value, nil
}