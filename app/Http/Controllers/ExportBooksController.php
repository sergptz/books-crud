<?php

namespace App\Http\Controllers;

use App\Services\ExcelExportService;
use Illuminate\Http\Request;

class ExportBooksController extends Controller
{
    public function __invoke(ExcelExportService $exportService)
    {
        $excelFile = $exportService->getFile();
        $fileName = config('app.export_file_name');
        return response($excelFile, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=\"$fileName.xlsx\""
        ]);
    }
}
