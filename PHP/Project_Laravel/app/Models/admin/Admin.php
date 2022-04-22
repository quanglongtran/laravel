<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    public function insertAdmin($username, $password) {
        $insert = DB::insert('INSERT INTO admins (username, password) values (?, ?)', [$username, $password]);
    }
}
