<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;

if (!function_exists('checkFile')) {
    /**
     * Check if file exists
     *
     * @param  string $file
     * @return bool
     */
    function checkFile($file)
    {
        return Storage::disk('public')->exists($file);
    }
}

if (!function_exists('deleteFile')) {
    /**
     * Check if file exists
     *
     * @param  string $file
     * @return bool
     */
    function deleteFile($file)
    {
        if (checkFile($file)) {
            return Storage::disk('public')->delete($file);
        }

        return false;
    }
}

if (!function_exists('getFile')) {
    /**
     * Get the file path for a given file.
     *
     * @param string $file
     * @return string
     */
    function getFile($file)
    {
        return checkFile($file)
            ? asset("storage/{$file}")
            : asset("storage/default.png");
    }
}

if (!function_exists('getFilename')) {
    /**
     * Get the filename from a given path.
     *
     * @param  mixed $path
     * @param  mixed $withExtension
     * @return string
     */
    function getFilename(string $path, bool $withExtension = true): string
    {
        return $withExtension
            ? basename($path)
            : pathinfo($path, PATHINFO_FILENAME);
    }
}

if (!function_exists('slug')) {
    /**
     * Generate a slug from a given text.
     *
     * @param  string $text
     * @return string
     */
    function slug(string $text, string $separator = '-'): string
    {
        return Str::slug($text, $separator);
    }
}

if (!function_exists('uploadImage')) {
    /**
     * Upload a file and return its slug.
     *
     * @param  object $file
     * @param  string $path
     * @param  int $width
     * @param  int $height
     * @param  int $quality
     *
     * @return string
     */
    function uploadImage(
        object $image,
        string $path = 'uploads',
        int $width = 800,
        int $height = 600,
        int $quality = 75,
    ): string {
        $manager = new ImageManager(Driver::class);

        // Convert the image to a cover with specified dimensions
        $imageRead = $manager->read($image)->cover($width, $height);
        $imageEncoded = $imageRead->encode(new AutoEncoder(quality: $quality));
        $imageName = "{$path}/{$image->hashName()}";

        // Ensure the directory exists
        Storage::disk('public')->put($imageName, $imageEncoded);

        return $imageName;
    }
}
