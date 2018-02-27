<?php

/*****************************************************************************************
 *      Function Prototypes:
 *
 *      function signalHandler($signo)
 *      function setupSignalHandler()
 *
 *****************************************************************************************/

/*
[root@skippynode-1 socket]# kill -l
 1) SIGHUP       2) SIGINT       3) SIGQUIT      4) SIGILL       5) SIGTRAP
 6) SIGABRT      7) SIGBUS       8) SIGFPE       9) SIGKILL     10) SIGUSR1
11) SIGSEGV     12) SIGUSR2     13) SIGPIPE     14) SIGALRM     15) SIGTERM
16) SIGSTKFLT   17) SIGCHLD     18) SIGCONT     19) SIGSTOP     20) SIGTSTP
21) SIGTTIN     22) SIGTTOU     23) SIGURG      24) SIGXCPU     25) SIGXFSZ
26) SIGVTALRM   27) SIGPROF     28) SIGWINCH    29) SIGIO       30) SIGPWR
31) SIGSYS      34) SIGRTMIN    35) SIGRTMIN+1  36) SIGRTMIN+2  37) SIGRTMIN+3
38) SIGRTMIN+4  39) SIGRTMIN+5  40) SIGRTMIN+6  41) SIGRTMIN+7  42) SIGRTMIN+8
43) SIGRTMIN+9  44) SIGRTMIN+10 45) SIGRTMIN+11 46) SIGRTMIN+12 47) SIGRTMIN+13
48) SIGRTMIN+14 49) SIGRTMIN+15 50) SIGRTMAX-14 51) SIGRTMAX-13 52) SIGRTMAX-12
53) SIGRTMAX-11 54) SIGRTMAX-10 55) SIGRTMAX-9  56) SIGRTMAX-8  57) SIGRTMAX-7
58) SIGRTMAX-6  59) SIGRTMAX-5  60) SIGRTMAX-4  61) SIGRTMAX-3  62) SIGRTMAX-2
63) SIGRTMAX-1  64) SIGRTMAX


https://stuporglue.org/writing-a-daemon-with-php/

The simplest way is to tell our daemon to ignore SIGCHLD signals like so:

pcntl_signal(SIGCHLD, SIG_IGN);

If we are ignoring SIGCHLD, the child processes will be reaped automatically upon completion.


*/




/****************************************************************
 * function name: signalHandler($sig)
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/
function signalHandler($signo) {
     switch ($signo) {
         case SIGTERM:
             // handle shutdown tasks
             S_DebugPrint("Caught SIGTERM");

	     // close serial port

	     // tell child threads to abort
             exit;
             break;
         case SIGHUP:
             // handle restart tasks
             S_DebugPrint("caught SIGHUP");
             break;
         case SIGUSR1:
             S_DebugPrint("Caught SIGUSR1...\n");
             break;
         case SIGINT:
             S_DebugPrint("Caught SIGINT...\n");
             cleanUp("EXIT");
	 case SIGCHLD:
		S_DebugPrint("Caught SIGCHLD...\n");
		break;
		// get child pid then wait
         default:
             S_DebugPrint("Caught unknown SIGNAL $signo\n");
             // handle all other signals
     }
}

/****************************************************************
 * function name: setupSignalHandler()
 *
 * description:
 *
 * precondition:
 *
 * postcondition:
 *
 * notes:
 ****************************************************************/
function setupSignalHandler() {

        // setup signal handlers
        pcntl_signal(SIGTERM, "signalHandler");
        pcntl_signal(SIGHUP,  "signalHandler");
        pcntl_signal(SIGUSR1, "signalHandler");
        pcntl_signal(SIGINT,  "signalHandler");
        pcntl_signal(SIGCHLD,  SIG_IGN);
}

?>
