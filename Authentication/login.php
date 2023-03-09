<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json; charset=utf-8');

include("../database.php");
include("../Authentication/jwt.php");
include("../Validation/formValidation.php");


