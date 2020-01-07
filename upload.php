<?php

require_once '/Applications/MAMP/htdocs/personal_blog/core/config/bootstrap.php';

$cartella_upload = "assets/uploads/";
$tipi_consentiti = array("gif", "png", "jpeg", "jpg");
$max_byte = 10000000;

if (trim($_FILES["upload"]["name"]) == '') {
   echo 'Non hai selezionato nessun file!';
} else if (!is_uploaded_file($_FILES["upload"]["tmp_name"]) or $_FILES["upload"]["error"] > 0) {
   echo 'Si sono verificati problemi nella procedura di upload!';
} else if (!in_array(strtolower(end(explode('.', $_FILES["upload"]["name"]))), $tipi_consentiti)) {
   echo 'Il file che si desidera uplodare non è fra i tipi consentiti!';
} else if ($_FILES["upload"]["size"] > $max_byte) {
   echo 'Il file che si desidera uplodare eccede la dimensione massima!';
} else if (!is_dir($cartella_upload)) {
   echo 'La cartella in cui si desidera salvare il file non esiste!';
} else if (!is_writable($cartella_upload)) {
   echo "La cartella in cui fare l'upload non ha i permessi!";
} else if (!move_uploaded_file($_FILES["upload"]["tmp_name"], $cartella_upload . $_FILES["upload"]["name"])) {
   echo 'Ops qualcosa è andato storto nella procedura di upload!';
} else {
   echo 'Upload eseguito correttamente!';
}
