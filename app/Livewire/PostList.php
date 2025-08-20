<?php

namespace App\Livewire;

use App\Enums\PostCategories;
use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public int $page = 1;

    public Collection $posts;

    public function mount()
    {
        $this->posts = collect();
        $this->loadMore();
    }

    #[Computed()]
    public function paginator()
    {
        return Post::where(['category' => PostCategories::ARTICLES])
            ->published()
            ->latest()
            ->paginate(8, ['*'], 'page', $this->page);
    }

    public function loadMore()
    {
        $this->posts->push(...$this->paginator->getCollection());

        $this->page = $this->page + 1;
    }

    public function placeholder()
    {
        return view('livewire.posts.skeleton-post-list');
    }

    public function render()
    {
        return view('livewire.posts.post-list');
    }
}
