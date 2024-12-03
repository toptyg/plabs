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
							<a href="javascript:void(0);" onclick="step1('tech')">Технические  институты (ИСИ, ИЭ, ИММиТ,ИБСИБрт)</a>
							<a href="javascript:void(0);" onclick="step1('phys')">Физические институты (ФМИ, ИЭиТ, ИКНК, ИБСИБ)</a>
						</div>
					</div>
					<div class="steps step2">
						
					</div>
					<div class="steps step3">
						<form id="formSteps" action="{{ route('book.finalize') }}" method="POST">
							<input name="type" type="hidden" />
							<input name="lab_id" type="hidden" />
							<input name="datetime" type="hidden" />
							@csrf
							<strong></strong>
							
							<div class="form-group">
								<label for="date" style="display:none;">Доступные даты:</label>
								<div class="timeList">
								</div>
							</div>
							<div class="form-group">
								<input type="checkbox" name="offer"> 
								<label for="offer">Я подтверждаю, что у меня есть допуск от Деканата*</label>
								<p><em>*При посещение занятия допуск необходимо подписанный допуск необходимо отдать преподавателю. Без допуска к прохождению лабораторной работы обучающийся не допускается</em></p>
							</div>
							<a href="javascript:void(0);" class="btn btn-success" onclick="step3(this);">Записаться</a>
							<a href="javascript:void(0);" class="btn btn-primary" onclick="step1($('input[name=type]').val())">Назад</a>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/i18n/jquery.ui.datepicker-ru.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>

<script>
	
	
    function step1(type) {
        $('.card-header').html('Шаг 2 из 3: Выберите название работы');
		$('.steps').removeClass('active');
		$('.step2').addClass('active');
		$('input[name=type]').val(type);
		url='https://open.spbstu.ru/physlabs/get_labs';
		$.getJSON(url, function(data) {
			res='';
			for (var i = 0; i < data.length; i++) {
				if(data[i].type==type){
					res=res+'<a href="javascript:void(0);" onclick="step2(this)" lab_id-id="'+data[i].id+'" studs_max="'+data[i].studs_max+'">'+data[i].number+' '+data[i].name+'</a>';
				}
			}
			$('.step2').html('<div><input type="text" value="" placeholder="Поиск.." class="searchInput"><br />'+res+'</div><button type="submit" class="btn btn-primary" onclick="location.reload();">Назад</button>');
			$("input.searchInput").on("input.highlight", function() {
				searchTerm = $(this).val().toLowerCase();
				$('.step2 a').each(function(){
					v=$(this).text().toLowerCase();
					if(v.includes(searchTerm)) $(this).removeClass('hidden');
					else $(this).addClass('hidden');
				});
				//$(".step2 div").unmark().mark(searchTerm);
			}).trigger("input.highlight").focus();
		});
		
    }
	function step2(lab_id) {
		$('input[name=lab_id]').val($(lab_id).attr('lab_id-id'));
		studs_max=$(lab_id).attr('studs_max');
        $('.card-header').html('Шаг 3 из 3: Выберите дату и время');
		$('.steps').removeClass('active');
		$('.step3').addClass('active');
		
		$('.step3 strong').html('<span style="font-weight:normal;">Запись на:</span> '+$(lab_id).text());
		
		url='https://open.spbstu.ru/physlabs/get_times';
		$.getJSON(url, function(data) {
			res='';
			max_studs_lab=2;
			for (var i = 0; i < data.length; i++) {
				if(data[i].lab_id==$('input[name=lab_id]').val()){			
					datetime=data[i].datetime;
					dtAr=datetime.split(' ');
					dAr=dtAr[0].split('-');
					tAr=dtAr[1].split(':');
					datetime=dAr[2]+'.'+dAr[1]+'.'+dAr[0]+' '+tAr[0]+':'+tAr[1];
					if(data[i].date_studs_available*1<1 || data[i].lab_studs_available*1<1){
						res=res+'<a href="javascript:void(0);" onclick="useTime(this)" time-datetime="'+data[i].datetime+'" style="background:#efefef!important;color:gray!important">'+datetime+' <em>нет записи</em></a>';
					}
					else{
						available_studs_lab=max_studs_lab-data[i].lab_studs_available*1;
						res=res+'<a href="javascript:void(0);" onclick="useTime(this)" time-datetime="'+data[i].datetime+'">'+datetime+' <em>Записано: '+available_studs_lab+' из '+max_studs_lab+'</em></a>';
					}
				}
			}
			
			//date_studs_available
			//lab_studs_available
			
			if(res=='') res='<p>Нет доступных дат на данное занятие</p>';
			$('.timeList').html(res);
		});
    }
	function step3(btn) {
		errorMsg='';
		$('.errorMsg').remove();
		if($('input[name=datetime]').val()=='') errorMsg='Выберите дату и время. ';
		if(!$('input[name=offer]').prop("checked")) errorMsg=errorMsg+'Вы не подтвердили доступ к Деканату. ';
		
		if(errorMsg=='') $('#formSteps').submit();
		else{
			$(btn).before('<div class="errorMsg">'+errorMsg+'</div>');
		}
		
    }
	function useTime(t){
		$('input[name=datetime]').val($(t).attr('time-datetime'));
		$('.timeList a').removeClass('active');
		$(t).addClass('active');
	}
	
		
		
	/*
		


	  $( function() {
		  
		$( ".datepicker" ).datepicker({
			minDate: 0,
			dateFormat: 'dd.mm.yy',
			beforeShowDay: function(date) {
				return [date.getDay() == 5];
			},
			onSelect: function(dateText) {
				$('.timeList').html('<a href="javascript:void(0);" onclick="useTime(this);">13:00</a><a href="javascript:void(0);" onclick="useTime(this);">17:00</a>');
				$('.timeList').parent().find('label').show();
			}
		});
			
	  } );
	 */
	 
  </script>
<style>
	.steps{display:none;}
	.steps.active{display:block;}
		.steps div a{display:inline-block;padding:5px 10px;border:1px solid gray;margin:0 5px 5px 0;color:#000;text-decoration:none!important}
		.steps div a:hover{background:#45b45a;color:#fff;;border-color:#45b45a}
		.steps div a.active{background:#45b45a;color:#fff;border-color:#45b45a}
			.steps div a em{display:block;color:gray}
			.steps div a:hover > em{color:#fff}
			.steps div a.active > em{color:#fff}
			.steps div a.disabled{color:red!important;cursor:text;border-color:red!important;background:none!important}
			.steps div a.disabled em{color:red!important}
	.form-group{margin-bottom:15px}
		.form-group label{padding-bottom:5px}
	.step3 strong{display:block;margin-bottom:15px;}
	body{
background-image: url(https://open.spbstu.ru/physlabs/img/bg-physlabs.jpg);
background-size:cover;}
mark {
  background: orange;
  color: black;
}
input.searchInput{display:block;width:200px;height:30px;margin-bottom:0}
.step2 a.hidden{display:none;}
.errorMsg{width:100%;padding:10px 20px;background:#dfa1a1;color:#000;border:1px solid red;margin:10px 0;}
</style>