@extends('layouts.backend')

@section('content')
    <div class="container">
  

  
        <div class="row">
            <div class="col-md-2 col-md-offset-6 text-right">
                <strong>Select Language: </strong>
            </div>
            <div class="col-md-4">
                <select class="form-control changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="ne" {{ session()->get('locale') == 'ne' ? 'selected' : '' }}>Nepali</option>
                </select>
            </div>
        </div>
    
        <h1>{{ __('messages.title') }}</h1>
     
    </div>
@endsection
  
<script type="text/javascript">
  
    var url = "{{ route('changeLang') }}";
  
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
  
</script>
