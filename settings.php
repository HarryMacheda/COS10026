<?php
class Settings {
    private static $_server = "feenix-mariadb.swin.edu.au";
    private static $_username = "s103603101";
    private static $_password = "Password123";
    private static $_database = "s103603101_db";

    public static function SQLConnection(){
        return new mysqli(Settings::$_server, Settings::$_username, Settings::$_password, Settings::$_database);
    } 
}
?>