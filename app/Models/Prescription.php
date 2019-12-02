<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescription';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'user_id', 'patient_id', 'drug', 'interval', 'report'];

    public function Users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
