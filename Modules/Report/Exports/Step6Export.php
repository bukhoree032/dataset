<?php

namespace Modules\Report\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Step6Export implements FromView, ShouldAutoSize, WithTitle, WithEvents
{
    use Exportable;

    private $count;
    private $colbStart;
    private $colbEnd;

    public function __construct()
    {
        $this->colbStart = "A";
        $this->colbEnd = "G";
    }

    public function view(): View
    {
        $data = \DB::table('household_infos')
            ->select([
                'stores.STORE_FORM_NUMBER',
                'STORE_FORM_NUMBER',
                'household_communicats.HOUSEHOLD_COMUNICAT_OCCUP_ID'
            ])
            ->join('stores', 'stores.id', '=', 'household_infos.store_id')
            ->join('household_communicats', 'household_communicats.household_info_id', '=', 'household_infos.id')
            ->get();

        foreach ($data as $key => $value) {
            $data[$key]->HOUSEHOLD_COMUNICAT_OCCUP_ID = unserialize($data[$key]->HOUSEHOLD_COMUNICAT_OCCUP_ID);
        }
        // dd($data);
        $this->count = count($data);

        return view('report::admin.report.export', compact('data'));
    }

    public function title(): string
    {
        return "Sheet1";
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);

                $styleConfig = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFF0000']
                        ],
                        'vertical' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFF0000']
                        ]
                    ]
                ];

                $event->sheet->getStyle("{$this->colbStart}1:{$this->colbEnd}1")->applyFromArray($styleConfig);

                for ($i = 1; $i <= $this->count; $i++) {
                    $event->sheet->getStyle("{$this->colbStart}1:{$this->colbEnd}" . ($i + 1))->applyFromArray($styleConfig);
                }
            }
        ];
    }
}
