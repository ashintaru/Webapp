<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\location;

class Search extends Component
{
       public $search , $loc;
    public function render()
    {
        $locationList = location::all();
        return view('livewire.search',['locations'=>$locationList]);
    }
    public function search(){
        $jobName =$this->search;
        // return dd($jobName);
        return redirect()->to('job-search/'.$jobName.'/'.$this->loc);       
    }
}
