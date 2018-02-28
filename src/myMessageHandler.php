<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);

function messageHandler ()
{
        printf("Launching message handler v1.0 %d\r\n",posix_getpid());
        while(true) sleep(10);
}
function forkMessageHandler() {
// fork the child and spawn message handler
    $gpid1 = pcntl_fork();

    if ($gpid1 == -1)
    {
        /* fork failed */
        echo "fork failure!\n";
        exit();
    }elseif ($gpid1)
    {
        // parent will remain in this case - setup parent child stream
    }else
    {
        /* grand child becomes new daemon process*/
        posix_setsid();
        chdir('/');
        umask(0);
        //return posix_getpid();
	setupSignalHandler();
        messageHandler();
	exit();
    }
}
?>
