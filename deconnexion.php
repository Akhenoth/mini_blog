<?php
setCookie("Uncookie", "", time()-1, null, null, true, false);

header('Location: index.php');
?>