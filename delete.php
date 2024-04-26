<?php
require_once("db_config.php");

if(isset($_GET["id"])){ 
    $id = $_GET["id"];

    $db->query("delete from crud where id='$id'");
    header("location:view.php");
}else{
    echo "NO ID FOUND";
}

?>