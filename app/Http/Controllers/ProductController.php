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
        $products = DB::table('products')->where('category', 'Gadgets')->get();
        return view('products.gadgets', compact('products'));
    }

    public function artwork() {
        $products = DB::table('products')->where('category', 'artwork')->get();
        return view('products.artwork', compact('products'));
    }

    public function antique() {
        $products = DB::table('products')->where('category', 'Antiques')->get();
        return view('products.antiques', compact('products'));
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
        'cash_memo' => 'nullable|file|mimes:jpg,jpeg,png,pdf', 
    ]);


    if ($request->hasFile('product_image')) {
        $imageFile = $request->file('product_image');
        $filename = time() . '.' . $imageFile->getClientOriginalName();
        $imageFile->storeAs('', $filename, 'uploads'); 
        $data['product_image'] = $filename;
    }

    if ($request->hasFile('cash_memo')) {
        $memoFile = $request->file('cash_memo');
        $memoName = time() . '_' . $memoFile->getClientOriginalName();
        $memoFile->storeAs('', $memoName, 'invoice'); 
        $data['cash_memo'] = $memoName;
    }


        $data['user_id'] = auth()->id();
        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('products')->insert($data);

          $category = strtolower($data['category']); 
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
        'cash_memo' => 'nullable|file|mimes:jpg,jpeg,png,pdf',

    ]);

    $product = DB::table('products')->where('id', $id)->first();

   if ($request->hasFile('product_image')) {
    
    if ($product->product_image && \Storage::disk('uploads')->exists($product->product_image)) {
        \Storage::disk('uploads')->delete($product->product_image);
    }

    $imageFile = $request->file('product_image');
    $filename = time() . '.' . $imageFile->getClientOriginalName();
    $imageFile->storeAs('', $filename, 'uploads');
    $data['product_image'] = $filename; 
}

    if ($request->hasFile('cash_memo')) {
        
        if ($product->cash_memo && \Storage::disk('invoice')->exists($product->cash_memo)) {
            \Storage::disk('invoice')->delete($product->cash_memo);
        }
        $memoFile = $request->file('cash_memo');
        $memoName = time() . '_' . $memoFile->getClientOriginalName();
        $memoFile->storeAs('', $memoName, 'invoice');
        $data['cash_memo'] = $memoName;
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

 public function requestAuction($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->where('user_id', auth()->guard('user_record')->id())
            ->update(['auction_status' => 'pending']);

        return response()->json(['status' => 'ok']);
    }

}