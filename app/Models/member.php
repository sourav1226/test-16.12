<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    protected $table ='members';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'city',
        'gender',
        'meretial_status',
        'dob',
        'role_id',
        'sub_role_id',
        
        
    ];

    function MemberRoles(){
        return $this->hasone('App\Models\role', 'id' ,'role_id');
    }
    function SubRoles(){
        return $this->hasone('App\Models\role', 'id' ,'sub_role_id');
    }
    
}
