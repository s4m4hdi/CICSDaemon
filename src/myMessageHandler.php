<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);

function messageHandler($ssock)
{

	$myresource=get_resource_type($ssock);

	if ($myresource)
		printf("Resource OK\r\n");
	else
		printf("BAD Resource\r\n");		
	
	openDatabase();

        printf("Launching message handler v1.0 %d\r\n",posix_getpid());
        while(true)
	{

			$sender = fgets($ssock);
			$recipient = fgets($ssock);
			$message = fgets($ssock);
			$msgType = fgets($ssock);
			$line = $sender . " " . $recipient . " ". $message . " " . $msgType;	

		printf(" Got data from parser \r\n");

		 writeLogFile($line,"/data/log/CICSDaemon/testlog.txt");

		// testing log all to database
		writeDatabase($message);
		
		switch ($msgType)
		{
			// send sms
			case SMS:
			break;
			// send email
			case EMAIL:
			break;
			// send radio
			case RADIO:
			break;
			// unknown
			default;	
		}

	}
}


function forkMessageHandler($semid,$shmid) {
global $pids;

// create stream socket pair
$ssock = getStreamSocketPair();
stream_set_timeout($ssock[0], 0);
stream_set_timeout($ssock[1], 0);
stream_set_blocking($ssock[0],true);
stream_set_blocking($ssock[1],true);



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
        messageHandler($ssock[0]);
	exit();
    }
}

function openDatabase()
{
}

function closeDatabase()
{
}

function readDatabase()
{
}

function writeDatabase()
{
}

function updateDatabase()
{
}

?>
