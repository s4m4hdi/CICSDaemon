<?php

/*****************************************************************************************
 *      Function Prototypes:
 *
 *      function S_DebugPrint($string)
 *      function microtime_float()
 *
 *****************************************************************************************/

// array of files to watch for DebugPrint
//$arrDBG = ["post_update_do.php","update_db_do.php","serial_class_do.php"];
//$arrDBG = ["post_update_do.php","form_cm.php","form_slave.php","channel_slave.php","output_cm.php","update_db_do.php","display_db.php","filter_cm.php","filter_slave.php"];

/****************************************************************
 * function name: S_DebugPrint($string)
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/
function S_DebugPrint($string) {
    $bt = debug_backtrace();
    $str = strftime("%c", microtime(true)) . " at line " . $bt[0]['line'] . " :" . $string;
    file_put_contents(S_DEBUGFILE, $str . "\n", FILE_APPEND);
}

/****************************************************************
 * function name:  microtime_float()
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/
function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float) $usec + (float) $sec);
}

/****************************************************************
 * function name:  startUpMessage()
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/
function startUpMessage() {
	DebugPrint("**** Started Multi socket server ****");
}

/****************************************************************
 * function name:  displayHostName()
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/
function displayHostName($host) {
	DebugPrint("host is :" . $host);
}


?>
