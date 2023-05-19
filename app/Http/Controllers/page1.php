<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf as file;

class page1 extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new file;
    }


    public function index() 
    {
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage("L", ['100', '100']);
        $this->fpdf->Text(10, 10, "Hello World!");       

        $this->fpdf->Output();

        exit;
    }
}
