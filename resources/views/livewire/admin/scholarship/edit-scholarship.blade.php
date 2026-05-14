<div>

    <h1>Edit Scholarship</h1>

    <form wire:submit="update">

        <div>
            <label>Title</label>

            <input type="text" wire:model="title">
        </div>

        <br>

        <div>
            <label>Provider</label>

            <input type="text" wire:model="provider">
        </div>

        <br>

        <div>
            <label>Description</label>

            <textarea wire:model="description"></textarea>
        </div>

        <br>

        <div>
            <label>Deadline</label>

            <input type="date" wire:model="deadline">
        </div>

        <br>

        <button type="submit">
            Update Scholarship
        </button>

    </form>

</div>