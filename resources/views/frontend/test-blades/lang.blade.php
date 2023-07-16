@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container py-5" style="margin:10rem 0rem">
        <div class="row">
            <div class="col-md-2 col-md-offset-6 text-right">
                <strong>Select Language:</strong>
            </div>
            <div class="col-md-4">
                <label class="switch">
                    <input type="checkbox" class="changeLang" {{ session()->get('locale') == 'ne' ? 'checked' : '' }}>
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    
        <h1>{{ __('messages.title') }}</h1>
    
    </div>
    {{-- <script type="text/javascript">
        var url = "{{ route('changeLang') }}";
    
        $(".changeLang").change(function() {
            var lang = $(this).is(":checked") ? 'ne' : 'en';
            window.location.href = url + "?lang=" + lang;
        });
    </script> --}}
    
@endsection
