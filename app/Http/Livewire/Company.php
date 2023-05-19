<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\company as kumpanya;

class Company extends Component
{

    public $company,$address,$person,$phone,$date,$captcha,$compID;
    public function render()
    {

        $data = kumpanya::all();
        $datas = json_decode($data,true);
        // return dd($datas);
        return view('livewire.company',['datas'=>$datas]);
    }

    public function store(){
        $this->validate([
            'company'=>'required|min:3|max:50',
            'address'=>'required|min:3|max:50',
            'person'=>'required|min:3|max:50',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'date'=>'required',
        ]);

        $dt = Carbon::now()->format('Y-m-d');

        if($this->found()==false){
            kumpanya::create([     
                'CompName'=>$this->company,
                'compAdd'=>$this->address,
                'Personel'=>$this->person,
                'phone'=>$this->phone,
                'endDate'=>$this->date,
                'dateCreated'=>$dt,
                'dateUpdate'=>$dt,
                'status'=>1
            ]);    
            session()->flash('message','The Data have been save');                
            $this->emit('postAdded');
        }
        else{
            session()->flash('message','The Data have been exsist');                
        }
    }

    public function select($id){
        $this->clear();

        $this->compID = $id;
        $list = kumpanya::find($this->compID);
        // return dd('click');
        $this->company = $list->CompName;
        $this->address = $list->compAdd;
        $this->person = $list->Personel;
        $this->phone = $list->phone;
        $this->date = $list->endDate;
    }

    public function found(){
        $boolean=kumpanya::where('CompName', $this->company)->exists();
        return $boolean;
    } 
    public function saveAs(){
        $this->validate([
            'company'=>'required|min:3|max:50',
            'address'=>'required|min:3|max:50',
            'person'=>'required|min:3|max:50',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'date'=>'required',
        ]);
        $dt = Carbon::now()->format('Y-m-d');   
        $list = kumpanya::find($this->compID);
        $this->found()==false? $list->CompName = $this->company : $list->CompName = $list->CompName;
        $list->compAdd = $this->address;
        $list->Personel = $this->person;
        $list->phone = $this->phone;
        $list->endDate = $this->date;
        $list->dateUpdate = $dt;
        $list->update();
            $this->emit('postUpdate');
            session()->flash('message','The Data have been save');                
    }


    public function clear(){
        $this->company = '';
        $this->address = '';
        $this->person = '';
        $this->phone = '';
        $this->date = '';
    }

    public function deleteAs(){
        $list = kumpanya::find($this->compID);
        $list->delete();
        $this->emit('postDelete');
    }

    public function reload(){

        return Captcha::create();
        // return captcha_img();
    }
}
