_<?php

// CICS Command & Syntax

/* -----------------------------------------------------
alecall
<destination>[@<network>]
[±lbt] ["<message>"] [from
<self address>[@<network>]]

Makes a call to addressed stations using any, or the
specified, ALE/CALM network from the self address
specified.
*/
define("ALECALL",	"alecall");

/* -----------------------------------------------------
aletelcall
<destination>[@<network>]
[±lbt] <telephone number>
[from <self
address>[@<network>]]

Makes a Phone call to addressed stations using any, or the
specified, ALE/CALM network from the self address
specified.
*/
define("ALETELCAQLL",	"aletelcall");

/* -----------------------------------------------------
call <destination>[@<network>]
[±lbt] [from <self
address>[@<network>]]

Makes a call to addressed stations using any, or the
specified, ALE/CALM, Codan Selcall, or Open Selcall
network from the self address specified.
*/
define("CALLCMD",		"call");

/* -----------------------------------------------------
chan [<name>]

Displays the current channel, or switches to the channel
specified.
*/
define("CHANNEL",	"chan");

/* -----------------------------------------------------
echo [off|on]

Displays the current echo status, or switches to Half
Duplex Mode (off) or Full Duplex Mode (on, default).
*/
define("ECHO",		"echo");

/* -----------------------------------------------------
freq [<frequency>]

Displays the common receive/transmit frequency or the
separate receive and transmit frequencies (in kHz) for the
current channel, or selects the channel that has the receive
frequency specified (in kHz). If the channel with the exact
receive frequency is not found, the channel with the next
higher frequency is selected.
*/
define("FREQU",		"freq");

/* -----------------------------------------------------
gpsbeacon
<destination>[@<network>]
[±lbt] [from <self
address>[@<network>]]

Makes a Get Position call to an addressed station using
any, or the specified, ALE/CALM, Codan Selcall, or
Open Selcall network from the self address specified.
*/
define("GPSBEACON",	"gpsbeacon");

/* -----------------------------------------------------
gpsposition
<destination>[@<network>]
[±lbt] [from <self
address>[@<network>]]

Makes a Send Position call to addressed stations using
any, or the specified, ALE/CALM, Codan Selcall, or
Open Selcall network from the self address specified.
*/
define("GPSPOSITION",	"gpsposition");

/* -----------------------------------------------------
hangup

Closes an active link between your transceiver and the
station that you are calling.
*/
define("HANGUP",	"hangup");

/* -----------------------------------------------------
help [<category>]

Displays the categories of help available, or detailed help
for the commands within the selected category.
*/
define("HELP",		"help");

/* -----------------------------------------------------
lbt [measure]

Displays the current LBT Mode, or performs a check on
the current channel for the presence of data or voice.
*/
define("LBT_CMD",		"lbt");

/* -----------------------------------------------------
lock [abort|off|on]

Displays the current lock status of the transceiver,
attempts to break a lock, releases all locks, or sets a lock.
*/
define("LOCKSTATUS",		"lock");

/* -----------------------------------------------------
mode [<name>]

Displays the mode of the current channel, or sets the
mode of the current channel to that specified, if the mode
is permitted for that channel.
*/
define("CHANNELMODE",		"mode");

/* -----------------------------------------------------
pagecall
<destination>[@<network>]
[±lbt] "<message>" [from <self
address>[@<network>]]

Makes a Send Position call to addressed stations using
any, or the specified, ALE/CALM, Codan Selcall, or
Open Selcall network from the self address specified.
Your message must be written within double or single
quotes. See Table 38 on page 259 for details on the
message length.
*/
define("PAGECALL",	"pagecall");

/* -----------------------------------------------------
prompt [off|<text
string>|time]

Enables the prompt output on the command interface and
displays the current prompt type, switches between a
variable text string prompt or the time prompt (time since
the transceiver was last reset), or disables the prompt.
*/
define("PROMPT_CMD",	"prompt");

/* -----------------------------------------------------
ptt [off|on] [data|voice|talk]

Displays the current PTT state of the transceiver and
places the transceiver into PTT for 30 seconds.
Sets the PTT to:
. Receive Mode with a data, voice or talk signal
. Transmit Mode with a data, voice or talk signal
*/
define("PTT_CMD",		"ptt");

/* -----------------------------------------------------
scan [<network>|off|on]

Displays the current scanning state of the transceiver, and
if scanning is on, displays the names of networks that are
currently being scanned.
Switches scanning off or on and switches to the network
specified and begins scanning on that network.
*/
define("SCAN",		"scan");

/* -----------------------------------------------------
secure [corp|global|off|on
[PIN]]

Displays the current voice encryptor state, switches on
Corporate/Global Mode or the default mode voice
encryptor with or without a specified PIN, or switches
secure mode off.
*/
define("SECURE_CMD",	"secure");

/* -----------------------------------------------------
secure index

Selects 1 of n different Corporate keys. Requires login by
administrator.
*/
define("SECURE_INDEX_CMD",	"secure index");

/* -----------------------------------------------------
secure key [#n] [<key-code>]

Sets the Corporate key for an index n. Requires login by
administator
*/
define("SECURE_KEY",	"secure key");

/* -----------------------------------------------------
secure mode [corp|global]

Sets the default mode voice encryptor (Corporate or
Global). Requires login by administrator.
*/
define("SECURE_MODE_CMD",	"secure mode");

/* -----------------------------------------------------
selbeacon
<destination>[@<network>] [s]
[from <self
address>[@<network>]]

Makes a Channel Test call to an addressed station using
any, or the specified, Codan Selcall or Open Selcall
network from the self address specified.
*/
define("SELBEACON",	"selbeacon");

/* -----------------------------------------------------
selcall
<destination>[@<network>]
[±lbt] [s] [from <self
address>[@<network>]]

Makes a Selective call to an addressed station using any,
or the specified, Codan Selcall or Open Selcall network
from the self address specified. If the network specified is
ALE/CALM, the call will be an ALE call, and the ALE
call options will be available.
*/
define("SELCALL_CMD",	"selcall");

/* -----------------------------------------------------
selfid [<self address>[, <self
address>]]

Displays the current list of self addresses used by CICS,
or creates new self addresses for CICS.
*/
define("SELFID",	"selfid");

/* -----------------------------------------------------
set [gp lock|pause]

Displays the current operational settings for CICS, or
locks or pauses a GP input
*/
define("SET",		"set");

/* -----------------------------------------------------
sideband [am|lsb|usb]
sb [am|lsb|usb]

Displays the sideband of the current channel, or changes
the sideband of the current channel to AM, LSB or USB,
only if permitted for that channel
*/
define("SIDEBAND",	"sideband");

/* -----------------------------------------------------
statusack
<destination>[@<network>]
"<message>"

Sends a response to a Get Status call with the status
information requested.
*/
define("STATUSUSACK",	"statususack");

/* -----------------------------------------------------
statuscall
<destination>[@<network>]
[±lbt] "<message>" [from <self
address>[@<network>]]

Makes a Get Status call to an addressed station using any,
or the specified, ALE/CALM, Codan Selcall, or Open
Selcall network from the self address specified.
*/
define("STATUSCALL",	"statuscall");

/* -----------------------------------------------------
statustime [<timeout value>]

Displays the amount of time (in seconds) the receiving
station has to respond to a Get Status call, and sets this
time.
*/
define("STATUSTIME_CMD",	"statustime");

/* -----------------------------------------------------
telcall
<destination>[@<network>]
[±lbt] <telephone number>
[from <self
address>[@<network>]]

Makes a Phone call to addressed stations using any, or the
specified, ALE/CALM, Codan Selcall, or Open Selcall
network from the self address specified.
*/
define("TELLCALL",	"tellcall");

/* -----------------------------------------------------
ver

Displays the version of CICS being used.
*/
define("VER",		"ver");



// CICS Response Messages

define("ALE_LINK",		"ALE-LINK:");	//<channel>,<caller address>,<self address>,<time>
define("ALE_LINK_FAILED",	"ALE-LINK: FAILED");
define("CALL",			"CALL"); //group
define("CALL_DETECTED",		"CALL DETECTED");
define("CALL_FAILED",		"CALL FAILED");
define("CALL_SENT",		"CALL SENT");
define("CALL_STARTED",		"CALL STARTED");
define("CHAN",			"CHAN:"); // <name>
define("CICS",			"CICS:");  // V<version number>
define("ECHO_OFF",		"ECHO: OFF");
define("ECHO_ON",		"ECHO: ON");
define("EMERGENCY",		"EMERGENCY:");
define("FREQ",			"FREQ:"); // xxxxx.x RX, INHIBIT TX || xxxxx.x RX, yyyyy.y TX || xxxxx.x RX/TX
define("GPS_POSITION",		"GPS-POSITION:");
define("LBT",			"LBT:");	// LBT group of responses
define("LBT_ABORTED",		"LBT: ABORTED");
define("LBT_ALL_CHANNELS_BUSY",	"LBT: ALL CHANNELS BUSY");
define("LBT_DISABLED",		"LBT: DISABLED");
define("LBT_ENABLED",		"LBT: ENABLED");
define("LBT_OCCUPIED",		"LBT: OCCUPIED");
define("LBT_VACANT",		"LBT: VACANT");
define("LOCK",			"LOCK");
define("LOCK_ABORT",		"LOCK: ABORT");
define("LOCK_BUSY",		"LOCK: BUSY");
define("LOCK_OFF",		"LOCK: OFF");
define("LOCK_ON",		"LOCK: ON");
define("MODE",			"MODE:");
define("NO_EXTERNAL_UNIT",	"NO EXTERNAL UNIT CONNECTED OR NO RESPONSE");
define("NO_RESPONSE",		"NO RESPONSE");
define("OK",			"OK");
define("OPTIONS",		"Options:"); 	//<cr>gp
define("PAGE_CALL",		"PAGE-CALL:");
define("PAGE_CALL_ACK",		"PAGE-CALL-ACK:");
define("PAUSE",			"PAUSE");
define("PROMPT",		"PROMPT:");
define("PTT",			"PTT:");
define("PTT_ON",		"PTT: ON"); 	//[, DATA|VOICE|TALK]
define("PTT_REJECTED",		"PTT: REJECTED");
define("SCAN_ALE",		"SCAN: ALE");	//, <network>,<network>
define("SCAN_OFF",		"SCAN: OFF");
define("SCAN_ON",		"SCAN: ON");	//, <network>, <network>
define("SECURE_INDEX",		"SECURE INDEX");
define("SECURE_MODE",		"SECURE MODE:");// CORP|GLOBAL
define("SECURE",		"SECURE:");	// CORP|GLOBAL [PIN]
define("SECURE_OFF",		"SECURE: OFF");
define("SELCALL",		"SEL-CALL:");	// <channel>, <calleraddress>, <self address>,<date> <time>
define("SELFID_LIST",		"SELFID-LIST:");// <self address>,<self address>, <self address>
define("SIDEBAND_AM",		"SIDEBAND: AM"); 
define("SIDEBAND_LSB",		"SIDEBAND: LSB");
define("SIDEBAND_USB",		"SIDEBAND: USB");
define("STATUS_ACK",		"STATUS-ACK:");	// <channel>, <calleraddress>, <self address>,<date> <time>, "<message>"
define("STATUS_CALL",		"STATUS-CALL:");	// <channel>,<caller address>, <selfaddress>, <date> <time>,"<message>"
define("STATUS_CALL_ACK",	"STATUS-CALL-ACK:"); //<channel>,<caller address>, <selfaddress>, <date> <time>,"<message>"
define("STATUSTIME",		"STATUSTIME:");
define("TELL_CALL",		"TEL-CALL:");	// <channel>, <callerddress>, <self address>,<date> <time>, <telephonenumber>|DISCONNECTED


// CICS Error Messages
define("ERROR",			"ERROR:");

/*

ERROR: Admin access
required
The command that you entered requires an administrator login. Type
login admin. Enter the admin password for the transceiver
connected.
ERROR: Bad command The syntax of the command entered is incorrect. Use the help
command to look for the categories of available commands and use
the help <category> command to get information on the
available commands within a category. For information on CICS
functionality use the help cics command.
ERROR: Call failed The outgoing call has not started. This message is preceded by a
message stating the reason for the failure. Check the destination
address and use the selbeacon command to send a Channel Test
call to the destination. You may need to select another frequency.
ERROR: Call reply error
XXX
There has been an internal problem making the call. Under normal
conditions this error should not occur. Switch the transceiver off then
on again.
ERROR: Call type not
allowed
This type of call cannot be made. Check if the option associated with
the call type is installed in the transceiver.
ERROR: Channel not
found
The channel you entered is not programmed in the transceiver. Either
program the channel into your transceiver, or select another channel
for the call.
ERROR: Citizen band
frequency but not
citizen band channel
You are not permitted to transmit on this CB frequency as it does not
correspond with a CB channel within the transceiver. Select another
frequency.
Error: Command failed The command you entered has failed. Check the syntax required for
the command.
ERROR: Data too long The message is too long. Shorten the message, or split the message
over a number of calls. The maximum number of characters permitted
in a call type is provided in Table 38 on page 259.
ERROR: FROM selfid
<self address> not
valid
The self address contains characters that are not permitted. Check that
the self address is correct for the type of network in which it is being
used (see page 88, Entering your station self address).
ERROR: Internal error
ERROR: Internal error
XXXX
ERROR: Internal get
ERROR: Internal set
Under normal conditions this error should not occur. It is an
indication that something went wrong with internal processing.
Contact

ERROR: Invalid address The destination address that you are using for the call contains
characters that are not permitted, or the statusack has an invalid
source address. Check all addresses for the call.
ERROR: Invalid call
options
The call options that you have entered for the call:
. do not match those allowed for the call system
. have been repeated
. are not recognised when inserted after a message
ERROR: Invalid call
type for network
The call type used for the call is not supported by the network. Select
a call type that is valid for the network, or select a different network.
ERROR: Invalid call
type or selfid for
scanning networks
You have started a call during scanning. CICS attempts to select the
first suitable network, however in this case, there are no suitable
networks.
Do one of the following before making the call again:
. switch off scanning
. specify the network for the call
. select a different call type
. select a different self address
ERROR: Invalid
characters in selfid
The self address contains characters that are not permitted. Check that
the self address is correct for the type of network in which it is being
used (see page 88, Entering your station self address).
ERROR: Invalid
destination address
The destination address used for the call type or network is incorrect,
for example, alpha characters in a Codan Selcall network. Correct the
destination address and try the call again.
ERROR: Invalid network
name
The name of the network used for the call does not exist or does not
support the call type (see page 144, Network Name).
ERROR: Invalid selfid
for specified address
The entry in the self address list is incorrect. Check that the self
address and assigned networks in the self address list are correct.
ERROR: Invalid selfid
for specified network
The self address contains characters that are not permitted by the
network specified, for example, alpha characters in a Codan Selcall
network. Correct the self address.
ERROR: Invalid selfid
network
The network in the self address list is incorrect. The self address list
has been updated with a network using the selfid command. The
network specified does not exist. Select a valid network for the self
address.
ERROR: Invalid source
address
The self address used for the call has not been accepted. Check that
the self address is correct for the network.s call system.
ERROR: LBT option not
installed
You have attempted to use LBT but it is not installed in your
transceiver.

ERROR: LBT wrong mode You have attempted to use LBT when the transceiver is unable to
perform LBT, for example, when the transceiver is scanning.
ERROR: Low battery
voltage
CICS has attempted a PTT and detected that the battery voltage is
low. Recharge the battery.
ERROR: Max index
allowed is n
You have attempted to set a Secure Index that is greater than n. Enter
a Secure Index that is less than or equal to n.
ERROR: Message too big The message length is too long. Shorten the message, or split the
message over a number of calls. The maximum number of characters
permitted in a call type is provided in Table 38 on page 259.
ERROR: Mode is not
allowed
The mode is not permitted for the selected channel. Select another
mode.
ERROR: Mode not found The mode requested is not available on this transceiver. Select
another mode.
ERROR: Network in
address not found
The network used in the call address is not programmed in the
Network List of the transceiver. Either program the network into your
transceiver, or select another network for the call.
ERROR: Network not
found
You have used the scan [on|off|<network>] command. The
network specified is not programmed in the Network List of the
transceiver. Repeat the scan command using on, off or a valid
network name.
ERROR: No active link You have used the hangup command, but no call is currently in
progress.
ERROR: No ale network You have used the alecall or aletelcall commands. The
transceiver has searched for an ALE/CALM network but one was not
found.
ERROR: No call system
for current channel
You have made a call on the currently selected channel and mode
(scan is off). No channel is specified in the call information. CICS
searches all networks for one that contains the currently selected
channel and mode, but has not found a network. Select another
channel and/or mode.
ERROR: No channels
found
You have made a call on the currently selected channel (scan is off),
but a channel cannot be selected because no channels are
programmed or you were in free tune (see page 221, Using the
transceiver in free tune and Amateur Mode). Exit free tune if
required. Program some channels into your transceiver, or if not
permitted to do so, contact your Codan representative.
ERROR: No GPS unit
connected
You have sent GPS information in a call, however, the transceiver has
detected that a GPS unit is not connected in the system. Check the
cable connections to the GPS unit and that the RS232 mode and speed
entries in the Control List are set correctly. The GPS option must also
be installed.

ERROR: No key at this
index
You have selected a Secure Index that does not have a Secure Key set.
Select another index, or program a key for this index.
ERROR: No link
available
There is no link available to the addressed station. This is caused by
updates occurring in the RF unit. Wait a few minutes for the link to be
established. If the link is still unavailable, try the call again.
ERROR: No modes
programmed
No modes are programmed in the transceiver. Contact your Codan
representative.
ERROR: No modes with
this sideband
No modes are programmed with this sideband. Contact your Codan
representative.
ERROR: No network for
selfid
The command entered included a self address for which there is no
suitable network, for example, the self address contained alpha
characters but there is no ALE/CALM network.
ERROR: No networks
found
You have set the transceiver to scan or are making a call while
scanning is on, but the transceiver cannot find any networks that are
set to be scanned. Change the Scan Network setting in the networks
that you want to scan (see page 149, Programming the Network List).
ERROR: No response from
RF unit
There has been a problem making the call or requesting PTT such that
there is no response from the RF unit. Check cable connections. Wait
for a minute or two for the RF unit to recover automatically.
ERROR: No selfid You have made a call on the currently selected channel (scan is off)
without specifying a network. The transceiver has located a network
containing the channel, but no self address is set for this network in
the self ID list. Select a different channel, select a self address to use
with the network, or specify a network that has a valid self address in
the call information.
ERROR: No selfid for
network
The specified network does not have a self address. Check the
command syntax and the self address list.
ERROR: No valid GPS
position
The GPS position is either too old or not valid yet. Check the cables
connected to the GPS unit.
ERROR: Not an ALE
network
The command entered requires an ALE/CALM network, but the
network specified with the command is not an ALE/CALM network.
ERROR: Not supported The request cannot be executed because the option is not installed in
your transceiver. If you want to use the option, contact your Codan
representative.
ERROR: PTT active The transceiver is currently transmitting and prevents the command
from being executed. For example, you will not be able to change
channels when the system is transmitting. Wait until the transceiver
has completed the transmission, then send the new command.
ERROR: PTT rejected PTT did not succeed. For more information see page 306, PTT
rejected from <location of PTT: reason>.

ERROR: Request failed The information requested cannot be retrieved from the RF unit.
Check the cable connections.
ERROR: Scan list empty The scan on command failed because no networks are set for
scanning, these networks do not contain any channels, or the Scan
Allow entry is disabled. The scan <network> command failed
because these networks do not contain any channels, or the Scan
Allow entry is disabled. Change the Scan Network entry to Scan (see
page 144, Scan Network), add channels to the network if necessary, or
enable the Scan Allow entry.
ERROR: Scanning is on The system is currently scanning and cannot complete the command.
Use the scan off command to switch off scanning, then try the
new command again.
ERROR: Secure is On The command you entered is not allowed while the Voice Encryptor
option is active. Use the secure off command to exit secure
mode, then try the new command again.
ERROR: Selfid list
empty
Your transceiver does not have any self addresses programmed.
ERROR: Selfid too long The self address or the total length of the self address and network
name exceeds a specified limit for the call system used in the
network. Shorten the length of the self address and/or the network
name.
ERROR: Sideband not
allowed
The sideband is not permitted for this channel. Select another mode.
ERROR: Synthesiser is
unlocked
You cannot transmit while the synthesiser is unlocked. Switch the
transceiver off then on again. If the error persists, contact your Codan
representative.
ERROR: System is busy There has been a problem making the call or updating the self address
list. Wait for a few minutes, then repeat the command.
ERROR: System locked The system is locked and the command cannot be executed. Wait for
the lock to be released (for example, a data call ending), or to timeout,
then try the command again.
ERROR: Transceiver cut
out
The PTT has timed out according to the value set in the Cfg PTT
Cutout Time entry in the Control List. If your transmission is long, set
the Cfg PTT Cutout Time entry to 30 minutes.
ERROR: Transceiver is
tuning
The PTT command has been rejected because the transceiver is
currently tuning. Wait until the transceiver completes the tuning
cycle, then try the ptt command again.
ERROR: Transmit
inhibited
You have tried to transmit on a receive-only channel. Select a channel
that has a transmit frequency

ERROR: Tx disabled
because of TPE link
You are not permitted to transmit a signal with the TPE link in its
current position and the programming options installed in your
transceiver. Contact your Codan representative.
ERROR: Unable to send
data
There has been a problem sending data with the call. This message is
preceded by a message stating the reason for the data not being sent.
Refer to the description for the previous message to resolve the
problem.
ERROR: Unknown network
name in selfid
The network for the self address does not exist as the network may
have been deleted after it was allocated to the self address. Program
the network into the Network List in your transceiver, or edit the self
address so that it uses a current network.
ERROR: XR or VP not
installed
You have attempted to use a voice encryption option that is not
installed in your transceiver. If you want to use this option, contact
your Codan representative.
*/

?>

