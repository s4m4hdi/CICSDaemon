<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);

function messageHandler ()
{
        printf("Launching message handler v1.0 %d\r\n",posix_getpid());
        while(true) sleep(10);
}


function forkMessageHandler($semid,$shmid) {
global $pids;

// create stream socket pair
$ssock = getStreamSocketPair();

// fork the child and spawn message handler
    $gpid1 = pcntl_fork();

    if ($gpid1 == -1)
    {
        /* fork failed */
        echo "fork failure!\n";
        fclose($ssock[0]);
        fclose($ssock[1]);
        exit();
    }elseif ($gpid1)
    {
        $pids[0] = $gpid1;
        // parent will remain in this case - setup parent child stream
	fclose($ssock[0]);
	return $ssock[1];
    }else
    {
        /* grand child becomes new daemon process*/
        posix_setsid();
        chdir('/');
        umask(0);
	fclose($ssock[1]);
	fwrite($ssock[0],"messageHandler ok\r\n");
	writeSharedMem($semid,$shmid,"shared mem child 1 ok",1);
        messageHandler();
	exit();
    }
}
?>
