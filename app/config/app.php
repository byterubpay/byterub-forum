<?php

return array(

	/*
	|
	| App Settings
	|
	*/

	/*	Admin List */

	'admins' 							=> array('fluffypony', 'Edvinas'), 		//these admins will be appointed once roles are created.

	/*	Per Page Settings	*/

	'ratings_per_page' 					=> 20,
	'user_threads_per_page' 			=> 20,
	'user_posts_per_page' 				=> 20,
	'thread_posts_per_page'				=> 15,
	'threads_per_page'					=> 15,

	/*	Cache Settings	*/

	'cache_posts_for'					=> 0.1, //amount of minutes to cache the posts for users. Set in minutes.
	'cache_latest_details_for'			=> 1, //amount of minutes to cache the latest details for.

	/*	Post Weight	*/

	'base_weight'						=> 500, //the base weight of every post.
	'hidden_weight'						=> 400, //hide posts under this weight.
	'minimum_weight'					=> 	0, //do not set weight below this value.

	'reply_weight'						=> 	2, //amount of weight to add if the post just had a new reply.

	'insightful_weight'					=> 	1, //amount of weight to add if the post is voted as insightful.
	'irrelevant_weight'					=> -1, //amount of weight to take away if the post is voted as irrelevant.

	'l1_post_weight'					=> 	250, //amount of weight to add if poster is in L1 of trust.
	'l2_post_weight'					=> 	150, //amount of weight to add if poster is in L2 of trust.
	'l3_post_weight'					=> 	50, //amount of weight to add if poster is in L3 of trust.

	'l1_vote_weight'					=> 	10, //amount of weight to add if voter is in L1 of trust.
	'l2_vote_weight'					=> 	5, //amount of weight to add if voter is in L2 of trust.
	'l3_vote_weight'					=> 	2, //amount of weight to add if voter is in L3 of trust.

	'decay_weight'						=> 	1, //amount of weight for a post to decay during each iteration of the decay.

	/* Posting Settings */

	'thread_daily_limit'			    =>  1,  //how many threads per day for new users
	'thread_total_days_limit'			=>  30, //for how many days new users have daily new thread limits
	'posts_daily_limit_minutes'			=>  10, //minimum interval in minutes for new users to post
	'posts_total_days_limit' 			=>  7,  //for how many days new users have daily new post limits per posts_daily_limit_minutes

	/* Other Settings */

	'project_dir' 						=> '/home/byterub-private/',

	/* Email Settings */

	'from_email'						=> 'noreply@getbyterub.org',
	'from_name'							=> 'The ByteRub Project',
	'welcome_email_subject'				=> 'Welcome to the ByteRub Forums',
	'recovery_email_subject'			=> 'Password Recovery',

	/* GPG Settings */

	'max_gpg_entry'						=> 5, //number of times to try and hit the key servers before asking the user to upload a key instead.
	'funding_forums'                => [8,9],



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

	'debug' => true,

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

	'url' => 'http://byterub.forum',

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
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key' => 'LEZy7TvZKgBIMMUrgu7TuG4SAD3TkvNC',

	'cipher' => MCRYPT_RIJNDAEL_128,

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

	'providers' => array(

		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Session\CommandsServiceProvider',
		'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
		'Illuminate\Routing\ControllerServiceProvider',
		'Illuminate\Cookie\CookieServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
		'Illuminate\Encryption\EncryptionServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Hashing\HashServiceProvider',
		'Illuminate\Html\HtmlServiceProvider',
		'Illuminate\Log\LogServiceProvider',
		'Illuminate\Mail\MailServiceProvider',
		'Illuminate\Database\MigrationServiceProvider',
		'Illuminate\Pagination\PaginationServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Redis\RedisServiceProvider',
		'Illuminate\Remote\RemoteServiceProvider',
		'Illuminate\Auth\Reminders\ReminderServiceProvider',
		'Illuminate\Database\SeedServiceProvider',
		'Illuminate\Session\SessionServiceProvider',
		'Illuminate\Translation\TranslationServiceProvider',
		'Illuminate\Validation\ValidationServiceProvider',
		'Illuminate\View\ViewServiceProvider',
		'Illuminate\Workbench\WorkbenchServiceProvider',
		'Way\Generators\GeneratorsServiceProvider',
		'VTalbot\Markdown\MarkdownServiceProvider',
		'Zizaco\Entrust\EntrustServiceProvider',
		'Intervention\Image\ImageServiceProvider',
		'Creitive\Breadcrumbs\BreadcrumbsServiceProvider',
		'Roumen\Feed\FeedServiceProvider',
		'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider',
		'Eddieh\ByteRub\ByteRubServiceProvider',
		'Msurguy\Honeypot\HoneypotServiceProvider',
		'App\Providers\SpamProtectionCacheServiceProvider',

	),

	/*
	|--------------------------------------------------------------------------
	| Service Provider Manifest
	|--------------------------------------------------------------------------
	|
	| The service provider manifest is used by Laravel to lazy load service
	| providers which are not needed for each request, as well to keep a
	| list of all of the services. Here, you may set its storage spot.
	|
	*/

	'manifest' => storage_path().'/meta',

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

	'aliases' => array(

		'App'             => 'Illuminate\Support\Facades\App',
		'Artisan'         => 'Illuminate\Support\Facades\Artisan',
		'Auth'            => 'Illuminate\Support\Facades\Auth',
		'Blade'           => 'Illuminate\Support\Facades\Blade',
		'Cache'           => 'Illuminate\Support\Facades\Cache',
		'ClassLoader'     => 'Illuminate\Support\ClassLoader',
		'Config'          => 'Illuminate\Support\Facades\Config',
		'Controller'      => 'Illuminate\Routing\Controller',
		'Cookie'          => 'Illuminate\Support\Facades\Cookie',
		'Crypt'           => 'Illuminate\Support\Facades\Crypt',
		'DB'              => 'Illuminate\Support\Facades\DB',
		'Eloquent'        => 'Illuminate\Database\Eloquent\Model',
		'Event'           => 'Illuminate\Support\Facades\Event',
		'File'            => 'Illuminate\Support\Facades\File',
		'Form'            => 'Illuminate\Support\Facades\Form',
		'Hash'            => 'Illuminate\Support\Facades\Hash',
		'HTML'            => 'Illuminate\Support\Facades\HTML',
		'Input'           => 'Illuminate\Support\Facades\Input',
		'Lang'            => 'Illuminate\Support\Facades\Lang',
		'Log'             => 'Illuminate\Support\Facades\Log',
		'Mail'            => 'Illuminate\Support\Facades\Mail',
		'Paginator'       => 'Illuminate\Support\Facades\Paginator',
		'Password'        => 'Illuminate\Support\Facades\Password',
		'Queue'           => 'Illuminate\Support\Facades\Queue',
		'Redirect'        => 'Illuminate\Support\Facades\Redirect',
		'Redis'           => 'Illuminate\Support\Facades\Redis',
		'Request'         => 'Illuminate\Support\Facades\Request',
		'Response'        => 'Illuminate\Support\Facades\Response',
		'Route'           => 'Illuminate\Support\Facades\Route',
		'Schema'          => 'Illuminate\Support\Facades\Schema',
		'Seeder'          => 'Illuminate\Database\Seeder',
		'Session'         => 'Illuminate\Support\Facades\Session',
		'SoftDeletingTrait' => 'Illuminate\Database\Eloquent\SoftDeletingTrait',
		'SSH'             => 'Illuminate\Support\Facades\SSH',
		'Str'             => 'Illuminate\Support\Str',
		'URL'             => 'Illuminate\Support\Facades\URL',
		'Validator'       => 'Illuminate\Support\Facades\Validator',
		'View'            => 'Illuminate\Support\Facades\View',
		'Markdown' 		  => 'VTalbot\Markdown\Facades\Markdown',
		'Entrust'    	  => 'Zizaco\Entrust\EntrustFacade',
		'Image'			  => 'Intervention\Image\Facades\Image',
		'Breadcrumbs'	  => 'Creitive\Breadcrumbs\Facades\Breadcrumbs',
		'Feed'   		  => 'Roumen\Feed\Facades\Feed',
		'ByteRub'          => 'Eddieh\ByteRub\Facades\ByteRub',
		'Honeypot' 		  => 'Msurguy\Honeypot\HoneypotFacade'
	),

);
