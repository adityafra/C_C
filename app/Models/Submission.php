<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submissions';

    protected $fillable = [
        'assignment_id',  
        'submitted_by',  
        'folder_path',   
    ];

    // Relasi: Submission belongs to Assignment
    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }

    // Relasi: Submission belongs to User
    public function user()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }
}
