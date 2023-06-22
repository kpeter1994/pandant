<?php

namespace App\Http\Livewire;

use App\Models\WorkCenter;
use Livewire\Component;

class WorkCenterSearch extends Component
{
    public $searchWorker;

    public function render()
    {
        $searchResults = [];

        if (!empty($this->searchWorker)){
            $searchResults = WorkCenter::where('name','like','%' .$this->searchWorker. '%')->get();
        }

        return view('livewire.work-center-search', compact('searchResults'));
    }
}
