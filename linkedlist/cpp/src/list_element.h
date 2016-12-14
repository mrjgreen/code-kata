#ifndef CPP_LIST_ELEMENT_H
#define CPP_LIST_ELEMENT_H

#include <memory>
#include <iostream>

namespace jg {

    template<class T>
    class ListElement {
    public:
        ListElement(const T val) : value(val), next(nullptr){}
    public:
        T value;
        std::unique_ptr<ListElement<T>> next;
    };
}


#endif //CPP_LIST_ELEMENT_H
