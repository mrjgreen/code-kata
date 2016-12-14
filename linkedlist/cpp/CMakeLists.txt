cmake_minimum_required(VERSION 3.6)
project(linked_list)

add_definitions(-std=c++11)
add_definitions(-Werror) # stop compile on warning

set(CMAKE_CXX_FLAGS "${CMAKE_CXX_FLAGS} -D_GLIBCXX_DEBUG")

include_directories(src)

add_subdirectory(src)
add_subdirectory(tests)