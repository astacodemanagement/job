<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class CvController extends Controller
{

   
    public function previewCv($id){
        $path =  public_path('upload/cv/'.$id.'.pdf');
        $id = hashId($id, 'decode');
        $data['kandidat'] = Kandidat::find($id)->first();
        // return $kandidat;
        if (!$data) {
            return response()->json(['error' => 'Kandidat tidak ditemukan'], 404);
        }

     
        $htmlContent = view('back.cv.index', $data)->render();
        Browsershot::html($htmlContent)
            ->format('A4')
            ->savePdf($path);
   
        return response()->file($path);

    }
}
