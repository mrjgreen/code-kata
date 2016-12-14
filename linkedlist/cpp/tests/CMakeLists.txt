cmake_minimum_required(VERSION 3.6)
project(linked_lists_tests)

set(SOURCE_FILES main.cpp catch.hpp linked_list_test.cpp)

add_executable (Test ${SOURCE_FILES})

target_link_libraries(Test linked_list_lib)