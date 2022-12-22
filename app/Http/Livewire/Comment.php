<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $author, $created_at, $content;

    public $comments = [
      [
          'author' => 'Solw',
          'created_at' => '5 Min ago',
          'content' => 'San pham nay rat tuyet voi!',
      ]
    ];

    public $newComment;

    public function AddComment() {
        $this->comments[] = [
            'author' => 'Solw',
            'created_at' => Carbon::now()->diffForHumans(),
            'content' => $this->newComment,
        ];
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
