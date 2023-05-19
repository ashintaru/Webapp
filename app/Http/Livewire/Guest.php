<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\event;
use App\Models\guest as bisita;
USE App\Models\plusOne;

class Guest extends Component
{
    public $guestID, $eventId ,$fname,$mname,$lname,$address,$award,$serialNum,$search,$pOID,$dept;
    public function mount($id){
        $this->eventId = $id;
        // return dd($id);
    }
    public function clear(){
        $this->fname = '';
        $this->mname = '';
        $this->lname = '';
        $this->address = '';
        $this->award = '';
        $this->dept = '';
    }
    public function selectThis($id){
        $this->guestID = $id;
        $list = bisita::findOrFail($this->guestID);
        $this->fname = $list->fname;
        $this->mname = $list->mname;
        $this->lname = $list->lname;
        $this->address = $list->address;
        $this->dept = $list->department;
        $this->award = $list->award;
    }

    public function selectThis2($id){
        $this->pOID = $id;
        $this->emit('postView');
        $list = plusOne::findOrFail($this->pOID);
        $this->fname = $list->fname;
        $this->mname = $list->mname;
        $this->lname = $list->lname;
        $this->address = $list->address;
    }

    public function selectThis1($id){
        $this->guestID = $id;
        $this->clear();
    }
    public function deleteThis(){
        $list = bisita::find($this->guestID);
        $list->delete();
        $this->emit('postDelete');
    }

    public function saveEdit(){
        $data = bisita::findOrFail($this->guestID);
        $data->fname = $this->fname;
        $data->mname = $this->mname;
        $data->lname = $this->lname;
        $data->address = $this->address;
        $data->award = $this->award;
        $data->department = $this->dept;
        $data->update();
        $this->emit('postUpdate');

    }
    public function saveEdit1(){
        $data = plusOne::findOrFail($this->pOID);
        $data->fname = $this->fname;
        $data->mname = $this->mname;
        $data->lname = $this->lname;
        $data->address = $this->address;
        $data->update();
        $this->emit('postUpdate');

    }

    public function saveAsPlusOne(){

        $this->validate([
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
        ]);

        plusOne::create([
            'guestID'=>$this->guestID,
            'fname'=>$this->fname,
            'mname'=>$this->mname,
            'lname'=>$this->lname,
            'address'=>$this->address,
        ]);

        $data = bisita::findOrFail($this->guestID);
        $data->plusOneStatus = 1;
        $data->update();
        $this->emit('postSave1');
    }
    public function saveAs(){
        $this->validate([
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required'
        ]);


        $this->serialNum = $this->getSerialNum();
        if(!$this->found())
            $this->serialNum = $this->getSerialNum();


        bisita::create([
            'eventId'=>$this->eventId,
            'fname'=>$this->fname,
            'mname'=>$this->mname,
            'lname'=>$this->lname,
            'address'=>$this->address,
            'award'=>$this->award,
            'department'=>$this->dept,

            'status'=>1,
            'serialNum'=>$this->serialNum,
            'plusOneStatus'=>0
        ]);
        $this->emit('postSave');
    }
    public function found(){
        $boolean=bisita::where('serialNum', $this->serialNum)->exists();
        return $boolean;    
    }
  
    public function getSerialNum(){
        $serialDigit='';
        $randomString = Str::random(9);
        $randomNumber = random_int(100000, 999999);
        $serialDigit = $randomString.'-'.$randomNumber;
        return $serialDigit ;

    }
    public function view($id){
        $data = bisita::where('gustId',$id)->get();
        $this->guestID = $id;
        // return dd($plusOne);
        $data1 = json_decode($data,true);
        $this->fname = $data1[0]['fname'];
        $this->mname = $data1[0]['mname'];
        $this->lname = $data1[0]['lname'];

        $this->address = $data1[0]['address'];
        $this->award = $data1[0]['award'];
        $this->dept = $data1[0]['department'];
        $this->serialNum = $data1[0]['serialNum'];

    }
    public function render()
    {
        $thisSearch = '%' . $this->search . '%';
        $event = event::findOrFail($this->eventId);
        $guest = bisita::where('eventId','=',$this->eventId)
        ->Where('lname','LIKE',$thisSearch)
        ->get();
        $data1 = json_decode($guest,true);
    //    dd($data1);

        $plusOne = plusOne::where('guestID',$this->guestID)->get();
       $data = json_decode($event,true);
       $totalGuest = bisita::where('eventId',$this->eventId)->get();
       $datas = json_decode($totalGuest,true);
    //    return dd(count($datas));

        return view('livewire.guest',['event'=>$data,'index'=>1,'guests'=>$data1,'plusOne'=>$plusOne,'totalCount'=>count($datas)]);
    }

    // public function render()
    // {
    //     return view('livewire.guest');
    // }
}
