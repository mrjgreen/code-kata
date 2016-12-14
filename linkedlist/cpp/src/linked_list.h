#ifndef CPP_LINKEDLIST_H
#define CPP_LINKEDLIST_H

#include "list_element.h"
#include <memory>

namespace jg {

    template<class T>
    class LinkedList {
    public:
        LinkedList() : head_(nullptr) {};
        // Returns true if list is empty
        bool Empty() const;
        // Returns the number of items in the list
        void PushFront(T value);
    private:
        ListElement<T> *head_;
    };
}


#endif //CPP_LINKEDLIST_H
