<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $plat_mobil }} - Vemor - {{$BULAN}} {{$tahun}}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 7pt;
        }
        .container {
            width: 100%;
            height: 100%;
            display: relative;
        }
        .div-table {
            width: auto;
            height: auto;
        }
        .table-atas{
            border-collapse:collapse;
            width: 100%;
            border: 2px solid black;
            margin-bottom: 5px;
        }
        .td-atas {
            padding: 3px;
            width: 25%;
        }
        .header {
            display: flex;
            margin-bottom: 60px;
        }
        .logo {
            width: 25%;
            float: left;
            margin: auto;
            margin-top: -25px;
        }
        #logo {
            width: 100px;
            height: 80px;
        }
        .judul {
            width: 50%;
            font-weight: bold;
            text-align: center;
            font-size: 8pt;
            float: center;
            margin-left: 170px;
        }
        .no-form {
            width: 25%;
            text-align: center;
            margin-top: -30px;
            float: right;
        }
        .table-biasa {
            border-collapse:collapse;
            width: 100%;
            border: 2px solid black;
        }
        .td-pad {
            padding: 1px;
        }
        .ttd {
            margin: auto;
            text-align: center
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="https://i.pinimg.com/564x/4a/d1/91/4ad191c926118b1d61538932dd47a74b.jpg" alt="logoaltrak" id="logo">
            </div>
            <div class="judul">
                <p>
                    VEHICLE EXPENSES MONTHLY REPORT
                </p>
                <p>
                    MONTH: {{$BULAN}} {{$tahun}}
                </p>
            </div>
            <div class="no-form">
                <p style="font-weight: bold; border:2px solid black; padding:2px;">NO. FORM</p>
            </div>
        </div>
        <div class="div-table">
            <table class="table-atas" border="1">
                <tbody>
                    <tr>
                        <td class="td-atas" style="font-weight:bold; width:17%;">USER (1.1.)</td>
                        <td class="td-atas" style="width:25.5%;">{{$department_name}}</td>
                        <td class="td-atas" style="font-weight:bold; width:25.5%;">VEHICLE ID. (1.1.)</td>
                        <td class="td-atas" style="width:32%;">{{$vehicle['vehicle']['vehicle_id']}}</td>
                    </tr>
                    <tr>
                        <td class="td-atas" style="font-weight:bold; width:17%;">DRIVER (1.1.)</td>
                        <td class="td-atas" style="width:25.5%;">{{$driver_name}}</td>
                        <td class="td-atas" style="font-weight:bold; width:25.5%;">PRODUCT BRAND/TYPE (1.1.)</td>
                        <td class="td-atas" style="width:32%;">{{$vehicle['vehicle']['type']}}</td>
                    </tr>
                    <tr>
                        <td class="td-atas" style="font-weight:bold; width:17%;">BRANCH (1.1.)</td>
                        <td class="td-atas" style="width:25.5%;">{{$vehicle['vehicle']['branch']}}</td>
                        <td class="td-atas" style="font-weight:bold; width:25.5%;">YEAR BUILT (1.1.)</td>
                        <td class="td-atas" style="width:32%;">{{$vehicle['vehicle']['year_build']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="div-table">
            <table class="table-biasa" border="1">
                <tbody>
                    <tr>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;" rowspan="2">DATE OF COPY BILL</td>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;" colspan="3">KM READING</td>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;" colspan="2">FUEL PURCHASING</td>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;" rowspan="2">SERVICE AND REPAIR COST,ALL INCLUDE (RP)</td>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;" rowspan="2">TOTAL (RP)</td>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;" rowspan="2">OTHERS (RP)</td>
                        <td class="td-pad" style="text-align: center; width:23.5%; font-weight:bold;" rowspan="2">REMARK</td>
                    </tr>
                    <tr>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;">FROM</td>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;">UP TO</td>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;">TOTAL</td>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;">QUANTITY (LITERS)</td>
                        <td class="td-pad" style="text-align: center; width:8.5%; font-weight:bold;">EXTENDED VALUE (RP)</td>
                    </tr>
                    <tr>
                        <td  style="border-bottom: 2px solid black; text-align:center;">(1.2.)</td>
                        <td  style="border-bottom: 2px solid black; text-align:center;">(1.3.)</td>
                        <td  style="border-bottom: 2px solid black; text-align:center;">(1.4.)</td>
                        <td  style="border-bottom: 2px solid black; text-align:center;">(1.5.)</td>
                        <td  style="border-bottom: 2px solid black; text-align:center;">(1.6.)</td>
                        <td  style="border-bottom: 2px solid black; text-align:center;">(1.7.)</td>
                        <td  style="border-bottom: 2px solid black; text-align:center;">(1.8.)</td>
                        <td  style="border-bottom: 2px solid black; text-align:center;">(1.9.)</td>
                        <td  style="border-bottom: 2px solid black; text-align:center;">(1.10)</td>
                        <td  style="border-bottom: 2px solid black; text-align:center;">(1.11)</td>
                    </tr>
                    @php
                        $finalTotalKm = 0;
                        $finalFuel = 0.00;
                        $finalFuelCost = 0;
                        $finalTotalAllInclude = 0;
                        $finalTotal = 0;
                        $finalTotalOthers = 0;
                        $averageFuelConsume = 0;
                        $averageCostPerKm = 0;
                        $totalOthers = 0;
                        $total = 0;
                        $totalAllInclude = 0;
                    @endphp
                    @if (!empty($report['lastReport']))
                        <tr>
                            <td class="td-pad" style="text-align: center">{{date('d/m/Y', strtotime($report['lastReport']['departure_date']))}}</td>
                            <td class="td-pad" style="text-align: center">{{$report['lastReport']['km_before']}}</td>
                            <td class="td-pad" style="text-align: center">{{$report['lastReport']['km_after']}}</td>
                            <td class="td-pad" style="text-align: center"></td>
                            <td class="td-pad" style="text-align: right"></td>
                            <td class="td-pad" style="text-align: right"></td>
                            <td class="td-pad" style="text-align: right"></td>
                            <td class="td-pad" style="text-align: right"></td>
                            <td class="td-pad" style="text-align: right"></td>
                            <td class="td-pad" style="text-align: start">KM akhir bulan {{ $previousMonth }} {{ $previousYear }}</td>
                        </tr>
                    @endif
                    @if (!empty($report['report']))
                        @foreach ($report['report'] as $r)
                            @php
                                $totalkm = $r['km_after'] - $r['km_before'];
                                $total = $r['fuel_cost'] + $totalAllInclude;

                                $finalTotalKm += $totalkm;
                                $finalFuel += $r['fuel'];
                                $finalFuelCost += $r['fuel_cost'];
                                $finalTotal += $total;
                            @endphp
                            <tr>
                                <td class="td-pad" style="text-align: center">{{date('d/m/Y', strtotime($r['departure_date']))}}</td>
                                <td class="td-pad" style="text-align: center">{{$r['km_before']}}</td>
                                <td class="td-pad" style="text-align: center">{{$r['km_after']}}</td>
                                <td class="td-pad" style="text-align: center">{{$totalkm}}</td>
                                @if ($r['fuel'] === NULL)
                                    <td class="td-pad" style="text-align: right">0.00</td>
                                @else
                                    <td class="td-pad" style="text-align: right">{{$r['fuel']}}</td>
                                @endif
                                <td class="td-pad" style="text-align: right">{{number_format($r['fuel_cost'], 0, '.', ',')}}</td>
                                <td class="td-pad" style="text-align: right">{{number_format($totalAllInclude, 0, '.', ',')}}</td>
                                <td class="td-pad" style="text-align: right">{{number_format($total, 0, '.', ',')}}</td>
                                <td class="td-pad" style="text-align: right">{{number_format($totalOthers, 0, '.', ',')}}</td>
                                <td class="td-pad" style="text-align: start">{{$r['remark']}}</td>
                            </tr>
                        @endforeach
                    @endif
                    @php
                        $total2 = 0;
                        $finalFuel2 = 0;
                        $finalTotal2 = 0;
                    @endphp
                    @if (!empty($report_finance['report_finance']))
                        @foreach ($report_finance['report_finance'] as $rf)
                            @php
                                $totalAllInclude = $rf['maintenance_cost'] + $rf['repair_cost'];
                                $totalOthers = $rf['stnk_cost'] + $rf['kir_cost'] + $rf['carwash_cost'] + $rf['toll_cost'] + $rf['parking_cost'];
                                $total2 = $rf['fuel_cost'] + $totalAllInclude;
                                
                                $finalFuel2 += $rf['fuel'];
                                $finalFuelCost += $rf['fuel_cost'];
                                $finalTotalAllInclude += $totalAllInclude;
                                $finalTotal2 += $total2;
                                $finalTotalOthers += $totalOthers;
                            @endphp
                            <tr>
                                <td class="td-pad" style="text-align: center">{{date('d/m/Y', strtotime($rf['date_of_application']))}}</td>
                                <td class="td-pad" style="text-align: center">0</td>
                                <td class="td-pad" style="text-align: center">0</td>
                                <td class="td-pad" style="text-align: center">0</td>
                                <td class="td-pad" style="text-align: right">{{$rf['fuel']}}</td>
                                <td class="td-pad" style="text-align: right">{{number_format($rf['fuel_cost'], 0, '.', ',')}}</td>
                                <td class="td-pad" style="text-align: right">{{number_format($totalAllInclude, 0, '.', ',')}}</td>
                                <td class="td-pad" style="text-align: right">{{number_format($total2, 0, '.', ',')}}</td>
                                <td class="td-pad" style="text-align: right">{{number_format($totalOthers, 0, '.', ',')}}</td>
                                <td class="td-pad" style="text-align: start">{{$rf['remark']}}</td>
                            </tr>
                        @endforeach
                    @endif
                    @if (empty($report['report']) && empty($report_finance['report_finance']))
                        <tr>
                                <td class="td-pad" style="text-align: center">0</td>
                                <td class="td-pad" style="text-align: center">0</td>
                                <td class="td-pad" style="text-align: center">0</td>
                                <td class="td-pad" style="text-align: center">0</td>
                                <td class="td-pad" style="text-align: right">0</td>
                                <td class="td-pad" style="text-align: right">0</td>
                                <td class="td-pad" style="text-align: right">0</td>
                                <td class="td-pad" style="text-align: right">0</td>
                                <td class="td-pad" style="text-align: right">0</td>
                                <td class="td-pad" style="text-align: start">NIHIL</td>
                            </tr>
                    @endif
                    @php
                        $theFinalFuel = $finalFuel + $finalFuel2;
                        $theFinalTotal = $finalTotal + $finalTotal2;
                    @endphp
                    <tr>
                        <td colspan="3" style="text-align:center;">TOTAL</td>
                        <td style="text-align: center">{{$finalTotalKm}}</td>
                        <td style="text-align: center">{{$theFinalFuel}}</td>
                        <td style="text-align: center">{{number_format($finalFuelCost, 0, '.', ',')}}</td>
                        <td style="text-align: center">{{number_format($finalTotalAllInclude, 0, '.', ',')}}</td>
                        <td style="text-align: center">{{number_format($theFinalTotal, 0, '.', ',')}}</td>
                        <td style="text-align: center">{{number_format($finalTotalOthers, 0, '.', ',')}}</td>
                        <td style="text-align: start"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="div-table" style="margin-top: 5px">
            <table class="table-biasa" border="1">
                <tbody>
                    <tr>
                        @php
                            if ($finalFuel != 0) {
                                $averageFuelConsume = $finalTotalKm / $theFinalFuel;
                            }
                            if ($theFinalTotal != 0 && $finalTotalKm != 0){
                                $averageCostPerKm = $theFinalTotal / $finalTotalKm;
                            }
                        @endphp
                        <td style="width: 34%">AVERAGE FUEL CONSUMPTION (1.12.)</td>
                        <td style="text-align: center; width:16%;">{{number_format($averageFuelConsume, 2)}}</td>
                        <td style="width: 34%">AVERAGE COST PER KM (1.13.)</td>
                        <td style="text-align: center; width:16%;">{{number_format($averageCostPerKm, 1, '.', ','). 2}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="ttd" style="margin-bottom: 100px">
            <p>Prepared by&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Acknowledge by</p>
        </div>
        <div class="ttd" style="margin-top: -35px;">
            <p>Tri Sugito&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Harry Djauhari</p>
        </div>
        <div style="margin-left: 165px; margin-top: -20px">
            <p>Admin GA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Branch Head</p>
        </div>
        <div class="footer" style="margin-top:-5px">
            <p>Distribusi:</p>
            <p style="margin-top: -10px">1. GA Department, Head Office - Jakarta</p>
            <p style="margin-top: -10px">2. File</p>
        </div>
    </div>
</body>
</html>