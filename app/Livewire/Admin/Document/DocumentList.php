<?php
fakhri
namespace App\Livewire\Admin\Document;

use App\Models\Admin;
use App\Models\Document;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentList extends Component
{
    use WithFileUploads;

    public $title;

    public $description;

    public $price;

    public $pdf_file;

    public $thumbnail;

    public $showForm = false;

    public function toggleForm()
    {
        $this->showForm =
            !$this->showForm;
    }

    public function save()
    {
        $this->validate([

            'title' =>
                'required',

            'description' =>
                'required',

            'price' =>
                'required|numeric|min:0',

            'pdf_file' =>
                'required|mimes:pdf|max:10240',

            'thumbnail' =>
                'nullable|image|max:2048',
        ]);

        $pdfPath =

            $this->pdf_file
                ->store(

                    'documents',

                    'public'
                );

        $thumbnailPath = null;

        if ($this->thumbnail) {

            $thumbnailPath =

                $this->thumbnail
                    ->store(

                        'document-thumbnails',

                        'public'
                    );
        }

        Document::create([

            'title' =>
                $this->title,

            'description' =>
                $this->description,

            'price' =>
                $this->price,

            'pdf_file' =>
                $pdfPath,

            'thumbnail' =>
                $thumbnailPath,

            'created_by' =>

                Admin::first()->id,
        ]);

        session()->flash(

            'success',

            'Document uploaded successfully.'
        );

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset([

            'title',

            'description',

            'price',

            'pdf_file',

            'thumbnail',
        ]);

        $this->showForm = false;
    }

    public function delete($id)
    {
        Document::findOrFail($id)
            ->delete();
    }

    public function render()
    {
        return view(

            'livewire.admin.document.document-list',

            [

                'documents' =>

                    Document::latest()
                        ->get(),
            ]

        )->layout(
            'layouts.admin'
        );
    }
}