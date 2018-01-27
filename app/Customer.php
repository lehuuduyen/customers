<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $table = 'customers';

    protected $fillable = [
        'campaign_name', 'fullname', 'dob','address', 'phone_number', 'location_name','mac_address', 'content', 'created_client_at'
    ];

    public $timestamps = true;
}
