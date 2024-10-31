<?php

namespace App\Http\Controllers;

use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Shape\RichText;

class ExternalmediaController extends Controller
{
    public function index()
    {
        return view('/powerpoint');
    }

    public function presentation()
    {

        $presentation = new PhpPresentation;
        $slide1 = $presentation->getActiveSlide();
        $title = new RichText;
        $title->createTextRun('Welcome to Laravel Livewire PowerPoint Export');
        $slide1->addShape($title);

        $filePath = storage_path('presentations/presentation.pptx');
        $writer = IOFactory::createWriter($presentation, 'PowerPoint2007');
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
