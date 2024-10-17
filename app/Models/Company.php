<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdCompany';
    protected $fillable = ['NIT', 'Name', 'Address', 'Phone', 'State'];

    // Custom validation rules
    public static $rules = [
        'NIT' => 'required|unique:companies,NIT|numeric|digits_between:1,10',
        'Name' => 'required|string|max:50|regex:/^[a-zA-ZñÑ0-9\s]+$/',
        'Address' => 'required|string|max:50|regex:/^[a-zA-ZñÑ0-9\s\-#]+$/',
        'Phone' => 'required|numeric|digits_between:1,10',
        'State' => 'boolean',
    ];
}