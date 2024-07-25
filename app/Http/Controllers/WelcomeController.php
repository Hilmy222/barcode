<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{ 
    public function home()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
    }
    public function store()
    {
        return view('store');
    } 
    public function scan()
    {
        return view('scan');
    }

    public function validasi(Request $request)
    {
        $barcode = $request->input('barcode'); // Using 'barcode' as parameter
        $validBarcode = 'Hilmy'; // Valid barcode for this example

        if ($barcode == $validBarcode) { // Compare barcode with valid data
            return response()->json([
                'status' => 200,
                'message' => 'Barcode valid',
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Barcode tidak valid',
            ]);
        }
    }
}