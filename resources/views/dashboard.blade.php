@extends('layouts.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}
                        {!! $chart1->renderChartJsLibrary() !!}
                        {!! $chart1->renderJs() !!}

                        <hr/>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $chart2->options['chart_title'] }}</h1>
                        {!! $chart2->renderHtml() !!}
                        {!! $chart2->renderChartJsLibrary() !!}
                        {!! $chart2->renderJs() !!}

                        <hr/>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $chart3->options['chart_title'] }}</h1>
                        {!! $chart3->renderHtml() !!}
                        {!! $chart3->renderChartJsLibrary() !!}
                        {!! $chart3->renderJs() !!}

                        <hr/>
                    </div>
                </div>

{{--                        <h1>{{ $chart2->options['chart_title'] }}</h1>--}}
{{--                        {!! $chart2->renderHtml() !!}--}}

{{--                        <hr/>--}}

{{--                        <h1>{{ $chart3->options['chart_title'] }}</h1>--}}
{{--                        {!! $chart3->renderHtml() !!}--}}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

{{--@section('javascript')--}}

{{--    {!! $chart2->renderJs() !!}--}}
{{--    {!! $chart3->renderJs() !!}--}}
{{--@endsection--}}
