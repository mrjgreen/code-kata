package main

import "testing"


func TestLinkedListIsCreated(t *testing.T) {
	list := newLinkedList()

	list.pushFront(10)

	list.front()
}