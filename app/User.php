<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = ['name', 'email', 'password'];
    public $guarded = [];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];

    public function rules($id)
    
    {

        if(!empty($id))
        {
            $email = ',email,'.$id;
            $username = ',username,'.$id;
        }else{
            $email = '';
            $username = '';
        }

        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users'.$email,
            'username' => 'required|max:255|unique:users'.$username,
            'password' => 'required|min:3',
            'verify_password' => 'required|same:password',
            
        ];

    }

    public function role()

    {
        return $this->belongsTo('App\Models\Role' , 'role_id');
    }
}
