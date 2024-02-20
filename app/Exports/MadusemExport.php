<?php

namespace App\Exports;

use App\Models\Dosen;
use App\Models\KomponenMadusem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MadusemExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return Collection
    */

 
    public function collection()
    {
        // Fetch Dosen data from the database
        $dosenData = Dosen::all()->first(); // Assuming there's only one Dosen or you can choose one based on your logic

        // Menetapkan nilai untuk setiap kolom secara manual
        $formattedData = [
            [

            ]
            
        ];

        return collect($formattedData);
    }

    public function headings(): array
    {
        // Ambil data komponen_madusem dari database
        $komponenMadusemData = KomponenMadusem::all();

        // Ambil nama kolom dari tabel komponen_madusem
        $columnNames = \DB::getSchemaBuilder()->getColumnListing('komponen_madusem');

        // Sesuaikan judul kolom sesuai kebutuhan
        $headings = [
            'Nama Mahasiswa',
            'NIM',
        ];

        foreach ($komponenMadusemData as $komponen) {
            // Tambahkan judul dan nilai maksimal untuk setiap komponen
            $headings[] = ucfirst(str_replace('-', ' ', $komponen->nama_komponen));
        }

        $headings[] = 'PBB 1 ID';
        $headings[] = 'PBB 2 ID';

        return $headings;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getDefaultColumnDimension()->setWidth(30);

        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');

        for ($row = 1; $row <= 100; $row++) {
            $sheet->getStyle('A' . $row . ':' . $sheet->getHighestColumn() . $row)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
            ]);
        }
    }
}
