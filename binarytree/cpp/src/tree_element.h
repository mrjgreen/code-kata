#ifndef CPP_TREE_ELEMENT_H
#define CPP_TREE_ELEMENT_H

#include <memory>
#include <iostream>

namespace jg {

    template<class T>
    class TreeElement {
    public:
        TreeElement(const T val) : value(val), left(nullptr), right(nullptr){}
    public:
        T value;
        std::unique_ptr<TreeElement<T>> left;
        std::unique_ptr<TreeElement<T>> right;
    };
}


#endif //CPP_TREE_ELEMENT_H
