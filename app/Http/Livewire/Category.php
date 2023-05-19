<?php

namespace App\Http\Livewire;

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Carbon;
use App\Models\category as listahan; 
use Livewire\Component;

class Category extends Component
{

   public $category , $status = 1 , $catId;

    public function render()
    {
        $data = listahan::all();
        $datas = json_decode($data,true);
        return view('livewire.category',['datas'=>$datas]);
    }

    public function clear(){
        $this->category ='';
    }

    public function deleteAs(){
        $list = listahan::find($this->catId);
        $list->delete();
        $this->emit('postDelete');
    }

    public function saveAs(){

        $this->validate([
            'category'=>'required|min:4'
        ]);

        $list = listahan::findOrFail($this->catId);
        $dt = Carbon::now()->format('Y-m-d');   
        $list->jobTitle = $this->category;
        $list->status = $this->status;
        $list->dateUpdate = $dt;
        $list->update();
        
        $this->emit('postUpdate');
        session()->flash('message','The Data have been save');                


    }
    public function select($id){
        $this->catId = $id;
        $list = listahan::findOrFail($this->catId);
        $this->category = $list['jobTitle'];
        $this->status = $list['status'];
    }
    
    public function found(){
        $boolean=listahan::where('jobTitle', $this->category)->exists();
        return $boolean;
    } 

    public function store(){
        $this->validate([
            'category'=>'required|min:4'
        ]);

        $dt = Carbon::now()->format('Y-m-d');   
        if($this->found()==false){
            listahan::create([
                'jobTitle'=>$this->category,
                'dateUpdate'=>$dt,
                'dateCreated'=>$dt,
                'status'=>$this->status
            ]);
            session()->flash('message','The Data have been save');                
            $this->emit('postAdded');
        }
    }
}
