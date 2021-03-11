<?php

namespace App\Models;

use App\Models\Homepage\CommentColleague;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Homepage\Instagram;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active',
        'emailactive', 'mobileactive', 'level',
        'email', 'mobile', 'viptime', 'expire_at',
        'photo', 'code','api_token','email_verified_at'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    public function isActive()
    {
        return $this->viptime > Carbon::now() ? true : false;
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function activationCode()
    {
        return $this->hasMany(ActivationCode::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function isAdmin()
    {
        return $this->level == 'admin' ? true : false;
    }

    public function checkLearning($course)
    {
        return !!Learning::where('user_id', $this->id)->where('course_id', $course->id)->first();
    }

    public function instagrams(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Instagram::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function user()
    {
        return $this->hasMany(CommentColleague::class);
    }

}
