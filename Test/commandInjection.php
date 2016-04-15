<?php
/**
 * Created by PhpStorm.
 * User: zik
 * Date: 4/15/16
 * Time: 2:23 AM
 */

function purify1($string, $con, $dummy){
    return htmlentities($string);
}

function purify2($string){
    return ($string);
}

$a = purify1(($_GET['abc']), 15, 123);
passthru($a);
passthru(purify2($_POST['abc']));