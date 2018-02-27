<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);


/*****************************************************************************************
 *	Name - usage
 *	Copyright (c) 2018
 *
 *	Description:
 *
 *	Authors: Peter Illmayer & Craig Steadman
 *
 *	Date: 22/02/2018
 *****************************************************************************************
 *	Version History:
 *
 * 	v1.0 -	added code framework
 *	
 *****************************************************************************************/
/*	Include Libraries   
 */

include "mySignal.php";
include "myError.php";
include "myDebug.php";
include "myGlobals.php";
include "mySocket.php";

/*
 *****************************************************************************************
 *	Function Prototypes:
 *
 *	....
 *
 *****************************************************************************************/


/****************************************************************/
// MAIN PROGRAM

// Lock file check - add later

// WatchDog setup - add later

// Install signal handler
setupSignalHandler();
pcntl_signal_dispatch();

// Display startup messages and do sanity checks
startUpMessage();
sanityCheck("PERM");
displayHostName($host);

//Listens for requests and forks on each connection
$__server_listening = true;

error_reporting(E_ALL);
set_time_limit(0);
ob_implicit_flush();

become_daemon();

/* nobody/nogroup, change to your host's uid/gid of the non-priv user */
//change_identity(65534, 65534);

//Fork Message Handler

//Fork Socket Handler

//Init serial port

cicsResponseParser()
?>
