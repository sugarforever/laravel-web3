<?php

namespace App\Http\Controllers;

use App\Services\IPFSStorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FilesController extends Controller
{
    public function index(Request $request)
    {
    }

    public function upload(Request $request, IPFSStorageService $ipfsStorageService)
    {
        $uploadedFile = $request->uploaded_file;
        $name = $uploadedFile->getClientOriginalName();
        $content = $uploadedFile->getContent();
        Log::debug("File name: " . $name);

        $ipfs_link = $ipfsStorageService->store($content, $name);
        Log::debug("IPFS link: " . $ipfs_link);
        return redirect()->route("dashboard");
    }
}
