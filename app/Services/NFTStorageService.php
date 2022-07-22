<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

class NFTStorageService implements IPFSStorageService
{
    private $domain = "https://api.nft.storage";

    public function store($fileContent, $fileName)
    {
        $response = Http::withHeaders([
            "Authorization" => "Bearer " . env("NFT_STORAGE_KEY")
        ])->attach("file", $fileContent, $fileName)
            ->post($this->domain . "/upload")
            ->json();

        $cid = Arr::get($response, "value.cid");

        $ipfs_link = "https://ipfs.io/ipfs/{$cid}/{$fileName}";
        return $ipfs_link;
    }

    public function getList()
    {
        $response = Http::withHeaders([
            "Authorization" => "Bearer " . env("NFT_STORAGE_KEY")
        ])->get($this->domain)->json();

        $stored_files = [];
        foreach ($response['value'] as $item) {
            $cid = $item["cid"];
            if (sizeof($item["files"]) > 0) {
                foreach ($item["files"] as $file) {
                    $name = $file["name"];
                    $ipfs_link = "https://ipfs.io/ipfs/{$cid}/{$name}";

                    $stored_files[] = $ipfs_link;
                }
            } else {
                $ipfs_link = "https://ipfs.io/ipfs/{$cid}/";
                $stored_files[] = $ipfs_link;
            }
        }

        return $stored_files;
    }
}
