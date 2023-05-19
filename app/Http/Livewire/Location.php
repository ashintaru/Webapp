<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\location as lokasyon;
use Illuminate\Support\Carbon;


class Location extends Component
{
    public $location, $locId;
    public function render()
    {
        $datas = lokasyon::all();
        return view('livewire.location',['datas'=>$datas]);
    }
    public function store(){
        $dt = Carbon::now()->format('Y-m-d');   
        $boolean=lokasyon::where('locName', $this->location)->exists();

        if(!$boolean){
            $this->validate([
                'location'=>'required|min:3'
            ]);    

            lokasyon::create([
                'locName'=>$this->location,
                'dateUpdated'=>$dt,
                'dateCreated'=>$dt
            ]);
            session()->flash('message','The Data have been save');                
            $this->emit('postAdded');
           
       }else{
           session()->flash('error','The Data have not been save');                
           $this->emit('postAdded');
           
       }

    }
    public function select($id){
        $this->locId = $id;
        $list = lokasyon::find($this->locId);
        $this->location = $list->locName;
        // return dd($list);
    }
    
    public function saveAs(){
        $this->validate([
            'location'=>'required|min:3'
        ]);    

        $list = lokasyon::find($this->locId);
        $list->locName = $this->location;
        $dt = Carbon::now()->format('Y-m-d');   
        $list->dateUpdated = $dt;
        $list->update();
        $this->emit('postEditted');
        session()->flash('message','The Data have been save');      
    }
    public function deleteAs(){
        $list = lokasyon::find($this->locId); 
        $list->delete();
        $this->emit('postDelete');
    }
    public function clear(){
        $this->location = '';
        $this->locId = '';
    }
}
