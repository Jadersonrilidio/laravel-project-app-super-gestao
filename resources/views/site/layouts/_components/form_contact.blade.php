{{ $slot }}

<form action={{ route($action_page) }} method="POST">

    @csrf

    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="{{ $class }}">
    <span style="color:red;font-size:0.8em"><i> {{ $errors->has('name') ? $errors->first('name') : '' }} </i></span>
    <br>

    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="{{ $class }}">
    <span style="color:red;font-size:0.8em"><i> {{ $errors->has('phone') ? $errors->first('phone') : '' }} </i></span>
    <br>

    <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="{{ $class }}">
    <span style="color:red;font-size:0.8em"><i> {{ $errors->has('email') ? $errors->first('email') : '' }} </i></span>
    <br>

    <select name="reason_contact_id" class="{{ $class }}">
        <option value="">What is the reason for contacting us?</option>
        @foreach($reasons_contact as $key => $reason)
            <option value="{{ $reason->id }}" {{ (old('reason_contact_id') == $reason->id) ? 'selected' : '' }} > {{ $reason->reason }} </option>
        @endforeach
    </select>
    <span style="color:red;font-size:0.8em"><i> {{ $errors->has('reason_contact_id') ? $errors->first('reason_contact_id') : '' }} </i></span>
    <br>

    <textarea name="message" class="{{ $class }}">{{ (old('message') != '') ? old('message') : 'Type your message' }}</textarea>
    <span style="color:red;font-size:0.8em"><i> {{ $errors->has('message') ? $errors->first('message') : '' }} </i></span>
    <br>

    <button type="submit" class="{{ $class }}">Send</button>

</form>