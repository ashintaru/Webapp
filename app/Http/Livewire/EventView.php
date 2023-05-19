<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;
use App\Models\event;

class EventView extends Component
{
    public function render()
    {

        $from = Carbon::now()->addMonths(-1)->format('Y-m-d');
        $to= Carbon::now()->addMonths(1)->format('Y-m-d');
        $now = Carbon::now()->format('Y-m-d');
        // return dd($to);
        $lists =  event::whereBetween('eventDate', [$from, $to])->where('eventType',0)->OrderBy('eventDate','asc')->get();
        $lists1 =  event::where('eventDate',$now)->limit(1)->get();
        // return dd($lists);
        $data1 = json_decode($lists1,true);
        // return dd($lists);
        return view('livewire.event-view',['lists1'=>$data1,'lists'=>$lists]);
    }
}
