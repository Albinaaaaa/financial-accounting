@extends('layouts.app')
@section('main-content')

    {{ html()->form('PUT', '/store')->open() }}

    <div class="form-group">
        {{ html()->label('Select the type', 'type_id')->class('label') }}
        {{ html()->select('type_id', \App\Models\Data::types())
            ->placeholder('Select the value')
            ->class('form-control input')
            ->id('type-id') }}
        @error('type_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        {{ html()->label('Select the additional type', 'additional_type_id')->class('label') }}

            {{ html()->select('additional_type_id', [])
                ->class('form-control input ')
                ->id('additional-types')
                ->attributes(['disabled'])
                ->placeholder('Select the type')
            }}
        @error('additional_type_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        {{ html()->label('Type the name', 'name')->class('label') }}
        {{ html()->text('name')->class('form-control input') }}
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        {{ html()->label('Type amount', 'amount')->class('label') }}
        {{ html()->number('amount')
            ->attributes(['min' => 0])
            ->class('form-control input') }}
        @error('amount')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        {{ html()->label('Select the currency', 'currency_id')->class('label') }}
        {{ html()->select('currency_id', \App\Models\Data::currencyList())->class('form-control input') }}
        @error('currency_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        {{ html()->label('Select the date', 'date')->class('label') }}
        {{ html()->date('date', null)->class('form-control input') }}
        @error('date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    {{ html()->button('Submit')->class('btn') }}

    {{ html()->form()->close() }}

@endsection
