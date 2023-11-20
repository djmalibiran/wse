<?php
session_start();

require 'components/header.php';

echo '<pre>'; var_dump($_SESSION); echo '</pre>';
?>


<?php
require 'components/footer.php';
?>