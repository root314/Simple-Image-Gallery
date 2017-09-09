<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Gallery;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $result = Gallery::where('userid', Auth::id())->get();
        $result_decode = \json_decode($result);
        $totalSize = 0;
        $filePNG = ['type' => '', 'total' => 0, 'totalMB' => 0, 'no' => 0];
        $fileJPG = ['type' => '', 'total' => 0, 'totalMB' => 0, 'no' => 0];
        $noFile = 0;

        foreach ($result_decode as $value) {
            if (!strcmp($value->extension, 'image/png')) {
                $filePNG['type'] = $value->extension;
                $filePNG['total'] = $filePNG['total'] + $value->size;
                $filePNG['no']++;
            }
            else {
                $fileJPG['type'] = $value->extension;
                $fileJPG['total'] = $fileJPG['total'] + $value->size;
                $fileJPG['no']++;
            }
            $totalSize = $totalSize + $value->size;
            $noFile++;
        }

        $totalSizeMB = $this->formatSizeUnits($totalSize);
        $filePNG['totalMB'] = $this->formatSizeUnits($filePNG['total']);
        $fileJPG['totalMB'] = $this->formatSizeUnits($fileJPG['total']);

        $response = ['totalSize' => $totalSize, 'totalSizeMB' => $totalSizeMB, 'noFile' => $noFile, 'files' => []];

        if ($fileJPG['no'] > 0)
            \array_push($response['files'], $fileJPG);
        if ($filePNG['no'] > 0)
            \array_push($response['files'], $filePNG);

        return view('index', \compact('response'));
        // return var_dump($response);
    }

    private function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0.00 MB';
        }

        return $bytes;
}
}
