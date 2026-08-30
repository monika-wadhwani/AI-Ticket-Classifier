<!DOCTYPE html>
<html>
<head>
    <title>All Tickets</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">

    <div class="max-w-5xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">All Tickets</h1>
            <a href="{{ route('tickets.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                + New Ticket
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-4 py-3 text-gray-600 font-medium">Subject</th>
                        <th class="px-4 py-3 text-gray-600 font-medium">Description</th>
                        <th class="px-4 py-3 text-gray-600 font-medium">Category</th>
                        <th class="px-4 py-3 text-gray-600 font-medium">Priority</th>
                        <th class="px-4 py-3 text-gray-600 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr class="border-b last:border-0">
                            <td class="px-4 py-3">{{ $ticket->subject }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $ticket->description }}</td>
                            <td class="px-4 py-3">{{ $ticket->category ?? 'Pending...' }}</td>
                            <td class="px-4 py-3">
                                @if ($ticket->priority === 'high')
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-sm">High</span>
                                @elseif ($ticket->priority === 'medium')
                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-sm">Medium</span>
                                @elseif ($ticket->priority === 'low')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-sm">Low</span>
                                @else
                                    <span class="text-gray-400 text-sm">Pending...</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $ticket->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>