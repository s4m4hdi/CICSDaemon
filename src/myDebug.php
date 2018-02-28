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
 * function name: writeLogFile($string,$logfile)
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/
function writeLogFile($string,$logfile) {
    $str = strftime("%c", microtime(true)) . " " . $string;
    file_put_contents($logfile, $str , FILE_APPEND);
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
