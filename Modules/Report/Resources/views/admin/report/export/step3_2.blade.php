<table>
    <tr>
    </tr>
    <tr>
        <td align="center"><strong>COMMU_ID</strong></td>
        <td align="center"><strong>HOUSE_LIST</strong></td>
        <td align="center"><strong>HOUSE_NO</strong></td>
        <td align="center"><strong>LAND</strong></td>
        <td align="center"><strong>LAND_SIZE</strong></td>
        <td align="center"><strong>AREA_LIST</strong></td>
        <td align="center"><strong>AREA_NO</strong></td>
        <td align="center"><strong>EQUIPMENT_TYPE</strong></td>
        <td align="center"><strong>EQUIPMENT_NUM</strong></td>HOUSEHOLD_ECON_AREA_NO
        <td align="center"><strong>VEHICLE_TYPE</strong></td>
        <td align="center"><strong>VEHICLE_NUM</strong></td>
        <td align="center"><strong>COM_DEVICE_TYPE</strong></td>
        <td align="center"><strong>COM_DEVICE_NUM</strong></td>
        <td align="center"><strong>PET_CATEG</strong></td>
        <td align="center"><strong>PET_NUM</strong></td>
    </tr>
    @foreach($data as $key => $value)
    <tr>
            <td>{{ $value->STORE_FORM_NUMBER }}</td>

            <td>{{ $data[$key]->HOUSEHOLD_ECON_HOUSE_LIST }}</td>

            <td>{{ $data[$key]->HOUSEHOLD_ECON_HOUSE_NO }}</td>

            <td>{{ $data[$key]->HOUSEHOLD_ECON_LAND }}</td>

            <td>{{ $data[$key]->HOUSEHOLD_ECON_LAND_SIZE }}</td>
            
            <td>{{ $data[$key]->HOUSEHOLD_ECON_AREA_LIST }}</td>

            <td>{{ $data[$key]->HOUSEHOLD_ECON_AREA_NO }}</td>
            
            <td>{{ $data[$key]->HOUSEHOLD_ECON_EQUIPMENT_TYPE }}</td>

            <td>{{ $data[$key]->HOUSEHOLD_ECON_EQUIPMENT_NUM }}</td>
            
            <td>{{ $data[$key]->HOUSEHOLD_ECON_VEHICLE_TYPE }}</td>

            <td>{{ $data[$key]->HOUSEHOLD_ECON_VEHICLE_NUM }}</td>
            
            <td>{{ $data[$key]->HOUSEHOLD_ECON_COM_DEVICE_TYPE }}</td>

            <td>{{ $data[$key]->HOUSEHOLD_ECON_COM_DEVICE_NUM }}</td>
            
            <td>{{ $data[$key]->HOUSEHOLD_ECON_PET_CATEG }}</td>

            <td>{{ $data[$key]->HOUSEHOLD_ECON_PET_NUM }}</td>
            
            

    </tr>
    @endforeach
</table>