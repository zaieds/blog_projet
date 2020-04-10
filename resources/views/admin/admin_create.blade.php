@extends('layouts.main')
@extends('post_single')
@extends('article')
@section('title','Create article')
{{--
@section('content')
    <div class="row mt-5">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('admin_store')}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="post_title">le nom de l'article:</label>
                    <input type="text" name = "post_title" id = "post_title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="post_name">nom de l'auteur:</label>
                    <input type="text" name = "post_name" id = "post_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="post_content">contenue de l'article:</label>
                    <input type="text" name = "post_content" id = "post_content" class="form-control" required>
                </div>
                <button type = "submit" class = "btn btn-success">confirmer</button>
            </form>
        </div>
    </div>
@stop
--}}

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@stop