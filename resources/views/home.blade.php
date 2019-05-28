@extends('layouts.app')
<style>
                 
            .btn{
                width: 150px;
                height: 80px;
                font-size: 25px;
                padding: 30px;
                font-style: bold;
            }
            .button-box {
                 width:100%;
                 text-align:center;
            }
            .par{
                position:center;
                text-align:center;
                font-style: bold;
                font-family:Arial Black;
                font-size:20px;

            }
            .card{
                border-radius:30px !important; 
                background-color:#F5F5F5!important;
            }
        </style>
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="par">Ulogovani ste!</p>
                    <br>
                    <br>
                   
                    <form action="/provera_korisnika"  method="POST" >
                    @csrf 
                    <div class="button-box">
                    <input type="submit" value="TEST" class="btn btn-warning">
                    </form>
                    <a href="/vezba"> <button type="button" class="btn btn-info">VEZBA</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
