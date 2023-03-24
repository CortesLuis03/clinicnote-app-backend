<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicHistory extends Model
{
    protected $table = 'clinic_history';
    protected $primaryKey = 'id';
    protected $fillable = ['id_patient','names_patient', 'lastnames_patient', 'birthday_patient', 'gender_patient', 'phone_patient', 'address_patient', 'city_patient', 'civilstatus_patient'];
    public $timestamps = true;
    use HasFactory;

    function details(){
        return $this->hasMany(ClinicHistoryDetail::class, 'id_patient', 'id_patient');
    }
}
