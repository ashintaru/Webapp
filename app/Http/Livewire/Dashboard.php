<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\job;
use App\Models\message;
class Dashboard extends Component
{
    public function render()
    {
        $data6 = job::all();
        $data1 = message::where('status',1)->get();
        $jobs = count($data6);
        $messages = count($data1);
        return view('livewire.dashboard',['totalJob'=>$jobs,'totalMessage'=>$messages]);
    }
}
