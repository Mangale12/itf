    @extends("admin.dashboard")
    @section("content")
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Contact </h2>
                </div>
                {{-- <div class="pull-right">
                    <a href="{{ route("team.new_team") }}" class="btn {{ Route::is('contact.new_contact') ? 'btn-success' : 'btn-primary' }} float-right mb-2" style="float:center;">No Member Team</a>
                    <a href="{{ route("contact.member_team") }}" class="btn {{ Route::is('contact.team_contact') ? 'btn-success' : 'btn-primary' }} float-right mb-2" style="float:center;">Member Team</a>
                    <a href="{{ route("teams.index") }}" class="btn {{ Route::is('contacts.index') ? 'btn-success' : 'btn-primary' }} float-right mb-2" style="float:center;">All Teams</a>
                </div> --}}
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
                    <th>Team Name</th>
                    <th>Team Email</th>
                    <th>Team Members</th>
                    <th>Team image</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="width: 20%;">{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td style="width: 20%;">
                            <ul>
                                @foreach ($contact->contact as $member)
                                <li class="team-member" style="cursor: pointer;" data-id="{{ $member->id }}">{{ $member->name }}</li>
                                <input type="hidden" value="{{ $member->id }}" class="contact-id">
                                @endforeach

                            </ul>
                        </td>
                        {{-- <td>{{ $contact->Image }}</td> --}}
                        <td>
                            @if($contact->image)
                            <img src="{{ asset('public/images/'.$contact->image) }}" style="height: 50px;width:100px;">
                            @else
                            <span>No image found!</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('teams.destroy',$contact->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('teams.edit',$contact->id) }}">Edit</a>
                                @csrf
                                {{-- @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button> --}}
                                {{-- <a class="btn btn-primary" href="{{ route('teams.show',$contact->id) }}">View</a> --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary teams-popup"  data-id="{{ $contact->id }}">
                                    View
                                </button>

                                <!-- Modal -->

                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {{-- <style>
            .modal-backdrop.show {
                opacity: 0;
                z-index: -22;
            }
        </style> --}}
        <div class="modal fade mymodal" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b>Team Name :</b>
                  <p class="team_name"></p>
                  <b>Team Member :</b>
                  <p class="team_member"></p>
                  <b>Team Email :</b>
                  <p class="team_email"></p>
                  <b>Team Address :</b>
                  <p class="team_address"></p>
                  <b>Team No :</b>
                  <p class="team_no"></p>
                 <b> Team Position :</b>
                  <p class="team_position"></p>
                  <b>Team Active :</b>
                  <p class="team_active"></p>
                  <b>Team Facebook :</b>
                  <p class="team_facebook"></p>
                  <b>Team Inatagram :</b>
                  <p class="team_instagram"></p>
                  <b>Team Profile :</b>
                  <img class="team_image" id="team_image" src="" alt="" height="100" width="100" >
                </div>
              </div>
            </div>
          </div>
        {!! $teams->links() !!}

        {{-- contact details popup modal --}}
        <div class="modal fade mymodal" id="contactDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" style="width: 150%;">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Team Member Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b>Team :</b>
                  <p class="team_name"></p>
                  <b>Name :</b>
                  <p class="member_name"></p>
                  <b>Email :</b>
                  <p class="member_email"></p>
                  <b>Address :</b>
                  <p class="member_address"></p>
                  <b>Achievement :</b>
                  <p class="member_achievement"></p>


                  {{-- <b> Team Position :</b>
                  <p class="team_position"></p>
                  <b>Team Active :</b>
                  <p class="team_active"></p>
                  <b>Team Facebook :</b>
                  <p class="team_facebook"></p>
                  <b>Team Inatagram :</b>
                  <p class="team_instagram"></p>
                  <b>Team Profile :</b>
                  <img class="team_image" id="team_image" src="" alt="" height="100" width="100" > --}}

                    <input type="hidden" value="" class="member-id">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><b>Team Achievement</b></label>
                        <textarea class="form-control member-achievement-text" id="member-achievement" rows="3" placeholder="Achievement"></textarea>
                        <input type="hidden" value="" class="contact_id">
                    </div>
                    <div class="form-group">
                        <button class="achievement-btn btn btn-primary">Submit</button>
                    </div>

                </div>
              </div>
            </div>
          </div>
    @endsection

    @section('script')

    <script>

        $(document).ready(function(){

            $('.teams-popup').on('click', function(){
                var team = $(this).data("id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("teams.view") }}',  // Replace with your API endpoint URL
                    type: 'POST',
                    dataType: 'json',  // Set the expected data type
                    data:{'team':team},
                    success: function(data) {
                        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'))
                        myModal.show()

                        $('.team_name').html(data.data.name);
                        $('.team_email').html(data.data.email);
                        $('.team_address').html(data.data.address);
                        $('.team_no').html(data.data.contact_no);
                        $('.team_position').html(data.data.position);
                        $('.team_active').html(data.data.active);
                        $('.team_facebook').html(data.data.facebook);
                        $('.team_instagram').html(data.data.instagram);
                        $('.member-id').val(data.data.id);
                        $('.team_image').attr("src","{{ asset('images/') }}"+"/"+data.data.image);
                        var contact = data.contact;
                        if(contact!=null){
                            for (const key in contact) {
                                console.log(contact[key]['name']);
                                var newParagraph = $('<p style="background:red;"  class="remove-contact">').html(contact[key]['name'] + '<span style="float:right; cursor:pointer; position:relative; z-index:23;" onclick="myFunction()">X</span>');
                                $('.team_member').append(newParagraph);
                            }
                        }

                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
            });



            $('.team-member').on("click", function(){
                var member_id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("team.contact_details") }}',  // Replace with your API endpoint URL
                    type: 'POST',
                    dataType: 'json',  // Set the expected data type
                    data:{'member_id':member_id},
                    success: function(data) {
                        console.log(data);
                        var myModal = new bootstrap.Modal(document.getElementById('contactDetails'))
                        myModal.show()
                        $('.team_name').html(data.contact.team_id);
                        $('.member_name').html(data.contact.name);
                        $('.member_email').html(data.contact.email);
                        $('.member_address').html(data.contact.address);
                        $('.member_achievement').html(data.contact.achievement);
                        $('.member-achievement-text').val(data.contact.achievement);
                        $('.contact_id').val(data.contact.id);


                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
            });
            $('.achievement-btn').on('click', function(){
                var achievement = $('.member-achievement-text').val();
                var member_id = $('.contact_id').val();
                alert(member_id);
                console.log(member_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("team.achieve") }}',  // Replace with your API endpoint URL
                    type: 'POST',
                    dataType: 'json',  // Set the expected data type
                    data:{"member_id":member_id, "achievement":achievement},
                    success: function(data) {
                        // var myModal = new bootstrap.Modal(document.getElementById('contactDetails'))
                        // myModal.hide()
                        window.location.href = "{{URL::to('teams')}}"
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });

            });
            $('.remove-contact').on('click', function(){
                alert("test");


            });
        });

        function myFunction(){
            if(confirm("Do you want to remove conatct from this team ?")){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    dataType: 'json',  // Set the expected data type
                    data:{"member_id":member_id, "achievement":achievement},
                    success: function(data) {
                        // var myModal = new bootstrap.Modal(document.getElementById('contactDetails'))
                        // myModal.hide()
                        window.location.href = "{{URL::to('teams')}}"
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
            }
        }
    </script>

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#member-achievement' ) )
        .catch( error => {
            console.error( error );
        } );
</script> --}}
    @endsection
