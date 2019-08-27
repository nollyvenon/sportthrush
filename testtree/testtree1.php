<?PHP
 
// Recursive function to generate a parent/child tree
// Without the need for a Root parent
// Written by: Brian Parnes
// 13 March 2006
    define('_HOST_NAME', 'localhost');
	define('_DATABASE_USER_NAME', 'root');
	define('_DATABASE_PASSWORD', '');
	define('_DATABASE_NAME', 'lifehelpclub');
 
$connect = mysql_connect(_HOST_NAME, _DATABASE_USER_NAME, _DATABASE_PASSWORD);
mysql_select_db(_DATABASE_NAME);
$nav_query = MYSQL_QUERY("SELECT * FROM `affiliateuser` ORDER BY `parent_id`");
$tree = "";                         // Clear the directory tree
$depth = 1;                         // Child level depth.
$top_level_on = 1;               // What top-level category are we on?
$exclude = ARRAY();               // Define the exclusion array
ARRAY_PUSH($exclude, 0);     // Put a starting value in it
 
WHILE ( $nav_row = MYSQL_FETCH_ARRAY($nav_query) )
{
     $goOn = 1;               // Resets variable to allow us to continue building out the tree.
     FOR($x = 0; $x < COUNT($exclude); $x++ )          // Check to see if the new item has been used
     {
          IF ( $exclude[$x] == $nav_row['category_id'] )
          {
               $goOn = 0;
               BREAK;                    // Stop looking b/c we already found that it's in the exclusion list and we can't continue to process this node
          }
     }
     IF ( $goOn == 1 )
     {
          $tree .= $nav_row['title'] . "<br>";                    // Process the main tree node
          ARRAY_PUSH($exclude, $nav_row['category_id']);          // Add to the exclusion list
          IF ( $nav_row['category_id'] < 6 )
          { $top_level_on = $nav_row['category_id']; }
 
          $tree .= build_child($nav_row['category_id']);          // Start the recursive function of building the child tree
     }
}
 
FUNCTION build_child($oldID)               // Recursive function to get all of the children...unlimited depth
{
     GLOBAL $exclude, $depth;               // Refer to the global array defined at the top of this script
     $child_query = MYSQL_QUERY("SELECT * FROM `categories` WHERE parent_id=" . $oldID);
     WHILE ( $child = MYSQL_FETCH_ARRAY($child_query) )
     {
          IF ( $child['category_id'] != $child['parent_id'] )
          {
               FOR ( $c=0;$c<$depth;$c++ )               // Indent over so that there is distinction between levels
               { $tempTree .= "&nbsp;"; }
               $tempTree .= "- " . $child['title'] . "<br>";
               $depth++;          // Incriment depth b/c we're building this child's child tree  (complicated yet???)
               $tempTree .= build_child($child['category_id']);          // Add to the temporary local tree
               $depth--;          // Decrement depth b/c we're done building the child's child tree.
               ARRAY_PUSH($exclude, $child['category_id']);               // Add the item to the exclusion list
          }
     }
 
     RETURN $tempTree;          // Return the entire child tree
}
 
ECHO $tree;
 
?>