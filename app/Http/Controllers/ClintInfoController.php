<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClintInfoController extends Controller
{
   public function index(){


    return view(("index"));
   }

   public function openTxtFile(Request $request)
   {
    // Path to your TXT file
    $txtFilePath = $request->file; // Adjust the path as per your file location

    // Check if the file exists
    if (file_exists($txtFilePath)) {
        // Read the content of the TXT file
        $content = file_get_contents($txtFilePath);
        $rows = explode("\n", $content);

        return view("index",compact('rows'));
    } else {
        // Handle the case when the file does not exist
        return response()->json(['error' => 'File not found'], 404);
    }
    }


}
