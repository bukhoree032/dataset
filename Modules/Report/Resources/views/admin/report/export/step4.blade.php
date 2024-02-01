<table>
    <tr>
        
    </tr>
    <tr>
        <td align="center"><strong>COMMU_ID</strong></td>
        <td align="center"><strong>WLIGHT_1</strong></td>
        <td align="center"><strong>WLIGHT_2</strong></td>
        <td align="center"><strong>CLEAN_1</strong></td>
        <td align="center"><strong>CLEAN_2</strong></td>
        <td align="center"><strong>SAFE_1</strong></td>
        <td align="center"><strong>SAFE_2</strong></td>
        <td align="center"><strong>SAFE_3</strong></td>
        <td align="center"><strong>SAFE_4</strong></td>
        <td align="center"><strong>BIN_1</strong></td>
        <td align="center"><strong>BIN_2</strong></td>
        <td align="center"><strong>BIN_3</strong></td>
        <td align="center"><strong>BIN_4</strong></td>
        <td align="center"><strong>BIN_5</strong></td>
        <td align="center"><strong>H_ENVI_1</strong></td>
        <td align="center"><strong>H_ENVI_2</strong></td>
        <td align="center"><strong>H_ENVI_3</strong></td>
        <td align="center"><strong>H_ENVI_4</strong></td>
        <td align="center"><strong>TOXIC_1</strong></td>
        <td align="center"><strong>TOXIC_2</strong></td>
        <td align="center"><strong>TOXIC_3</strong></td>
        <td align="center"><strong>TOXIC_4</strong></td>
        <td align="center"><strong>TOXIC_5</strong></td>
        <td align="center"><strong>WATER_1</strong></td>
        <td align="center"><strong>WATER_2</strong></td>
        <td align="center"><strong>WATER_3</strong></td>
        <td align="center"><strong>DRINKING_1</strong></td>
        <td align="center"><strong>DRINKING_2</strong></td>
        <td align="center"><strong>DRINKING_3</strong></td>
        <td align="center"><strong>DRINKING_4</strong></td>
        <td align="center"><strong>DRINKING_5</strong></td>
        <td align="center"><strong>CONTAINER</strong></td>
        <td align="center"><strong>COOKING_1</strong></td>
        <td align="center"><strong>COOKING_2</strong></td>
        <td align="center"><strong>WATER_USED_1</strong></td>
        <td align="center"><strong>WATER_USED_2</strong></td>
        <td align="center"><strong>WATER_USED_3</strong></td>
        <td align="center"><strong>WATER_USED_4</strong></td>
        <td align="center"><strong>WATER_USED_5</strong></td>
        <td align="center"><strong>CONTAINER_USED</strong></td>
        <td align="center"><strong>AREA_1</strong></td>
        <td align="center"><strong>AREA_2</strong></td>
        <td align="center"><strong>ENV_ACT_1</strong></td>
        <td align="center"><strong>ENV_ACT_2</strong></td>
        <td align="center"><strong>ENV_ACT_3</strong></td>
        <td align="center"><strong>ENV_ACT_4</strong></td>
        <td align="center"><strong>ENV_ACT_5</strong></td>
        <td align="center"><strong>ENV_ACT_6</strong></td>
        <td align="center"><strong>ELECTRIC_1</strong></td>
        <td align="center"><strong>ELECTRIC_2</strong></td>
        <td align="center"><strong>CONSERV_1</strong></td>
        <td align="center"><strong>CONSERV_2</strong></td>
        <td align="center"><strong>CONSERV_3</strong></td>
        <td align="center"><strong>CONSERV_4</strong></td>
        <td align="center"><strong>CONSERV_5</strong></td>
        <td align="center"><strong>DISASTER_1</strong></td>
        <td align="center"><strong>DISASTER_2</strong></td>
        <td align="center"><strong>DISASTER_3</strong></td>
        <td align="center"><strong>DISASTER_4</strong></td>
        <td align="center"><strong>DISASTER_5</strong></td>
        <td align="center"><strong>SOLUTION_1</strong></td>
        <td align="center"><strong>SOLUTION_2</strong></td>
        <td align="center"><strong>SOLUTION_3</strong></td>
        <td align="center"><strong>SOLUTION_4</strong></td>
        <td align="center"><strong>SOLUTION_4</strong></td>
    </tr>
    @foreach($data as $key => $value)
    <tr>
            <td>{{ $value->STORE_FORM_NUMBER }}</td>
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_WLIGHT as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=1; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_CLEAN as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=1; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_SAFE as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=3; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_BIN as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_H_ENVI as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=3; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_TOXIC as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_WATER as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=2; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_DRINKING as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_CONTAINER as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_COOKING as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=1; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_WATER_USED as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_CONTAINER_USED as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_AREA as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=1; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_ENV_ACT as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=5; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_ELECTRIC as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=1; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_CONSERV as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_DISASTER as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor
            
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ENVIR_SOLUTION as $key_COM_ELEC => $value_COM_ELEC)
                @php $row++; @endphp
                <td>{{ $key_COM_ELEC }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor
    </tr>
    @endforeach
</table>