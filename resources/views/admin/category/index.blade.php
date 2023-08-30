@extends("admin.dashboard")
@section("content")
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <h2>Contact </h2>
                    <a href="{{ route("category.create") }}" class="btn btn-primary float-right mb-2" style="margin-top: -3rem; float:right;">Add New</a>
                </div>
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
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr id="@if(Route::is('contact.new_contact')) contact-{{ $contact->id }} @endif">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>


                        <td>
                            <form action="{{ route('category.destroy',$category->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
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
