<?php
$link = mysqli_connect('localhost','root','hack8908','mybd');// Соединяемся с базой
if(isset($_POST['link'])){
    $sql = mysqli_query($link, "UPDATE `_server2_` SET `data` = '{$_POST['link']}' WHERE `name`='bgimage'");
}
?>