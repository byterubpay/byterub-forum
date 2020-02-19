<?php
/**
 * Created by PhpStorm.
 * User: Eddie
 * Date: 11/04/15
 * Time: 13:19
 */

namespace Eddieh\ByteRub\Facades;

use Illuminate\Support\Facades\Facade;

class ByteRub extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'byterub'; }

}