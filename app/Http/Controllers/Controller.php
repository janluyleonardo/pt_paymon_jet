<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveVideo($request)
    {
        $dataFolder = 'Courses-' . now()->format('Y-m-d');
        $mediaFile = $request->file('courseFileInput');
        $mediaPath = "VIDEOS/{$dataFolder}/{$mediaFile->getClientOriginalName()}";
        try {
            Storage::disk('public')->put($mediaPath, file_get_contents($mediaFile));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return $mediaPath;
    }
}