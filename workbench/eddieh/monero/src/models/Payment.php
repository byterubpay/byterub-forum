<?php namespace Eddieh\ByteRub;

class Payment extends \Eloquent {

	protected $fillable = [
		'type',
		'address',
		'payment_id',
		'amount',
		'expires_at',
		'status',
		'block_height'
	];

	protected $table = 'btr_payments';

	public function funding() {
		return $this->belongsTo('Funding', 'payment_id', 'payment_id');
	}

}