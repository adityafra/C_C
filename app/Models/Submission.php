<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
<<<<<<< HEAD
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
=======
    protected $fillable = [
        'folder_path',
        'submitted_by',
        'assignment_id',
        'file_list',
    ];

    protected $casts = [
        'file_list' => 'array',
    ];

    public function assignments_criterias() {
        return $this->hasManyThrough(AssignmentCriteria::class, Assignment::class);
    }

>>>>>>> 827a7ee6c2f1cba3c6a4a9c417063112fe88826a
    public function user()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }
<<<<<<< HEAD
=======

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }
>>>>>>> 827a7ee6c2f1cba3c6a4a9c417063112fe88826a
}
