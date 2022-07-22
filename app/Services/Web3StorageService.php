<?php

namespace App\Services;

use App\Models\CIDRecord;
use App\Web3\Storage\APIClient;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

class Web3StorageService implements IPFSStorageService
{
    private $domain = "https://api.web3.storage";

    private $apiClient;
    public function __construct(APIClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function store($fileContent, $fileName)
    {
        $cid = $this->apiClient->upload(env("WEB3_STORAGE_KEY"), $fileContent, $fileName);
        Log::debug("CID returned by the web3.storage API: " . $cid);
        if ($cid) {
            CIDRecord::firstOrCreate(
                [
                    "cid" => $cid               
                ],
                [
                    "name" => $fileName
                ]
            );
        }
        $ipfs_link = "https://ipfs.io/ipfs/{$cid}/{$fileName}";
        return $ipfs_link;
    }

    public function getList()
    {
        $response = Http::withHeaders([
            "Authorization" => "Bearer " . env("WEB3_STORAGE_KEY")
        ])->get($this->domain . "/user/uploads")->json();

        $stored_files = [];
        foreach ($response as $item) {
            $cid = $item["cid"];
            $ipfs_link = "https://ipfs.io/ipfs/{$cid}/";
            $stored_files[] = $ipfs_link;
        }

        return $stored_files;
    }
}
