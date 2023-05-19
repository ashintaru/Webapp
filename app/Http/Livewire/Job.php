<?php

namespace App\Http\Livewire;


use Livewire\Component;
USE App\Models\hour;
use App\Models\type;
use App\Models\company;
use App\Models\category;
use App\Models\location;
use App\Models\job as trabaho;
use Illuminate\Support\Carbon;



class Job extends Component
{   

    public $hour , $type , $category , $company , $obj , $req ,$img;

    public function render()
    {

        $data1 = hour::all();
        $data2 = type::all();
        $data3 = company::all();
        $data4 = category::all();
        $data5 = location::all();


        $dd1 = json_decode($data1,true);
        $dd2 = json_decode($data2,true);
        $dd3 = json_decode($data3,true);
        $dd4 = json_decode($data4,true);
        $dd5 = json_decode($data5,true);

        return view('livewire.job',['hours'=>$dd1,'types'=>$dd2,'companies'=>$dd3,'categories'=>$dd4,'locations'=>$dd5]);
    }

    public function store(){
        $dt = Carbon::now()->format('Y-m-d');   
        $this->validate([
            'compId'=>'required',
            'typeId'=>'required',
            'categoryId'=>'required',
            'hourId'=>'required',
            'objective'=>'required|max:500',
            'requirement'=>'required|max:500',
        ]);
        

        trabaho::create([
            'compId'=>$this->company,
            'typeId'=>$this->type,
            'categoryId'=>$this->category,
            'hourId'=>$this->hour,
            'objective'=>$this->obj,
            'requirement'=>$this->req,
            'dateCreated'=>$dt,
            'dateUpdated'=>$dt,
            'status'=>1
        ]);
        session()->flash('message','The Data have been save');       

        $this->emit('postAdded');




    }
}
