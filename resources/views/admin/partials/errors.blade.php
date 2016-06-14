@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong>
    Il y a quelques problèmes avec les champs du formulaire.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
