<?php

namespace App\Http\Controllers\Pdf;

use App\Models\Incidence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneratePdfController extends Controller
{
    public function pdfIncidence($id){
        $incidence = Incidence::findOrfail($id);
        $data = [
            'title' => 'First PDF for Medium',
            'heading' => 'Hello from 99Points.info',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'
        ];

        $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('medium.pdf');
    }
}
