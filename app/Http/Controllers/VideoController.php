<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        $videos = Video::with(['course', 'category'])->paginate(10);
        // return $videos;
        // $videos = Video::orderBy('id')->paginate(10);
        return view('videos.index', compact('course', 'videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $courses = Course::orderBy('id')->get();
        $categories = Category::orderBy('id')->get();
        return view('videos.create', compact('courses', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request, Course $course)
    {
        try {
            DB::beginTransaction();
            Video::create($request->all());
            DB::commit();
            return redirect()->route('videos.index')->banner('Registro cargado exitosamente.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('videos.index')->dangerBanner('Registro de video no cargado, por que: ' . $th->getMessage());
        }

        // return redirect()->route('videos.index', $course)->with('success', 'Video created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return "SHOW";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Video $video)
    {
        return view('videos.edit', compact('course', 'video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Course $course, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $video->update($request->all());

        return redirect()->route('courses.videos.index', $course)->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Video $video)
    {
        $video->delete();

        return redirect()->route('courses.videos.index', $course)->with('success', 'Video deleted successfully.');
    }
}