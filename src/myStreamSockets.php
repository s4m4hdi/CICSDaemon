<?php


function getStreamSocketPair() {
	$sockets = stream_socket_pair(STREAM_PF_UNIX, STREAM_SOCK_STREAM, STREAM_IPPROTO_IP);
	return $sockets;
}

?>

