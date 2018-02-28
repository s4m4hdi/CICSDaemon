<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);


/*****************************************************************************************
 *      Function Prototypes:
 *
 *      function DebugPrint($string)
 *
 *****************************************************************************************/

/****************************************************************
 * function name: DebugPrint($string)
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
    //$bt = debug_backtrace();
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
}


?>
