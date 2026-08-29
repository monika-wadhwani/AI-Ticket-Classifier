<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submit a Ticket</title>
</head>
<body>
    <h1>Submit a Support Ticket</h1>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>     
    @endif

    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf

        <div>
            <label>Subject:</label><br>
            <input type="text" name="subject" value="{{ old('subject') }}">
        </div>

        <br>

        <div>
            <label>Description:</label><br>
            <textarea name="description" rows="5" cols="40">{{ old('description') }}</textarea>
        </div>

        <br>

        <button type="submit">Submit Ticket</button>
    </form>
    
</body>
</html>