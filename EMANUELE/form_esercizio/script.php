<?php
if (isset($_POST["carne"]) && isset($_POST["carne"]) && isset($_POST["verdura"]) && isset($_POST["formaggio"]) && isset($_POST["salsa"]) && isset($_POST["extra"])){
    $pane = $_POST["pane"];
    $carne = $_POST["carne"];
    $verdura = $_POST["verdura"];
    $formaggio = $_POST["formaggio"];
    $salsa = $_POST["salsa"];
    $extra = $_POST["extra"];
    echo "Gli ingredienti sono: ".$pane." ".$carne." ".$verdura." ".$formaggio." ".$salsa." ".$extra;
}
else{
    header("Location: index.php");
    exit;
}
?>