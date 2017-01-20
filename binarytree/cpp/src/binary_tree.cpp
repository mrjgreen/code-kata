#include "binary_tree.h"

namespace jg {

    template<class T>
    bool BinaryTree<T>::Empty() const {
        return _root == nullptr;
    }

    template <class T>
    bool BinaryTree<T>::Insert(T value) {
        std::unique_ptr<TreeElement<T>> newNode(new TreeElement<T>(value));

        if(Empty()){
            _root = std::move(newNode);
            return true;
        }

        auto node = _root.get();

        while(node && node->value != value){

            if(value < node->value){

                if(!node->left){
                    node->left = std::move(newNode);
                    return true;
                }

                node = node->left.get();
            }

            if(value > node->value){

                if(!node->right){
                    node->right = std::move(newNode);
                    return true;
                }

                node = node->right.get();
            }
        }

        return false;
    }

    template <class T>
    T BinaryTree<T>::Search(T value) {

        if (Empty()){
            throw std::logic_error("Tree is empty");
        }

        auto node = _root.get();

        while(node && node->value != value){
            node = value < node->value ? node->left.get() : node->right.get();
        }

        return node ? node->value : NULL;
    }
}