<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\SignatureUpload;
use DB;
use Image;
class SignatureUploadController extends Controller
{
    public function index()
    {
        $signatures = SignatureUpload::all();
        return view('pages.signature.index', compact('signatures'));
    }

    public function create()
    { 
        return view('pages.signature.create');
    }

    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'name' => 'required|string',  
            'designation' => 'required|string',  
            'signature-file' => 'required|mimes:jpg,jpeg,png,bmp|max:2048',  
            'status' => 'required|string',  
        ]); 

        if ($request->file('signature-file')) {
            // $signatureFilePath = $request->file('signature-file')->store('signatures', 'public'); 
            $image = $request->file('signature-file');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Resize the image to 80x80 pixels
            $resizedImage = Image::make($image)->resize(80, 80, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Save the resized image to the public disk
            $path = 'signatures/' . $filename;
            Storage::disk('public')->put($path, (string) $resizedImage->encode());
        }
        DB::beginTransaction();
        try {
            $customer = new SignatureUpload();
            $customer->name = $validatedData['name'];   
            $customer->designation = $validatedData['designation'];   
            $customer->signature = $filename;   
            $customer->status = $validatedData['status'];;   
            $customer->save(); 
            DB::commit();
            return redirect()->route('signature.index')->with('message', 'Successfully done!');
        }catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        } 
    }

    public function edit($id)
    {  
        $signatures = SignatureUpload::find($id);
        return view('pages.signature.edit', compact('signatures'));
    }

    public function update(Request $request, $id) 
    {

        $validatedData = $request->validate([
            'name' => 'required|string',  
            'designation' => 'required|string',   
            'status' => 'required|string',  
        ]); 
        // if ($request->file('signature-file')) {
        //     $request->validate([ 
        //         'signature-file' => 'required|mimes:jpg,jpeg,png,bmp|max:2048',
        //     ]); 
        // }
        $signatureUpload = SignatureUpload::find($id);
        // dd( $signatureUpload );

        if ($request->file('signature-file')) {
            // $signatureFilePath = $request->file('signature-file')->store('signatures', 'public'); 
            $image = $request->file('signature-file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            // Resize the image to 80x80 pixels
            $resizedImage = Image::make($image)->resize(80, 80, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Save the resized image to the public disk
            $path = 'signatures/' . $filename;
            Storage::disk('public')->put($path, (string) $resizedImage->encode());
 
            if (Storage::disk('public')->exists($signatureUpload->signature)) {
                Storage::disk('public')->delete($signatureUpload->signature);
            } 
            $signatureUpload->signature = $path;   
        }
        DB::beginTransaction();
        try {
            // $signatureUpload->update($request->all());
            // $signatureUpload = SignatureUpload::find($id);
            $signatureUpload->name = $validatedData['name'];   
            $signatureUpload->designation = $validatedData['designation'];   
           
            $signatureUpload->status = $validatedData['status'];;   
            $signatureUpload->update(); 
            DB::commit();
            return redirect()->route('signature.index')->with('message', 'Successfully done!');
        }catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        }   
    }

    public function destroy(SignatureUpload $signature) 
    {
        $signature->delete();
        if (Storage::disk('public')->exists($signature->signature)) {
            Storage::disk('public')->delete($signature->signature);
        } 
        return redirect()->route('signature.index');
    }
}
