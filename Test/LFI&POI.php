<?php
/**
 * Created by PhpStorm.
 * User: zik
 * Date: 4/15/16
 * Time: 10:47 PM
 */
//class PHPParser_Node_Expr_Include extends PHPParser_Node_Expr
//{
//    const TYPE_INCLUDE      = 1;
//    const TYPE_INCLUDE_ONCE = 2;
//    const TYPE_REQUIRE      = 3;
//    const TYPE_REQUIRE_ONCE = 4;

include(escapeshellcmd(htmlentities($_POST['id'])));
require_once addslashes(htmlentities($_POST['id']));
