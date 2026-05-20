<?php

namespace App\Livewire\Student\Bookmark;

use Livewire\Component;
use App\Models\Bookmark;

class BookmarkList extends Component
{
    public function render()
    {
        $bookmarks = Bookmark::where(
            'student_id',
            auth()->user()->student->id
        )
        ->with('scholarship')
        ->latest()
        ->get();

        return view(
            'livewire.student.bookmark.bookmark-list',
            [
                'bookmarks' => $bookmarks,
            ]
        )->layout('layouts.student');

    }

    public function removeBookmark($id)
    {
        $bookmark = Bookmark::where(
            'student_id',
            auth()->user()->student->id
        )
        ->findOrFail($id);

        $bookmark->delete();
    }
}