@extends('layouts.main')
@section('title','admin Index')
@section('content')
    <style>
        .container {
            margin: auto;
            width: 100% ;
        }
    </style>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">

                <tr class = "center-block">
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