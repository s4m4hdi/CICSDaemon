<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);


/**
  * Change the identity to a non-priv user
  */
function change_identity( $uid, $gid )
{
    if( !posix_setgid( $gid ) )
    {
        print "Unable to setgid to " . $gid . "!\n";
        exit;
    }

    if( !posix_setuid( $uid ) )
    {
        print "Unable to setuid to " . $uid . "!\n";
        exit;
    }
} 

/**
  * Creates a server socket and listens for incoming client connections
  * @param string $address The address to listen on
  * @param int $port The port to listen on
  */
function server_loop($address, $port)
{
    printf("Launching socket listener v1.0 %d\r\n",posix_getpid());
    global $__server_listening;

    if(($sock = socket_create(AF_INET, SOCK_STREAM, 0)) < 0)
    {
        echo "failed to create socket: ".socket_strerror($sock)."\n";
        exit();
    }

    if(($ret = socket_bind($sock, $address, $port)) < 0)
    {
        echo "failed to bind socket: ".socket_strerror($ret)."\n";
        exit();
    }

    if( ( $ret = socket_listen( $sock, 0 ) ) < 0 )
    {
        echo "failed to listen to socket: ".socket_strerror($ret)."\n";
        exit();
    }

    socket_set_nonblock($sock);
   
    printf(" - waiting for clients to connect\n\r");

    while ($__server_listening)
    {
        $connection = @socket_accept($sock);
        if ($connection === false)
        {
            usleep(100);
        }elseif ($connection > 0)
        {
            handle_client($sock, $connection);
        }else
        {
            echo "error: ".socket_strerror($connection);
            die;
        }
    }
} 

/**
  * Handle a new client connection
  */
function handle_client($ssock, $csock)
{
    global $__server_listening;

    $pid = pcntl_fork();

    if ($pid == -1)
    {
        /* fork failed */
        echo "fork failure!\n";
        die;
    }elseif ($pid == 0)
    {
        /* child process */
        $__server_listening = false;
        socket_close($ssock);
        interact($csock);
        socket_close($csock);
	die;
    }else
    {
        socket_close($csock);
    }
} 

function interact($socket)
{
    /* TALK TO YOUR CLIENT */

	//while(true) {
	//read - update me later to buffer in missed data
	$bytes = socket_recv($socket , $in_buffer, 1024, 0);
        //S_DebugPrint("Read $bytes bytes, input: (" . $in_buffer . ") . (" . $socket . ")");
	sleep(3);
        $out_buffer = "The truth is out there!!\r\n";
        $out_status = socket_send($socket,$out_buffer, strlen($out_buffer), MSG_EOF);

	//}
	
}

/**
  * Become a daemon by forking and closing the parent
  */
function become_daemon()
{
    $pid = pcntl_fork();

    if ($pid == -1)
    {
        /* fork failed */
        echo "fork failure!\n";
        exit();
    }elseif ($pid)
    {
        /* close the parent */
        exit();
    }else
    {
        /* child becomes our daemon */
        posix_setsid();
        chdir('/');
        umask(0);
        return posix_getpid();
    }
}

function forkSocketHandler ()
{
//Listens for requests and forks on each connection
//$__server_listening = true;

// create socket stream pair
$ssock = getStreamSocketPair();

// fork the child and spawn message handler
    $gpid2 = pcntl_fork();

    if ($gpid2 == -1)
    {
        /* fork failed */
        echo "fork failure!\n";
	fclose($ssock[0]);
	fclose($ssock[1]);
        exit();
    }elseif ($gpid2)
    {
        /* close the parent */
        // parent will remain in this case - setup parent child stream
	fclose($ssock[0]);
	return $ssock[1];
    }else
    {
        /* grand child becomes new daemon process*/
        posix_setsid();
        chdir('/');
        umask(0);
        //return posix_getpid();
	fclose($ssock[1]);
	fwrite($ssock[0],"server_loop ok\r\n");
	setupSignalHandler();
	server_loop("192.168.11.80","9650");
	exit();
    }
}
 
?>
