<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicHistoryDetail extends Model
{
    protected $table = 'clinic_history_detail';
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_patient', 'timestamp_ch_detail', 'reason_ch_detail', 'weight_ch_detail', 'height_ch_detail', 'recommendation_ch_detail'];
    public $timestamps = true;
    use HasFactory;
}
