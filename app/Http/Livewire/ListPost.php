<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class ListPost extends Component
{
    protected $listeners = [
        'posting' => '$refresh'
    ];
    use WithPagination;
    public $sortBy = 'body';
    public $sortDirection = 'asc';
    public function render()
    {
        $posts = Post::query()
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return view('livewire.list-post', [
            'posts' => $posts,

        ]);
    }
    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
    }
}
