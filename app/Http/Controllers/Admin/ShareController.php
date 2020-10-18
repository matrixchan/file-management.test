<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UploadsManager;

class ShareController extends Controller
{
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * 上传文件
     */
    public function shareFile(Request $request)
    {


        $share_file = $request->get('share_file');
        $path = $request->get('folder') . '/' . $share_file;
 
        $url = $this->manager->fileWebPath($path);
        return redirect()->back()->with("success",  "下载地址: ".$url );

    }

 

}