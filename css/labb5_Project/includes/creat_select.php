<?php
include("connect.php");

$sql_select = "SELECT name, beskrivning FROM creat_product";
$result = $conn->query($sql_select);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<br>" . "name: " . $row["name"]. " <br>" .  
        "beskrivning: " . $row["beskrivning"] . "</br>";
    }
}else{
    echo "0 result";
}
?>