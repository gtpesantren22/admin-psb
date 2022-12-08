<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SantriModel', 'model');
		$this->load->model('Auth_model');

		$user = $this->Auth_model->current_user();

		if (!$this->Auth_model->current_user() || $user->level != 'bunda' && $user->level != 'admin') {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['judul'] = 'home';
		$data['user'] = $this->Auth_model->current_user();
		$data['baru'] = $this->model->baru()->result();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/exBaru', $data);
		$this->load->view('adm/foot');
	}

	public function baruXLS()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = [
			'font' => ['bold' => true], // Set font nya jadi bold
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];

		$sheet->setCellValue('A1', "DATA SANTRI BARU PSB 2023/2024"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('A1:BB1'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1

		$sheet->setCellValue('B1', "PONDOK PESANTREN DARUL LUGHAH WAL KAROMAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('B1:BB2'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('B1')->getFont()->setBold(true); // Set bold kolom A1

		$sheet->setCellValue('H4', "TANGGAL LAHIR"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('H4:J4'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('H4')->getFont()->setBold(true); // Set bold kolom A1

		$sheet->setCellValue('N4', "ALAMAT LENGKAP"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('N4:U4'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('N4')->getFont()->setBold(true); // Set bold kolom A1

		$sheet->setCellValue('V4', "DATA BAPAK"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('V4:AE4'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('V4')->getFont()->setBold(true); // Set bold kolom A1

		$sheet->setCellValue('AF4', "DATA IBU"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('AF4:AO4'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('AF4')->getFont()->setBold(true); // Set bold kolom A1

		// Buat header tabel nya pada baris ke 3
		$sheet->setCellValue('A4', "NO"); 
		$sheet->setCellValue('B4', "NIS"); 
		$sheet->setCellValue('C4', "NISN"); 
		$sheet->setCellValue('D4', "NIK"); 
		$sheet->setCellValue('E4', "NO KK"); 
		$sheet->setCellValue('F4', "NAMA LENGKAP"); 
		$sheet->setCellValue('G4', "TMP LAHIR"); 
		$sheet->setCellValue('H5', "TGL LAHIR"); 
		$sheet->setCellValue('I5', "BLN LAHIR"); 
		$sheet->setCellValue('J5', "THN LAHIR"); 
		$sheet->setCellValue('K4', "JKL"); 
		$sheet->setCellValue('L4', "AGAMA"); 
		$sheet->setCellValue('M4', "LEMBAGA"); 
		$sheet->setCellValue('N5', "JLN/DSN"); 
		$sheet->setCellValue('O5', "RT"); 
		$sheet->setCellValue('P5', "RW"); 
		$sheet->setCellValue('Q5', "DESA"); 
		$sheet->setCellValue('R5', "KECAMATAN"); 
		$sheet->setCellValue('S5', "KABUPATEN"); 
		$sheet->setCellValue('T5', "PROVINSI"); 
		$sheet->setCellValue('U5', "KODE POS"); 
		$sheet->setCellValue('V5', "NAMA BAPAK"); 
		$sheet->setCellValue('W5', "NIK"); 
		$sheet->setCellValue('X5', "TMP LAHIR"); 
		$sheet->setCellValue('Y5', "TGL LAHIR"); 
		$sheet->setCellValue('Z5', "BLN LAHIR"); 
		$sheet->setCellValue('AA5', "THN LAHIR"); 
		$sheet->setCellValue('AB5', "PEKERJAAN"); 
		$sheet->setCellValue('AC5', "PENDIDIKAN"); 
		$sheet->setCellValue('AD5', "PENGHASILAN"); 
		$sheet->setCellValue('AE5', "STATUS"); 
		$sheet->setCellValue('AF5', ""); 
		$sheet->setCellValue('AG5', ""); 
		$sheet->setCellValue('AH5', ""); 
		$sheet->setCellValue('AI5', ""); 
		$sheet->setCellValue('AJ5', ""); 


		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$sheet->getStyle('A1')->applyFromArray($style_col);
		$sheet->getStyle('B1')->applyFromArray($style_col);

		$sheet->getStyle('B4')->applyFromArray($style_col);
		$sheet->getStyle('C4')->applyFromArray($style_col);
		$sheet->getStyle('D4')->applyFromArray($style_col);
		$sheet->getStyle('E4')->applyFromArray($style_col);
		$sheet->getStyle('F4')->applyFromArray($style_col);
		$sheet->getStyle('G4')->applyFromArray($style_col);
		$sheet->getStyle('H4')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa =  $this->model->baru()->result();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
			$sheet->setCellValue('A' . $numrow, $no);
			$sheet->setCellValue('B' . $numrow, $data->nis);
			$sheet->setCellValue('C' . $numrow, $data->nama);
			$sheet->setCellValue('D' . $numrow, $data->jkl);
			$sheet->setCellValue('E' . $numrow, $data->desa);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$sheet->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$sheet->setTitle("Laporan Data Siswa");

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}
}