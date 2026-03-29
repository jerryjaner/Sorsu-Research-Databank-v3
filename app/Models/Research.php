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
        'research_agenda',
        'completion_year',
        'keywords',
        'publication_status',
        'publication',
        'abstract_file_name',
        'abstract_path',
        'research_paper_file_name',
        'research_paper_path',
    ];
    // Optional: define relations
    public function campus()
    {
        return $this->belongsTo(Campus::class)->withDefault();
    }

    public function department()
    {
        return $this->belongsTo(Department::class)->withDefault();
    }

    public function downloads()
    {
        return $this->hasMany(DownloadResearch::class);
    }
}
