@php 
        $INCOME_TITIL = array("","เงินเดือน/ค่าจ้าง", "รายรับจากการทำการทำการเกษตร", "รายได้จากการประกอบธุรกิจ/ค้าขาย", "รายได้จากทรัพย์สิน", "รายได้จากแหล่งอื่นๆ");

        $EXP_SUM_TITIL = array("",
                    "ค่าใช้จ่ายประกอบอาชีพ",
                    "ค่าอาหาร",
                    "ค่าเสื้อผ้า/เครื่องแต่งกาย",
                    "ค่ายา-สุขภาพอนามัย",
                    "ค่าที่อยู่อาศัย",
                    "ค่าใช้จ่ายเพื่อการลงทุน",
                    "ค่าใช้จ่ายในการศึกษา",
                    "ค่าใช้จ่าย อื่น ๆ");
        function extract_int($str){
            preg_match('/[^0-9]*([0-9]+)[^0-9]*/', $str, $regs);
            return (intval($regs[1]));
        }
@endphp
<table>
    <tr>
    </tr>
    <tr>
    <td align="center"><strong>COMMU_ID</strong></td>
    <td align="center"><strong>INCOME_YEAR</strong></td>
    <td align="center"><strong>COLLECT_NO</strong></td>
    <td align="center"><strong>INCOME_TYPE</strong></td>
    <td align="center"><strong>INCOME_JAN</strong></td>
    <td align="center"><strong>INCOME_FEB</strong></td>
    <td align="center"><strong>INCOME_MAR</strong></td>
    <td align="center"><strong>INCOME_APR</strong></td>
    <td align="center"><strong>INCOME_MAY</strong></td>
    <td align="center"><strong>INCOME_JUN</strong></td>
    <td align="center"><strong>INCOME_JUL</strong></td>
    <td align="center"><strong>INCOME_AUG</strong></td>
    <td align="center"><strong>INCOME_SEP</strong></td>
    <td align="center"><strong>INCOME_OCT</strong></td>
    <td align="center"><strong>INCOME_NOV</strong></td>
    <td align="center"><strong>INCOME_DEC</strong></td>
    <td align="center"><strong>INCOME_SUM</strong></td>
    <td align="center"><strong>EXPENSES_TYPE</strong></td>
    <td align="center"><strong>EXP_JAN</strong></td>
    <td align="center"><strong>EXP_FEB</strong></td>
    <td align="center"><strong>EXP_MAR</strong></td>
    <td align="center"><strong>EXP_APR</strong></td>
    <td align="center"><strong>EXP_MAY</strong></td>
    <td align="center"><strong>EXP_JUN</strong></td>
    <td align="center"><strong>EXP_JUL</strong></td>
    <td align="center"><strong>EXP_AUG</strong></td>
    <td align="center"><strong>EXP_SEP</strong></td>
    <td align="center"><strong>EXP_OCT</strong></td>
    <td align="center"><strong>EXP_NOV</strong></td>
    <td align="center"><strong>EXP_DEC</strong></td>
    <td align="center"><strong>EXP_SUM</strong></td>
        
    </tr>
    @foreach($data as $key => $value)
            @for ($a=1; $a <= 8; $a++)
                
                @if(isset($value->HOUSEHOLD_ECON_INCOME_TYPE[$a])!='') {{-- น่าสนใจ HOUSEHOLD_ECON_INCOME_TYPE --}}
                    @if (is_numeric($value->HOUSEHOLD_ECON_INCOME_TYPE[$a]) )
                        @php $INCOME = $value->HOUSEHOLD_ECON_INCOME_TYPE[$a]; @endphp
                        @php $INCOME /= 12; @endphp
                        @php $INCOME = number_format($INCOME); @endphp
                    @else
                        @php $INCOME = 0; @endphp
                    @endif
                @else
                    @php $INCOME = '0'; @endphp
                @endif
                
                <tr>
                    <td>{{ $value->STORE_FORM_NUMBER }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>1</td>
                    @if($a <= "5")
                        <td>{{ $INCOME_TITIL[$a] }}</td>
                        @for($loop=1; $loop<=12; $loop++)
                            <td>{{ $INCOME }}</td>
                        @endfor
                            <td>{{ ($value->HOUSEHOLD_ECON_INCOME_TYPE[$a]) }}</td>
                    @else
                    @for($loop=1; $loop<=14; $loop++)
                            <td></td>
                        @endfor
                    @endif

                    
                    @if(isset($value->HOUSEHOLD_ECON_EXP_SUM[$a])!='')
                        @if ( is_numeric($value->HOUSEHOLD_ECON_EXP_SUM[$a]) )
                            @php $EXP_SUM = $value->HOUSEHOLD_ECON_EXP_SUM[$a]; @endphp
                            @php $EXP_SUM /= 12; @endphp
                            @php $EXP_SUM = number_format($EXP_SUM); @endphp
                        @else
                            @php $EXP_SUM = 0; @endphp
                        @endif
                    @else
                        @php $EXP_SUM = '0'; @endphp
                    @endif
                    
                    @if($a <= "8")
                        <td>{{ $EXP_SUM_TITIL[$a] }}</td>
                        @for($loop=1; $loop<=12; $loop++)
                            <td>{{ $EXP_SUM }}</td>
                        @endfor
                            <td>{{ $value->HOUSEHOLD_ECON_EXP_SUM[$a] }}</td>
                    @endif
            @endfor
    @endforeach
</table>