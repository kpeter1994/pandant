<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';
    protected $primaryKey = 'id';
    protected $fillable = [
                            'legacy_reference',
                            'name',
                            'address',
                            'equipment',
                            'emi',
                            'type',
                            'work_center',
                            'rated_load',
                            'inventory_number',
                            'comment',
                            'created_at',
                            'updated_at'
    ];
}
