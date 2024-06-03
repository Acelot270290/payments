<?php

namespace App\Actions;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseAction
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        return Course::create($request->validated());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        return $course;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
    }
}
