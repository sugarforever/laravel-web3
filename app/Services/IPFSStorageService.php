<?php

namespace App\Services;

interface IPFSStorageService {

    public function store($fileContent, $fileName);

    public function getList();
}