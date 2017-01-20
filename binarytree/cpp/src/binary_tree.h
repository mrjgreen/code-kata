#ifndef CPP_LINKEDLIST_H
#define CPP_LINKEDLIST_H

#include "tree_element.h"
#include <memory>

namespace jg {

    template<class T>
    class BinaryTree {
    public:
        BinaryTree() : _root(nullptr) {};
        // Returns true if tree is empty
        bool Empty() const;
        // Add an item to the tree
        bool Insert(T value);
        // Find the position of an item in the tree
        T Search(T value);
    private:
        std::unique_ptr<TreeElement<T>> _root;
    };
}


#endif //CPP_LINKEDLIST_H
