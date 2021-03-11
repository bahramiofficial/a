<?php

namespace App\Models\CooperationRequest;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recruitments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'category', 'name', 'family', 'numberid', 'nationality', 'married',
        'nationalcode', 'gender', 'religion', 'born_at', 'fathername',
        'fatherjob',
        //OtherInformation
        'familiarity', 'typecollaboration', 'starttime', 'resumefilepath',
        //Contact
        'email', 'citycode', 'phone', 'province', 'city', 'mobile',
        'address',
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

    public function educationalexperience()
    {
        $this->hasMany(EducationalExperience::class, 'recruitment_id');
    }

    public function educationcourses()
    {
        $this->hasMany(EducationCourses::class, 'recruitment_id');
    }

    public function generalabilities()
    {
        $this->hasMany(GeneralAbilities::class, 'recruitment_id');
    }

    public function computerabilities()
    {
        $this->hasMany(ComputerAbilitie::class, 'recruitment_id');
    }

    public function workexperiences()
    {
        $this->hasMany(WorkExperience::class, 'recruitment_id');
    }
}
