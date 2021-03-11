<?php

namespace App\Models\CooperationRequest;

use Illuminate\Database\Eloquent\Model;

class EducationCourses extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'educationcourses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coursetitle','academy','certificatepath','recruitment_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    public function recruitment()
    {
        $this->belongsTo(Recruitment::class);
    }
}
