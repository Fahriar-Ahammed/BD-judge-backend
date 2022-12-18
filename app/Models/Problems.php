<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problems extends Model
{
    public function testCases()
    {
        return $this->hasMany(TestCases::class,'problem_id');
    }
}
