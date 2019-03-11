<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Validator;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    //
    public function create(){
        return view('/home');
    }
    public function uploadBeeeCertificate(Request $request){
        $validation = Validator::make($request->all(), [
            // 'file' => 'required|max:10240'
        ]);
        if($validation -> passes()){
            $file = $request->file('file');

            if($file){
                $fileName = $file->getClientOriginalName();
                $path = 'storage/'.$request->input('id');
                $file->move($path, $fileName);
                $fromInput['file'] = $fileName;
                return response()->json([
                    'message'       =>  $validation->errors()->all(),
                    'path'          =>  $path.'/'.$fileName,
                    'file_name'     =>  $fileName,
                    'class_name'    =>  'alert-success'
                ]);
            }
        }
        else{
            return response()->json([
                'message'       =>  $validation->errors()->all(),
                'upload_file'   =>  '',
                'class_name'    =>  'alert-danger'
            ]);
        }
    }
    
    
}