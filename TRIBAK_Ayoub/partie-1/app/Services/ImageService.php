<?php

namespace App\Services;

use App\Models\ImageMotivation;

class ImageService
{
    public function getImagesWithSupport()
    {
        return ImageMotivation::with(['employe', 'supportMotivations.typeMotivations'])->get();
    }

    public function incrementImageViews(ImageMotivation $image)
    {
        $image->increment('views');
    }

    public function incrementSupportViews(ImageMotivation $image)
    {
        foreach ($image->supportMotivations as $support) {
            $support->increment('views');
        }
    }
}
