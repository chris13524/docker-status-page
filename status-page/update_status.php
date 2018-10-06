<?php
define("SERVER_IP", "<YOUR DOCKER HOST HERE>");

if ($_SERVER['REMOTE_ADDR'] == SERVER_IP) {
    $status = $_POST['status'];

    if (!isset($_POST['name'])) {
         $files = scandir('containers/');
         foreach($files as $file) {
             if ($file === "." || $file === "..") {
                 continue;
             }
             if ($status === "destroyed") {
                 unlink('containers/'.$file);
             } else {
                 file_put_contents('containers/'.$file, $status);
             }
         }
         exit();
    }

    $name = $_POST['name'];

    if ($status === "destroyed") {
        unlink('containers/'.$name);
        exit();
    }

    file_put_contents('containers/'.$name, $status);
}
?>
