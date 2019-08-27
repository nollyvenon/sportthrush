<?php
    define('_HOST_NAME', 'localhost');
	define('_DATABASE_USER_NAME', 'root');
	define('_DATABASE_PASSWORD', '');
	define('_DATABASE_NAME', 'lifehelpclub');
 
$connect = mysql_connect(_HOST_NAME, _DATABASE_USER_NAME, _DATABASE_PASSWORD);
mysql_select_db(_DATABASE_NAME);

function getOneLevel($catId){
    $query=mysql_query("SELECT * FROM affiliateuser WHERE parent_id='".$catId."'");
    $cat_id=array();
    if(mysql_num_rows($query)>0){
        while($result=mysql_fetch_assoc($query)){
            $cat_id[]=$result['parent_id'];
        }
    }   
    return $cat_id;
}

function getChildren($parent_id) {
    $tree = Array();
    if (!empty($parent_id)) {
        $tree = getOneLevel($parent_id);
        foreach ($tree as $key => $val) {
            $ids = getChildren($val);
            $tree = array_merge($tree, $ids);
        }
    }
    return $tree;
}
echo getChildren(5);
?>