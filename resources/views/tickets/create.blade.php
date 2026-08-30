<!DOCTYPE html>
<html>
<head>
    <title>Submit a Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Submit a Support Ticket</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('tickets.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Subject</label>
                <input type="text" name="subject" value="{{ old('subject') }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">Description</label>
                <textarea name="description" rows="5"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white font-medium py-2 rounded-md hover:bg-blue-700 transition">
                Submit Ticket
            </button>
        </form>

        <a href="{{ route('tickets.index') }}" class="block text-center text-blue-600 mt-4 hover:underline">
            View All Tickets →
        </a>
    </div>

</body>
</html>