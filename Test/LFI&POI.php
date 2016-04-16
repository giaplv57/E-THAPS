<?php
/**
 * Created by PhpStorm.
 * User: zik
 * Date: 4/15/16
 * Time: 10:47 PM
 */

//------------TEST1 - PASSED----------------//
include(escapeshellcmd(htmlentities($_POST['id']))); #VUL
require_once addslashes(htmlentities($_POST['id'])); #VUL
include(pathinfo(htmlentities($_POST['id']))); #NOT VUL
$user_data = unserialize($_GET['data']); #VUL

function purify1($string, $con, $dummy){
    return addslashes($string);
}
function purify2($string, $con, $dummy){
    return basename($string);
}
include purify1(($_GET['abc']), 15, 123); #VUL
require purify2(($_GET['cde']), 15, 123); #NOT VUL
//------------ENDTEST1----------------//


//------------TEST2 - PASSED----------------//
//print("Please specify the name of the file to delete");
//print("<p>");
//$file=$_GET['filename'];
//passthru("rm $file");
//------------ENDTEST2----------------//

//------------TEST3 - PASSED----------------//
//echo shell_exec('cat '.$_GET['filename']);
//echo shell_exec('cat '.escapeshellcmd($_GET['filename']));
//------------ENDTEST3----------------//

//------------TEST4 - PASSED----------------//
//$a = 'cat';
//$a .= $_GET['filename'];
//echo shell_exec($a);
//$b = 'cat';
//$b .= escapeshellcmd($_GET['filename']);
//echo shell_exec($b);
//
//echo shell_exec('cat "'.$_GET['command']).'"';
//------------ENDTEST4----------------//

//------------TEST5 - PASSED----------------//
//$host = 'google';
//if (isset( $_GET['host'] ) )
//    $host = $_GET['host'];
//system("nslookup " . $host);
//------------ENDTEST5----------------//

//------------TEST6 - PASSED----------------//
//$a = $_POST["a"];
//$b = "";
//system(testFunc($a));
//system(testFunc($b));
//system(cleanFunc($a));
//test($a);
//function testFunc($arg) {
//    echo $arg;
//    return $arg;
//}
//function cleanFunc($arg) {
//    return escapeshellarg($arg);
//}
//------------ENDTEST6----------------//