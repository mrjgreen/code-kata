#include "catch.hpp"
#include "binary_tree.cpp"


SCENARIO( "tree can be instantiated and populated", "[tree]" ) {

    GIVEN( "An empty tree" ) {

        jg::BinaryTree<int> tree{};

        WHEN( "nothing is added" ) {

            THEN( "calls to empty() return true" ) {

                REQUIRE(tree.Empty());
            }
        }

        WHEN( "one item is added" ) {

            auto result = tree.Insert(3);

            THEN( "result is true" ) {

                REQUIRE_FALSE(result);
            }

            THEN( "calls to empty() return false" ) {

                REQUIRE_FALSE(tree.Empty());
            }

            THEN( "calls to Find() return our item" ) {

                REQUIRE(tree.Search(3) == 3);
            }
        }

        WHEN( "an identical item is added" ) {

            auto result = tree.Insert(3);

            THEN( "result is false (no insert is made)" ) {

                REQUIRE_FALSE(result);
            }
        }
    }
}