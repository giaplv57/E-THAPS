<?php
/**
 * Created by PhpStorm.
 * User: zik
 * Date: 4/15/16
 * Time: 2:23 AM
 */

function purify($string){
    return $string;
}

$a = purify($_GET['abc']);
exec($a);