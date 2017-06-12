<?php
namespace Config;

// Do not touch this!
require 'Medoo.php';
use Medoo\Medoo;
use PDO;

//======================================================================
// MSF - CONFIG FILE
// https://github.com/Nuro/MSF
//======================================================================

//-----------------------------------------------------
// MAP SETTINGS
//-----------------------------------------------------

/* Location Settings */

$startingLat = 35.6546138;                                      // Starting latitude
$startingLng = 139.6949617;                                      // Starting longitude

/* Map Title + Language */

$title = "Japan | Monocle";                                      // Title to display in title bar
$locale = "en";                                                 // Display language

/* Google Maps Key */
$gmapsKey = getenv("POGOMAP_GMAPS_KEY");          // Google Maps API Key


//-----------------------------------------------------
// DATA MANAGEMENT
//-----------------------------------------------------

// Clear pokemon from database this many hours after they disappear (0 to disable)
// This is recommended unless you wish to store a lot of backdata for statistics etc!

$purgeData = 1;


//-----------------------------------------------------
// DATABASE CONFIG
//-----------------------------------------------------

$db = new Medoo([// required
            'database_type' => 'mysql',                                 // mysql/mariadb/pgsql/sybase/oracle/mssql/sqlite
            'database_name' => 'pokeminer',
            'server' => '127.0.0.1',
            'username' => 'database_user',
            'password' => 'database_password',

            // [optional]
            'charset' => 'utf8',
            //'port' => 5432,                                             // Comment out if not needed, just add // in front!

            'option' => [
              PDO::ATTR_TIMEOUT => 15 
            ],
        ]);

date_default_timezone_set('Asia/Tokyo');

