<?php
/*
 * Raspberry Remote
 * http://xkonni.github.com/raspberry-remote/
 *
 * configuration for the webinterface
 *
 */

/*
 * define ip address and port here
 */
$source = $_SERVER['SERVER_ADDR'];
$target = shell_exec("hostname -I");
$port = 11337;

/*
 * specify configuration of sockets to use
 *   array("group", "plug", "description");
 * use empty string to create empty box
 *   ""
 *
 */
$config=array(
  array("00010", "01", "Gerät 1"),
  array("00010", "02", "Gerät 2"),
  array("00010", "03", "Gerät 3"),
)
?>
