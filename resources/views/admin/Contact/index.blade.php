@extends("admin.dashboard")
@section("content")
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <h2>Contact </h2>
                    <a href="{{ route("contacts.create") }}" class="btn btn-primary float-right mb-2" style="margin-top: -3rem; float:right;">Add New</a>
                </div>
                <div class="pull-right">
                    <a href="{{ route("contact.new_contact") }}" class="btn {{ Route::is('contact.new_contact') ? 'btn-success' : 'btn-primary' }} float-right mb-2" style="float:center;">New Contacts</a>
                    <a href="{{ route("contact.team_contact") }}" class="btn {{ Route::is('contact.team_contact') ? 'btn-success' : 'btn-primary' }} float-right mb-2" style="float:center;">Team Assigned Contacts</a>
                    <a href="{{ route("contacts.index") }}" class="btn {{ Route::is('contacts.index') ? 'btn-success' : 'btn-primary' }} float-right mb-2" style="float:center;">All Contacts</a>
                </div>
                {{-- <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('companies.create') }}"> Create Company</a>
                </div> --}}
            </div>
        </div>
        {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Contact Name</th>
                    <th>Contact Email</th>
                    <th>Contact Address</th>
                    <th>Instructor</th>
                    <th>Team Assigned</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr id="@if(Route::is('contact.new_contact')) contact-{{ $contact->id }} @endif">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ !empty($contact->team) ? $contact->team->name : "null"}}</td>
                        <td>

                            <select class="team-select @if(Route::is('contact.new_contact'))
                            team-select{{ $contact->id }}
                            @endif " name="team_id" id="team-select" data-id="{{ $contact->id }}">
                                <option value="">Select Team</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" {{ $team->id == $contact->team_id ? 'selected' : '' }}>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <form action="{{ route('contacts.destroy',$contact->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            {{-- <form action="{{ route('contacts.destroy',$contact->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit instructor</a>

                            </form> --}}

                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

    @endsection
        @section('script')
        <script>
            $(document).ready(function(){
                $('.team-select').on('change', function(){
                    var team = $(this).val();
                    var id = $(this).data("id");

                    var contact = $(this).data('id');
                    // alert(contact);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route("contact.team_assign") }}',  // Replace with your API endpoint URL
                        type: 'POST',
                        dataType: 'json',  // Set the expected data type
                        data:{'team':team, 'contact':contact},
                        success: function(data) {
                            $(".team-select"+id).closest("tr").remove();
                            console.log(data);
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error(error);
                        }
                    });
                });
            });
        </script>
        @endsection
