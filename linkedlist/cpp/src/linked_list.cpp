#include "linked_list.h"

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
}