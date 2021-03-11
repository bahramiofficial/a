<?php

namespace App\Models\CooperationRequest;

use Illuminate\Database\Eloquent\Model;

class EducationalExperience extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'educationalexperiences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','grade','field','orientation','average',
        'degree_at','recruitment_id',
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
