#include "linked_list.h"
#include <stdexcept>

namespace jg {

    template<class T>
    bool LinkedList<T>::Empty() const {
        return head_ == nullptr;
    }

    template <class T>
    void LinkedList<T>::PushFront(T value) {
        auto *node = new ListElement<T>(value);

        node->SetNext(head_);
        head_ = node;
    }

    template <class T>
    void LinkedList<T>::PushBack(T value) {
        auto *newNode = new ListElement<T>(value);
        if (Empty()){
            head_ = newNode;
            return;
        }

        auto node = head_;

        while(node->GetNext() != nullptr){
            node = node->GetNext();
        }

        node->SetNext(newNode);
    }

    template <class T>
    T LinkedList<T>::Front() {
        if (Empty()){
            throw std::logic_error("List is empty");
        }

        return head_->GetValue();
    }

    template <class T>
    T LinkedList<T>::Back() {
        if (Empty()){
            throw std::logic_error("List is empty");
        }

        auto node = head_;

        while(node->GetNext() != nullptr){
            node = node->GetNext();
        }

        return node->GetValue();
    }
}