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
                        <div class="col-md-9">0.00MB(0B)</div>
                    </div>  
                    <div class="row">
                        <div class="col-md-3">No of files:</div>
                        <div class="col-md-9">0</div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Disk Usage <Compositions></Compositions></strong></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">No Data</div>
                        <div class="col-md-9"></div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

    {{--  <div id="app">    
        <h1>Chatroom</h1>
        <chat-log :messages="messages"></chat-log>
        <chat-composer v-on:messagesent="addMessage"></chat-compomser>
    </div>  --}}
@endsection
