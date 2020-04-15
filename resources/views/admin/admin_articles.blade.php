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



        <a href="" class = "btn btn-info" data-toggle="modal" data-target="#exampleModal">Ajouter un article</a>
        <div class="col-md-12">
            <table class="table table-bordered">

                <tr class="text-center">
                    <th>#</th>
                    <th>Titre de l'article</th>
                    <th>Nom de l'auteur</th>
                    <th>Contenus de l'article</th>
                    <th>Catégorie de l'article</th>
                    <th>Id Utilisateur</th>
                    <th>Article Publié</th>
                    <th colspan ="3">Action</th>
                </tr>
               @foreach($posts as  $key => $post)
                    <tr class = "text-center">
                        <td class="post_id">{{ $post->id }}</td>
                        <td class="post_title">{{ $post->post_title }}</td>
                        <td class="post_name">{{ $post->post_name }}</td>
                        <td class="post_content">{{ $post->post_content }}</td>
                        <td class="post_category">{{ $post->post_category }}</td>
                        <td class="post_userId">{{ $post->user_id }}</td>
                        <td class="post_status">{{ $post->post_status=="1"?"True":"False" }}</td>
                        <td><a class = "btn btn-info" href="{{route("user_admin_comments", ['article_id'=>$post->id, 'user_id'=> Auth::user()->id ] )}}" data-postid="{{$post->id}}">Commentaires</a></td>
                        <td><a class = "btn btn-info editPostJs" data-toggle="modal" data-target="#modelEdit" data-postid="{{$post->id}}">Editer</a></td>
                        <td>
                            <a href="#myModalDel{{$key}}" class="trigger-btn btn btn-danger" data-toggle="modal">Supprimer</a>
                            <div id="myModalDel{{$key}}" class="modal fade" style="display: none;">
                                <div class="modal-dialog modal-confirm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">suppression de l'article</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Voulez-vous vraiment supprimer cet article ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
                                            <form action="{{ route('destroy_article', $post->id) }}" method="post">
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
            <!-------------------------------- Ajouter un article --------------------- -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un article</h5>

                       </div>
                        <div class="modal-body">
                            <div class="panel-body">

                                <form action="{{route('store_article')}}" method="post">
                                    {!! Form::token() !!}
                                    <div class="form-group {!! $errors->has('nomArt') ? 'has-error' : '' !!}">
                                        {!! Form::text('nomArt', null, ['class' => 'form-control', 'placeholder' => 'Titre de l\'article']) !!}
                                        {!! $errors->first('nomArt', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->has('nomAut') ? 'has-error' : '' !!}">
                                        {!! Form::text('nomAut', null, ['class' => 'form-control', 'placeholder' => 'Nom de l\'auteur']) !!}
                                        {!! $errors->first('nomAut', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->has('contenus') ? 'has-error' : '' !!}">
                                        {!! Form::textarea ('contenus', null, ['class' => 'form-control', 'placeholder' => 'Contenus de l\'article']) !!}
                                        {!! $errors->first('contenus', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->has('user_id') ? 'has-error' : '' !!}">
                                        {!! Form::text('user_id', null, ['class' => 'form-control', 'placeholder' => 'id de l\'utilisateur']) !!}
                                        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group {!! $errors->has('post_category') ? 'has-error' : '' !!}">
                                        {!! Form::text('post_category', null, ['class' => 'form-control', 'placeholder' => 'catégorie de l\'article']) !!}
                                        {!! $errors->first('post_category', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group {!! $errors->has('post_status') ? 'has-error' : '' !!}">
                                        {!! Form::checkbox('post_status', null, ['class' => 'form-control', 'placeholder' => 'Publier l\'article']) !!}
                                        {!! Form::label('post_status', 'Publier l\'article') !!}
                                        {!! $errors->first('post_status', '<div class="invalid-feedback">:message</div>') !!}
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
            @include("admin.admin_article_edit")
        </div>
    </div>
    </div>

@stop

@push("scripts")
    <script>

        function getText(key, data)
        {
            var text = "";
            data.forEach( td =>{
                if(td.classList.contains(key)) text = td.textContent;
            })
            return text;
        }
        var tds = null;
        var post_status = null;
        var _token = document.querySelector(".articleEdit input[name=_token]");
        var post_id = null;
        var nomArt = null;
        var nomAut = null;
        var contenus = null;
        var user_id = null;
        var post_category = null;

        $editButtons = document.querySelectorAll(".editPostJs");
        $editButtons.forEach( editBtn => {
            editBtn.addEventListener("click", (e) =>{
                tds = editBtn.parentNode.parentElement.querySelectorAll("td:not(:last-child)");
                nomArt = document.querySelector(".articleEdit input[name=nomArt]");
                nomAut = document.querySelector(".articleEdit input[name=nomAut]");
                contenus = document.querySelector(".articleEdit textarea[name=contenus]");
                user_id = document.querySelector(".articleEdit input[name=user_id]");
                post_category = document.querySelector(".articleEdit input[name=post_category]");
                post_status = document.querySelector(".articleEdit input[name=post_status]");

                post_id = getText("post_id", tds);
                nomArt.value = getText("post_title", tds);
                nomAut.value = getText("post_name", tds);
                contenus.value = getText("post_content", tds);
                user_id.value = getText("post_userId", tds);
                post_category.value = getText("post_category", tds);
                post_status.checked = getText("post_status", tds)=="True";
            });
        });

        var editSubmitPostJs = document.querySelector("#editSubmitPostJs");
        editSubmitPostJs.addEventListener('click', (e)=>{
            e.preventDefault();
            var urlPut = "{{route('update_article', ['article'=>"--"])}}".replace("--", post_id);
            const formData = {
                'post_title': nomArt.value,
                'post_name': nomAut.value,
                'post_content': contenus.value,
                'post_userId': user_id.value,
                'post_category': post_category.value,
                'post_status': post_status.checked
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