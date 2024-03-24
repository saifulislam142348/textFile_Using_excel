<?php

namespace App\Http\Controllers;

use App\Models\ClintInfo;
use Illuminate\Http\Request;
use App\Exports\ClintInfoExport;
use Maatwebsite\Excel\Facades\Excel;

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
public function store(Request $request){

$clint=ClintInfo::get();
foreach ($clint as $key => $value) {
    $value->delete();
}

     if(isset($request->nid)){
        foreach($request->nid as $key=>$item){
            ClintInfo::create([
                'application_date'=>$request->application_date[$key],
                'Expiration_date'=>$request->Expiration_date[$key],
                'name'=>$request->name[$key],
                'relative_name'=>$request->relative_name[$key],
                'birth_day'=>$request->birth_day[$key],
                'phone'=>$request->phone[$key],
                'nid'=>$item,
                'passport'=>$request->passport[$key],
                'address'=>$request->address[$key],
                'description'=>$request->description[$key],
            ]);
        }
     }

     return Excel::download(new ClintInfoExport, 'clintInfo.xlsx');

}

}
