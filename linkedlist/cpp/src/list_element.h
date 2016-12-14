#ifndef CPP_LIST_ELEMENT_H
#define CPP_LIST_ELEMENT_H

#include <memory>

namespace jg {

    template<class T>
    class ListElement {
    public:
        ListElement(const T val) : value_(val), next_(nullptr){}
        void SetNext(ListElement<T> *next){next_ = next;}
        T GetValue(){return value_;}
        ListElement<T>* GetNext(){return next_;}
    private:
        T value_;
        ListElement<T> *next_;
    };
}


#endif //CPP_LIST_ELEMENT_H
