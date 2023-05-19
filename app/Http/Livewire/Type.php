<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\type as tipo;
use PhpParser\JsonDecoder;

class Type extends Component
{
    public $type , $status =1 , $typeId;

    public function render()
    {
        $data = tipo::all();
        $datas = json_decode($data,true);

        return view('livewire.type',['datas'=>$datas]);
    }

    public function clear(){
        $this->type = '';
    }

    public function found(){
        $boolean=tipo::where('typeName', $this->type)->exists();
        return $boolean;
    } 

    public function deleteAs(){
        $list = tipo::find($this->typeId);
        $list->delete();
        $this->emit('postDelete');
    }

    public function saveAs(){

        $this->validate([
            'type'=>'required|min:4'
        ]);

        $list = tipo::findOrFail($this->typeId);
        $dt = Carbon::now()->format('Y-m-d');   
        $this->found()==false? $list->typeName = $this->type : $list->typeName = $list->typeName;
        $list->status = $this->status;
        $list->dateUpdated = $dt;
        $list->update();
        
        $this->emit('postUpdate');
        session()->flash('message','The Data have been save');                


    }


    public function select($id){
        $this->typeId = $id;
        $list = tipo::findOrFail($this->typeId);
        $this->type = $list['typeName'];
        $this->status = $list['status'];
    }

    public function store(){
        $this->validate([
            'type'=>'required|min:4'
        ]);

        $dt = Carbon::now()->format('Y-m-d');   
        if($this->found()==false){
            tipo::create([
                'typeName'=>$this->type,
                'dateCreated'=>$dt,
                'dateUpdated'=>$dt,
                'status'=>$this->status
            ]);
            session()->flash('message','The Data have been save');                
            $this->emit('postAdded');
        }
    }


}
