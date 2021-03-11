<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Cart extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id','count','cloes','type'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }


}
