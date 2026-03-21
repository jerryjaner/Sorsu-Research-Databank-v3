<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadResearch extends Model
{

    protected $fillable = [
        'user_id',
        'research_id',
    ];

    // Define the relationship to the research model
    public function research()
    {
        return $this->belongsTo(Research::class);
    }

    // Define the relationship to the user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
