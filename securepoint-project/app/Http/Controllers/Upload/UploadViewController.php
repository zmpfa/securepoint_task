<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;

class UploadViewController extends Controller
{
    public function __invoke()
    {

        return view('pages.dashboard');
    }

}
