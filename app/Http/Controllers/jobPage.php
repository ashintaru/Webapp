<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\location;
use App\Models\job;
class jobPage extends Controller
{
    //
    public $search,$loc;

    public function index1(Request $req){
        // return dd($this->search = $search);
        return $req->input(); 
        // $this->search = $search;
        // $this->loc= $id;
        // $locations = location::all();
        // $searchTerm1 = '%'. $this->search.'%';
        // $searchTerm2 = '%'. $this->loc.'%';

        // $data = job::Where('jobTitle','LIKE',$searchTerm1)
        // -> Where('locId','LIKE',$searchTerm2)
        // ->select(['CompName','compAdd','objective','requirement','job.dateCreated','typeName','jobTitle','hourName'])
        // ->join('company','company.compID','=','job.compId')
        // ->join('type','type.typeId','=','job.typeId')
        // ->join('category','category.categoryId','=','job.categoryId')
        // ->join('hour','hour.hourId','=','job.hourId')
        // ->paginate(20);
        // // $datas = json_encode($data,true);
        // // return dd($data);
        // return view('job-pages', ['locations'=>$locations,'lists'=>$data]);
        
    }
    public function index($search,$id){
        // return dd($this->search = $search);
        // return $req->input(); 
        $this->search = $search;
        $this->loc= $id;
        $locations = location::all();
        $searchTerm1 = '%'. $this->search.'%';
        $searchTerm2 = '%'. $this->loc.'%';

        $data = job::Where('jobTitle','LIKE',$searchTerm1)
        -> Where('locId','LIKE',$searchTerm2)
        ->select(['CompName','compAdd','objective','requirement','job.dateCreated','typeName','jobTitle','hourName'])
        ->join('company','company.compID','=','job.compId')
        ->join('type','type.typeId','=','job.typeId')
        ->join('category','category.categoryId','=','job.categoryId')
        ->join('hour','hour.hourId','=','job.hourId')
        ->paginate(20);
        // $datas = json_encode($data,true);
        // return dd($data);
        return view('job-pages', ['locations'=>$locations,'lists'=>$data]);
        
    }
    
}
