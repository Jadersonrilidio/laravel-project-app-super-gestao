{{ $slot }}

<form action={{ route('site.' . $page) }} method="POST">

    @csrf

    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="{{ $class }}">
    <br>

    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="{{ $class }}">
    <br>

    <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="{{ $class }}">
    <br>

    <select name="reason_contact_id" class="{{ $class }}">
        <option value="">What is the reason for contacting us?</option>
        @foreach($reasons_contact as $key => $reason)
            <option value="{{ $reason->id }}" {{ (old('reason_contact_id') == $reason->id) ? 'selected' : '' }} > {{ $reason->reason }} </option>
        @endforeach
    </select>
    <br>

    <textarea name="message" class="{{ $class }}">{{ (old('message') != '') ? old('message') : 'Type your message' }}</textarea>
    <br>

    <button type="submit" class="{{ $class }}">SEND</button>

</form>