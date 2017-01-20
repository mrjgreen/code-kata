cmake_minimum_required(VERSION 3.6)
project(binary_tree_tests)

set(SOURCE_FILES main.cpp catch.hpp binary_tree_test.cpp)

add_executable (Test ${SOURCE_FILES})

target_link_libraries(Test binary_tree_lib)