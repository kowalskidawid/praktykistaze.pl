<?php


namespace App\Http\Traits;

use function GuzzleHttp\Psr7\mimetype_from_extension;

trait CvFile
{
    public function getMimeType(string $cvPath): string
    {
        $extension = $this->getExtension($cvPath);
        return mimetype_from_extension($extension);
    }

    public function canOpenFileType(string $cvPath): bool
    {
        $extension = $this->getExtension($cvPath);
        $canOpen = false;
        if (in_array($extension, ['pdf', 'jpg', 'png', 'jpeg', 'gif', 'txt'])) {
            $canOpen = true;
        }
        return $canOpen;
    }

    private function getExtension(string $cvPath): string
    {
        $cvPath = explode('.', $cvPath);
        $extension = end($cvPath);
        return $extension;
    }
}
