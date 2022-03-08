<?php

namespace App\Http\Controllers;

use App\Models\Star;
use Illuminate\Http\Request;

class StarController extends Controller
{
    public function __construct(Star $star)
    {
        $this->star = $star;
    }

    public function index()
    {
        $avg = $this->star->avg('rate');
        return view('star.index', compact('avg'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['rate'] = $request->rating;
        // dd($data);

        $this->star->create($data);

        return redirect()->back()->withFlashSucces('Avaliação salva com sucesso.');
    }
}
