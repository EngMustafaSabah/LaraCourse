<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        // return Inertia::render('Course', [
        //     'courses' => Course::paginate()
        // ]);

        request()->validate([
            'direction' => ['in:asc,desc'],
            'field'     => ['in:name,city'],
        ]);

        $query = Course::query();

        if (request('search')) {
            $query->where('name', 'LIKE', '%'.request('search').'%')
            ->orwhere('levels', 'LIKE', '%'.request('search').'%');
        }

        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Course', [
            'courses' => $query->paginate(3)->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction']),
        ]);
    }

    public function search()
    {
        request()->validate([
            'direction' => ['in:asc,desc'],
            'field'     => ['in:name,city'],
        ]);

        $query = Course::query();

        if (request('search')) {
            $query->where('name', 'LIKE', '%'.request('search').'%')
            ->orwhere('levels', 'LIKE', '%'.request('search').'%');
        }

        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Dashboard', [
            'courses' => $query->paginate(6)->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction']),
        ]);
    }

    public function addCourse()
    {
        return Inertia::render('AddCourse', [
            'Course' => Course::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->request->add([
            'user_id'     => auth()->user()->id,
            'category_id' => 2,
        ]);
        Course::create($this->validate($request, ['*' => 'required']));

        return redirect('addCourse');
    }

    public function destroy(Request $request)
    {
        if ($request->id) {
            Course::destroy($request->id);

            return redirect('courses');
        }
    }
}
