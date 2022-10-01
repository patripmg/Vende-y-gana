<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CreateAd extends Component
{
    public $title;
    public $price;
    public $body;
    public $category;

    protected $rules = [ //al usar livewire no se hace con request
        'title'=>'required|min:4',
        'body'=>'required|min:8',
        'category'=>'required',
        'price'=>'required|numeric',
        
    ];
    protected $messages = [
        'required'=> 'Este campo es obligatorio',
        'min'=>'El campo debe tener más de :min carácteres',
        'numeric'=>'Debe introducir un número'
    ];

    public function store() {

        $category = Category::find($this->category);
        $ad = $category->ads()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
        Auth::user()->ads()->save($ad);
      
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
        $this->category = "";
    }
    //El comportamiento de cleanForm es muy sencillo, accede a cada propiedad y le asigna una cadena vacía.

    public function render()
    {
        return view('livewire.create-ad');
    }

}
