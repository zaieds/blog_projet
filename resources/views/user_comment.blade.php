@extends('layouts.main')
@section('title','commentaire')
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
                    @if($comments->count())
                    <tr class = "center-block">
                        <th>Nom</th>
                        <th>Email</th>
                        <th>commentaire</th>
                        <th>Date</th>
                        <th colspan ="3">Action</th>
                    </tr>
                    @endif
                    @forelse($comments as $key=> $comment)

                        <tr class = "text-center">
                            <td>{{ $comment->comment_name }}</td>
                            <td>{{ $comment->comment_email }}</td>
                            <td>{{ $comment->comment_content }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td><a class = "btn btn-info ">Répondre</a></td>
                            <td>
                                <a href="#myModalDel{{$key}}" class="trigger-btn btn btn-danger" data-toggle="modal">Supprimer</a>
                                <div id="myModalDel{{$key}}" class="modal fade" style="display: none;">
                                    <div class="modal-dialog modal-confirm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">suppression de commentaire</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Voulez-vous vraiment supprimer cet commentaire ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
                                                <form action="{{ route('destroy_comments',[$user_id,$comment->post_id, $comment->id]) }}" method="post">
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
                    @empty
                        <tr>
                            <td colspan="5" class=" text-center alert-danger">Aucun commentaires pour cet articles</td>
                        </tr>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Retour</a>

                    @endforelse


                </table>
            </div>
        </div>
    </div>

@stop
