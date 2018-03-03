<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);

include "CICSProtocol.php";


/****************************************************************
 * function name: cicsResponseParser()
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/

function cicsResponseParser($serial,$ssock) {
global $DEBUG;
global $CICSParserLog;

printf("Launching CICSParser 1.0\r\n");
//$serial->sendMessage("CICSParser 1.0\r\n");

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
//        do {
                // non blocking read, non canonical
                //$read = $serial->readPort();

		// blocking io configured in mySystemInit.php
		// fgets terminates on length-1 or newline or EOF
		//       in this case length not specified so blocks and reads till end of line
		$read = fgets($serial->_dHandle);
/*
                if ($read !== "") {
                        $line .= $read;
                       // printf("%s",$read);
                }
*/
//        } while ( $read !== "\n" );
        printf("\r\n");
	$line=$read;

        if ($line) {
        printf("Read %d bytes \r\n",strlen($line));
        printf("buffer: %s\r\n",$line);
        }

	//Save to log file if debug mode enabled
	if ($DEBUG) writeLogFile($line,$CICSParserLog);

        // Tokenize input buffer
        $x=0;
        $tok = strtok($line, " ,");
        while ($tok !== false) {
                $token_array[$x++] = $tok;
                printf("Token: %s\r\n",$tok);
                $tok = strtok(" ,");
        }


        // extract response token
        $response=$token_array[0];
        printf("Response %s \r\n",$response);

        // response parser
        switch ($response) {
                case ALE_LINK:
                break;
                case CALL_DETECTED:
                break;
                case CALL_FAILED:
                break;
                case CALL_SENT:
                break;
                case CALL_STARTED:
                break;
                case CHAN:
                break;
                case CICS:
                break;
                case ECHO_OFF:
                break;
                case ECHO_ON:
                break;
                case EMERGENCY:
                break;
                case FREQ:
                break;
                case GPS_POSITION:
			printf("\r\n");
			printf(">>>> GPS-POSITION detected\r\n\r\n");


                //$timeStamp =
                fwrite($ssock,"testsender\n");
                fwrite($ssock,"testrecipient\n");
                fwrite($ssock,"test message\n");
                fwrite($ssock,"SMS\n");

                        // send gps-position data to mysql database
                        // ack message to sender radio
                        // take control of radio
                        // Page-call the reply CH#, SELCALL_ID, Message
                        // Wait for call sent
                        // put radio back into scanning mode which closes down call
                break;
                case LBT:
                break;
                case LOCK:
                break;
                case MODE:
                break;
                case NO_EXTERNAL_UNIT:
                break;
                case NO_RESPONSE:
                break;
                case OK:
                break;
                case OPTIONS:
                break;
                case PAGE_CALL:
			printf("\r\n");
			printf(">>>>  PAGE-CALL detected \r\n\r\n" );
                        // send Page call information to mysql database
                        // determin message type via payload ie: 10 digit mobile, 1+, 2+, 3+
                        // Process message type as per above
                        // take control of radio
                        // Page call a reply ch#, SELLCALL ID, Message
                        // wait for call sent
                        // cput radio back into scanning mode that closes the call
                break;
                case PAGE_CALL_ACK:
                break;
                case PAUSE:
                break;
                case PROMPT:
                break;
                case PTT:
                break;
                case SCAN:
                break;
                case SECURE:
                break;
                case SELCALL:
			printf("\r\n");
			printf(">>>> SEL-CALL detected\r\n\r\n");
                        // send sel-call information to mysql database
                        // determine SELCALL_ID
                        // Take control of radio
                        // Page-call the reply CH#, SELCALL_ID, message)
                        // call sent
                        // put radio back into scanning mode to close the call
                break;
                case SELFID_LIST:
                break;
                case SIDEBAND:
                break;
                case STATUS_ACK:
                break;
                case STATUS_CALL:
                break;
                case STATUS_CALL_ACK:
                break;
                case STATUSTIME:
                break;
                case TELLCALL:
                break;
                case ERROR:
                break;
                default: //unknown response
        } //end switch($response)
} //end while(true)
} //end cicsResponseParser()

?>
