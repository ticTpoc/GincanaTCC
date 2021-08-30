<?php
 $rm = $_SESSION['rm'] ?? 0;
 $q="select * from usuarios where $rm=rm";
 $busca = $banco->query($q); 

?>