<?php
/**
 * Created by PhpStorm.
 * User: zik
 * Date: 4/15/16
 * Time: 2:23 AM
 */

//------------TEST1 - PASSED----------------//
//function purify1($string, $con, $dummy){
//    return htmlentities($string);
//}
//
//function purify2($string){
//    return ($string);
//}
//
//$a = purify1(($_GET['abc']), 15, 123);
//passthru($a);
//passthru(purify2($_POST['abc']));
//------------ENDTEST1----------------//

//------------TEST2 - PASSED----------------//
//print("Please specify the name of the file to delete");
//print("<p>");
//$file=$_GET['filename'];
//passthru("rm $file");
//------------ENDTEST2----------------//

//------------TEST3 - UNPASSED----------------//
echo shell_exec('cat '.$_GET['filename']);
//------------ENDTEST3----------------//
?>