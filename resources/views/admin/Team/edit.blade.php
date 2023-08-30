@extends("admin.dashboard")
@section("content")
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit Team</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('teams.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('teams.update',$team->id) }}" method="POST" enctype="multipart/form-data" class="form-data">
            @csrf
            @method("put")
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>teams Name:</strong>
                        <input type="text" name="name" class="form-control" value="{{ $team->name }}" placeholder="Contact Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>teams Email:</strong>
                        <input type="email" name="email[]" class="form-control emails" value="{{ $team->email }}" placeholder="Contact Email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>teams Address:</strong>
                        <input type="text" name="address" class="form-control" value="{{ $team->address }}" placeholder="contact Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>teams contact_no:</strong>
                        <input type="text" name="contact_no[]" class="form-control contacts" value="{{ $team->contact_no }}" placeholder="contact Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>teams position:</strong>
                        <input type="text" name="position"  value="{{ $team->position }}" class="form-control" placeholder="contact Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>teams active:</strong>
                        <input type="text" name="active" class="form-control" value="{{ $team->active }}" placeholder="contact Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>teams facebook:</strong>
                        <input type="text" name="facebook" class="form-control" value="{{ $team->facebook }}" placeholder="contact Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>teams instagram:</strong>
                        <input type="text" name="instagram" class="form-control" value="{{ $team->instagram }}" placeholder="contact Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>teams photo:</strong>
                        <input type="file" name="image" class="form-control" placeholder="contact Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <input type="submit" class="btn btn-primary ml-3 form-submit" value="Submiffft">

            </div>

        </form>

        <style>
            .bootstrap-tagsinput {
                width: 94rem;
                height: 2.5rem;
                color: black;
                /* text-align: center; */
                /* margin: 0; */
                /* position: absolute; */
                /* top: 50%; */

                -ms-transform: translateY(-50%);
                /* transform: translateY(-50%); */
                padding-top: 12px;
            }
            .label-info{
                background: yellow!important;
                color: black!important;
            }
        </style>
    @endsection
    @section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>
    <script>
$(document).ready(function() {
  var tagsValue = '{{ $team->email }}';
  $('.emails').val(tagsValue).tagsinput();

  var contacts = '{{ $team->contact_no }}';
  $('.contacts').val(contacts).tagsinput();
  $('.form-submit').on('click', function(){
    $('.form-data').submit();
  })
});
    </script>
    @endsection

