<div class="card">
    <div class="card-body">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" value="{{ old('name', Auth::user()->name) }}">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" value="{{ old('email', Auth::user()->email) }}">
            </div>
            <div class="form-group">
                
            </div>
            
                <button type="submit" class="btn btn-primary ">Save Changes</button>
            
        </form>
    </div>
</div>