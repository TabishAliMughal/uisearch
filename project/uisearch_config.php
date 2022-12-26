<?php
// (A) SOURCE & TARGET
$from = "C:\Users\HP\Desktop\resources";
$to = "C:\Users\HP\Downloads\Desktop";

// // (B) COPY COMMAND
// $os = strtolower(PHP_OS_FAMILY); // PHP 7.2 & ABOVE ONLY
// $cmd = "";
// if ($os == "windows") { $cmd = "Xcopy $from $to /E/H/C/I"; }
// if ($os =="linux") { $cmd = "cp -R $from $to"; }
// if ($cmd=="") { exit("Error copying"); }

// // (C) RUN!
// echo $cmd;
// echo exec($cmd);

echo base_path();

?>