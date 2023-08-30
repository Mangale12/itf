@extends("admin.dashboard")
@section("content")
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Contact</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('contacts.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('contacts.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contact Name:</strong>
                        <input type="text" name="name" value="{{ $contact->name }}" class="form-control"
                            placeholder="contact name" readonly>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contact Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="contact Email"
                            value="{{ $contact->email }}" readonly>
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contact Address:</strong>
                        <input type="text" name="address" value="{{ $contact->address }}" class="form-control"
                            placeholder="contact Address" readonly>
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Assign Team:</strong>
                        <select name="team" class="form-control">
                            <option value="" selected disabled>Select Team</option>
                            @foreach ($teams as $team)

                            <option value="{{ $team->id }}" {{ $team->id == $contact->team_id ? 'selected':""}}>{{ $team->name }}</option>
                            @endforeach

                        </select>
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    @endsection
