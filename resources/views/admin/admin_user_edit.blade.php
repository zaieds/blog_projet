<div class="modal fade" id="modelEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editer</h5>
            </div>
            <div class="modal-body">
                <div class="panel-body">

                <form class="userEdit">
                {!! Form::token() !!}
                <div class="form-group {!! $errors->has('nomUser') ? 'has-error' : '' !!}">
                    {!! Form::text('nomUser', $user->name , ['class' => 'form-control', 'placeholder' => 'nom de l\'utilisateur']) !!}
                    {!! $errors->first('nomUser', '<div class="text-danger">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('emailUser') ? 'has-error' : '' !!}">
                    {!! Form::email('emailUser', $user->email, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                    {!! $errors->first('emailUser', '<div class="text-danger">:message</div>') !!}
                </div>

                <div class="form-group {!! $errors->has('roleUser') ? 'has-error' : '' !!}">
                    {!! Form::text('roleUser', $user->role , ['class' => 'form-control', 'placeholder' => 'Role user']) !!}
                    {!! $errors->first('roleUser', '<div class="text-danger">:message</div>') !!}
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
</div>

