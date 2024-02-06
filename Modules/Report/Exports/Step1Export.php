<?php

namespace Modules\Report\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Step1Export implements FromView, ShouldAutoSize, WithTitle, WithEvents
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
        // asd
        $data = \DB::table('household_members')
            ->select([
                'stores.STORE_FORM_NUMBER',
                'household_members.HOUSEHOLD_MEMBER_PNAME',
                'household_members.HOUSEHOLD_MEMBER_NAME',
                'household_members.HOUSEHOLD_MEMBER_SURNAME',
                'household_members.HOUSEHOLD_MEMBER_SEX',
                'household_members.HOUSEHOLD_MEMBER_DOB',
                'household_members.HOUSEHOLD_MEMBER_AGE',
                'household_members.HOUSEHOLD_MEMBER_CITIZENNUMBER',
                // 'household_members.HOUSEHOLD_MEMBER_WEIGHT',
                // 'household_members.HOUSEHOLD_MEMBER_NATIONALITY',
                // 'household_members.HOUSEHOLD_MEMBER_RELIGION',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_SKILL',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_STATUS',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS',
                'household_member_generals.HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP'
            ])
            ->join('household_infos', 'household_infos.id', '=', 'household_members.household_info_id')
            ->join('stores', 'stores.id', '=', 'household_infos.store_id')
            ->join('household_member_generals', 'household_member_generals.household_members_id', '=', 'household_members.id')
            ->get();

        function extract_int($str)
        {
            preg_match('/[^0-9]*([0-9]+)[^0-9]*/', $str, $regs);

            return (intval($regs));
        }
        function loop($str)
        {
            $sum_key_loop = '';
            $row = '0';
            foreach ($str as $key_loop => $value_loop) {
                if ($value_loop != '') {
                    $key_loop++;
                    $row++;
                    if ($row == '1') {
                        $sum_key_loop = $key_loop;
                    } else {
                        $sum_key_loop = $sum_key_loop . "," . $key_loop;
                    }
                }
            }

            return ($sum_key_loop);
        }

        foreach ($data as $key => $value) {
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_SKILL = unserialize($data[$key]->HOUSEHOLD_MEMBER_GENERAL_SKILL);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG = unserialize($data[$key]->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG = unserialize($data[$key]->HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID = unserialize($data[$key]->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS = unserialize($data[$key]->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_STATUS = extract_int($data[$key]->HOUSEHOLD_MEMBER_GENERAL_STATUS);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS = extract_int($data[$key]->HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL = extract_int($data[$key]->HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL = extract_int($data[$key]->HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL = extract_int($data[$key]->HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL = extract_int($data[$key]->HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD = extract_int($data[$key]->HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS = extract_int($data[$key]->HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID = extract_int($data[$key]->HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP = extract_int($data[$key]->HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP);

            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_SKILL = loop($data[$key]->HOUSEHOLD_MEMBER_GENERAL_SKILL);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG = loop($data[$key]->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG = loop($data[$key]->HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID = loop($data[$key]->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID);
            $data[$key]->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS = loop($data[$key]->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS);
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
