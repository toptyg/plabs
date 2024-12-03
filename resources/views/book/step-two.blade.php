@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select Lab for {{ $labType }}</div>

                <div class="card-body">
                   <div>
						<div>
							 <button type="button" class="btn btn-primary" onclick="showStepThree('{{ $labType }}', 'Lab 1')">Lab 1</button>
        <button type="button" class="btn btn-secondary" onclick="showStepThree('{{ $labType }}', 'Lab 2')">Lab 2</button>
        <button type="button" class="btn btn-success" onclick="showStepThree('{{ $labType }}', 'Lab 3')">Lab 3</button>
						</div>
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