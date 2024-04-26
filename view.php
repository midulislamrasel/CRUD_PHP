<a href="insert.php">INSERT PAGE</a>
<style>
    table{
        border-collapse:collapse;
    }
    td,th{
        border:1px solid lightgray;
        padding:4px 20px;
    }
</style>

<?php
require_once("db_config.php");
// require_once("hader.php");


$html = "<table>";
$html .="<tr>
<th>ID</th>
<th>Name</th>
<th>Full Name</th>
<th>Email</th>
<th>Role_ID</th>
<th>ip</th>
<th>Modify</th>
</tr>";

$result = $db->query("select id,name ,full_Name,email,role_id,ip from crud");
while ($row = $result->fetch_object()) {
    $html .= "<tr>";
    $html .= "<td> $row->id </td>";
    $html .= "<td> $row->name </td>";
    $html .= "<td> $row->full_Name </td>";
    $html .= "<td> $row->email </td>";
    $html .= "<td> $row->role_id </td>";
    $html .= "<td>$row->ip  </td>";
    $html .= "<td> <a href='update.php?id=$row->id'>Update</a> |  <a href='delete.php? id=$row->id'> Delete </a> </td>";
    $html .= "</tr>";
}

$html .= "</table>";

echo $html;


?>