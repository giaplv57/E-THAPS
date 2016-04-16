<?php
/**
 * Created by PhpStorm.
 * User: zik
 * Date: 4/15/16
 * Time: 10:47 PM
 */
# include("menu.php");
#include 'menu.php';
//include ($_GET['id'].".php");

unserialize($_POST['id']);
//$F_FILE_INCLUDE = array(
//    'include' 						, #Param1
//    'include_once' 					, #Param1
//    'parsekit_compile_file'			, #Param1: parsekit_compile_file ( string $filename [, array &$errors [, int $options = PARSEKIT_QUIET ]] )
//    'require' 						, #Param1
//    'require_once' 					, #Param1
//    'set_include_path' 				, #Param1: set_include_path ( string $new_include_path )
//    'virtual' 						, #Param1: virtual ( string $filename )
//    //    'runkit_import'					, #=> array(array(1), $F_SECURING_FILE),
//    //    'php_check_syntax' 				, #=> array(array(1), $F_SECURING_FILE),
//);