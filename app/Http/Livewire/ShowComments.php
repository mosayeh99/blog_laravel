<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class ShowComments extends Component
{
    public $post_id;

    public function mount()
    {
        $this->post_id = request()->id;
    }

    protected $listeners = ['refreshComponent' => 'render'];

    public function render()
    {
        $comments = Comment::where('post_id',$this->post_id)->get();
        return view('livewire.show-comments',compact('comments'));
    }
}
