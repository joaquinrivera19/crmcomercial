<?php

namespace crmcomercial;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'ComVendedor';

    protected $primaryKey = 'ven_codigo';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ven_nombre', 'ven_usuario', 'ven_email', 'ven_clave'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'ven_clave', 'remember_token'
    ];

    public static $rules = [
        'ven_nombre' => 'required',
        'ven_usuario' => 'required',
        'ven_clave'=> 'required',
        'ven_email'=> 'required'
    ];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->ven_clave;
    }

 }
