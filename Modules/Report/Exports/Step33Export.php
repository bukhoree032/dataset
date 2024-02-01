<?php

namespace Modules\Report\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Step33Export implements FromView, ShouldAutoSize, WithTitle, WithEvents
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
                'household_econs.HOUSEHOLD_DEPT_AMOUNT',
                'household_econs.HOUSEHOLD_ECON_DEPT_FROM_TYPE',
                'household_econs.HOUSEHOLD_ECON_SPECIAL_FIN_',
                'household_econs.HOUSEHOLD_ECON_COMM_BANK_',
                'household_econs.HOUSEHOLD_ECON_NONBANK_',
                'household_econs.HOUSEHOLD_ECON_COMMU_FUND_',
                'household_econs.HOUSEHOLD_ECON_H_SAVING_',
                'household_econs.HOUSEHOLD_ECON_OCCUP_PROBLEM_',
                'household_econs.HOUSEHOLD_ECON_LIVING_PROBLEM_'
            ])
            ->join('stores', 'stores.id', '=', 'household_infos.store_id')
            ->join('household_econs', 'household_econs.household_info_id', '=', 'household_infos.id')
            ->get();

        foreach ($data as $key => $value) {
            $data[$key]->HOUSEHOLD_ECON_DEPT_FROM_TYPE = unserialize($data[$key]->HOUSEHOLD_ECON_DEPT_FROM_TYPE);
            $data[$key]->HOUSEHOLD_ECON_SPECIAL_FIN_ = unserialize($data[$key]->HOUSEHOLD_ECON_SPECIAL_FIN_);
            $data[$key]->HOUSEHOLD_ECON_COMM_BANK_ = unserialize($data[$key]->HOUSEHOLD_ECON_COMM_BANK_);
            $data[$key]->HOUSEHOLD_ECON_NONBANK_ = unserialize($data[$key]->HOUSEHOLD_ECON_NONBANK_);
            $data[$key]->HOUSEHOLD_ECON_COMMU_FUND_ = unserialize($data[$key]->HOUSEHOLD_ECON_COMMU_FUND_);
            $data[$key]->HOUSEHOLD_ECON_H_SAVING_ = unserialize($data[$key]->HOUSEHOLD_ECON_H_SAVING_);
            $data[$key]->HOUSEHOLD_ECON_OCCUP_PROBLEM_ = unserialize($data[$key]->HOUSEHOLD_ECON_OCCUP_PROBLEM_);
            $data[$key]->HOUSEHOLD_ECON_LIVING_PROBLEM_ = unserialize($data[$key]->HOUSEHOLD_ECON_LIVING_PROBLEM_);
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
