<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller {

	public function export($id=null)
	{
		// $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('template.xlsx');
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$worksheet = $spreadsheet->getActiveSheet();

		$worksheet->getCell('A1')->setValue('John');
		$worksheet->getCell('A2')->setValue('Smith');

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('write.xlsx');
	}

}

/* End of file Export_excel.php */
/* Location: ./application/controllers/Export_excel.php */