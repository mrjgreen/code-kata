#include "catch.hpp"
#include "linked_list.cpp"


SCENARIO( "list can be instantiated and populated", "[list]" ) {

    GIVEN( "An empty list" ) {

        jg::LinkedList<int> list{};

        WHEN( "nothing is added" ) {

            THEN( "calls to empty() return true" ) {

                REQUIRE(list.Empty());
            }
        }

        WHEN( "an item is pushed to the front" ) {

            list.PushFront(1);

            THEN( "calls to empty() return false" ) {

                REQUIRE_FALSE(list.Empty());
            }
        }
    }

    GIVEN( "A list" ) {

        jg::LinkedList<int> list{};

        WHEN( "When 2 items are added" ) {

            list.PushFront(1);
            list.PushFront(2);

            THEN( "a call to Front() returns the last item pushed" ) {

                REQUIRE(list.Front() == 1);
            }

            THEN( "a call to Back() returns the first item pushed" ) {

                REQUIRE(list.Back() == 2);
            }
        }
    }
}