<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class MediaService
{
    protected $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }

    /**
     * Process an image: Resize, Convert to WebP, and add Watermark.
     */
    public function process(UploadedFile $file, $folder = 'uploads', $width = 1200, $height = null, $quality = 80)
    {
        $image = $this->manager->read($file->getRealPath());

        // Resize if needed
        if ($width || $height) {
            $image->scale(width: $width, height: $height);
        }

        // Add Watermark (Professional Name/Brand)
        $image->text('Albalahy', $image->width() - 20, $image->height() - 20, function ($font) {
            $font->size(24);
            $font->color('ffffff');
            $font->align('right');
            $font->valign('bottom');
        });

        // Generate Filename
        $filename = Str::random(20) . '.webp';
        $path = "{$folder}/{$filename}";

        // Save to storage as WebP
        $encoded = $image->toWebp($quality);
        Storage::disk('public')->put($path, (string) $encoded);

        return "{$folder}/{$filename}";
    }

    /**
     * Delete an image from storage.
     */
    public function delete($path)
    {
        if (!$path) return;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
