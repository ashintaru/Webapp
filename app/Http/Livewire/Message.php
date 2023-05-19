<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\message as mensahe;


class Message extends Component
{
    public $name , $email , $comment , $messageID, $date;

    public function render()
    {
        $list = mensahe::all();
        return view('livewire.message',['datas'=>$list]);
    }

    public function seen(){
        $list = mensahe::find($this->messageID);
        $list->status = 0;
        $list->update();
    }
    public function select($id){

        $this->messageID = $id;
        $list = mensahe::find($this->messageID);
        $this->name = $list->name;
        $this->email = $list->email;
        $this->comment = $list->comment;
        $this->date = $list->dateCreated;
        if($list->status = 1)
            $this->seen();
    }

    public function deleteAs(){
        $list = mensahe::find($this->messageID);
        $list->delete();
        $this->emit('postDelete');

    }
}
