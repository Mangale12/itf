        @extends('frontend.includes.app')
        @section('content')
		<div class="wrapper mt-5" style="margin-top: 20rem;">
			<div class="inner">
				<form action="{{ route("frontend.contactFormStore") }}" method="POST">
                    @csrf
					<h3>Contact Form</h3>
					<label class="form-group">
						<input name="name" type="text" class="form-control"  required>
						<span>Your Name</span>
						<span class="border"></span>
					</label>
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
					<label class="form-group">
						<input name="email" type="email" class="form-control"  required>
						<span for="">Your Mail</span>
						<span class="border"></span>
					</label>
                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
					<label class="form-group" >
						<textarea name="address" id="address" class="form-control" required></textarea>
						<span for="">Address</span>
						<span class="border"></span>
					</label>
                    @error('address')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
					<button type="submit">Submit
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
        @endsection
