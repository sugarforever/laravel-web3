<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CIDRecord extends Model
{
    use HasFactory;

    public $fillable = [
        "cid",
        "name"
    ];

    protected function ipfsLink(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes)
            {
                $cid = $attributes["cid"];
                $ipfs_link = "https://ipfs.io/ipfs/{$cid}/";
                return $ipfs_link;
            }
        );
    }
}
