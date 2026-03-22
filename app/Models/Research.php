<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'research';

    // Allow mass assignment
    protected $fillable = [
        'title',
        'author',
        'campus_id',
        'department_id',
        'adviser',
        'course',
        'major',
        'academic_year',
        'publication_status',
        'description',
        'abstract_file_name',
        'abstract_path',
        'research_paper_file_name',
        'research_paper_path',
    ];
    // Optional: define relations
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function downloads()
    {
        return $this->hasMany(DownloadResearch::class);
    }
}
