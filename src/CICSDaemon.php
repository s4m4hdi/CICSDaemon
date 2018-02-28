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
include "PhpSerial.php";
include "CICSParser.php";
include "myError.php";
//include "myDebug.php";
include "myGlobals.php";
include "mySocket.php";
include "myMessageHandler.php";
include "mySystemInit.php";
include "myStreamSockets.php";
include "mySemaphore.php";

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

// Display startup messages and do sanity checks
//startUpMessage();
//sanityCheck("PERM");
//displayHostName($host);


error_reporting(E_ALL);
set_time_limit(0);
ob_implicit_flush();

//Setup semaphore
$semid=getSemaphore($SEMKEY);

// Attach semaphore to shared memory
if (acquireSemaphore($semid)) 
{
	$shmid=attachSharedMem($semid,$SHMKEY,$MEMSIZE);
	if ($shmid==0) printf("Warning - semaphore failed to attach to shared memory\r\n");
}

//Fork process into the background and kill the parent
become_daemon();

/* nobody/nogroup, change to your host's uid/gid of the non-priv user */
//change_identity(65534, 65534);

//Init serial port
$serial=initSerialport();

// Install signal handler
// - note Phpserial.php throws an exec exception if this is done before serial init
// ToDo - update signal handling so child PIDS are tracked and sent correct signals as parent exits
setupSignalHandler();

//Fork Message Handler
$msg_ssock=forkMessageHandler();
printf(" msg_ssock %s \r\n",fgets($msg_ssock));

//Fork Socket Handler
$srv_ssock=forkSocketHandler();
printf(" srv_ssock %s \r\n",fgets($srv_ssock));

// Start parser
cicsResponseParser($serial);

?>
