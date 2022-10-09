<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdminModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'super_admin';
}
