<?php

namespace Modules\Report\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Step2Export implements FromView, ShouldAutoSize, WithTitle, WithEvents
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
        $data = \DB::table('household_members')
            ->select([

                'stores.STORE_FORM_NUMBER',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_RISK',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_HCARE',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_EMERGENCY',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_CARER_',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_W_CARE',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_P_CARE',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_ILLNESS',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_BENEFIT',
                'household_member_healths.HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE'
            ])
            ->join('household_infos', 'household_infos.id', '=', 'household_members.household_info_id')
            ->join('stores', 'stores.id', '=', 'household_infos.store_id')
            ->join('household_member_healths', 'household_member_healths.household_members_id', '=', 'household_members.id')
            ->get();

        function extract_int($str)
        {
            preg_match('/[^0-9]*([0-9]+)[^0-9]*/', $str, $regs);

            return (intval($regs));
        }

        foreach ($data as $key => $value) {
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_RISK = unserialize($data[$key]->HOUSEHOLD_MEMBER_HEALTH_RISK);
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP = unserialize($data[$key]->HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP);
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_HCARE = unserialize($data[$key]->HOUSEHOLD_MEMBER_HEALTH_HCARE);
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_EMERGENCY = unserialize($data[$key]->HOUSEHOLD_MEMBER_HEALTH_EMERGENCY);
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS = unserialize($data[$key]->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS);
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_CARER_ = unserialize($data[$key]->HOUSEHOLD_MEMBER_HEALTH_CARER_);
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_P_CARE = unserialize($data[$key]->HOUSEHOLD_MEMBER_HEALTH_P_CARE);
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_ILLNESS = unserialize($data[$key]->HOUSEHOLD_MEMBER_HEALTH_ILLNESS);
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_BENEFIT = unserialize($data[$key]->HOUSEHOLD_MEMBER_HEALTH_BENEFIT);
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE = unserialize($data[$key]->HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE);
            $data[$key]->HOUSEHOLD_MEMBER_HEALTH_W_CARE = extract_int($data[$key]->HOUSEHOLD_MEMBER_HEALTH_W_CARE);
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
