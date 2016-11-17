<?php

include("CollegeCrusaders.php");

$college = $_GET['college'];

echo ("You chose ".$college);

var_dump(getMajors($college));
