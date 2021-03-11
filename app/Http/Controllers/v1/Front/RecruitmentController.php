<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Models\CooperationRequest\ComputerAbilitie;
use App\Models\CooperationRequest\EducationalExperience;
use App\Models\CooperationRequest\EducationCourses;
use App\Models\CooperationRequest\GeneralAbilities;
use App\Models\CooperationRequest\Recruitment;
use App\Models\CooperationRequest\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class RecruitmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Ide.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        try {
        $recruitment = Recruitment::create([
            //Personal Information
            'category' => $request->category,
            'name' => $request->name,
            'family' => $request->family,
            'numberid' => $request->numberid,
            'nationality' => $request->nationality,
            'married' => $request->married,
            'nationalcode' => $request->nationalcode,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'born_at' => $request->born_at,
            'fathername' => $request->fathername,
            'fatherjob' => $request->fatherjob,
            //Contacts
            'email' => $request->email,
            'citycode' => $request->citycode,
            'phone' => $request->phone,
            'province' => $request->province,
            'city' => $request->city,
            'mobile' => $request->mobile,
            'address' => $request->address,
            //OtherInformation
            'familiarity' => $request->familiarity,
            'typecollaboration' => $request->typecollaboration,
            'starttime' => $request->starttime,
            'resumefilepath' => $request->resumefilepath,
        ]);




        //todo get salar data
        $educationexperiences = [
            ['name' => 'qqqqq', 'grade' => 'aaaaaa',
                'field' => 'bbbbbb', 'orientation' => 'vvvvvv',
                'average' => 'ccccccc', 'degree_at' => '2021-01-25 15:05:25'],

            ['name' => 'qqqqq', 'grade' => 'aaaaaa',
                'field' => 'bbbbbb', 'orientation' => 'vvvvvv',
                'average' => 'ccccccc', 'degree_at' => '2021-01-25 15:05:25'],

        ];

        //Create EducationExperiences
        $educationexperiences = $request->educationexperiences;
        $recruitment->educationexperiences->create($educationexperiences);
        dd('ddd');
        //Create EducationCourses
        $educationcourses = $request->educationcourses;
        $recruitment->educationeourses->create($educationcourses);

        //GeneralAbilities
        $gabilities = $request->generalabilities;
        $recruitment->generalabilities->create($gabilities);

        //ComputerAbilities
        $cabilities = $request->computerabilities;
        $recruitment->computerabilitie->create($cabilities);

        //WorkExperiences
        $workexperiences = $request->workexperiences;
        $recruitment->workexperiences->create($workexperiences);

        return view('Ide.index');
        //return response()->json(null, Response::HTTP_OK);

//        } catch (\Exception $exception) {
//            Log::error($exception);
//            return response()->json('no ok', Response::HTTP_BAD_REQUEST);
//        }
    }
}
