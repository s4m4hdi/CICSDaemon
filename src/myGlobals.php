<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);

/*****************************************************************************************
 *      Global Declarations
 */

global $DEBUG;
$DEBUG=true;	//true enables logging

$__server_listening = true;	// parent process is a listener

$MEMSIZE = 512;
$SEMKEY = 1;	//semaphore key;
$SHMKEY = 2; //shared memory key

// child pid storage
global $pids;
$pids = [];

// parent pid
global $parent_pid;

global $CICSParserLog;
global $CICSDaemonLog;
global $CICSMessageHandlerLog;
global $CICSSokHandlerLog;

$CICSParserLog = "/data/log/CICSDaemon/CICSParser.log";
$CICSDaemonLog="/data/log/CICSDaemon/CICSDaemon.log";
$CICSMessageHandlerLog="/data/log/CICSDaemon/CICSMessageHandler.log";
$CICSSokHandlerLog="/data/log/CICSDaemon/CICSSocketHandler.log";


/*
$host = "192.168.1.201";
$port = "9650";
$max_clients = 10;
$sock="";

$DEBUG=false;

$gps = "GPS-POSITION";
$page = "PAGE-CALL";
$cr = chr(13);
$lf = chr(10);
$quote = chr(34);
$s_quote = chr(39);
$null = NULL;
$hfrc = "HFRC";
$tug = "TUG";
$yes = "yes";
$no = "no";
$EOL = "\x0D\x0A";
$cmdPrompt = "\x3E\x20";

$client_IP = "unavailable";
$client_port = "default";

$scan_off = "SCAN OFF";
$scanOff_trigger = "SCAN: OFF";
$scan_on = "SCAN ON";
$scanOn_trigger = "SCAN: ON";
$sent_trigger = "CALL SENT";
$ch = "CHAN ";
$freq = "FREQ ";
$ch_trigger = "CHAN:";
$freq_trigger = "FREQ:";
$page_call = "PAGE-CALL";
$page_call_ack = "PAGE-CALL-ACK";
$page_trigger = "PAGE-CALL:";
$ack_trigger = "PAGE-CALL-ACK:";
$gps_trigger = "GPS-POSITION:";
$selCall_trigger = "SEL-CALL:";
$lockOff_trigger = "LOCK: OFF";
$ok_trigger = "OK";
$linkClosed_trigger = "LINK: CLOSED";
$mute_trigger = "MUTE:";

$typeSelcall = "selcall";
$typePage = "page";
$typeGps = "gps";
$typeAck = "ack";
$typeNotTP = "invalidTP";
$typePostman = "post";
$msg_post = "Checking Postman";
$initial_seq = "first";
$ver = "VER";
$ver_trigger = "CICS:";
*/
?>
