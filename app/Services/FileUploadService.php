<?php

namespace App\Services;

use App\Services\Contracts\FileUploadContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class FileUploadService implements FileUploadContract
{

    public function uploadImage(UploadedFile $file, string $folder): string
    {
        $path = $file->storeAs($folder, $file->hashName(), 'upload');
        if (!$path) {
            throw new UploadException(__('messages.admin.upload'));
//            return back()->with('error', __('messages.admin.upload'));
        }
        return $path;

    }

    public function removeFile(string $path): bool
    {
        return Storage::disk('upload')->delete($path);
    }
}
