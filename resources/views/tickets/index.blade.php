<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Tickets</title>
</head>
<body>
    <h1>All Tickets</h1>

    @if (session('success'))
         <div style="color: green;">
            {{ session('success') }}
        </div>     
    @endif

    <a href="{{ route('tickets.create') }}">+ Submit a New Ticket </a>

    <table border="1" cellpadding="8" style="margin-top: 20px;">
        <tr>
            <th>Subject</th>
            <th>Description</th>
            <th>Category</th>
            <th>Priority</th>
            <th>Status</th>
        </tr>
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->subject }}</td>
                <td>{{ $ticket->description }}</td>
                <td>{{ $ticket->category ?? 'Pending...' }}</td>
                <td>{{ $ticket->priority ?? 'Pending...' }}</td>
                <td>{{ $ticket->status }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>