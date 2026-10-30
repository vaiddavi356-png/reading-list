<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reading List</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
        }

        .add-button {
            display: inline-block;
            background-color: #2c3e50;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 15px;
        }

        .add-button:hover {
            background-color: #1a252f;
        }

        .success {
            color: green;
            background-color: #e8f8ef;
            padding: 12px;
            border-radius: 6px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #34495e;
            color: white;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>📚 My Reading List</h1>

        <!-- Add Book Button -->
        <a href="{{ route('books.create') }}" class="add-button">
            + Add Book
        </a>
        <!-- Filter Books by Status -->
<div style="margin-top: 25px; margin-bottom: 20px;">

    <a href="{{ route('books.index') }}"
       style="margin-right: 15px;">
        All Books
    </a>

    <a href="{{ route('books.index', ['status' => 'to-read']) }}"
       style="margin-right: 15px;">
        To Read
    </a>

    <a href="{{ route('books.index', ['status' => 'reading']) }}"
       style="margin-right: 15px;">
        Reading
    </a>

    <a href="{{ route('books.index', ['status' => 'finished']) }}">
        Finished
    </a>

</div>

        <!-- Success Message -->
        @if(session('success'))
            <p class="success">
                {{ session('success') }}
            </p>
        @endif

        <!-- Display Books -->
        @if($books->isEmpty())

            <p class="empty">No books added yet.</p>

        @else

            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                {{ ucfirst(str_replace('-', ' ', $book->status)) }}
                            </td>
                            <td>
    <a href="{{ route('books.edit', $book) }}">Edit</a>

    <form
        action="{{ route('books.destroy', $book) }}"
        method="POST"
        style="display: inline;"
        onsubmit="return confirm('Are you sure?');"
    >
        @csrf
        @method('DELETE')

        <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer;">
            Delete
        </button>
    </form>
</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif

    </div>
</body>
</html>