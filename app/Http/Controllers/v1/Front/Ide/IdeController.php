<?php

namespace App\Http\Controllers\v1\Front\Ide;

use App\Http\Controllers\Controller;
use App\Models\Ide\Ide;
use App\Models\Ide\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IdeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('test');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $ide = Ide::create([
                'category' => $request->category,
                'name' => $request->name,
                'family' => $request->family,
                'numberid' => $request->numberid,
                'nationalcode' => $request->nationalcode,
                'born_at' => $request->born_at,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'maritalstatus' => $request->maritalstatus,
                'gender' => $request->gender,
                'militaryservice' => $request->militaryservice,
                'nationality' => $request->nationality,
                'religion' => $request->religion,
                //startup
                'startupname' => $request->startupname,
                'startupdesc' => $request->startupdesc,
                'startupproblem' => $request->startupproblem,
                'startupfounders' => $request->startupfounders,
                'startupcustomer' => $request->startupcustomer,
                'startuprival' => $request->startuprival,
                'startupsocialnetwork' => $request->startupsocialnetwork,
                'startupusersupport' => $request->startupusersupport,

            ]);

            $info = new Info();
            $info->ide_id = $ide->id;
            $info->name = $request->name;
            $info->family = $request->family;
            $info->born_at = $request->born_at;
            $info->Orientation = $request->orientation;
            $info->rolegroup = $request->rolegroup;
            $info->save();

            return response()->json($ide, \Illuminate\Http\Response::HTTP_OK);

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(null, \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

}
