@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select Lab Type</div>

                <div class="card-body">
                   <div>
						<div>
							<button type="button" class="btn btn-primary" onclick="showStepTwo('phys')">Physics</button>
							<button type="button" class="btn btn-secondary" onclick="showStepTwo('math')">Mathematics</button>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    function showStepTwo(type) {
        window.location.href = "./step-two/phys";
    }
</script>