<?php
/**
 * Created by PhpStorm.
 * User: GiapLv
 * Date: 3/15/16
 * Time: 7:06 AM
 */

// cross-site scripting affected functions
$SINK_XSS = array(
    'print_r'						, #Param1
    'printf'						, #Param1
    'vprintf'						, #Param1
    'trigger_error'					, #Param1
    'user_error'					, #Param1
);

// file inclusion functions
$SINK_FILE_INCLUDE = array(
    'include' 						, #Param1
    'include_once' 					, #Param1
    'fgets'							, #Param1
    'fgetss'						, #Param1
    'fread'							, #Param1
    'parsekit_compile_file'			, #Param1: parsekit_compile_file ( string $filename [, array &$errors [, int $options = PARSEKIT_QUIET ]] )
    'require' 						, #Param1
    'require_once' 					, #Param1
    'set_include_path' 				, #Param1: set_include_path ( string $new_include_path )
    'virtual' 						, #Param1: virtual ( string $filename )
);

// OS Command executing functions
$SINK_EXEC = array(
    'exec',         #Param1 : exec ( string $command [, array &$output [, int &$return_var ]] )
    'expect_popen', #Param1: expect_popen ( string $command )
    'passthru',     #Param1: passthru ( string $command [, int &$return_var ] )
    'popen',        #Param1: popen ( string $command , string $mode )
    'proc_open',    #Param1: proc_open ( string $cmd , array $descriptorspec , array &$pipes [, string $cwd [, array $env [, array $other_options ]]] )
    'shell_exec',   #Param1: shell_exec ( string $cmd )
    'system',       #Param1: system ( string $command [, int &$return_var ] )
);

// property oriented programming with unserialize
$SINK_POI = array(
    'unserialize'					, #Param1
    'yaml_parse'					, #Param1
);


// xpath injection
$SINK_XPATH = array(
    'xpath_eval'					, #Param2
    'xpath_eval_expression'			, #Param2
    'xptr_eval'						, #Param2
);

// code evaluating functions
$SINK_CODE = array(
    'assert' 						, #Param1
    'eval' 							, #Param1
);
