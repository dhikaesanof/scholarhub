<div>

    <h1>Create Scholarship</h1>

    <form wire:submit="save">

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
            <label>Benefits</label>

            <textarea wire:model="benefits"></textarea>
        </div>

        <br>

        <div>
            <label>Requirements</label>

            <textarea wire:model="requirements"></textarea>
        </div>

        <br>

        <div>
            <label>Required Documents</label>

            <textarea wire:model="required_documents"></textarea>
        </div>

        <div>
            <label>Minimum GPA</label>

            <input type="number" step="0.01" wire:model="minimum_gpa">
        </div>

        <div>
            <label>Education Level</label>

            <select wire:model="education_level">

                <option value="">Select</option>

                <option value="Diploma">Diploma</option>

                <option value="Bachelor">Bachelor</option>

                <option value="Master">Master</option>

            </select>
        </div>

        <div>
            <label>Category</label>

            <input type="text" wire:model="category">
        </div>

        <div>
            <label>Funding Type</label>

            <select wire:model="funding_type">

                <option value="">Select</option>

                <option value="Full Funded">Full Funded</option>

                <option value="Partial Funded">Partial Funded</option>

            </select>
        </div>

        <div>
            <label>Registration Open Date</label>

            <input type="date" wire:model="registration_open_date">
        </div>

        <br>

        <div>
            <label>Deadline</label>

            <input type="date" wire:model="deadline">
        </div>

        <br>

        <div>
            <label>Announcement Date</label>

            <input type="date" wire:model="announcement_date">
        </div>

        <div>
            <label>Registration Link</label>

            <input type="url" wire:model="registration_link">
        </div>

        <div>
            <label>Status</label>

            <select wire:model="status">

                <option value="OPEN">OPEN</option>

                <option value="CLOSED">CLOSED</option>

                <option value="COMING_SOON">COMING SOON</option>

            </select>
        </div>

        <button type="submit">
            Save Scholarship
        </button>

    </form>

</div>