<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function indexx()
    {
        return 44 ;
    }
    public function index(){
        // return Inertia::render('Course', [
        //     'courses' => Course::paginate()
        // ]);

        request()->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:name,city']
        ]);

        $query = Category::query();

        if (request('search')) {
            $query->where('name', 'LIKE', '%'.request('search').'%');
        }

        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Category', [
            'Categories' => $query->paginate(3)->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction'])
        ]);
    }
    // AddCategory

    public function addCategory()
    {
        return Inertia::render('AddCategory', [
          'Categor' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'name' => 'required',
        //     'active' => 'required',
        // ]);
        
        Category::create(
            $this->validate($request, [
                '*' => 'required',
            ])
        );  

        return redirect('addCategory');
    }

    
}
