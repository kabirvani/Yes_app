<?php
if(env('APP_ENV')!='production'){
	/****DEV FIELDS****/
    /***ACCOUNT START ***/
    define('ACCOUNT_NAME','accountname');
    define('ACCOUNT_PHONE','phone');
	define('ACCOUNT_EMAIL','email1');
    define('ACCOUNT_BILL_STREET','bill_street');
    define('ACCOUNT_WEBSITE','website');
    define('ACCOUNT_EMPLOYEE','employees');
    define('ACCOUNT_BUSSINESS_ID','cf_1326');
    define('ACCOUNT_BUSSINESS_TYPE','cf_896');
    define('ACCOUNT_BUSSINESS_INDUSTRY','cf_898');
    define('ACCOUNT_BUSSINESS_REGISTRATION_NO','cf_878');
    define('ACCOUNT_BUSSINESS_BEELEVEL','cf_930');
    define('ACCOUNT_BUSSINESS_UIF_NUMBER','cf_880');
	define('ACCOUNT_BUSSINESS_PAYE_NUMBER','cf_1418');
	define('ACCOUNT_BUSSINESS_VAT_NUMBER','cf_1164');
    define('ACCOUNT_BUSSINESS_FINANCIAL_YEAR_START','cf_900');
    define('ACCOUNT_BUSSINESS_TURNOVER_2015','cf_902');
    define('ACCOUNT_BUSSINESS_TURNOVER_2016','cf_904');
    define('ACCOUNT_BUSSINESS_TURNOVER_2017','cf_906');
    define('ACCOUNT_BUSSINESS_NET_2015','cf_908');
    define('ACCOUNT_BUSSINESS_NET_2016','cf_910');
    define('ACCOUNT_BUSSINESS_NET_2017','cf_912');
    define('ACCOUNT_BUSSINESS_TURNOVER','annual_revenue');
    define('ACCOUNT_BUSSINESS_NPAT','cf_876');
	define('ACCOUNT_DEMAND_SHAPING_PACKAGE','cf_accountshapingpackage');
	define('ACCOUNT_DEMAND_SHAPING_STARTDATE','cf_demand_shape_start_date');
	define('COMMITMENT_GOAL','cf_commitment_goal');

    define('ACCOUNT_BUSSINESS_COMMITTED_TURNOVER','cf_1328');
    define('ACCOUNT_BUSSINESS_COMMITTED_NO_OF_JOBS','cf_1330');
    define('ACCOUNT_BUSSINESS_COMMITTED_HUB_SPONSOR','cf_1332');
    define('ACCOUNT_BUSSINESS_STATUS','cf_1334');
	define('ACCOUNT_ORGANISATION_CATEGORY','cf_914');
	define('ACCOUNT_JOURNEY_STARTED','cf_1336');
    define('BBBEE_ALIGN','cf_1352');
	define('UNCONTACTABLE_COMPANY','cf_uncontactable_company');
	
    /***ACCOUNT END***/
    
    /***CONTACTS START***/
    define('CONTACT_BUSSINESS_ID','cf_1338');
	define('CONTACT_SALUTATION','salutationtype');
	define('CONTACT_FIRST_NAME','firstname');
    define('CONTACT_LAST_NAME','lastname');
    define('CONTACT_EMAIL','email');
    define('CONTACT_ASSIGNED_USER_ID','assigned_user_id');
    define('CONTACT_COMPANY_CONTACT','cf_870');
	define('CONTACT_ORGANISATION_NAME','account_id');
    define('CONTACT_PHONE','phone');
	define('PROVINCE', 'cf_882');
    define('CITY', 'mailingcity');
	define('STREET', 'mailingstreet');	
    define('POSTCODE', 'mailingzip');
    define('CELLPHONE', 'mobile');
	define('HOMEPHONE', 'homephone');
    define('SECONDARYPHONE', 'otherphone');
	define('DOB', 'birthday');
	define('SECONDARYEMAIL', 'secondaryemail');
	define('RSAID', 'cf_868');
	define('GENDER', 'cf_872');
	define('RACE', 'cf_894');
	define('DRIVERSLICENSE', 'cf_892');
	define('MERITALSTATUS', 'cf_1156');
	define('TRANSPORT', 'cf_1158');
	define('SPOKENLANGUAGES', 'cf_1160');
    /***CONTACTS END***/
     
    /***LEAD START***/
    define('LEAD_BUSSINESS_ID','cf_1340');
    define('LEAD_FIRST_NAME','firstname');
    define('LEAD_LAST_NAME','lastname');
    define('LEAD_EMAIL','email');
    define('LEAD_LEADSOURCE','leadsource');
    define('LEAD_PHONE','phone');
    /***LEAD END***/
      
    /***SALES ORDER START***/
    define('SALES_SUBJECT','subject');
    define('SALES_SOSTATUS','sostatus');
    define('SALES_ACCOUNT_ID','account_id');
    define('SALES_ASSIGNED_USER_ID','assigned_user_id');
    define('SALES_PRODUCT_ID','productid');
    define('SALES_INVOICE_STATUS','invoicestatus');
    define('SALES_BILL_STREET','bill_street');
    define('SALES_SHIP_STREET','ship_street');
    define('SALES_HDNTAXTYPE','hdnTaxType');
	define('SALES_DUEDATE','duedate');
	define('SALES_CURRENCY_ID','currency_id');
	define('SALES_VTIGHER_PURCHASEORDER','vtiger_purchaseorder');
    /***SALES ORDER END***/
	
	/*** YOUTH PLACEMENT START */
	define('POSITION','position');
	define('ORGANISATION_ID','cf_1390');
	define('DEMAND_SHAPING_REQUEST','cf_1389');
	define('PLACEMENT','cf_yp_placement');
	define('YOUTHID','cf_1392');
	define('CF_START_DATE','cf_start_date');
	define('CF_INDUCTION_DATE','cf_induction_date');	
	define('CF_YP_STATUS','cf_yp_status');
	define('WORK_EXPERIENCE_ADDRESS','cf_work_experience_address');
	define('CONTRACT_SIGNED','cf_contract_signed');
	define('EMPLOYEE_NUMBER','cf_employee_number');
	define('UIF_NUMBER','cf_uif_number');
	define('MONTHLY_SALARY','cf_montly_salary');
	define('SUPERVISOR','supervisor');
	define('HOST_ACCOUNT','host_account');
	/*** YOUTH PLACEMENT END */
	
	/*** DEMAND SHAPING START***/
	define('DEMAND_SHAPING_PROJECT','project');
	define('DEMAND_SHAPING_COMPANY','cf_1380');
	define('DEMAND_SHAPING_REQUESTED_BY','cf_1381');
	define('DEMAND_SHAPING_TYPE','cf_dstype');
	define('DEMAND_SHAPING_LOCATION','cf_location');
	define('DEMAND_SHAPING_INDUSTRY','cf_industry');
	define('DEMAND_SHAPING_JOB_POSTING','cf_job_posting');
	define('DEMAND_SHAPING_YOUTH_COUNT','cf_youth_count');
	define('DEMAND_SHAPING_PLACED_COUNT','cf_placed_count');
	define('DEMAND_SHAPING_STATUS','cf_ds_status');
	define('DEMAND_SHAPING_ROLE_DESCRIPTION','cf_1473');
	define('DEMAND_SHAPING_START_DATE','cf_start_date');
	define('DEMAND_SHAPING_DRIVERS_LICENSE','cf_drivers_license');
	define('DEMAND_SHAPING_OWN_TRANSPORT','cf_own_transport');
	define('DEMAND_SHAPING_YOUTH_QUALIFICATION','cf_youth_qualification');
	define('DEMAND_MONTHLY_SALARY','cf_montly_salary');
	define('DEMAND_GENDER','cf_gender');
	define('DEMAND_DISABLED','cf_disabled');
	define('DEMAND_SPOKEN_LANGUAGE','cf_spoken_language');
	define('DEMAND_SUPERVISOR','cf_supervisor');
	
	/*** DEMAND SHAPING END***/
	
	
	/** INVOICE ORDER START **/
	define('INVOICE_SUBJECT','subject');
	define('INVOICE_SALES_ORDER_ID','salesorder_id');
	define('INVOICE_STATUS','invoicestatus');
	define('INVOICE_ACCOUNT_ID','account_id');
	define('INVOICE_ASSIGNED_USER_ID','assigned_user_id');
    define('INVOICE_PRODUCT_ID','productid');    
    define('INVOICE_BILL_STREET','bill_street');
    define('INVOICE_SHIP_STREET','ship_street');
    define('INVOICE_HDNTAXTYPE','hdnTaxType');
	define('INVOICE_DUEDATE','duedate');
	define('INVOICE_CURRENCY_ID','currency_id');
	define('INVOICE_VTIGHER_PURCHASEORDER','vtiger_purchaseorder');	
	define('INVOICE_DATE','invoicedate');	
	/** INVOICE ORDER END **/
	
    /****DEV FIELDS END****/
}else{
    /****LIVE FIELDS****/
    /***ACCOUNT START***/
    define('ACCOUNT_NAME','accountname');
    define('ACCOUNT_PHONE','phone');
	define('ACCOUNT_EMAIL','email1');
    define('ACCOUNT_BILL_STREET','bill_street');
    define('ACCOUNT_WEBSITE','website');
    define('ACCOUNT_EMPLOYEE','employees');
    define('ACCOUNT_BUSSINESS_ID','cf_1326'); //changed
    define('ACCOUNT_BUSSINESS_TYPE','cf_896');
    define('ACCOUNT_BUSSINESS_INDUSTRY','cf_898');
    define('ACCOUNT_BUSSINESS_REGISTRATION_NO','cf_878');
    define('ACCOUNT_BUSSINESS_BEELEVEL','cf_930');
    define('ACCOUNT_BUSSINESS_UIF_NUMBER','cf_880');
	define('ACCOUNT_BUSSINESS_PAYE_NUMBER','cf_1418');
	define('ACCOUNT_BUSSINESS_VAT_NUMBER','cf_1164');
    define('ACCOUNT_BUSSINESS_FINANCIAL_YEAR_START','cf_900');
    define('ACCOUNT_BUSSINESS_TURNOVER_2015','cf_902');
    define('ACCOUNT_BUSSINESS_TURNOVER_2016','cf_904');
    define('ACCOUNT_BUSSINESS_TURNOVER_2017','cf_906');
    define('ACCOUNT_BUSSINESS_NET_2015','cf_908');
    define('ACCOUNT_BUSSINESS_NET_2016','cf_910');
    define('ACCOUNT_BUSSINESS_NET_2017','cf_912');
    define('ACCOUNT_BUSSINESS_TURNOVER','annual_revenue');
    define('ACCOUNT_BUSSINESS_NPAT','cf_876');
    define('ACCOUNT_BUSSINESS_COMMITTED_TURNOVER','cf_1328'); //changed
    define('ACCOUNT_BUSSINESS_COMMITTED_NO_OF_JOBS','cf_1330'); //changed
    define('ACCOUNT_BUSSINESS_COMMITTED_HUB_SPONSOR','cf_1332'); //changed
    define('ACCOUNT_BUSSINESS_STATUS','cf_1334'); //changed
    define('ACCOUNT_ORGANISATION_CATEGORY','cf_914');
    define('ACCOUNT_JOURNEY_STARTED','cf_1336'); //changed
    define('BBBEE_ALIGN','cf_1352');
	define('ACCOUNT_DEMAND_SHAPING_PACKAGE','cf_accountshapingpackage');
	define('ACCOUNT_DEMAND_SHAPING_STARTDATE','cf_demand_shape_start_date');
	define('COMMITMENT_GOAL','cf_commitment_goal');
	define('UNCONTACTABLE_COMPANY','cf_uncontactable_company');
    /***ACCOUNT END***/
    
    /***CONTACTS START***/
	define('CONTACT_BUSSINESS_ID','cf_1338');
	define('CONTACT_SALUTATION','salutationtype');
	define('CONTACT_FIRST_NAME','firstname');
    define('CONTACT_LAST_NAME','lastname');
    define('CONTACT_EMAIL','email');
    define('CONTACT_ASSIGNED_USER_ID','assigned_user_id');
    define('CONTACT_COMPANY_CONTACT','cf_870');
	define('CONTACT_ORGANISATION_NAME','account_id');
    define('CONTACT_PHONE','phone');
	define('PROVINCE', 'cf_882');
    define('CITY', 'mailingcity');
	define('STREET', 'mailingstreet');	
    define('POSTCODE', 'mailingzip');
    define('CELLPHONE', 'mobile');
	define('HOMEPHONE', 'homephone');
    define('SECONDARYPHONE', 'otherphone');
	define('DOB', 'birthday');
	define('SECONDARYEMAIL', 'secondaryemail');
	define('RSAID', 'cf_868');
	define('GENDER', 'cf_872');
	define('RACE', 'cf_894');
	define('DRIVERSLICENSE', 'cf_892');
	define('MERITALSTATUS', 'cf_1156');
	define('TRANSPORT', 'cf_1158');
	define('SPOKENLANGUAGES', 'cf_1160');
    /***CONTACTS END***/
     
    /***LEAD START***/
    define('LEAD_BUSSINESS_ID','cf_1340'); //changed
    define('LEAD_FIRST_NAME','firstname');
    define('LEAD_LAST_NAME','lastname');
    define('LEAD_EMAIL','email');
    define('LEAD_LEADSOURCE','leadsource');
	define('LEAD_PHONE','phone');
    /***LEAD END***/
      
    /***SALES ORDER   START***/
    define('SALES_SUBJECT','subject');
    define('SALES_SOSTATUS','sostatus');
    define('SALES_ACCOUNT_ID','account_id');
    define('SALES_ASSIGNED_USER_ID','assigned_user_id');
    define('SALES_PRODUCT_ID','productid');
    define('SALES_INVOICE_STATUS','invoicestatus');
    define('SALES_BILL_STREET','bill_street');
    define('SALES_SHIP_STREET','ship_street');
    define('SALES_HDNTAXTYPE','hdnTaxType');
	define('SALES_DUEDATE','duedate');
	define('SALES_CURRENCY_ID','currency_id');
	define('SALES_VTIGHER_PURCHASEORDER','vtiger_purchaseorder');
    /***SALES ORDER END***/
	
	/*** YOUTH PLACEMENT START */
	define('POSITION','position');
	define('ORGANISATION_ID','cf_1390');
	define('DEMAND_SHAPING_REQUEST','cf_1389');
	define('PLACEMENT','cf_yp_placement');
	define('YOUTHID','cf_1392');
	define('CF_START_DATE','cf_start_date');
	define('CF_INDUCTION_DATE','cf_induction_date');
	define('CF_YP_STATUS','cf_yp_status');
	define('WORK_EXPERIENCE_ADDRESS','cf_work_experience_address');
	define('CONTRACT_SIGNED','cf_contract_signed');
	define('EMPLOYEE_NUMBER','cf_employee_number');
	define('UIF_NUMBER','cf_uif_number');
	define('MONTHLY_SALARY','cf_montly_salary');
	define('SUPERVISOR','supervisor');
	define('HOST_ACCOUNT','host_account');
	/*** YOUTH PLACEMENT END */
	
	/*** DEMAND SHAPING START***/
	define('DEMAND_SHAPING_PROJECT','project');
	define('DEMAND_SHAPING_COMPANY','cf_1380');
	define('DEMAND_SHAPING_REQUESTED_BY','cf_1381');
	define('DEMAND_SHAPING_TYPE','cf_dstype');
	define('DEMAND_SHAPING_LOCATION','cf_location');
	define('DEMAND_SHAPING_INDUSTRY','cf_industry');
	define('DEMAND_SHAPING_JOB_POSTING','cf_job_posting');
	define('DEMAND_SHAPING_YOUTH_COUNT','cf_youth_count');
	define('DEMAND_SHAPING_PLACED_COUNT','cf_placed_count');
	define('DEMAND_SHAPING_STATUS','cf_ds_status');
	define('DEMAND_SHAPING_ROLE_DESCRIPTION','cf_role_description');
	define('DEMAND_SHAPING_START_DATE','cf_start_date');
	define('DEMAND_SHAPING_DRIVERS_LICENSE','cf_drivers_license');
	define('DEMAND_SHAPING_OWN_TRANSPORT','cf_own_transport');
	define('DEMAND_SHAPING_YOUTH_QUALIFICATION','cf_youth_qualification');
	define('DEMAND_MONTHLY_SALARY','cf_montly_salary');
	define('DEMAND_GENDER','cf_gender');
	define('DEMAND_DISABLED','cf_disabled');
	define('DEMAND_SPOKEN_LANGUAGE','cf_spoken_language');
	define('DEMAND_SUPERVISOR','cf_supervisor');
	
	/*** DEMAND SHAPING END***/
	
	/** INVOICE ORDER START **/
	define('INVOICE_SUBJECT','subject');
	define('INVOICE_SALES_ORDER_ID','salesorder_id');
	define('INVOICE_STATUS','invoicestatus');
	define('INVOICE_ACCOUNT_ID','account_id');
	define('INVOICE_ASSIGNED_USER_ID','assigned_user_id');
    define('INVOICE_PRODUCT_ID','productid');    
    define('INVOICE_BILL_STREET','bill_street');
    define('INVOICE_SHIP_STREET','ship_street');
    define('INVOICE_HDNTAXTYPE','hdnTaxType');
	define('INVOICE_DUEDATE','duedate');
	define('INVOICE_CURRENCY_ID','currency_id');
	define('INVOICE_VTIGHER_PURCHASEORDER','vtiger_purchaseorder');	
	define('INVOICE_DATE','invoicedate');	
	/** INVOICE ORDER END **/
	
    /****LIVE FIELDS END****/
}

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
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

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        Maatwebsite\Excel\ExcelServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        Sichikawa\LaravelSendgridDriver\SendgridTransportServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
    ],

];
