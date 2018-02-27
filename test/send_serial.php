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
$serial->sendMessage("PAGE-CALL:        54,   9599,   8825, 24/02 22:25, \"0409839735TEST\"\r\n");

// If you want to change the configuration, the device must be closed
$serial->deviceClose();

?>
