<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public ?string $search = '';

    public function clear()
    {
        $this->search = '';
    }

    public function render()
    {
        $posts = null;

        if (strlen($this->search) > 3) {
            $posts = Post::where('name', 'like', '%' . $this->search . '%')->limit(10)->get();
        }

        return view('livewire.search', compact('posts'));
    }
}
