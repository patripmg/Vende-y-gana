<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ad;

class CreateAd extends Component
{
    public $title;
    public $price;
    public $body;

    protected $rules = [ //al usar livewire no se hace con request
        'title'=>'required|min:4',
        'body'=>'required|min:8',
        'price'=>'required|numeric',
    ];
    protected $messages = [
        'required'=> 'Field :attribute is required, please fill it',
        'min'=>'Field :attribute should be longer than :min',
        'numeric'=>'Field :attribute must be a number'
    ];

    public function store() {
        Ad::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
        session()->flash('message', 'Anuncio creado con éxito');
        
        $this->cleanForm(); //esto borra el formulario una vez creado el anuncio
    }

    public function updated ($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function cleanForm(){
        $this->title = "";
        $this->body = "";
        $this->price = "";
    }
    //El comportamiento de cleanForm es muy sencillo, accede a cada propiedad y le asigna una cadena vacía.

    public function render()
    {
        return view('livewire.create-ad');
    }

}
