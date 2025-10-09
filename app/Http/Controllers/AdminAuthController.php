<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.admin_login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

       $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
    
        return redirect()->route('admin.login')->with('msg', 'Logged out successfully.');
    }

    public function dashboard()
    {
        return view('admin.dashboard'); 
    }

    public function auctionAction(Request $request, $id)
    {
        $request->validate(['action' => 'required|in:approved,rejected']);
        DB::table('products')->where('id', $id)
            ->update(['auction_status' => $request->action]);

        return back()->with('msg','Auction request '.$request->action);
    }

    public function productPdf($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            abort(404, "Product not found");
        }

        $pdf = Pdf::loadView('admin.product_pdf', compact('product'));

        //return $pdf->download("product_{$id}.pdf");
                return $pdf->stream("product_{$id}.pdf");

    }

    public function pendingAuctions()
{
    $products = DB::table('products')
        ->where('auction_status', 'pending')
        ->leftJoin('document_submissions', 'document_submissions.user_id', '=', 'products.user_id')
        ->select(
            'products.*',
            'document_submissions.identity_card',
            'document_submissions.birth_certificate_or_passport'
        )
        ->get();

    return view('admin.pending_auctions', compact('products'));
}

    public function generateDocumentPdf($type, $user_id)
{
    $doc = DB::table('document_submissions')->where('user_id', $user_id)->first();
    if (!$doc) abort(404, 'Documents not found');

    if ($type === 'nid') {
        $file = $doc->identity_card;
        $folder = public_path('identity/');
        $title = 'User NID - ' . $user_id;

    }   elseif ($type === 'birth') {
        $file = $doc->birth_certificate_or_passport;
        $folder = public_path('documents/');
        $title = 'User Birth Certificate / Passport - ' . $user_id;

    } else {
        abort(400, 'Invalid document type');
    }

    $filePath = $folder . $file;

    $pdf = Pdf::loadView('admin.document_pdf', [
        'filePath' => $filePath,
        'type' => $title
    ]);

    $pdf->setOption('title', $title);


    // return $pdf->download($type . '_' . $user_id . '.pdf');
    return $pdf->stream($type . '_' . $user_id . '.pdf');
    
}

    
}

