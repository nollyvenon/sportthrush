<?php
    define('_HOST_NAME', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('_DATABASE_NAME', 'lifehelpclub');
	define('CONNECT_STRING', 'mysql:host=127.0.0.1;dbname=lifehelpclub');
	
$dbh = new PDO(CONNECT_STRING, USERNAME, PASSWORD);
$catId = 5;
$dbs = $dbh->query("SELECT * FROM affiliateuser WHERE parent_id='".$catId."' ORDER BY parent_id");
$elems = array();

while(($row = $dbs->fetch(PDO::FETCH_ASSOC)) !== FALSE) {
    $row['children'] = array();
    $vn = "row" . $row['Id'];
    ${$vn} = $row;
    if(!is_null($row['parent_id'])) {
        $vp = "parent" . $row['parent_id'];
        if(isset($data[$row['parent_id']])) {
            ${$vp} = $data[$row['parent_id']];
        }
        else {
            ${$vp} = array('Id' => $row['parent_id'], 'parent_id' => null, 'children' => array());
            $data[$row['parent_id']] = &${$vp};
        }
        ${$vp}['children'][] = &${$vn};
        $data[$row['parent_id']] = ${$vp};
    }
    $data[$row['Id']] = &${$vn};
}
$dbs->closeCursor();

$result = array_filter($data, function($elem) { return is_null($elem['parent_id']); });
print_r($result);
?>