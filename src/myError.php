<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);

/*****************************************************************************************
 *      Function Prototypes:
 *
 *      function cleanUp($exit)
 *      function errorHandler($err)
 *      function sanityCheck($chk)
 *
 *****************************************************************************************/


/****************************************************************
 * function name: cleanUp($exit)
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/
function cleanUp($exit) {
     switch ($exit) {
        case "EXIT":
		/*
                $mysock=$GLOBALS['sock'];
                if ($mysock) {
                        $closed_log = "Master Socket Closed ($mysock) \n \n";
                        socket_close($mysock);
                        S_DebugPrint($closed_log);
                }
		*/
		printf("\r\nGame Over Dewd !!!\r\n");
                exit(0);
                break;
        default:
     }
}

/****************************************************************
 * function name: errorHandler($err)
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/
function errorHandler($err) {

}

/****************************************************************
 * function name: sanityCheck($chk)
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/
function sanityCheck($chk) {
	switch ($chk) {
	case "PERM":
		if (!function_exists("fixOwnGrp")) {

    			function fixOwnGrp($fname) {
        		chgrp($fname, "www-data");
        		chown($fname, "www-data");
    			}
		}
		break;
	default:
	}
}


?>
