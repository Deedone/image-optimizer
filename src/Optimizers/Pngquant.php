<?php

namespace Spatie\ImageOptimizer\Optimizers;

use Spatie\ImageOptimizer\Image;

class Pngquant extends BaseOptimizer
{
    public $binaryName = 'pngquant';

    public function canHandle($image)
    {
        return $image->mime() === 'image/png';
    }

    public function getCommand()
    {
        $optionString = implode(' ', $this->options);

        return "\"{$this->binaryPath}{$this->binaryName}\" {$optionString}"
            .' '.escapeshellarg($this->imagePath)
            .' --output='.escapeshellarg($this->imagePath);
    }
}
