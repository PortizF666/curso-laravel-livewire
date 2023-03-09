<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactDetail;
use App\Models\ContactGeneral;

class Detail extends Component
{
    
    public $extra;
    public $contactdetail;
    public $parentId;

    protected $listeners = ['parentId'];
    
    protected $rules=[
        'extra' => 'required|min:2|max:255',
    ];
    
    public function render()
    {

        //dd(ContactDetail::find(1));
        //dd(ContactGeneral::find(1)->detail());
        return view('livewire.contact.detail');
    }

    public function submit()
    {
        
        $this->validate();
        ContactDetail::updateOrCreate(
            ['contact_general_id' => $this->parentId],
            [
                'extra' => $this->extra,
                'contact_general_id' => $this->parentId,
            ]
        );

        $this->emit('stepEvent',4);
    }
    public function parentId($parentId){
        $this->parentId = $parentId;
        $c = ContactDetail::where('contact_general_id', $this->parentId)->first();
        if($c != null){
            $this->extra = $c->extra;
            $this->parentId = $c->parentId;
        }
    }
}
