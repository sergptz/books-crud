<?php

namespace App\Services;

use App\Contracts\ExportDataHandlerService;
use App\Contracts\ExportService;

class ExcelExportService implements ExportService
{
    private $file;
    private $dataHandler;

    public function __construct(ExportDataHandlerService $dataHandler)
    {
        $this->dataHandler = $dataHandler;
    }

    public function initFile()
    {
        $this->file = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    }

    public function getFile()
    {
        $this->initFile();
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($this->file);
        $sheet = $this->file->getActiveSheet();

        foreach (['A', 'B', 'C', 'D', 'E'] as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        $sheet->fromArray($this->dataHandler->getData());

        ob_start();
        $writer->save('php://output');
        return ob_get_clean();
    }
}
