<?php
$dbconn = pg_connect("host=forumtrivwcom.postgresql.db dbname=forumtrivwcom user=forumtrivwcom password=trium2015")
	or die('Connexion impossible : ' . pg_last_error());
