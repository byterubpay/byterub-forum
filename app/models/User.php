<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;
use Carbon\Carbon;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, HasRole;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function posts() {
		return $this->hasMany('Post');
	}

	public function subscriptions() {
		return $this->hasMany('Subscription');
	}

	public function notifications() {
		return $this->hasMany('Notification');
	}

	public function threads() {
		return $this->hasMany('Thread');
	}

	public function ratings() {
		return $this->hasMany('Rating', 'username', 'username');
	}

	public function rated() {
		return $this->hasMany('Rating', 'rated_username', 'username');
	}

	public function pushed_ratings() {
		return $this->hasMany('Pushed_Rating');
	}

	public function notificationKey() {
		return $this->hasOne('NotificationKey', 'user_id', 'id');
	}

	//needs get() or paginate() or whatever to get the results.
	//returns all the conversations that a user is involved in.
	public function conversations() {
		return Conversation::where('user_id', $this->id)->orWhere('receiver_id', $this->id);
	}

	public function getMessagesAttribute() {
		if(Auth::check()) {
			$user = Auth::user();
			return Message::where('sender_id', $user->id)->orWhere('receiver_id', $user->id)->paginate(10);
		}
		else
			return false;
	}

	/* Relationships with Bitcoin OTC */

	public function otc_user() {
		return $this->hasOne('OTC_User', 'username', 'nick');
	}

	public function otc_ratings() {
		return $this->otc_user()->ratings();
	}

	public function gpg() {
		return $this->hasOne('GPG', 'username', 'nick');
	}

	public function votes() {
		return $this->belongsTo('Vote');
	}

	public function access() {
		return $this->hasMany('Access');
	}

	/* Validator */

	public static function validate($input) {
		$rules = array(
			'username'	=>	"required|alpha_dash|unique:users",
			'email'		=>	"required|email|unique:users",
			'password'	=>	"required|confirmed",
			'key'		=> 	"unique:users,key_id",
		);
		return Validator::make($input, $rules);
	}

	/* Generators */

	public function profile() {
		return '<a href="/user/'.$this->username.'">'.$this->username.'</a>';
	}

	/* Find by Username */

	public static function findUsername($username) {
		return User::where('username', $username)->first();
	}

	/* Get the current sort selection of the user */
	public static function currentSort() {
		if(Input::has('sort'))
		{
			return Input::get('sort');
		}
		elseif(Auth::check()) {
			return Auth::user()->default_sort;
		}
		else {
			return false;
		}
	}

	public function getDates() {
		return [
			'created_at',
			'updated_at',
			'notifications_read'
		];
	}

	public static function isNew($user, $days) {

		//check if user registered within $days
		$isNew = User::where('id', '=', $user->id)
				     ->where('created_at', '>=', Carbon::now()->subDays($days))
					 ->count();

		//check if user created in the past app.thread_total_days_limit days
		if ($isNew) return true; else return false;

	}

}
