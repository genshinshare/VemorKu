<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPENSE CABANG {{$expensetahunan['expense_tahunan']['vehicle'][0]['branch']}} {{ $year }}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 5pt;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
        }
        td {
            border: 1px solid black;
            padding-right: 2px;
            padding-left: 2px;
        }
        .title-td {
            background-color: #808080;
            font-weight: bolder;
        }
        .align-end {
            text-align: right;
        }
        .align-center {
            text-align: center;
        }
        .bg-gray {
            background-color: #bfbfbf;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td class="title-td align-center" rowspan="3" style="width: 2%">NO</td>
            <td class="title-td align-center" rowspan="3">HO/ BRANCH/ MS/ RC</td>
            <td class="title-td align-center" rowspan="3">DEPARTMENT</td>
            <td class="title-td align-center" rowspan="3">VEHICLE NUMBER</td>
            <td class="title-td align-center" rowspan="3">ENGINE NUMBER</td>
            <td class="title-td align-center" rowspan="3">TYPE</td>
            <td class="title-td align-center" rowspan="3">PRODUCTION</td>
            <td class="title-td align-center" colspan="3">KM READING</td>
            <td class="title-td align-center" colspan="2">FUEL</td>
            <td class="title-td align-center" colspan="9">EXPENSES</td>
            <td class="title-td align-center" rowspan="3">TOTAL</td>
        </tr>
        <tr>
            <td class="title-td align-center" rowspan="2">FROM</td>
            <td class="title-td align-center" rowspan="2">UP TO</td>
            <td class="title-td align-center" rowspan="2">TOTAL</td>
            <td class="title-td align-center" rowspan="2">QTY</td>
            <td class="title-td align-center" rowspan="2">CONSUMPTION</td>
            <td class="title-td align-center" colspan="2">REGISTRATION FEE</td>
            <td class="title-td align-center" colspan="3">REPAIR & MAINTENANCE</td>
            <td class="title-td align-center" colspan="4">TOTAL</td>
        </tr>
        <tr>
            <td class="title-td align-center">STNK</td>
            <td class="title-td align-center">KIR</td>
            <td class="title-td align-center">REPAIR</td>
            <td class="title-td align-center">MAINTENANCE</td>
            <td class="title-td align-center">CARWASH</td>
            <td class="title-td align-center">FUEL</td>
            <td class="title-td align-center">TOLL</td>
            <td class="title-td align-center">PARKING</td>
            <td class="title-td align-center">OTHERS</td>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($expensetahunan['expense_tahunan']['vehicle'] as $e)
            <tr>
                <td class="align-center bg-gray">{{ $i }}</td>
                <td style="font-weight: bolder; width: 6%;" class="bg-gray">{{$e['branch']}}</td>
                <td class="bg-gray" style="width: 6%;">{{$e['department']}}</td>
                <td class="bg-gray" style="font-weight: bolder; width: 6%;">{{$e['vehicle_id']}}</td>
                <td class="bg-gray" style="width: 6%;">{{$e['engine_number']}}</td>
                <td class="bg-gray">{{$e['type']}}</td>
                <td class="align-center bg-gray">{{$e['production']}}</td>
                <td class="align-center">{{$e['from']}}</td>
                <td class="align-center">{{$e['up_to']}}</td>
                <td class="align-center bg-gray">{{$e['total_km']}}</td>
                <td class="align-center">{{$e['quantity']}}</td>
                <td class="align-end">{{$e['consumption']}}</td>
                <td class="align-end">{{number_format($e['stnk'])}}</td>
                <td class="align-end">{{number_format($e['kir'])}}</td>
                <td class="align-end">{{number_format($e['repair'])}}</td>
                <td class="align-end">{{number_format($e['maintenance'])}}</td>
                <td class="align-end">{{number_format($e['carwash'])}}</td>
                <td class="align-end">{{number_format($e['fuel'])}}</td>
                <td class="align-end">{{number_format($e['toll'])}}</td>
                <td class="align-end">{{number_format($e['parking'])}}</td>
                <td class="align-end">{{number_format($e['others'])}}</td>
                <td class="align-end bg-gray">{{number_format($e['total'])}}</td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    </table>
</body>
</html>