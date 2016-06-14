{{-- Create Folder Modal --}}
<div class="modal fade" id="modal-folder-create">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="/admin/upload/folder"
            class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="folder" value="{{ $folder }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            ×
          </button>
          <h4 class="modal-title">Créer un nouveau dossier</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="new_folder_name" class="col-sm-3 control-label">
              Nom du dossier
            </label>
            <div class="col-sm-8">
              <input type="text" id="new_folder_name" name="new_folder"
                     class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Annuler
          </button>
          <button type="submit" class="btn btn-primary">
            Créer le dossier
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Delete File Modal --}}
<div class="modal fade" id="modal-file-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Merci de confirmer</h4>
      </div>
      <div class="modal-body">
        <p class="lead">
          <i class="fa fa-question-circle fa-lg"></i>
          Es-tu certain de vouloir supprimer le
          <kbd><span id="delete-file-name1">fichier</span></kbd>
          fichier?
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="/admin/upload/file">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="folder" value="{{ $folder }}">
          <input type="hidden" name="del_file" id="delete-file-name2">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Annuler
          </button>
          <button type="submit" class="btn btn-danger">
            Supprimer le fichier
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Delete Folder Modal --}}
<div class="modal fade" id="modal-folder-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Please Confirm</h4>
      </div>
      <div class="modal-body">
        <p class="lead">
          <i class="fa fa-question-circle fa-lg"></i>
          Es-tu certain de vouloir supprimer le
          <kbd><span id="delete-folder-name1">dossier</span></kbd>
          dossier?
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="/admin/upload/folder">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="folder" value="{{ $folder }}">
          <input type="hidden" name="del_folder" id="delete-folder-name2">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Annuler
          </button>
          <button type="submit" class="btn btn-danger">
            Supprimer
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Upload File Modal --}}
<div class="modal fade" id="modal-file-upload">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="/admin/upload/file"
            class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="folder" value="{{ $folder }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            ×
          </button>
          <h4 class="modal-title">Envoi de nouveau fichier</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="file" class="col-sm-3 control-label">
              Fichier
            </label>
            <div class="col-sm-8">
              <input type="file" id="file" name="file">
            </div>
          </div>
          <div class="form-group">
            <label for="file_name" class="col-sm-3 control-label">
              Nom optionnel
            </label>
            <div class="col-sm-4">
              <input type="text" id="file_name" name="file_name"
                     class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Annuler
          </button>
          <button type="submit" class="btn btn-primary">
            Envoyer
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- View Image Modal --}}
<div class="modal fade" id="modal-image-view">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Prévisualisation</h4>
      </div>
      <div class="modal-body">
        <img id="preview-image" src="x" class="img-responsive">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Annuler
        </button>
      </div>
    </div>
  </div>
</div>
