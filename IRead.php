<?php
use  PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter; 
require_once("vendor/autoload.php");
echo "<strong>Файл <strong/>";




class IRead implements IReadFilter
{
    public $startRow = 0;

    private $endRow = 0;

    /**
     * Откуда читать
     *
     * @param mixed $startRow
     * @param mixed $chunkSize
     */
    public function setRows($startRow, $chunkSize)
    {
        $this->startRow = $startRow;
        $this->endRow = $startRow + $chunkSize;
    }

    public function readCell($column, $row, $worksheetName = '')
    {
        if (($row == 1) || ($row >= $this->startRow && $row < $this->endRow)) {
            return true;
        }

        return false;
    }

function file_read(string $str,string $f)
    {
    #$spreadsheet = $reader->load($str);
    #$sheetData   = $spreadsheet->getActiveSheet()->toArray();
    $reader = IOFactory::createReader($f);
    
        
            $chunkSize = 5;
             
       
           // Цикл для чтения нашего рабочего листа блоками 
            for ($startRow = 1; $startRow <=  100;  $startRow += $chunkSize) {
                // Сообщаем фильтру чтения ограничения, по которым мы хотим читать эту итерацию
                     $chunkFilter = new IRead();
                    $reader->setReadFilter($chunkFilter);
                    $chunkFilter->setRows($startRow, $chunkSize);
                    $o=$startRow;
                    // Загружаем только те строки, которые соответствуют нашему фильтру, из  в объект PhpSpreadsheet
                    $spreadsheet = $reader->load($str);
                    $sheetData   = $spreadsheet->getActiveSheet()->toArray();
                    $spreadsheet->__destruct();
                    $spreadsheet = null;
                    unset($spreadsheet);
                    $reader = null;
                    unset($reader);
                 
                return $sheetData;
                    }
    }







}

?>