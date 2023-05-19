<?php

namespace App\Http\Livewire;

use Livewire\Component;
USE App\Models\hour;
use App\Models\type;
use App\Models\company;
use App\Models\category;
use App\Models\job as trabaho;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use App\Models\location;


class CreateJob extends Component

{
    public $search1, $hour , $type , $category , $company , $obj , $req , $jobId , $location,$status;
    public $lenght;
    public function render()
    {

        $lenght = strlen($this->req);
        $searchTerm = '%'. $this->search1.'%';

        $data1 = hour::all();
        $data2 = type::all();
        $data3 = company::all();
        $data4 = category::all();
        $data5 = trabaho::select(['jobId','jobTitle','job.dateCreated','job.dateUpdated','job.status','company.CompName'])
        ->join('category','category.categoryId','job.categoryId')
        ->join('company','company.compID','job.compId')
        ->Where('jobTitle','LIKE',$searchTerm)
        ->orWhere('CompName','LIKE',$searchTerm)
        ->orderByRaw("CompName ASC,jobTitle ASC")
        ->get();
        $data6 = trabaho::all();
        $data7 = trabaho::where('status',1)->get();
        $data8 = trabaho::where('status',0)->get();
        $data9 = location::all();


        $jobs = count($data6);
        $negJobs = count($data8);
        $posJobs = count($data7);

        // return dd($jobs);

        $dd1 = json_decode($data1,true);
        $dd2 = json_decode($data2,true);
        $dd3 = json_decode($data3,true);
        $dd4 = json_decode($data4,true);
        $dd5 = json_decode($data5,true);
        $dd9 = json_decode($data9,true);


        // return dd($dd5);


        return view('livewire.create-job',['hours'=>$dd1,'types'=>$dd2,'companies'=>$dd3,'categories'=>$dd4,'jobs'=>$dd5,
                    'jobCount'=>$jobs,'positive'=>$posJobs,'negative'=>$negJobs,'locations'=>$dd9]);
        
    }
    
    public function store(){
        $dt = Carbon::now()->format('Y-m-d');   
        $this->validate([
            'hour'=>'required',
            'type'=>'required',
            'category'=>'required',
            'company'=>'required',
            'obj'=>'required|max:500',
            'req'=>'required|max:500',
            'location'=>'required'
        ]);
        

        trabaho::create([
            'compId'=>$this->company,
            'typeId'=>$this->type,
            'categoryId'=>$this->category,
            'hourId'=>$this->hour,
            'locId'=>$this->location,
            'objective'=>$this->obj,
            'requirement'=>$this->req,
            'dateCreated'=>$dt,
            'dateUpdated'=>$dt,
            'status'=>1
        ]);
        session()->flash('message','The Data have been save');       

        $this->emit('postAdded');
    }

    public function select($id){
        $this->jobId = $id;
        $list = trabaho::find($this->jobId);
        $this->hour = $list->hourId;
        $this->company = $list->compId;
        $this->category = $list->categoryId;
        $this->type = $list->typeId;
        $this->obj = $list->objective;
        $this->req = $list->requirement;
        $this->location = $list->locId;
        $this->status = $list->status;
    }

    public function saveAs(){   
        $this->validate([
            'hour'=>'required',
            'type'=>'required',
            'category'=>'required',
            'company'=>'required',
            'obj'=>'required|max:500',
            'req'=>'required|max:500',
            'location'=>'required'
        ]);
        $list = trabaho::find($this->jobId); 

        $list->hourId = $this->hour;
        $list->compId = $this->company;
        $list->typeId = $this->type;
        $list->categoryId = $this->category;
        $list->objective = $this->obj;
        $list->requirement = $this->req;
        $list->locId = $this->location;
        $list->status = $this->status;
        $list->update();
        $this->emit('postEditted');
        session()->flash('message','The Data have been save');       
 

    }
    public function deleteAs(){
        $list = trabaho::find($this->jobId); 
        $list->delete();
        $this->emit('postDelete');
    }
}
