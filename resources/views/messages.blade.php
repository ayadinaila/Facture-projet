{{-- @if ($errors->any())

    @foreach ($errors->all() as$error )
    <div style="color:red;">
        {{ $error }}
    </div>
    @endforeach
@endif --}}

{{-- @if (Session::has('success'))

    <div >{{ Session::get('success') }}</div>

@endif
@if (Session::has('fail'))

    <div >{{ Session::get('fail') }}</div>

@endif

@error('email')
<span>{{ $message }}</span>
@enderror

@error('password')
<span>{{ $message }}</span>
@enderror --}}
