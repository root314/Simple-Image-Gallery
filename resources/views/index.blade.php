@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Disk Usage Overview</strong></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">Total Size:</div>
                        <div class="col-md-9">{{ $response['totalSizeMB'] }}({{ number_format($response['totalSize']) }}B)</div>
                    </div>  
                    <div class="row">
                        <div class="col-md-3">No of files:</div>
                        <div class="col-md-9">{{ $response['noFile'] }}</div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Disk Usage Composition</strong></div>

                <div class="panel-body">
                    <div class="row">
                    @if (!count($response['files']))
                        <div class="col-md-3">No Data</div>
                    @else
                        <table>
                        <tr>
                            <th>Type</th>
                            <th>No of files</th>
                            <th>Size</th>
                        </tr>
                        @foreach ($response['files'] as $data)
                        <tr>
                            <td>{{ $data['type'] }}</td>
                            <td>{{ $data['no'] }}</td>
                            <td>{{ $data['totalMB'] }}({{ number_format($data['total']) }}B)</td>
                        </tr>
                        @endforeach
                        </table>
                    @endif    
                    </div>  
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
