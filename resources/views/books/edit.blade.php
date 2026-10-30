<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
        }

        .container {
            max-width: 550px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        h1 { color: #2c3e50; }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            box-sizing: border-box;
        }

        button {
            background: #2c3e50;
            color: white;
            padding: 12px 20px;
            border: 0;
            margin-top: 20px;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        a {
            display: inline-block;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Book</h1>

        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Book Title</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $book->title) }}"
            >
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="author">Author</label>
            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author', $book->author) }}"
            >
            @error('author')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="status">Reading Status</label>
            <select id="status" name="status">
                <option value="to-read"
                    {{ old('status', $book->status) == 'to-read' ? 'selected' : '' }}>
                    To Read
                </option>
                <option value="reading"
                    {{ old('status', $book->status) == 'reading' ? 'selected' : '' }}>
                    Reading
                </option>
                <option value="finished"
                    {{ old('status', $book->status) == 'finished' ? 'selected' : '' }}>
                    Finished
                </option>
            </select>
            @error('status')
                <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit">Update Book</button>
        </form>

        <a href="{{ route('books.index') }}">← Back to Reading List</a>
    </div>
</body>
</html>
