<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

class SafeImageUpload implements ValidationRule
{
    public function __construct(
        protected int $maxKilobytes = 2048,
    ) {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $value instanceof UploadedFile) {
            $fail('The '.$attribute.' field must be a valid image file.');
            return;
        }

        if (! $value->isValid()) {
            $fail('The '.$attribute.' file is invalid.');
            return;
        }

        if ($value->getSize() > ($this->maxKilobytes * 1024)) {
            $fail('The '.$attribute.' must not exceed '.$this->maxKilobytes.' kilobytes.');
            return;
        }

        $allowedMimeTypes = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/webp',
        ];

        $clientMime = $value->getClientMimeType();
        $realMime = $value->getMimeType();

        if (is_string($clientMime) && ! in_array($clientMime, $allowedMimeTypes, true)) {
            $fail('The '.$attribute.' must be a valid JPEG, PNG, GIF, or WebP image.');
            return;
        }

        if (is_string($realMime) && ! in_array($realMime, $allowedMimeTypes, true)) {
            $fail('The '.$attribute.' must be a valid JPEG, PNG, GIF, or WebP image.');
            return;
        }

        $realPath = $value->getRealPath();
        if (is_string($realPath) && $realPath !== '' && file_exists($realPath)) {
            $imageInfo = @getimagesize($realPath);
            if ($imageInfo === false) {
                $fail('The '.$attribute.' is not a valid image file.');
                return;
            }

            $detectedMime = $imageInfo['mime'] ?? null;
            if (is_string($detectedMime) && ! in_array($detectedMime, $allowedMimeTypes, true)) {
                $fail('The '.$attribute.' must be a valid JPEG, PNG, GIF, or WebP image.');
            }
        }
    }
}
