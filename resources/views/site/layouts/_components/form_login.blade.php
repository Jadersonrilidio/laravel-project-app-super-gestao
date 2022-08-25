{{ $slot }}

<form action="{{ route($action_page) }}" method="POST">

    @csrf

    <input name="user" value="{{ old('user') ?? '' }}" type="text" class="borda-preta" placeholder="Insert username">
    {{ $errors->has('user') ? $errors->first('user') : '' }}
    <br>
    
    <input name="pswd" value="{{ old('pswd') ?? '' }}" type="password" class="borda-preta" placeholder="Insert password">
    {{ $errors->has('pswd') ? $errors->first('pswd') : '' }}
    <br>

    <button type="submit" class="borda-preta"> Login </button>

</form>