<?php

namespace Modules\Report\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Step31Export implements FromView, ShouldAutoSize, WithTitle, WithEvents
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
                'household_econs.HOUSEHOLD_ECON_INCOME_TYPE',
                'household_econs.HOUSEHOLD_ECON_INCOME',
                'household_econs.HOUSEHOLD_ECON_INCOME_DATEDIFF',
                'household_econs.HOUSEHOLD_ECON_EXP_SUM',
                'household_econs.HOUSEHOLD_ECON_EXP',
                'household_econs.created_at'
            ])
            ->join('stores', 'stores.id', '=', 'household_infos.store_id')
            ->join('household_econs', 'household_econs.household_info_id', '=', 'household_infos.id')
            ->get();

        function extract_int($str)
        {
            $str = str_replace(",", "", $str);

            return (doubleval($str));
        }

        foreach ($data as $key => $value) {
            $data[$key]->HOUSEHOLD_ECON_INCOME_TYPE = unserialize($data[$key]->HOUSEHOLD_ECON_INCOME_TYPE);
            $data[$key]->HOUSEHOLD_ECON_INCOME = unserialize($data[$key]->HOUSEHOLD_ECON_INCOME);
            $data[$key]->HOUSEHOLD_ECON_INCOME_DATEDIFF = unserialize($data[$key]->HOUSEHOLD_ECON_INCOME_DATEDIFF);
            $data[$key]->HOUSEHOLD_ECON_EXP_SUM = unserialize($data[$key]->HOUSEHOLD_ECON_EXP_SUM);
            $data[$key]->HOUSEHOLD_ECON_EXP = unserialize($data[$key]->HOUSEHOLD_ECON_EXP);
            $data[$key]->created_at = date("Y", strtotime($data[$key]->created_at)) + 543;

            foreach ($data[$key]->HOUSEHOLD_ECON_INCOME_TYPE as $key_TYPE => $value_type) {
                $data[$key]->HOUSEHOLD_ECON_INCOME_TYPE[$key_TYPE] = extract_int($value_type);
            }

            foreach ($data[$key]->HOUSEHOLD_ECON_EXP_SUM as $key_TYPE => $value_type) {
                $data[$key]->HOUSEHOLD_ECON_EXP_SUM[$key_TYPE] = extract_int($value_type);
            }
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
