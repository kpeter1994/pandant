<?php

namespace App\Http\Livewire;

use App\Models\Equipment;
use Livewire\Component;

class EquipmentSearch extends Component
{
    public $input = '';

    public function render()
    {
        $innut = $this->input;
        $innut = ltrim($innut);
        $innut = rtrim($innut);

        if (strlen($this->input) > 2){

            $equipments = Equipment::where( function ($query) {
                $query->where('name', 'like', '%'.$this->input.'%')
                    ->orWhere('address', 'like', '%'.$this->input.'%')
                    ->orWhere('equipment', 'like', '%'.$this->input.'%')
                    ->orWhere('emi', 'like', '%'.$this->input.'%')
                    ->orWhere('legacy_reference', 'like', '%'.$this->input.'%');
            })
            ->get();

        } else{
            $equipments = collect();
        }


        return view('livewire.equipment-search', ['equipments' => $equipments]);
    }

}
