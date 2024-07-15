<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Condition {{ strtoupper($dateRequested['dateRequested']['month']) }}</title>
    <style>
        .container {
            width: auto;
            height: auto;
            display: block;
            font-size: 5pt;
            font-family: "Times New Roman", Times, serif;
        }
        .td-title {
            background-color: #1f497d;
            color: white;
            font-weight: bolder;
            padding: 1px;
        }
        .td-title-tanggal {
            background-color: #002060;
            color: white;
            font-weight: bolder;
            padding: 1px;
        }
        td {
            padding: 1px;
            border:0.5px solid black;
        }
        table {
            width: 100%;
            height: auto;
            border-collapse:collapse;
            table-layout: fixed;
        }
        .orangebg {
            background-color: #f79646;
        }
        .greenbg {
            background-color: rgb(97, 187, 97);
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <td colspan="{{ 13 + $dateRequested['dateRequested']['total_days'] }}">
                    <h3 style="color:red;">&nbsp;CAR CONDITION HO & BRANCH LAMPUNG</h3>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td rowspan="4" style="width:7%;" class="td-title">HO / BRANCH / MS / RC / DEPO (OUTLET)</td>
                <td rowspan="4" style="width:2%;" class="td-title">NO</td>
                <td rowspan="4" style="width:10.5%;" class="td-title">DIVISION</td>
                <td rowspan="4" style="width:10%;" class="td-title">DEPARTMENT / SECTION DEPARTMENT / SECTION</td>
                <td rowspan="4" colspan="2" class="td-title" style="width: 6%">NOPOL</td>
                <td rowspan="2" colspan="3" class="td-title">KM READING (FOR A MONTH)</td>
                <td colspan="{{$dateRequested['dateRequested']['total_days']}}" class="td-title">{{ strtoupper($dateRequested['dateRequested']['month']) }}</td>
                <td rowspan="4" style="width:5%;" class="td-title">TOTAL RUNNING HOURS (RH)</td>
                <td rowspan="2" colspan="2" class="td-title">AVAILABILITY</td>
                <td rowspan="4" style="width:6%;" class="td-title">( % UTILITAS )</td>
            </tr>
            <tr style="text-align:center;">
                @for ($i = 0; $i < 6; $i++)
                    @if (isset($dateRequested['dateRequested']['week_number'][$i]))
                        <td colspan="{{ $dateRequested['dateRequested']['week_number'][$i]['daysPerWeek'] }}" class="td-title">
                            W{{$i+1}}
                        </td>
                    @endif
                @endfor
            </tr>
            <tr style="text-align:center;">
                <td rowspan="2" class="td-title" style="width:5%;">BEFORE</td>
                <td rowspan="2" class="td-title" style="width:5%;">AFTER</td>
                <td rowspan="2" class="td-title" style="width:5%;">TOTAL KM</td>
                @for ($x = 0; $x < $i; $x++) {{-- perulangan minggu --}}
                    @for ($z = 0; $z < 7; $z++) {{-- perulangan hari --}}
                        @if (isset($dateRequested['dateRequested']['week_number'][$x]['days'][$z]))
                            @if ($dateRequested['dateRequested']['week_number'][$x]['days'][$z]['day_name'] === 'SUN')
                                <td class="td-title-tanggal" style="background-color:red; width:2.5%;">{{ $dateRequested['dateRequested']['week_number'][$x]['days'][$z]['day_name'] }}</td>
                            @else
                                <td class="td-title-tanggal" style="width: 2.5%;">{{ $dateRequested['dateRequested']['week_number'][$x]['days'][$z]['day_name'] }}</td>
                            @endif
                        @endif
                    @endfor
                @endfor
                <td rowspan="2" class="td-title" style="width: 5%">WORKING DAYS</td>
                <td rowspan="2" class="td-title" style="width: 5%">HOURS</td>
            </tr>
            <tr style="text-align:center;">
                @php
                    $perulanganTanggal = 0;
                @endphp
                @for ($x = 0; $x < $i; $x++) {{-- perulangan minggu --}}
                    @for ($z = 0; $z < 7; $z++) {{-- perulangan hari --}}
                        @if (isset($dateRequested['dateRequested']['week_number'][$x]['days'][$z]))
                        @php
                            $perulanganTanggal++;
                        @endphp
                            @if ($dateRequested['dateRequested']['week_number'][$x]['days'][$z]['day_name'] === 'SUN')
                                <td class="td-title-tanggal" style="background-color:red;">{{$perulanganTanggal}}</td>
                            @else
                                <td class="td-title-tanggal">{{$perulanganTanggal}}</td>
                            @endif
                        @endif
                    @endfor
                @endfor
            </tr>
            <tr style="text-align:center;">
                <td rowspan="{{ $vehicle['total_vehicle'] + 2 }}" style="font-weight: bold;">LAMPUNG</td>
                <td style="text-align: start; font-weight:bolder;" colspan="3" class="orangebg">TOTAL KENDARAAN & AVAILABILITY (%)</td>
                <td colspan="1/2" class="orangebg" style="width: 1.5%">{{ $vehicle['total_vehicle'] }}</td>
                <td colspan="1/2" class="orangebg" style="width: 5%"></td>
                <td class="orangebg"></td>
                <td class="orangebg"></td>
                <td class="orangebg">0</td>
                <td colspan="{{$dateRequested['dateRequested']['total_days']}}" class="orangebg"></td>
                <td colspan="4" class="orangebg"></td>
            </tr>
            @php
                $nomor = 0;
            @endphp
            @for ($nilaiLoop = 0; $nilaiLoop < $carcondition['total_department']; $nilaiLoop++)
                <tr style="text-align:center;">
                    <td rowspan="{{$carcondition['carcondition'][$nilaiLoop]['total_vehicles']}}">{{$nilaiLoop + 1}}</td>
                    <td rowspan="{{$carcondition['carcondition'][$nilaiLoop]['total_vehicles']}}">{{$carcondition['carcondition'][$nilaiLoop]['department_name']}}</td>
                    <td rowspan="{{$carcondition['carcondition'][$nilaiLoop]['total_vehicles']}}">{{$carcondition['carcondition'][$nilaiLoop]['driver_name']}}</td>
                    <td>{{ $nomor += 1 }}</td>
                    <td>{{ $carcondition['carcondition'][$nilaiLoop]['vehicles'][0]['vehicle_id'] }}</td>
                    <td>{{ $carcondition['carcondition'][$nilaiLoop]['vehicles'][0]['km_awal'] }}</td>
                    <td>{{ $carcondition['carcondition'][$nilaiLoop]['vehicles'][0]['km_akhir'] }}</td>
                    <td>{{ $carcondition['carcondition'][$nilaiLoop]['vehicles'][0]['total_km'] }}</td>
                    @php
                        $tanggalan = 0;
                        $total_hours = 0;
                        $workingdays = 0;
                    @endphp
                    @for ($x = 0; $x < $i; $x++) {{-- perulangan minggu --}}
                        @for ($z = 0; $z < 7; $z++) {{-- perulangan hari --}}
                            @if (isset($dateRequested['dateRequested']['week_number'][$x]['days'][$z]))
                                @foreach ($timeReport['reportTime'] as $vehicles)
                                    @if ($vehicles['vehicle_id'] === $carcondition['carcondition'][$nilaiLoop]['vehicles'][0]['vehicle_id'])
                                        @if (isset($vehicles['reportPerMonth'][$tanggalan]))
                                            @if ( $vehicles['reportPerMonth'][$tanggalan]['time_cost'] > 3 && is_numeric($vehicles['reportPerMonth'][$tanggalan]['time_cost']))
                                                <td class="greenbg">{{ $vehicles['reportPerMonth'][$tanggalan]['time_cost'] }}</td>
                                            @else
                                                <td>{{ $vehicles['reportPerMonth'][$tanggalan]['time_cost'] }}</td>
                                            @endif
                                            @php
                                                if ( is_numeric($vehicles['reportPerMonth'][$tanggalan]['time_cost']) ) {
                                                    $total_hours += $vehicles['reportPerMonth'][$tanggalan]['time_cost'];
                                                } else {
                                                    $total_hours += 0;
                                                }
                                                if( $tanggalan === 2 || $tanggalan === 3 || $tanggalan === 4 || $tanggalan === 5 ||
                                                $tanggalan === 6 || $tanggalan === 9 || $tanggalan === 10 || $tanggalan === 11 || $tanggalan === 12 || $tanggalan === 13 || 
                                                $tanggalan === 16 || $tanggalan === 17 || $tanggalan === 18 || $tanggalan === 19 || $tanggalan === 20 || $tanggalan === 25 || 
                                                $tanggalan === 26 || $tanggalan === 27 || $tanggalan === 30 ) {
                                                    $workingdays++;
                                                }
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                @php
                                    $tanggalan++;
                                @endphp
                            @endif
                        @endfor
                    @endfor
                    @if ( $total_hours === 0 )
                        <td>{{$total_hours}}</td>
                    @else
                        <td class="greenbg">{{$total_hours}}</td>
                    @endif
                    <td>{{ $workingdays }}</td>
                    <td class="greenbg">{{ $workingdays * 8 }}</td>
                    @if ( number_format(($total_hours / ($workingdays * 8))*100, 2) === 0.00 )
                        <td>{{ number_format(($total_hours / ($workingdays * 8))*100, 2) }}%</td>
                    @else
                        <td class="greenbg">{{ number_format(($total_hours / ($workingdays * 8))*100, 2) }}%</td>
                    @endif
                </tr>
                @php
                    $iterasiData = $carcondition['carcondition'][$nilaiLoop]['total_vehicles'] - 1;
                @endphp
                @for ($nilaiLoop2 = 0; $nilaiLoop2 < $iterasiData; $nilaiLoop2++)
                @php
                    $iterasi = $nilaiLoop2 + 1;
                    $tanggalan = 0;
                    $total_hours = 0;
                    $workingdays = 0;
                @endphp
                    <tr style="text-align:center;">
                        <td>{{ $nomor += 1 }}</td>
                        <td>{{ $carcondition['carcondition'][$nilaiLoop]['vehicles'][$iterasi]['vehicle_id'] }}</td>
                        <td>{{ $carcondition['carcondition'][$nilaiLoop]['vehicles'][$iterasi]['km_awal'] }}</td>
                        <td>{{ $carcondition['carcondition'][$nilaiLoop]['vehicles'][$iterasi]['km_akhir'] }}</td>
                        <td>{{ $carcondition['carcondition'][$nilaiLoop]['vehicles'][$iterasi]['total_km'] }}</td>
                        @for ($x = 0; $x < $i; $x++) {{-- perulangan minggu --}}
                            @for ($z = 0; $z < 7; $z++) {{-- perulangan hari --}}
                                @if (isset($dateRequested['dateRequested']['week_number'][$x]['days'][$z]))
                                    @foreach ($timeReport['reportTime'] as $vehicles)
                                        @if ($vehicles['vehicle_id'] === $carcondition['carcondition'][$nilaiLoop]['vehicles'][$iterasi]['vehicle_id'])
                                            @if (isset($vehicles['reportPerMonth'][$tanggalan]))
                                                @if ( $vehicles['reportPerMonth'][$tanggalan]['time_cost'] > 3 && is_numeric($vehicles['reportPerMonth'][$tanggalan]['time_cost']) )
                                                    <td class="greenbg">{{ $vehicles['reportPerMonth'][$tanggalan]['time_cost'] }}</td>
                                                @else
                                                    <td>{{ $vehicles['reportPerMonth'][$tanggalan]['time_cost'] }}</td>
                                                @endif
                                                @php
                                                    if ( is_numeric($vehicles['reportPerMonth'][$tanggalan]['time_cost']) ) {
                                                        $total_hours += $vehicles['reportPerMonth'][$tanggalan]['time_cost'];
                                                    } else {
                                                        $total_hours += 0;
                                                    }
                                                    if( $tanggalan === 2 || $tanggalan === 3 || $tanggalan === 4 || $tanggalan === 5 ||
                                                    $tanggalan === 6 || $tanggalan === 9 || $tanggalan === 10 || $tanggalan === 11 || $tanggalan === 12 || $tanggalan === 13 || 
                                                    $tanggalan === 16 || $tanggalan === 17 || $tanggalan === 18 || $tanggalan === 19 || $tanggalan === 20 || $tanggalan === 25 || 
                                                    $tanggalan === 26 || $tanggalan === 27 || $tanggalan === 30 ) {
                                                        $workingdays++;
                                                    }
                                                @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                    @php
                                        $tanggalan++;
                                    @endphp
                                @endif
                            @endfor
                        @endfor
                        @if ( $total_hours === 0 )
                            <td>{{ $total_hours }}</td>
                        @else
                            <td class="greenbg">{{ $total_hours }}</td>
                        @endif
                        <td>{{ $workingdays }}</td>
                        <td class="greenbg">{{ $workingdays * 8 }}</td>
                        @if ( number_format(($total_hours / ($workingdays * 8))*100, 2) === 0.00 )
                            <td>{{ number_format(($total_hours / ($workingdays * 8))*100, 2) }}%</td>
                        @else
                            <td class="greenbg">{{ number_format(($total_hours / ($workingdays * 8))*100, 2) }}%</td>
                        @endif
                    </tr>
                @endfor
            @endfor
            <tr style="text-align:center;">
                <td style="text-align: start; font-weight:bolder;" colspan="3" class="orangebg">TOTAL KENDARAAN & AVAILABILITY (%)</td>
                <td class="orangebg"></td>
                <td class="orangebg"></td>
                <td class="orangebg"></td>
                <td class="orangebg"></td>
                <td class="orangebg">0</td>
                @for ($i = 1; $i <= $dateRequested['dateRequested']['total_days']; $i++)
                    <td class="orangebg"></td>
                @endfor
                <td colspan="4" class="orangebg"></td>
            </tr>
            @php
                $date = date("d/m/Y");
            @endphp
            <tr style="border: none;">
                <td style="border: none; text-align: center;" colspan="3">
                    <div style="margin: auto; padding: 5px;">
                        <p style="padding-top: 2px; padding-bottom: 2px; border: 1px solid black">UPDATE:&nbsp;&nbsp;&nbsp;{{ $date }}</p>
                    </div>      
                </td>
                <td style="border: none; text-align: start;" colspan="{{ 10 + $dateRequested['dateRequested']['total_days'] }}">
                    <div style="margin: auto; padding: 5px; padding-left: 10px;">
                        @foreach ($timeReport['reportTime'] as $v)
                            @if ($v['status'] === 0)
                                <p style="padding-left: 2px;">{{ $v['vehicle_id'] }} : {{ $v['remark'] }}</p>
                            @endif
                        @endforeach
                    </div>        
                </td>
            </tr>
        </table>
    </div>
</body>
</html>