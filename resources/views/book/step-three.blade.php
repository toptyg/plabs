@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Schedule Appointment for {{ $lab }} ({{ $labType }})</div>

                <div class="card-body">
                   <div>
						<form action="{{ route('book.finalize') }}" method="POST">
							@csrf
							<div class="form-group">
								<label for="datetime">Select Date and Time:</label>
								<input type="datetime-local" id="datetime" name="datetime" class="form-control" required style="margin:10px 0;">
							</div>
							<button type="submit" class="btn btn-success">Submit</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    function showStepThree(labType, lab) {
        window.location.href = "./step-three/phys/1";
    }
</script>