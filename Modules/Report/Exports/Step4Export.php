<?php

namespace Modules\Report\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Step4Export implements FromView, ShouldAutoSize, WithTitle, WithEvents
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
                'household_enviros.HOUSEHOLD_ENVIR_WLIGHT',
                'household_enviros.HOUSEHOLD_ENVIR_CLEAN',
                'household_enviros.HOUSEHOLD_ENVIR_SAFE',
                'household_enviros.HOUSEHOLD_ENVIR_BIN',
                'household_enviros.HOUSEHOLD_ENVIR_H_ENVI',
                'household_enviros.HOUSEHOLD_ENVIR_TOXIC',
                'household_enviros.HOUSEHOLD_ENVIR_WATER',
                'household_enviros.HOUSEHOLD_ENVIR_DRINKING',
                // 'household_enviros.HOUSEHOLD_ENVIR_CONTAINER',
                'household_enviros.HOUSEHOLD_ENVIR_COOKING',
                'household_enviros.HOUSEHOLD_ENVIR_WATER_USED',
                // 'household_enviros.HOUSEHOLD_ENVIR_CONTAINER_USED',
                'household_enviros.HOUSEHOLD_ENVIR_AREA',
                'household_enviros.HOUSEHOLD_ENVIR_ENV_ACT',
                'household_enviros.HOUSEHOLD_ENVIR_ELECTRIC',
                'household_enviros.HOUSEHOLD_ENVIR_CONSERV',
                'household_enviros.HOUSEHOLD_ENVIR_DISASTER',
                'household_enviros.HOUSEHOLD_ENVIR_SOLUTION'
            ])
            ->join('stores', 'stores.id', '=', 'household_infos.store_id')
            ->join('household_enviros', 'household_enviros.household_info_id', '=', 'household_infos.id')
            ->get();

        foreach ($data as $key => $value) {
            $data[$key]->HOUSEHOLD_ENVIR_WLIGHT = unserialize($data[$key]->HOUSEHOLD_ENVIR_WLIGHT);
            $data[$key]->HOUSEHOLD_ENVIR_CLEAN = unserialize($data[$key]->HOUSEHOLD_ENVIR_CLEAN);
            $data[$key]->HOUSEHOLD_ENVIR_SAFE = unserialize($data[$key]->HOUSEHOLD_ENVIR_SAFE);
            $data[$key]->HOUSEHOLD_ENVIR_BIN = unserialize($data[$key]->HOUSEHOLD_ENVIR_BIN);
            $data[$key]->HOUSEHOLD_ENVIR_H_ENVI = unserialize($data[$key]->HOUSEHOLD_ENVIR_H_ENVI);
            $data[$key]->HOUSEHOLD_ENVIR_TOXIC = unserialize($data[$key]->HOUSEHOLD_ENVIR_TOXIC);
            $data[$key]->HOUSEHOLD_ENVIR_WATER = unserialize($data[$key]->HOUSEHOLD_ENVIR_WATER);
            $data[$key]->HOUSEHOLD_ENVIR_DRINKING = unserialize($data[$key]->HOUSEHOLD_ENVIR_DRINKING);
            // $data[$key]->HOUSEHOLD_ENVIR_CONTAINER = unserialize($data[$key]->HOUSEHOLD_ENVIR_CONTAINER);
            $data[$key]->HOUSEHOLD_ENVIR_COOKING = unserialize($data[$key]->HOUSEHOLD_ENVIR_COOKING);
            $data[$key]->HOUSEHOLD_ENVIR_WATER_USED = unserialize($data[$key]->HOUSEHOLD_ENVIR_WATER_USED);
            // $data[$key]->HOUSEHOLD_ENVIR_CONTAINER_USED = unserialize($data[$key]->HOUSEHOLD_ENVIR_CONTAINER_USED);
            $data[$key]->HOUSEHOLD_ENVIR_AREA = unserialize($data[$key]->HOUSEHOLD_ENVIR_AREA);
            $data[$key]->HOUSEHOLD_ENVIR_ENV_ACT = unserialize($data[$key]->HOUSEHOLD_ENVIR_ENV_ACT);
            $data[$key]->HOUSEHOLD_ENVIR_ELECTRIC = unserialize($data[$key]->HOUSEHOLD_ENVIR_ELECTRIC);
            $data[$key]->HOUSEHOLD_ENVIR_CONSERV = unserialize($data[$key]->HOUSEHOLD_ENVIR_CONSERV);
            $data[$key]->HOUSEHOLD_ENVIR_DISASTER = unserialize($data[$key]->HOUSEHOLD_ENVIR_DISASTER);
            $data[$key]->HOUSEHOLD_ENVIR_SOLUTION = unserialize($data[$key]->HOUSEHOLD_ENVIR_SOLUTION);
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
