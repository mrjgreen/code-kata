cmake_minimum_required(VERSION 3.6)
project(binary_tree_lib)

set(CMAKE_CXX_STANDARD 11)

set(HEADER_FILES
        binary_tree.h
        tree_element.h
        )

set(SOURCE_FILES
        binary_tree.cpp
        )

add_library(binary_tree_lib STATIC ${SOURCE_FILES} ${HEADER_FILES})