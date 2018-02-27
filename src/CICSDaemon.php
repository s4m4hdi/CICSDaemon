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
//include "myGlobals.php";
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

// Display startup messages and do sanity checks
//startUpMessage();
//sanityCheck("PERM");
//displayHostName($host);


error_reporting(E_ALL);
set_time_limit(0);
ob_implicit_flush();

//Setup shared memory

//Fork process into the background and kill the parent
become_daemon();

/* nobody/nogroup, change to your host's uid/gid of the non-priv user */
//change_identity(65534, 65534);

//Fork Message Handler
// fork the child and spawn message handler
    $gpid1 = pcntl_fork();

    if ($gpid1 == -1)
    {
        /* fork failed */
        echo "fork failure!\n";
        exit();
    }elseif ($gpid1)
    {
        /* close the parent */
        // parent will remain in this case - setup parent child stream
    }else
    {
        /* grand child becomes new daemon process*/
        posix_setsid();
        chdir('/');
        umask(0);
        //return posix_getpid();
	printf("Launching message handler v1.0 %d\r\n",posix_getpid());
	while(true) sleep(10);
	//call the messagehandler
    }

//Fork Socket Handler
//Listens for requests and forks on each connection
$__server_listening = true;
// fork the child and spawn message handler
    $gpid2 = pcntl_fork();

    if ($gpid2 == -1)
    {
        /* fork failed */
        echo "fork failure!\n";
        exit();
    }elseif ($gpid2)
    {
        /* close the parent */
        // parent will remain in this case - setup parent child stream
    }else
    {
        /* grand child becomes new daemon process*/
        posix_setsid();
        chdir('/');
        umask(0);
        //return posix_getpid();
        printf("Launching socket listener v1.0 %d\r\n",posix_getpid());
        while(true) sleep(10);
        //call the server loop
    }


//Init serial port
// Let's start the class
$serial = new PhpSerial;

// First we must specify the device. This works on both linux and windows (if
// your linux serial device is /dev/ttyS0 for COM1, etc)
$serial->deviceSet("/dev/serial0");

// We can change the baud rate, parity, length, stop bits, flow control
$serial->confBaudRate(9600);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->confFlowControl("none");

// Then we need to open it
$serial->deviceOpen();

// Install signal handler
// - note Phpserial.php throws an exec exception if this is done before serial init
setupSignalHandler();
pcntl_signal_dispatch();

// Start parser
cicsResponseParser($serial);

?>
