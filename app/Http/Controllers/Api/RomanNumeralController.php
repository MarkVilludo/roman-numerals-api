<?php

namespace App\Http\Controllers\Api;

use DB;
use Illuminate\Http\Request;
use App\Models\RomanNumeral;
use App\Http\Controllers\Controller;
use App\Services\RomanNumeralConverter;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RomanNumeralResource;
use App\Http\Requests\RomanNumeralStoreRequest;

class RomanNumeralController extends Controller
{

    private RomanNumeralConverter $converter;

    public function __construct(RomanNumeral $romanNumeral)
    {
        $this->romanNumeral = $romanNumeral;
        $this->converter = new RomanNumeralConverter();
    }

    /**
     * Display Lists all the recently converted integers.
     *
     * @return \Illuminate\Http\Response
     */
    public function recentNumeral()
    {
        $response['data'] = $this->romanNumeral
                                       ->orderBy('created_at', 'DESC')
                                       ->get();

        return response()->json($response, 200);
    }

    /**
     * Display Lists the top 10 converted integers.
     *
     * @return \Illuminate\Http\Response
     */
    public function topNumeral()
    {
        $response['data'] = $this->romanNumeral
                                    ->orderBy('number', 'DESC')
                                    ->take(10)
                                    ->get();

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RomanNumeralStoreRequest $request)
    {
        // Retrieve the validated input data...
        //$validated = $request->validated();
        $romanNumeral = $this->romanNumeral->fill(request()->all());
        $romanNumeral->roman_numeral = $this->converter->convertInteger(request('number'));
        $romanNumeral->save();

        $data['message'] = 'Number conversation to roman numerals saved.';
        $data['success'] = true;
        $data['data'] = new RomanNumeralResource($romanNumeral);

        // return dd($data);
        return response()->json($data);
    }
}
