<?php

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface FileUploadContract
{
    /**
     * @param UploadedFile $file
     * @return string
     */
    public function uploadImage (UploadedFile $file, string $folder):string;

    public function removeFile(string $path):bool;
}
