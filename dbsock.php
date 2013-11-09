<?php
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($socket, 0, 80);
socket_listen($socket);
socket_accept($socket);
?>