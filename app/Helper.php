<?php

use Illuminate\Support\Facades\Storage;

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
