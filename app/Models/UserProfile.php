<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profile';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'fullname',
        'email',
        'phone',
        'sex',
        'age',
        'address',
        'blood_group',
        'profile_type',
        'doc_dept',
        'security_question',
        'security_answer'
    ];

    public function Users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
