<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'product_name' => 'Product 1',
                'user_id' => 1,
                'product_image' => 'image1.jpg',
                'product_description' => 'Description for Product 1',
                'category' => 'Category 1',
                'product_price' => 100.00,
                'product_rating' => 4.5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'product_name' => 'Product 2',
                'user_id' => 2,
                'product_image' => 'image2.jpg',
                'product_description' => 'Description for Product 2',
                'category' => 'Category 2',
                'product_price' => 150.00,
                'product_rating' => 4.0,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);


        
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
