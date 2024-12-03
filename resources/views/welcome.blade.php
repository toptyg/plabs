@extends('layouts.app')

@section('content')
 <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
 <link rel="stylesheet" href="{{ asset('/css/app-D-sv12UV.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                

@guest
    <div class="card-header">Проект</div>
                <div class="card-body">
 <div class="cont">
                                        <div>
                                                <img src="{{ asset('/img/physlabs.png')}}" style="max-width:350px;width:100%;"/>
                                        </div>
                                        <div>
                                                <h1>PHYSLABS</h1>
                                                <p>Запишитесь на лабораторные занятия по физике</p>
                                                <div><a href="/physlabs/book" class="btn btn-primary">Записаться</a></div>
                                        </div>
                                </div>


                </div>
@endguest

@auth


<script type="text/javascript">
    window.location = "https://open.spbstu.ru/physlabs/book";//here double curly bracket
</script>


@endauth

            </div>
        </div>
    </div>
</div>


@endsection


