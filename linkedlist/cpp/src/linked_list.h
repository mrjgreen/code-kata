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
        // Add an item to the front of the list
        void PushFront(T value);
        // Add an item to the back of the list
        void PushBack(T value);
        // Returns the value of first item on the list
        T Front();
        // Returns the value of last item on the list
        T Back();
    private:
        std::unique_ptr<ListElement<T>> head_;
    };
}


#endif //CPP_LINKEDLIST_H
