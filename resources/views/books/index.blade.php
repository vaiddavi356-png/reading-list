<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Reading List</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #f3e8ff, #e0f2fe);
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
            color: #334155;
        }

        .container {
            max-width: 1050px;
            margin: 0 auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 22px;
            box-shadow: 0 12px 35px rgba(100, 70, 150, 0.13);
        }

        h1 {
            text-align: center;
            color: #6d28d9;
            font-size: 34px;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .add-button {
            display: inline-block;
            background: #8b5cf6;
            color: white;
            padding: 12px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        .add-button:hover {
            background: #7c3aed;
            transform: translateY(-2px);
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filters a {
            background: #ede9fe;
            color: #6d28d9;
            padding: 10px 16px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: 0.2s;
        }

        .filters a:hover {
            background: #c4b5fd;
        }

        .filters a.active {
            background: #7c3aed;
            color: white;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #22c55e;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border-radius: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: #7c3aed;
            color: white;
            padding: 17px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        tbody tr:nth-child(even) {
            background: #faf7ff;
        }

        tbody tr:hover {
            background: #f3e8ff;
        }

        .book-title {
            font-weight: 600;
            color: #334155;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-to-read {
            background: #fef3c7;
            color: #92400e;
        }

        .status-reading {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-finished {
            background: #dcfce7;
            color: #166534;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .edit-button {
            display: inline-block;
            background: #3b82f6;
            color: white;
            padding: 9px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: 0.2s;
        }

        .edit-button:hover {
            background: #2563eb;
        }

        .delete-button {
            background: #fb7185;
            color: white;
            padding: 9px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            transition: 0.2s;
        }

        .delete-button:hover {
            background: #e11d48;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            background: #faf5ff;
            border-radius: 14px;
            color: #64748b;
            margin-top: 20px;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        @media (max-width: 650px) {
            .container {
                padding: 22px;
            }

            h1 {
                font-size: 27px;
            }

            .toolbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .filters {
                gap: 8px;
            }

            .filters a {
                padding: 9px 12px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Page Heading -->
        <h1>📚 My Reading List</h1>

        <p class="subtitle">
            Your personal space to organize books and track your reading journey ✨
        </p>

        <!-- Add Book and Filters -->
        <div class="toolbar">

            <a href="{{ route('books.create') }}" class="add-button">
                + Add Book
            </a>

            <div class="filters">

                <a href="{{ route('books.index') }}"
                   class="{{ !request('status') ? 'active' : '' }}">
                    All Books
                </a>

                <a href="{{ route('books.index', ['status' => 'to-read']) }}"
                   class="{{ request('status') == 'to-read' ? 'active' : '' }}">
                    📖 To Read
                </a>

                <a href="{{ route('books.index', ['status' => 'reading']) }}"
                   class="{{ request('status') == 'reading' ? 'active' : '' }}">
                    📘 Reading
                </a>

                <a href="{{ route('books.index', ['status' => 'finished']) }}"
                   class="{{ request('status') == 'finished' ? 'active' : '' }}">
                    ✅ Finished
                </a>

            </div>

        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Books List -->
        @if($books->isEmpty())

            <div class="empty">

                <div class="empty-icon">📚</div>

                <h3>No books found!</h3>

                <p>
                    Your reading list is empty for this category.
                    Add a book or select another filter.
                </p>

            </div>

        @else

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Reading Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($books as $book)

                            <tr>

                                <td class="book-title">
                                    {{ $book->title }}
                                </td>

                                <td>
                                    {{ $book->author }}
                                </td>

                                <td>
                                    <span class="status status-{{ $book->status }}">
                                        {{ ucfirst(str_replace('-', ' ', $book->status)) }}
                                    </span>
                                </td>

                                <td>

                                    <div class="actions">

                                        <!-- Edit Button -->
                                        <a href="{{ route('books.edit', $book) }}"
                                           class="edit-button">
                                            ✏️ Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <form
                                            action="{{ route('books.destroy', $book) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="delete-button">
                                                🗑️ Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>

</body>
</html>