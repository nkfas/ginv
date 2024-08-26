<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'customer_deal_id',
        'customer_group_id',
        'account_id',
        'name' ,
        'name_ar',
        'commercial_name',
        'commercial_name_ar',
        'address',
        'address_ar' ,
        'phone_code' ,
        'phone' ,
        'mobile' ,
        'country_id',
        'region_id',
        'area_id',
        'salesman_id' ,
        'currency_id' ,
        'cr_no' ,
        'vat_no',
        'office_no' ,
        'customer_name' ,
        'vat_reg_number' ,
        'country_code' ,
        'customer_identification_number',
        'city_name' ,
        'street_name',
        'building_no' ,
        'additional_no',
        'postal_zone' ,
        'city_subdivision_name',
        'country_subentity',
        'email' ,
        'status',
    ];

}
