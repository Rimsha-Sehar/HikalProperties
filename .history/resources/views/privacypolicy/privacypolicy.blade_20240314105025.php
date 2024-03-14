@extends('auth.index')
@section('content')
@if(get_settings('recaptcha_status')==1)
  <script src="{{ asset('public/assets/global/js/api.js') }}"></script>
@endif
<section class="sign-section">
    <div class="container-xl">
        <div class="row align-items-center p-5 ">
        </div>
    </div>
</section>

@endsection
