<?php

namespace App\model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Users extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'id_soc',
        'type_auth',
        'avatar',
    ];

    public static function getAllUsers(int $numberPerPage) {
        return Users::query()->paginate($numberPerPage);
    }

    public static function rules(Request $request)
    {
        return [
            'name' => 'required|string|max:55',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($request->id)
            ],
            'password' => 'required|string|min:3',
        ];
    }
}
