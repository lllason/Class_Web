<?php
 
namespace App\Http\Controllers;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class FileUploadController extends Controller
{
    public function getFileUploadForm()
    {
        return view('file-upload');
    }
 
    public function store(Request $request)
    {
        // 檢查必填，檔案類型，檔案大小
        $request->validate([
            'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
        ]);
 
        $fileName = $request->file->getClientOriginalName();
        $filePath = 'uploads/' . $fileName;
 
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->file));
        $path = Storage::disk('public')->url($path);
 
        // Perform the database operation here
 
        return back()
            ->with('success','File has been successfully uploaded.');
    }
}
