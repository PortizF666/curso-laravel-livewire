<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactGeneral;
use App\Models\ContactPerson;

class General extends Component
{
    public $subject;
    public $type;
    public $message;
    public $contactgeneral;

    public $step=1;
    
    protected $listeners =['stepEvent'];

    protected $rules=[
        'subject' => 'required|min:2|max:255',
        'type' => 'required',
        'message' => 'required|min:2',
    ];

    public function mount($subject = '#1 - '){
        $this->subject = $subject;
    }

    public function render()
    {
        //dd(ContactGeneral::find(1));
        //dd(ContactPerson::find(1)->general());        
        return view('livewire.contact.general')->layout('layouts.contact');
    }

    public function submit()
    {
        $this->validate();
        $this->contactgeneral = ContactGeneral::updateOrCreate(
            [
                'subject' => $this->subject,
                'type' => $this->type,
                'message' => $this->message, 
            ]
        )->id;

        $this->stepEvent(2);
    }

    public function stepEvent($step){
        if($step==2)
        {
            if($this->type == 'company')
                $this->step = 2;
            elseif ($this->type == 'person')
                $this->step = 2.5;
        }else{
            $this->step = $step;
        }
        $this->emit('parentId', $this->contactgeneral);
    }
}
