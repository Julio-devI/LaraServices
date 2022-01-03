<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangeLocationComponent extends Component
{
    public $streetnumber;
    public $routes;
    public $city;
    public $state;
    public $country;
    public $zipcode;

    public function render()
    {
        return view('livewire.change-location-component')->layout('layouts.base');
    }
}