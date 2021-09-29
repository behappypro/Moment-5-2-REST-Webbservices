<?php
    $site_title = "Min webbplats";
    $divider = " | ";
    // Aktivera felrapportering
    error_reporting(-1);
    ini_set("display_errors", 1);

    session_start();

    // Aktivera autoload för att snabba upp registering av klasserna
    spl_autoload_register(function ($class_name) {
        include "classes/". $class_name . ".class.php";
    });

    /*
    define ("DBHOST", "localhost");
    define ("DBUSER", "admin");
    define ("DBPASS", "password");
    define ("DBDATABASE", "guestbook");
   */

    define ("DBHOST", "studentmysql.miun.se");
    define ("DBUSER", "asha1900");
    define ("DBPASS", "bsan1x7m");
    define ("DBDATABASE", "asha1900");