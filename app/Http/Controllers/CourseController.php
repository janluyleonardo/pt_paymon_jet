<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\AgeRange;
use App\Models\Category;
use App\Models\Multimedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('multimedia')
            ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
            ->leftJoin('age_ranges', 'courses.age_range_id', '=', 'age_ranges.id')
            ->addSelect('courses.*', 'categories.name as category_name', 'age_ranges.range as age_range')
            ->paginate(10);
        // return $courses;
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id')->get();
        $ranges = AgeRange::orderBy('id')->get();
        return view('courses.create', compact('categories', 'ranges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        try {
            DB::beginTransaction();
            Course::create([
                'name' => $request->courseName,
                'slug' => Str::slug($request->courseName, '-'),
                'description' => $request->courseDescription,
                'category_id' => $request->courseCategory,
                'age_range_id' => $request->courseAgeGroup,
            ]);
            DB::commit();
            return redirect()->route('courses.index')->banner('Registro cargado exitosamente.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('courses.index')->dangerBanner('Registro de video en base de datos no cargado, por que: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $multimedia = Multimedia::where('course_id', $course->id)->dd();
        return view('courses.show', compact('course', 'multimedia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::orderBy('id')->get();
        $ranges = AgeRange::orderBy('id')->get();
        return view('courses.edit', compact('course', 'categories', 'ranges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course = Course::findOrFail($course->id);
        $course->name = $request->input('courseName');
        $course->description = $request->input('courseDescription');
        $course->category = $request->input('courseCategory');
        $course->age_group = $request->input('courseAgeGroup');
        $course->save();
        if ($request->has('courseFileInput') && is_array($request->input('courseFileInput'))) {
            foreach ($request->input('courseFileInput') as $fileInput) {
                $multimedia = new Multimedia([
                    'name' => $fileInput['name'],
                    'path' => $fileInput['path'],
                    'course_name' => $course->name,
                ]);
                $course->multimedia()->save($multimedia);
            }
        }
        return redirect()->route('courses.index')->banner('Registro actualizado exitosamente.');
    }
    // {
    //     $course = Course::findOrFail($course->id);
    //     // return $request;
    //     $course->name = $request->input('courseName');
    //     $course->description = $request->input('courseDescription');
    //     $course->category = $request->input('courseCategory');
    //     $course->age_group = $request->input('courseAgeGroup');
    //     try {
    //         $course->save();
    //     } catch (\Throwable $th) {
    //         return $th;
    //     }

    //     // Actualizar los datos de los archivos multimedia
    //     if ($request->has('courseFileInput') && is_array($request->input('courseFileInput'))) {
    //         return 'True';
    //         // foreach ($request->input('courseFileInput') as $fileInput) {
    //         //     // Aquí asumimos que $fileInput es un array con los datos del archivo
    //         //     // Por ejemplo, ['name' => 'nombre_del_archivo', 'path' => 'ruta_del_archivo']
    //         //     $multimedia = new Multimedia([
    //         //         'name' => $fileInput['name'],
    //         //         'path' => $fileInput['path'],
    //         //         'course_name' => $course->name,
    //         //     ]);

    //         //     // Guardar el archivo multimedia
    //         //     $course->multimedia()->save($multimedia);
    //         // }
    //     }

    //     // try {
    //     //     $courseUpdate->update();
    //     //     $multimediaUpdate->update();
    //     // } catch (\Throwable $th) {
    //     //     return redirect()->route('courses.index')->dangerBanner('Registro de actualizacion en base de datos no cargado, por que: ' . $th->getMessage());
    //     // }
    //     return redirect()->route('courses.index', $course)->banner('Registro actualizado exitosamente.');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->banner('Registro eliminado exitosamente.');
    }
}