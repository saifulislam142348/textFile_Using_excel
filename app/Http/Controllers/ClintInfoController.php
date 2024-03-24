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
    $rows=[];
    // Path to your TXT file
    $txtFilePath = $request->file; // Adjust the path as per your file location
foreach($txtFilePath as $key=>$item){
    // dd($item);
 // Check if the file exists
 if (file_exists($item)) {
    // Read the content of the TXT file
    $content = file_get_contents($item);
    $row= explode("\n", $content);
$rows[]=$row;
    // return view("index",compact('rows'));
}
 else {
    // Handle the case when the file does not exist
    return response()->json(['error' => 'File not found'], 404);
  }
}
return view("index",compact('rows'));


    }


}
