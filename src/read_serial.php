<?php

include 'PhpSerial.php';

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

// To write into
printf("CICSParser 1.0 !\r\n");
$serial->sendMessage("CICSParser 1.0 !\r\n");

// Or to read from
$token_array = [];
$token_array[0] = "";
while(true)
{

	// Since our read routine is buffering a byte at a time
	// and is non blocking I have to discard nulls and
	// concatenate the bytes returned until the terminating char 

	$read="";
	$line="";
	do {
		// non blocking read
		$read = $serial->readPort();
		if ($read !== "") {
			$line .= $read;
			printf("%s",$read);
		}
	} while ( $read !== "\n" );
	printf("\r\n");

	if ($line) {
	printf("Read %d bytes \r\n",strlen($line));
	printf("buffer: %s\r\n",$line);
	}

	// Tokenize input buffer
	$x=0;
	$tok = strtok($line, " \n");
	while ($tok !== false) {
		$token_array[$x++] = $tok;
		printf("Token: %s\r\n",$tok);
    		$tok = strtok(" \n");
	}

	// Command parser
	$response = $token_array[0];
	printf("Response1 %s \r\n",$response);


	switch ($response) {
	case "PAGE-CALL:":
		print("[[ Page-Call detected ]]\r\n\r\n" );
		break;
	default;
	} //end switch

} //end while(true)

// If you want to change the configuration, the device must be closed
$serial->deviceClose();
// We can change the baud rate
//$serial->confBaudRate(2400);

?>
