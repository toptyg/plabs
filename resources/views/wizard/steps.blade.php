@extends('layouts.app')

@section('content')

@if (Auth::guest())
    <script>
		window.location = '/physlabs/login';
	</script>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Шаг 1 из 3: Выберите тип института</div>

                <div class="card-body">
                   <div class="steps step1 active">
						<div>
							<a href="javascript:void(0);" onclick="step1('tech')">Технические  институты</a>
							<a href="javascript:void(0);" onclick="step1('phys')">Физические институты</a>
						</div>
					</div>
					<div class="steps step2">
						
					</div>
					<div class="steps step3">
						<form action="{{ route('user-wizard.finalize') }}" method="POST">
							<input name="type" type="hidden" />
							<input name="work" type="hidden" />
							@csrf
							<div class="form-group">
								<input name="datetime" class="form-control datepicker" required style="margin:15px 0;">
							</div>
							<a href="javascript:void(0);" class="btn btn-success" onclick="step3()">Записаться</a>
							<a href="javascript:void(0);" class="btn btn-primary" onclick="step1($('input[name=type]').val())">Назад</a>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script>
	
	
    function step1(type) {
        $('.card-header').html('Шаг 2 из 3: Выберите название работы');
		$('.steps').removeClass('active');
		$('.step2').addClass('active');
		$('input[name=type]').val(type);
		jQuery.ajax({type:'POST',url:'https://open.spbstu.ru/physlabs/steps.php',data:'type='+type,success:function(result){
			$('.step2').html('<div>'+result+'</div><button type="submit" class="btn btn-primary" onclick="location.reload();">Назад</button>');
		}});
    }
	function step2(work) {
		$('input[name=work]').val($(work).text());
        $('.card-header').html('Шаг 3 из 3: Выберите дату и время');
		$('.steps').removeClass('active');
		$('.step3').addClass('active');
		
		
    }
	function step3(work) {
		alert('в разработке');
		
		
    }
</script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<style>
	.steps{display:none;}
	.steps.active{display:block;}
		.steps div a{display:inline-block;padding:5px 10px;background:#efefef;margin:0 5px 5px 0;color:gray;text-decoration:none!important}
		.steps div a:hover{background:#45b45a;color:#fff}
</style>
