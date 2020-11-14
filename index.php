<?php
require_once  "IRead.php";
$t=new IRead();
$q=$t->file_read("outputfile.csv","Csv");

echo '<pre>';
print_r($q);