<?php
    if(isset($_GET["saluto"]) && isset($_GET["nome"])){
        echo $_GET["saluto"]." anche a te ".$_GET["nome"]."!";
    }else echo "non mi hai salutato";

?>