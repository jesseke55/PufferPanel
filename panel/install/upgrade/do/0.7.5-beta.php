<?php
/*
PufferPanel - A Minecraft Server Management Panel
Copyright (c) 2013 Dane Everitt

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/.
*/

// upgrader for version 0.7.5 Beta to 0.7.6 Beta
require '../../../../src/core/configuration.php';

$mysql = new PDO('mysql:host='.$_INFO['sql_h'].';dbname='.$_INFO['sql_db'], $_INFO['sql_u'], $_INFO['sql_p'], array(
	PDO::ATTR_PERSISTENT => true,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
));
$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*
* CREATE TABLE `downloads`
*/
$mysql->exec("DROP TABLE IF EXISTS `downloads`");
$mysql->exec("CREATE TABLE `downloads` (
	`id` int(1) unsigned NOT NULL AUTO_INCREMENT,
	`server` int(1) NOT NULL,
	`token` char(32) NOT NULL DEFAULT '',
	`path` varchar(5000) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1;");

// @TODO: Update server gsd key permissions
// @TODO: Update sub-user permissions

header('Location: ../finished.php');