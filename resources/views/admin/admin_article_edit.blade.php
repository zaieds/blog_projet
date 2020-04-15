<div class="modal fade" id="modelEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editer l'article</h5>
            </div>
            <div class="modal-body">
                <div class="panel-body">

                    <form class="articleEdit">
                        {!! Form::token() !!}
                        <div class="form-group {!! $errors->has('nomArt') ? 'has-error' : '' !!}">
                            {!! Form::text('nomArt', isset($post)?$post->post_title:"" , ['class' => 'form-control', 'placeholder' => 'Titre de l\'article']) !!}
                            {!! $errors->first('nomArt', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('nomAut') ? 'has-error' : '' !!}">
                            {!! Form::text('nomAut', isset($post)?$post->post_name:"", ['class' => 'form-control', 'placeholder' => 'Nom de l\'auteur']) !!}
                            {!! $errors->first('nomAut', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('contenus') ? 'has-error' : '' !!}">
                            {!! Form::textarea ('contenus', isset($post)?$post->post_content:"", ['class' => 'form-control', 'placeholder' => 'Contenue de l\'article']) !!}
                            {!! $errors->first('contenus', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('user_id') ? 'has-error' : '' !!}">
                            {!! Form::text('user_id', isset($post)?$post->user_id:"", ['class' => 'form-control', 'placeholder' => 'id de l\'utilisateur']) !!}
                            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('post_category') ? 'has-error' : '' !!}">
                            {!! Form::text('post_category', isset($post)?$post->post_category:"", ['class' => 'form-control', 'placeholder' => 'category de l\'article']) !!}
                            {!! $errors->first('post_category', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('post_status') ? 'has-error' : '' !!}">
                            {!! Form::checkbox('post_status', isset($post)? $post->post_status=="1"?true:false : false, ['class' => 'form-control', 'placeholder' => 'Publier l\'article']) !!}
                            {!! Form::label('post_status', 'Publier l\'article') !!}
                            {!! $errors->first('post_status', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group">
                            <input type="submit" id="editSubmitPostJs" class="btn btn-primary" value="Enregistrer">
                        </div>
                    </form>
                </div>

            </div>


        </div>
    </div></div>
</div>

