<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\location;
use App\Models\job;

class PageJobs extends Component
{
    public $search,$loc;
    
    public function mount($name,$id){
        $this->search = $name;
        $this->loc= $id;
        // return dd($name);
        
    }
    public function render()
    {
        $locations = location::all();
        $searchTerm1 = '%'. $this->search.'%';
        $searchTerm2 = '%'. $this->loc.'%';

        $data = job::Where('jobTitle','LIKE',$searchTerm1)
        ->Where('locId','LIKE',$searchTerm2)
        ->select(['CompName','compAdd','objective','requirement','job.dateCreated','typeName','jobTitle','hourName','job.status'])
        ->join('company','company.compID','=','job.compId')
        ->join('type','type.typeId','=','job.typeId')
        ->join('category','category.categoryId','=','job.categoryId')
        ->join('hour','hour.hourId','=','job.hourId')
        ->where('job.status',1)
        ->paginate(20);
        return view('livewire.page-jobs',['locations'=>$locations,'lists'=>$data]);
    }
}
