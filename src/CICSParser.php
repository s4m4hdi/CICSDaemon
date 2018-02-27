<?php

include "myCICSProtocol.php"


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

cicsResponseParser() {


while(true) {

	//read serial port

        // tokenize incoming message
        $tokenarray = [];
        $tok = strtok($in_buffer," \n\t");
        while ($tok !== false) {
                $tokenarray[] = $tok;
                $tok = strtok(" \n\t");
        }

        // extract response token
        $response=$tokenarray[0];

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
                        // send Page call information to mysql database
                        // determin message type via payload ie: 10 digit mobile, 1+, 2+, 3+
                        // Process message type as per above
                        // take control of radio
                        // Page call a reply ch#, SELLCALL ID, Message
                        // wait for call sent
                        // cput radio back into scanning mode that closes the call
                break;
                case PAGE_CALL_ACK:
                        //write
                        $out_buffer = "Recieved page call ack!!\r\n";
                        $out_status = socket_send($socket,$out_buffer, strlen($out_buffer), MSG_EOF);
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
                case TEL_CALL:
                break;
                case ERROR:
                        S_DebugPrint(" $in_buffer ");
                break;
                default: //unknown response
        }
}
)
