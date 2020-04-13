@extends('layouts.main')
@section('title','admin Index')
@section('content')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/css/mdb.min.css" rel="stylesheet">


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>
    <style>
        .container {
            position: relative;
        }
    </style>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">

                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
               @foreach($contacts as $contact)
                    <tr class = "text-center">
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->contact_name }}</td>
                        <td>{{ $contact->contact_email }}</td>
                        <td>{{ $contact->contact_message }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td>
                            <form action="{{ route('destroy_contact', $contact->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Etes-vous sur de supprimer cet article?')"> Supprimer
                                </button>
                           </form>
                        </td>

                    </tr>
                @endforeach

            </table>
        </div>
    </div>
    </div>

@stop