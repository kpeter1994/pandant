<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    use HasFactory;

    protected $table = 'error';
    protected $primaryKey = 'id';
    protected $fillable = [
        'error_id',
        'equipment_id',
        'troubleshooter',
        'description',
        'error_type',
        'stand',
        'injured',
        'recorder',
        'whistleblower',
        'phone',
        'comment',
        'created_at',
        'updated_at'];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
}

