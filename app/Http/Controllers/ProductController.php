<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function gadget() {
        $products = DB::table('products')->where('category', 'Gadgets')
                  ->get();
        return view('products.gadgets', compact('products'));
        //return view('products.gadgets'); 
    }

    public function artwork() {
        $products = DB::table('products')->where('category', 'artwork')->get();
        return view('products.artwork', compact('products'));
        //return view('products.artwork'); 
    }

    public function antique() {
        $products = DB::table('products')->where('category', 'Antiques')->get();
        return view('products.antiques', compact('products'));
       // return view('products.antiques'); 
    }

    public function memorabilia() {
        $products = DB::table('products')->where('category', 'Memorabilia')->get();
        return view('products.memorabilia', compact('products'));
    }

    public function automobile() {
        $products = DB::table('products')->where('category', 'Automobiles')->get();
        return view('products.automobiles', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'product_price' => 'required|numeric',
            'product_rating' => 'nullable|numeric|min:0|max:5',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

 if ($request->hasFile('product_image')) {
    
    $imageFile = $request->file('product_image');
   // $filename = time().'_'.$request->file('product_image')->getClientOriginalName();
    $filename = time() . '.' . $imageFile->getClientOriginalName();

    // Use the new 'uploads' disk and save directly in its root
    $imageFile->storeAs('', $filename, 'uploads'); 

    $data['product_image'] = $filename;
}


        $data['user_id'] = auth()->id() ?? 1;
        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('products')->insert($data);

          $category = strtolower($data['category']); // convert to lowercase for URL
    switch ($category) {
        case 'gadgets':
            return redirect()->route('products.gadgets')->with('success', 'Product added!');
        case 'artwork':
            return redirect()->route('products.artwork')->with('success', 'Product added!');
        case 'antiques':
            return redirect()->route('products.antiques')->with('success', 'Product added!');
        case 'memorabilia':
            return redirect()->route('products.memorabilia')->with('success', 'Product added!');
        case 'automobiles':
            return redirect()->route('products.automobiles')->with('success', 'Product added!');
        default:
            return redirect()->route('products.index')->with('success', 'Product added!');
    }
    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('products.edit', compact('product'));
    }

 public function update(Request $request, $id)
{
    $data = $request->validate([
        'product_name' => 'required|string|max:255',
        'product_description' => 'nullable|string',
        'category' => 'required|string|max:100',
        'product_price' => 'required|numeric',
        'product_rating' => 'nullable|numeric|min:0|max:5',
        'product_image' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    $product = DB::table('products')->where('id', $id)->first();

   if ($request->hasFile('product_image')) {
    
    // 1. Delete the old image from the correct 'uploads' disk
    if ($product->product_image && \Storage::disk('uploads')->exists($product->product_image)) {
        \Storage::disk('uploads')->delete($product->product_image);
    }

    // 2. Create a new, safe filename
    $imageFile = $request->file('product_image');
    $filename = time() . '.' . $imageFile->getClientOriginalName();

    // 3. Store the new file in the correct 'uploads' disk (THIS IS YOUR LINE)
    $imageFile->storeAs('', $filename, 'uploads');
    
    // 4. Prepare the new filename to be saved in the database
    $data['product_image'] = $filename; 
}


    $data['updated_at'] = now();
    DB::table('products')->where('id', $id)->update($data);

    return redirect()->route('products.index')->with('success', 'Product updated!');
}

    public function destroy($id)
{
    $product = DB::table('products')->where('id', $id)->first();
    if ($product->product_image && \Storage::disk('uploads')->exists($product->product_image)) {
    \Storage::disk('uploads')->delete($product->product_image);
}



    DB::table('products')->where('id', $id)->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted!');
}

public function uploadDocumentsForm($id)
{
    $product = DB::table('products')->where('id', $id)->first();
    return view('products.upload-documents', compact('product'));
}

public function storeDocuments(Request $request, $id)
{
    $request->validate([
        'identity_card' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        'cash_memo' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    if ($request->hasFile('identity_card')) {
    $identityFile = $request->file('identity_card');
    $identityFilename = time() . '_' . $identityFile->getClientOriginalName();
    $identityPath = $identityFile->storeAs('documents/identity', $identityFilename, 'public');
}

if ($request->hasFile('cash_memo')) {
    $cashMemoFile = $request->file('cash_memo');
    $cashMemoFilename = time() . '_' . $cashMemoFile->getClientOriginalName();
    $cashMemoPath = $cashMemoFile->storeAs('documents/cash_memo', $cashMemoFilename, 'public');
}

    DB::table('auction_submissions')->insert([
        'product_id' => $id,
        'identity_card' => $identityPath,
        'cash_memo' => $cashMemoPath,
        'status' => 'pending', 
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // email/notification system
    return redirect()->route('products.index')->with('success', 'Documents submitted for approval. Admin will review your submission.');
}


}
