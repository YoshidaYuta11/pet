<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kakaku',
        'shurui',
        'shosai',
        'created_at',
        'manufacturer', // 新しいカラムを追加
        'updated_at',
        'image', // 新しいカラムを追加
        'user_id',
    ];

    // app\Models\Pet.php

public function manufacturer()
{
    return $this->belongsTo(Manufacturer::class, 'manufacturer');
}


}