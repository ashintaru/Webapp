<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\hour as oras;

class Hour extends Component
{
    public $hour,$status=1,$hourId;

    public function deleteAs(){
        $list = oras::find($this->hourId);
        $list->delete();
        $this->emit('postDelete');
    }


    public function saveAs(){

        $this->validate([
            'hour'=>'required|min:4'
        ]);

        $list = oras::findOrFail($this->hourId);
        $dt = Carbon::now()->format('Y-m-d');   
        $this->found()==false? $list->hourName = $this->hour : $list->hourName = $list->hourName;
        $list->status = $this->status;
        $list->dateUpdated = $dt;
        $list->update();
        
        $this->emit('postUpdate');
        session()->flash('message','The Data have been save');                


    }

    public function render()
    {
        $data = oras::all();
        $datas = json_decode($data,true);
        return view('livewire.hour',['datas'=>$datas]);
    }

    public function clear(){
        $this->hour = '';
    }

    public function select($id){
        $this->hourId = $id;
        $list = oras::findOrFail($this->hourId);
        $this->hour = $list['hourName'];
        $this->status = $list['status'];
    }


    public function found(){
        $boolean=oras::where('hourName', $this->hour)->exists();
        return $boolean;
    } 


    public function store(){
        $this->validate([
            'hour'=>'required|min:4'
        ]);

        $dt = Carbon::now()->format('Y-m-d');   
        if($this->found()==false){
            oras::create([
                'hourName'=>$this->hour,
                'dateCreated'=>$dt,
                'dateUpdated'=>$dt,
                'status'=>$this->status
            ]);
            session()->flash('message','The Data have been save');                
            $this->emit('postAdded');
        }
    }



}
