<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $table = 'work_orders';
    protected $primaryKey = 'id';
    protected $fillable = ['worker_id ', 'start', 'end', 'status', 'created_at', 'updated_at'];

    public function workCenter(){
       return $this->belongsTo(WorkCenter::class, 'worker_id');
    }
}
