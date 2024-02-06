<table>
    <tr>
    </tr>
    <tr>
        <td align="center"><strong>COMMU_ID</strong></td>
        <td align="center"><strong>NUM_IN_FAMILY</strong></td>
        <td align="center"><strong>PNAME</strong></td>
        <td align="center"><strong>NAME_SURNAME</strong></td>
        <td align="center"><strong>GENDER</strong></td>
        <td align="center"><strong>DOB</strong></td>
        <td align="center"><strong>AGE</strong></td>
        <td align="center"><strong>HEIGHT</strong></td>
        <td align="center"><strong>WEIGHT</strong></td>
        <td align="center"><strong>NATIONALITY</strong></td>
        <td align="center"><strong>RELIGION</strong></td>
        <td align="center"><strong>SKILL1</strong></td>
        <td align="center"><strong>NATIONAL_LANG</strong></td>
        <td align="center"><strong>LOCAL_LANG</strong></td>
        <td align="center"><strong>STATUS</strong></td>
        <td align="center"><strong>EDU_STATUS</strong></td>
        <td align="center"><strong>EDU_LEVEL</strong></td>
        <td align="center"><strong>READING_LEVEL</strong></td>
        <td align="center"><strong>WRITING_LEVEL</strong></td>
        <td align="center"><strong>CAL_LEVEL</strong></td>
        <td align="center"><strong>RELATIN_HEAD</strong></td>
        <td align="center"><strong>LIVING_STATUS</strong></td>
        <td align="center"><strong>OCCUP_ID</strong></td>
        <td align="center"><strong>OCCUP_DETAILS</strong></td>
        <td align="center"><strong>OCCUP_SUB_ID</strong></td>
        <td align="center"><strong>OCCUP_SUB_DETAILS</strong></td>
        <td align="center"><strong>AREA_OCCUP1</strong></td>
        <td align="center"><strong>AREA_OCCUP2</strong></td>
        <td align="center"><strong>AREA_OCCUP3</strong></td>
        <td align="center"><strong>AREA_OCCUP4</strong></td>
        <td align="center"><strong>AREA_OCCUP5</strong></td>
    </tr>
    @foreach($data as $key => $value)
        <tr>
            <td>{{ $value->STORE_FORM_NUMBER }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_PNAME }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_NAME }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_SURNAME }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_SEX }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_DOB }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_AGE }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_CITIZENNUMBER }}</td>
            {{-- <td>{{ $value->HOUSEHOLD_MEMBER_WEIGHT }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_NATIONALITY }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_RELIGION }}</td> --}}

            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_SKILL }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG }}</td>

            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_STATUS }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS }}</td>

            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS }}</td>
            
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS }}</td>
            <td>{{ $value->HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP }}</td>
            
        </tr>
    @endforeach
</table>