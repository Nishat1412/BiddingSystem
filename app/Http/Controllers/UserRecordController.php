<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        DB::table('user_records')->upsert(
    [
        [
            'id' => 1,
            'name' => 'Kayla',
            'username' => 'kayla123',
            'email' => 'kayla@example.com',
            'phone' => '123-456-7890',
            'password' =>'password123',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'id' => 2,
            'name' => 'John',
            'username' => 'john123',
            'email' => 'john@example.com',
            'phone' => '987-654-3210',
            'password' =>'password456',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'id' => 3,
            'name' => 'Jenesse',
            'username' => 'jenesse123',
            'email' => 'jenesse@example.com',
            'phone' => '456-789-0123',
            'password' =>'password789',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'id' => 4,
            'name' => 'Monalisa',
            'username' => 'monalisa123',
            'email' => 'monalisa@example.com',
            'phone' => '321-654-0987',
            'password' =>'password012',
            'created_at' => now(),
            'updated_at' => now()
        ],
    ],
    ['id'], 
    ['name', 'username', 'email', 'phone', 'password', 'updated_at'] 
);

DB::table('user_records')->where('id', 4)->delete();

    return "User with ID 4 deleted!";


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
