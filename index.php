<?php

use Acme\AmqpWrapper\Creator;

require_once  "IRead.php";
require_once "./rabbit_php/rab_creator.php";
require_once "./rabbit_php/rab_worker.php";
#$t=new IRead();
#$q=$t->file_read("outputfile.csv","Csv");
#$t->Parsefile($q,3);
$creator=new CreatorA();
$creator->execute("outputfile.csv");