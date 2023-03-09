<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactCompany;
use App\Models\ContactGeneral;

class Company extends Component
{
    
    public $name;
    public $identification;
    public $email;
    public $choices;
    public $extra;
    public $company;
    public $parentId;

    protected $listeners = ['parentId'];
    
    protected $rules=[
        'name' => 'required|min:2|max:255',
        'identification' => 'required',
        'email' => 'required',
        'choices' => 'required',
        'extra' => 'required|min:2|max:500',
    ];

    public function render()
    {
        return view('livewire.contact.company');
    }
    public function submit()
    {
        $this->validate();

        ContactCompany::updateOrCreate(
            ['contact_general_id' => $this->parentId],
            [
                'name' => $this->name,
                'identification' => $this->identification,
                'email' => $this->email,
                'choices' => $this->choices,
                'contact_general_id' => $this->parentId,
                'extra' => $this->extra, 
            ]
        );
       
        $this->emit('stepEvent',3);
    }
    public function parentId($parentId){
        $this->parentId = $parentId;
        $c = ContactCompany::where('contact_general_id', $this->parentId)->first();
        if($c != null){
           
            $this->name = $c->name;
            $this->identification = $c->identification;
            $this->email = $c->email;
            $this->choices = $c->choices;
            $this->extra = $c->extra;
        }
    }
}
