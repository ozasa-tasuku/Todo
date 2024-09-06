<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
    'title',
    'body',
    'due_date',
    'due_time'
    ];
    
    use HasFactory;
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('due_date', 'DESC')->limit($limit_count)->paginate($limit_count);
    }
}
