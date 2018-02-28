<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);

function getStreamSocketPair() {
	$sockets = stream_socket_pair(STREAM_PF_UNIX, STREAM_SOCK_STREAM, STREAM_IPPROTO_IP);
	return $sockets;
}

?>

