<div class="col-md-4">
    <h4 class="py-2 mb-2">
        @if(isset($kategoris))
        Edit
        @else
        Add
        @endif
        Kategori Product
    </h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ isset($kategoris) ? route('kategori.update', $kategoris->id) : route('kategori.store') }}" method="POST">
                @csrf
                @if(isset($kategoris))
                @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">Kategori Name</label>
                    <input type="text" class="form-control" name="name" id="defaultFormControlInput"
                        placeholder="Kategori" aria-describedby="defaultFormControlHelp"
                        value="{{ isset($kategoris) ? $kategoris->name : old('name') }}" />
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-block btn-outline-primary">
                        <i class="bx bx-check"></i>&nbsp;
                        @if(isset($kategoris))
                        Update
                        @else
                        Save
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
