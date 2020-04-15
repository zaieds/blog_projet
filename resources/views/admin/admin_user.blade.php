@extends('layouts.main')
@section('title','admin User')
@section('content')
    <style>
        .container {
            margin: auto;
            width: 100% ;
        }
    </style>
    <div class="container">
        <div class="row">



            <a href="" class = "btn btn-info" data-toggle="modal" data-target="#exampleModal">Ajouter un utilisateur</a>
            <div class="col-md-12">
                <table class="table table-bordered">

                    <tr class="text-center">
                        <th>#</th>
                        <th>Nom</th>
                        <th>Rôle</th>
                        <th>E-mail</th>
                        <th>mot de passe</th>
                        <th colspan ="2">Action</th>
                    </tr>
                    @foreach($users as  $key => $user)
                        <tr class = "text-center">
                            <td class="user_id">{{ $user->id }}</td>
                            <td class="user_name">{{ $user->name}}</td>
                            <td class="roleUser">{{ $user->role }}</td>
                            <td class="user_email">{{ $user->email}}</td>
                            <td class="user_password">{{ $user->password}}</td>

                            <td><a class = "btn btn-info editUserJs" data-toggle="modal" href="#modalEdit" data-postid="{{$user->id}}">Editer</a></td>

                            <td>
                                <a href="#myModalDel{{$key}}" class="trigger-btn btn btn-danger" data-toggle="modal">Supprimer</a>
                                <div id="myModalDel{{$key}}" class="modal fade" style="display: none;">
                                    <div class="modal-dialog modal-confirm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">suppression de l'utilisateur</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Voulez-vous vraiment supprimer cet utilisateur ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
                                                <form action="{{ route('destroy_User', $user->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger">supprimer</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </table>

                <!-- ********************** Ajouter un utilisateur *****************************-->

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>

                            </div>

                            <div class="modal-body">
                                <div class="panel-body">

                                    <form action="{{route('store_user')}}" method="post">
                                        {!! Form::token() !!}
                                        <div class="form-group {!! $errors->has('nomUser') ? 'has-error' : '' !!}">
                                            {!! Form::text('nomUser', null , ['class' => 'form-control', 'placeholder' => 'nom de l\'utilisateur']) !!}
                                            {!! $errors->first('nomUser', '<div class="text-danger">:message</div>') !!}
                                        </div>
                                        <div class="form-group {!! $errors->has('emailUser') ? 'has-error' : '' !!}">
                                            {!! Form::email('emailUser', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                                            {!! $errors->first('emailUser', '<div class="text-danger">:message</div>') !!}
                                        </div>

                                        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'mot de passe']) !!}
                                            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <div class="form-group {!! $errors->has('role') ? 'has-error' : '' !!}">
                                        {!! Form::checkbox('role', null, ['class' => 'form-control', 'placeholder' => 'Rôle admin']) !!}
                                        {!! Form::label('role', 'Rôle admin') !!}
                                        {!! $errors->first('role', '<div>:message</div>') !!}
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Enregistrer">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- -------------------------------Modifier l'utilisateur---------------------------- --}}


    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">modifier l'utilisateur</h5>

                </div>

    <div class="modal-body">
        <div class="panel-body userEdit">

            <form action={{"route('update_user', ['user' => $user->id])"}} method="post">
                {!! Form::token() !!}
                <div class="form-group {!! $errors->has('nomUser') ? 'has-error' : '' !!}">
                    {!! Form::text('nomUser', $user->name , ['class' => 'form-control username', 'placeholder' => 'nom de l\'utilisateur']) !!}
                    {!! $errors->first('nomUser', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('emailUser') ? 'has-error' : '' !!}">
                    {!! Form::email('emailUser', $user->email, ['class' => 'form-control useremail', 'placeholder' => 'E-mail']) !!}
                    {!! $errors->first('emailUser', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                    {!! Form::password('password', ['class' => 'form-control userpassword', 'placeholder' => 'mot de passe']) !!}
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group {!! $errors->has('role') ? 'has-error' : '' !!}">
                    {!! Form::checkbox('role', isset($user)? $user->role=="admin"?true:false : false, ['class' => 'form-control', 'placeholder' => 'Rôle admin']) !!}
                    {!! Form::label('role', 'Rôle admin') !!}
                    {!! $errors->first('role', '<div>:message</div>') !!}
                </div>

                <div class="form-group">
                    <input type="submit" id="editSubmitUserJs" class="btn btn-primary" value="Enregistrer">
                </div>
            </form>
        </div>

    </div>

            </div>
        </div>
    </div>


@stop

@push("scripts")
    <script>
        /**
         *
         * ***************************Modification de l'utilisateur ************************************
         *
         * @param key
         * @param data
         * @returns {string}
         */
        function getText(key, data)
        {
            var text = "";
            data.forEach( td =>{
                if(td.classList.contains(key)) text = td.textContent;
            })
            return text;
        }
        var tds = null;
        var _token = document.querySelector(".userEdit input[name=_token]");

        var user_name = null;
        var user_id = null;
        var user_email = null;
        var password = null;
        var roleUser = null;

        $editButtons = document.querySelectorAll(".editUserJs");
        $editButtons.forEach( editBtn => {
            editBtn.addEventListener("click", (e) =>{
                tds = editBtn.parentNode.parentElement.querySelectorAll("td:not(:last-child)");
                nomUser = document.querySelector(".userEdit input[name=nomUser]");
                emailUser= document.querySelector(".userEdit input[name=emailUser]");
                roleUser= document.querySelector(".userEdit input[name=roleUser]");

                password= document.querySelector(".userEdit input[name=password]");
                user_id = getText("user_id", tds);
                nomUser.value = getText("user_name", tds);
                emailUser.value = getText("user_email", tds);
                password.value = getText("user_password", tds);
                rolelUser.value = getText("roleUser", tds);

            });
        })
        /*****
         *
         * *********************************Modification de l'utilisateur**************************
         *
         *
         *
         * @type {Element}
         */

        var editSubmitUserJs = document.querySelector("#editSubmitUserJs");
        editSubmitUserJs.addEventListener('click', (e)=>{
            e.preventDefault();
            var urlPut = "{{route('update_user', ['user'=>"--"])}}".replace("--", user_id);
            const formData = {

                'name': nomUser.value,
                'email': emailUser.value,
                'password': password.value,
                'roleUser' : roleUser.value
            }
            console
                .log(formData)
            fetch(urlPut, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': _token.value,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            }).then(response => {
                window.location = window.location.href;
                console.log(response.json());
            }, (error)=>
            {
                console.log(error)
            }).then(()=>console.log("************ DONE *************"));

        })

    </script>
@endpush


