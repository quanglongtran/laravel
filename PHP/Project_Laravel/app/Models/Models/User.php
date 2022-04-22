<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    protected $table = '';

    public function getAllUsers() {
        $user = DB::select('SELECT * FROM users ORDER BY created_at DESC');
        return $user;
    }

    public function addUser($data) {
        DB::insert('INSERT INTO users (username, email, password, fullname, birthday, gender, account_type, identity_number, address, created_at) values 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
        $data);
    }
}
