#include "linked_list.h"
#include <stdexcept>

namespace jg {

    template<class T>
    bool LinkedList<T>::Empty() const {
        return head_ == nullptr;
    }

    template <class T>
    void LinkedList<T>::PushFront(T value) {
        std::unique_ptr<ListElement<T>> node(new ListElement<T>(value));

        node->next = std::move(head_);
        head_ = std::move(node);
    }

    template <class T>
    void LinkedList<T>::PushBack(T value) {
        std::unique_ptr<ListElement<T>> newNode(new ListElement<T>(value));

        if (Empty()){
            head_ = std::move(newNode);
            return;
        }

        auto node = head_.get();

        while(node->next != nullptr){
            node = node->next.get();
        }

        node->next = std::move(newNode);
    }

    template <class T>
    T LinkedList<T>::Front() {
        if (Empty()){
            throw std::logic_error("List is empty");
        }

        return head_->value;
    }

    template <class T>
    T LinkedList<T>::Back() {
        if (Empty()){
            throw std::logic_error("List is empty");
        }

        auto node = head_.get();

        while(node->next != nullptr){
            node = node->next.get();
        }

        return node->value;
    }
}