<div class="modal fade" id="modelEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editer</h5>
            </div>
            <div class="modal-body">
                <div class="panel-body">

                <form>
                {!! Form::token() !!}
                <div class="form-group {!! $errors->has('nomUser') ? 'has-error' : '' !!}">
                    {!! Form::text('nomUser', $user->name , ['class' => 'form-control', 'placeholder' => 'nom de l\'utilisateur']) !!}
                    {!! $errors->first('nomUser', '<div class="text-danger">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('emailUser') ? 'has-error' : '' !!}">
                    {!! Form::email('emailUser', $user->email, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                    {!! $errors->first('emailUser', '<div class="text-danger">:message</div>') !!}
                </div>

                <div class="form-group {!! $errors->has('role') ? 'has-error' : '' !!}">
                    {!! Form::text('role', $user->role , ['class' => 'form-control', 'placeholder' => '{{ $user->role }}']) !!}
                    {!! $errors->first('role', '<div class="text-danger">:message</div>') !!}
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

