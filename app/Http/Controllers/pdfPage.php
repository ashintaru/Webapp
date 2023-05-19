<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guest;

use Codedge\Fpdf\Fpdf\Fpdf ;
use Illuminate\Support\Carbon;

class pdfPage extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function index(){

        $dt = Carbon::now()->format('F d Y ');
        
        $this->fpdf->SetFont('Arial','',8);
        $this->fpdf->AddPage("L", ['240','260']);
        // $this->fpdf->Header();

        // $this->fpdf->Cell(0, 10, "Title" . ' '.$prList->Title, 0, 1,);
        // $this->fpdf->Cell(0, 10, "Memo" . ' '. $prList->memo, 0, 1,);
        // $this->fpdf->ln();
        $this->fpdf->Cell(20);
        $this->fpdf->Cell(50,10,"Date Issued".' '.'-'.' '.$dt,0,0);
        $this->fpdf->Cell(200,10,"Guest List",0,0,'C');
        $this->fpdf->ln();
        $this->fpdf->SetTextColor(255,255,255);
        $this->fpdf->SetFillColor(0,0,0);
        $this->fpdf->Cell(40,10,"First Name",1,0,'C','True');
        $this->fpdf->Cell(40,10,"Middle Name",1,0,'C','True');
        $this->fpdf->Cell(40,10,"Last Name",1,0,'C','True'); 
        $this->fpdf->Cell(40,10,"Table Number",1,0,'C','True'); 
        $this->fpdf->Cell(40,10,"Control Number",1,0,'C','True'); 
        $this->fpdf->Cell(40,10,"signature",1,0,'C','True'); 

        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetDrawColor(0);
        $this->fpdf->ln();               
        $data = guest::join('eventtb','eventtb.eventId','guests.eventId')
        ->orderByRaw("eventtb.eventId ASC,lname ASC")->get();
        $rawData = json_decode($data,true);
        // return dd($rawData);
        $index = count($rawData);

        for($i=1;$i<=$index;$i++){
                $this->fpdf->Cell(40,10,$data[$i-1]['fname'],1,0,'C');
                $this->fpdf->Cell(40,10,$data[$i-1]['mname'],1,0,'C');
                $this->fpdf->Cell(40,10,$data[$i-1]['lname'],1,0,'C');
                $this->fpdf->Cell(40,10,$data[$i-1]['eventTitle'],1,0,'C');
                $this->fpdf->Cell(40,10,$data[$i-1]['serialNum'],1,0,'C');
                $this->fpdf->Cell(40,10,'',1,0,'C');


                $this->fpdf->ln();
            }
    

        $this->fpdf->Output();
        exit;
    }

}
