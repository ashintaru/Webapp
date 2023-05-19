<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\event as activity;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use App\Models\guest;
use Illuminate\Support\Carbon;

class Event extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public  $eventId, $action, $eventTitle,$eventPlace,$eventDate,$search1,$eventType,$photo,$geust;
    public function mount(){
        $guest = $this->geust;
    }
    public function render()
    {



        $from = Carbon::now()->format('Y-m-d');
        $to= Carbon::now()->addMonths(6)->format('Y-m-d');
        // $data1 = activity::whereBetween('eventDate', [$from, $to])->OrderBy('eventDate','asc')->offset(0)->limit(5)->get();
        $searchTerm = '%'. $this->search1.'%';
        $data = activity::Where('eventTitle','LIKE',$searchTerm)->paginate(20);
        $guests = guest::where('eventId',$this->geust)->get();

        // $data1 = guest::join('eventtb','eventtb.eventId','=','guests.eventId')
        // ->orderByRaw("eventtb.eventId ASC,lname ASC")
        // ->get();


        // return dd( json_decode($data1,true));
        
        return view('livewire.event',['results'=>$data,'guest'=>$guests]);
    }
    public function viewAs($id){
        $list = activity::find($id);
        $this->geust = $list->eventId;

        // return dd($this->geust);

        $this->eventId = $id;
        $this->eventTitle = $list->eventTitle;
        $this->action ='edit';
    }
    public function edit($id){
        $list = activity::find($id);
        $this->eventId = $id;
        $this->eventTitle = $list->eventTitle;
        $this->action ='edit';
    }
    public function saveAs(){   
        $list = activity::find($this->eventId); 
        $this->validate([
            'eventTitle'=>'required',
        ]);

        $list->eventTitle = $this->eventTitle;
        $list->update();
        $this->emit('postEditted');

    }
    public function select($id){
        $this->eventId = $id;
        $list = activity::find($this->eventId);
        // return dd('click');
        $this->eventTitle = $list->eventTitle;
    

    }
    public function deleteAs(){
        $list = activity::find($this->eventId);
        Storage::disk('public')->delete($list->image);
        $list->delete();
        $this->emit('postDelete');

    }
    public function uploadPhotos(){

        if($this->photo!=null){
            $name = Str::random().'.jpg';
            $img = ImageManagerStatic::make($this->photo)->encode('jpg');
            Storage::disk('public')->put($name,$img);
        }else{
            return 0; 
        }

        return $name;
        
    }
    public function save(){

        $boolean=activity::where('eventTitle', $this->eventTitle)->exists();
        // return dd($boolean);

        
        if($boolean!=true){
            $this->validate([
                'eventTitle'=>'required',
            ]);

            // $this->photo->store('photos');
            // Storage::disk('public')->put($this->photo, 'Contents');
            // $this->photo->storeAs('photos', 'avatar');
            // $this->photo->store('photos', 's3');
            activity::create(
                [
                    'eventTitle'=>$this->eventTitle,
                ]
            );
            session()->flash('message','The Data have been save');                
             $this->emit('postAdded');
            
        }else{
            session()->flash('error','The Data have not been save');                
            $this->emit('postAdded');
            
        }

    }
    public function goTo($id)
    {
            return redirect()->to('event/'.$id); 
    }

}
