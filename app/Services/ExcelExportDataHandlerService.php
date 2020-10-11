<?php

namespace App\Services;

use App\Book;
use App\Contracts\ExportDataHandlerService;

class ExcelExportDataHandlerService implements ExportDataHandlerService
{
    public function getData()
    {
        $columns = [
            __('export_cols.name'),
            __('export_cols.author_name'),
            __('export_cols.pages_count'),
            __('export_cols.year'),
            __('export_cols.publisher_name'),
        ];
        $booksData = Book::with('author', 'publisher:id,name')->get()->map(function ($book) {
            $book->author_name = $book->author->full_name;
            $book->publisher_name = $book->publisher->name;
            return array_values($book->only([
                'name',
                'author_name',
                'pages_count',
                'year',
                'publisher_name',
            ]));
        })->toArray();

        array_unshift($booksData, $columns);

        return $booksData;
    }
}
