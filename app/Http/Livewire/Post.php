<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Post extends Component
{
    public $search = '';

    public function render()
    {
        $this->search = trim($this->search);

        if (strlen($this->search) > 0) {
            $posts = \App\Models\Post::query()
                ->where('content', 'like', '%' . $this->search . '%')
                ->get();
        } else {
            $posts = collect();
        }

        return view('livewire.post', ['posts' => $posts]);
    }
}
