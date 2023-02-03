<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CreateComment extends Component

{
    public $post_id;
    public $comment_body;
    public $post;
    public $comments;

    public function mount()
    {
        $this->post_id = request()->id;
        $this->comments = Comment::where('post_id', $this->post_id)->get();
    }

    public function store()
    {
        Comment::create([
           'post_id' => $this->post_id,
           'comment_body' => $this->comment_body
        ]);
        $this->comment_body = "";
        $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.create-comment');
    }

}
