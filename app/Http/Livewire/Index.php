<?php

namespace App\Http\Livewire;

use Livewire\Component;
USE App\Models\hour;
use App\Models\type;
use App\Models\company;
use App\Models\category;
use App\Models\job;
use Livewire\WithPagination;
use App\Models\location;
use App\Models\message;
use Illuminate\Support\Carbon;

class Index extends Component
{
    public $search , $loc , $name , $email , $comment;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $locationList = location::all();
        $data = job::select(['CompName','compAdd','objective','requirement','job.dateCreated','typeName','jobTitle','hourName'])
        ->join('company','company.compID','=','job.compId')
        ->join('type','type.typeId','=','job.typeId')
        ->join('category','category.categoryId','=','job.categoryId')
        ->join('hour','hour.hourId','=','job.hourId')
        ->paginate(3);
        // return dd($list);
        return view('livewire.index',['lists'=>$data,'locations'=>$locationList]);

    }
    public function messageSent(){
        $this->validate([
            'name'=>'required|max:20',
            'email'=>'required|email',
            'comment'=>'required|max:300'
        ]);
        $dt = Carbon::now()->format('Y-m-d');   
        message::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'comment'=>$this->comment,
            'status'=>1,
            'dateCreated'=>$dt
        ]);
        $this->clear();
    }

    public function clear(){
        $this->name = '';
        $this->email = '';
        $this->comment = '';
    }
    public function search(){
        $this->validate([
            'search'=>'required',
            'loc'=>'required',
        ]);
        $jobName =$this->search;
        // return dd($jobName);
        return redirect()->to('job-search/'.$jobName.'/'.$this->loc);       
    }

}
