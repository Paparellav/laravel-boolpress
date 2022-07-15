<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->validationsRules());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();
                
        Mail::to('admin@boolpress.it')->send(new NewContactRequest($new_lead));

        return response()->json([
            'success' => true
        ]);
    }

    private function validationsRules()
    {
        return [

            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'

        ];
    }
}
