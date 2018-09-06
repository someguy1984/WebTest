<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\traits\CoinageSupport;
    use App\Http\Requests\MonataryForm;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Validator;

    class Controller extends BaseController
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CoinageSupport;

        public function index($results = null)
        {
            return view('welcome', [
                'results' => $results,
            ]);
        }

        public function fetchResults(MonataryForm $request)
        {
            //Fetch the coinageTest results
            $results = $this->getCoinage($request->value);

            return $this->index($results);
        }
    }
