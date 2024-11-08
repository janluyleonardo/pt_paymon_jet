<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class InputSelector extends Component
{
    use WithFileUploads;

    public $tipoInput;
    public $archivo;
    public $texto;

    public function render()
    {
        return view('livewire.input-selector');
    }

    public function updateTipoInput($value)
    {
        $this->tipoInput = $value;
    }

    public function submit()
    {
        // Aquí puedes manejar la lógica de envío del formulario
        // Por ejemplo, guardar el archivo o el texto en la base de datos
    }
}