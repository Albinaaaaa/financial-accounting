@extends('layouts.app')
@section('main-content')

    {!! grid_view([
        'dataProvider' => $dataProvider,
       // 'useFilters' => false,
        'columnFields' => [
//            'id',
            'name',
//            'type_id',
            [
                'label' => 'Type', // Column label.
               // 'attribute' => 'type_id',
                'value' => function ($row) { // You can set 'value' as a callback function to get a row data value dynamically.
                    return \App\Models\Data::types()[$row->type_id];
                },
                'filter' => [ // For dropdown it is necessary to set 'data' array. Array keys are for html <option> tag values, array values are for titles.
                    'class' => Itstructure\GridView\Filters\DropdownFilter::class, // REQUIRED. For this case it is necessary to set 'class'.
                    'name' => 'type_id', // REQUIRED if 'attribute' is not defined for column.
                    'data' => \App\Models\Data::types()
                ],
                'htmlAttributes' => [
                    'width' => '10%' // Width of table column.
                ],
                'sort' => 'type_id' // To sort rows. Have to set if an attribute is not defined for column.
            ],
//                'additional_type_id',
            [
                'label' => 'Additional type', // Column label.
               // 'attribute' => 'type_id',
                'value' => function ($row) { // You can set 'value' as a callback function to get a row data value dynamically.
                    return \App\Models\Data::additionalTypesList()[$row->additional_type_id];
                },
                'filter' => [ // For dropdown it is necessary to set 'data' array. Array keys are for html <option> tag values, array values are for titles.
                    'class' => Itstructure\GridView\Filters\DropdownFilter::class, // REQUIRED. For this case it is necessary to set 'class'.
                    'name' => 'additional_type_id', // REQUIRED if 'attribute' is not defined for column.
                    'data' => \App\Models\Data::additionalTypesList()
                ],
                'htmlAttributes' => [
                    'width' => '10%' // Width of table column.
                ],
                'sort' => 'additional_type_id' // To sort rows. Have to set if an attribute is not defined for column.
            ],
            [
                'label' => 'Amount', // Column label.
                'attribute' => 'amount',
                'value' => function ($row) { // You can set 'value' as a callback function to get a row data value dynamically.
                    return \App\Models\Data::currencyConvert($row->currency_id, $row->amount, 'show');
                },
            ],
            [
                'label' => 'Currency', // Column label.
               // 'attribute' => 'type_id',
                'value' => function ($row) { // You can set 'value' as a callback function to get a row data value dynamically.
                    return \App\Models\Data::currencyList()[$row->currency_id];
                },
                'filter' => [ // For dropdown it is necessary to set 'data' array. Array keys are for html <option> tag values, array values are for titles.
                    'class' => Itstructure\GridView\Filters\DropdownFilter::class, // REQUIRED. For this case it is necessary to set 'class'.
                    'name' => 'currency_id', // REQUIRED if 'attribute' is not defined for column.
                    'data' => \App\Models\Data::currencyList()
                ],
                'htmlAttributes' => [
                    'width' => '10%' // Width of table column.
                ],
                'sort' => 'currency_id' // To sort rows. Have to set if an attribute is not defined for column.
            ],
            [
            'label' => 'Actions', // Optional
            'class' => Itstructure\GridView\Columns\ActionColumn::class, // Required
            'actionTypes' => [ // Required
                [
                    'class' => Itstructure\GridView\Actions\Delete::class, // Required
                    'url' => function ($data) { // Optional
                        return '/data/' . $data->id . '/delete';
                    },
                    'htmlAttributes' => [ // Optional
                        'style' => 'color: yellow; font-size: 16px;',
                        'onclick' => 'return window.confirm("Are you sure you want to delete?");'
                    ]
                ]
            ]
        ]
             ]
    ]) !!}
@endsection
