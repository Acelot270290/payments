<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use App\Actions\CourseUserAction;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{
    protected $courseUserAction;

    public function __construct(CourseUserAction $courseUserAction)
    {
        $this->courseUserAction = $courseUserAction;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseUsers = CourseUser::all();
        return response()->json($courseUsers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $courseUser = $this->courseUserAction->store($request);
        return response()->json(['message' => 'Course User created successfully', 'courseUser' => $courseUser], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseUser $courseUser)
    {
        return response()->json($courseUser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseUser $courseUser)
    {
        $courseUser = $this->courseUserAction->update($request, $courseUser);
        return response()->json(['message' => 'Course User updated successfully', 'courseUser' => $courseUser]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseUser $courseUser)
    {
        $this->courseUserAction->destroy($courseUser);
        return response()->json(['message' => 'Course User deleted successfully']);
    }
}
