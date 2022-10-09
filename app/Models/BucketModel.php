<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BucketModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bucket';
}
