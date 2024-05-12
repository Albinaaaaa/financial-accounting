<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DataController extends Controller
{
    public function view(): View
    {
        if (!auth()->user()) {
            return view('not_found');
        }

        $dataProvider = new EloquentDataProvider(Data::query()->where('user_id', auth()->user()->id));

        return view('data.index')
            ->with('dataProvider', $dataProvider);
    }

    public function create(): View
    {
        return view('data.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if (!auth()->user()) {
            return view('not_found');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type_id' => ['required', 'integer', 'min:1'],
            'additional_type_id' => ['integer'],
            'amount' => ['required', 'numeric', 'between:0,9999999999999999'],
            'currency_id' => ['integer'],
            'user_id' => ['integer'],
            'date' => ['required', 'string', 'max:255']
        ]);

        $data = Data::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'additional_type_id' => $request->additional_type_id,
            'amount' => Data::currencyConvert($request->currency_id, $request->amount, 'save'),
            'currency_id' => $request->currency_id,
            'date' => $request->date,
            'user_id' => auth()->user()->id,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }

    public function convertToTargetCurrency($amount, $targetCurrency = 'USD')
    {
        // Replace this with your logic to fetch the conversion rate
        // You can use an external currency conversion API or a local database table
        $conversionRate = 1.23; // Example conversion rate

        return $amount * $conversionRate;
    }

    public function chart()
    {
        if (!auth()->user()) {
            return view('not_found');
        }

        $chart_options = [
            'chart_title' => 'Transactions by Type',
            'chart_type' => 'bar',
            'report_type' => 'group_by_string', // Group by a string field (type_id)
            'model' => 'App\Models\Data', // Replace with your model name
            'group_by_field' => 'type_id',
            'aggregate_function' => 'sum', // Calculate the total amount for each type
            'aggregate_field' => 'amount',
            'labels' => Data::types(),
        ];

        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Transactions by Additional typeType',
            'chart_type' => 'bar',
            'report_type' => 'group_by_string', // Group by a string field (type_id)
            'model' => 'App\Models\Data', // Replace with your model name
            'group_by_field' => 'additional_type_id',
            'aggregate_function' => 'sum', // Calculate the total amount for each type
            'aggregate_field' => 'amount',
            'labels' => Data::additionalTypesList(),
        ];

        $chart2 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Transactions by Currency',
            'chart_type' => 'pie',
            'report_type' => 'group_by_string', // Group by a string field (currency_id)
            'model' => 'App\Models\Data', // Replace with your model name
            'group_by_field' => 'currency_id',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'labels' => Data::currencyList(),
        ];

        $chart3 = new LaravelChart($chart_options);
        return view('dashboard', compact('chart1', 'chart2', 'chart3'));

    }

    public function actionGetAdditionalTypes(int $id): JsonResponse {
        $additionalTypes = Data::getAdditionalTypesByTypeId($id);
        return response()->json(['additionalTypes' => $additionalTypes]);
    }
}
