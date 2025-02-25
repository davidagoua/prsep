<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'fr'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'fr'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'fr_FR'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],
    'departements'=>[
"KOUIBLY",
"BIANKOUMA",
"DANANE",
"BANGOLO",
"SIPILOU",
"ZOUAN HOUNIEN",
"FACOBLY",
"MAN",
"KOUN-FAO",
"BONDOUKOU",
"SANDEGUE",
"TANDA",
"NASSIAN",
"TEHINI",
"DOROPO",
"BOUNA",
"VAVOUA",
"DALOA",
"ZOUKOUGBEU",
"DUEKOUE",
"TOULEPLEU",
"BLOLEQUIN",
"GUIGLO",
"TAI",
"ABENGOUROU",
"AGNIBILEKROU",
"BETTIE",
"M'BAHIAKRO",
"DAOUKRO",
"M'BATTO",
"DIMBOKRO",
"BOCANDA",
"PRIKRO",
"OUME",
"FRESCO",
"GRAND-LAHOU",
"SAKASSOU",
"NIAKARAMADOUGOU",
"KATIOLA",
"BOUAKE",
"BOTRO",
"DABAKALA",
"BEOUMI",
"KANI",
"SEGUELA",
"MANKONO",
"DIANRA",
"DIDIEVI",
"TOUMODI",
"TIEBISSOU",
"AGBOVILLE",
"AKOUPE",
"ADZOPE",
"YAKASSE-ATTOBROU",
"TENGRELA",
"GAGNOA",
"TRANSUA",
"GBELEBAN",
"ODIENNE",
"KANIASSO",
"SAMATIGUILA",
"MINIGNAN",
"MADINANI",
"SEGUELON",
"GRAND BASSAM",
"ISSIA",
"KOUNAHIRI",
"KOUASSI-KOUASSIKRO",
"BONGOUANOU",
"ARRAH",
"ADIAKE",
"ABOISSO",
"TIAPOUM",
"KORO",
"TOUBA",
"OUANINOU",
"LAKOTA",
"DIVO",
"GUITRY",
"SOUBRE",
"SASSANDRA",
"TABOU",
"SAN-PEDRO",
"BUYO",
"MEAGUI",
"GUEYO",
"TAABO",
"ABIDJAN",
"ALEPE",
"TIASSALE",
"JACQUEVILLE",
"SIKENSI",
"DABOU",
"OUANGOLODOUGOU",
"FERKESSEDOUGOU",
"KOUTO",
"BOUNDIALI",
"M'BENGUE",
"DIKODOUGOU",
"KONG",
"KORHOGO",
"SINEMATIALI",
"SINFRA",
"BOUAFLE",
"ZUENOULA",
"DJEKANOU",
"YAMOUSSOUKRO",
"ATTIEGOUAKRO",

    ],

    'regions'=>[
"TONKPI",
"GONTOUGO",
"HAUT-SASSANDRA",
"GUEMON",
"N'ZI",
"CAVALLY",
"INDENIE-DJUABLIN",
"IFFOU",
"MORONOU",
"GOH",
"KABADOUGOU",
"FOLON",
"SUD-COMOE",
"GRANDS-PONTS",
"BAFING",
"LOH-DJIBOUA",
"GBOKLE",
"SAN-PEDRO",
"NAWA",
"TCHOLOGO",
"BAGOUE",
"PORO",
"MARAHOUE",
"HAMBOL",
"GBEKE",
"WORODOUGOU",
"BERE",
"BELIER",
"AGNEBY-TIASSA",
"ME",
"BOUNKANI",
"DIST. D'ABIDJAN",
"DIST. DE YAMOUSSOUKRO",

    ]
];
