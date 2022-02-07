<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    protected $customMessages = [
        'required' => 'Please input the :attribute.',
        'unique' => 'This :attribute has already been taken.',
        'integer' => ':Attribute must be a number.',
        'min' => ':Attribute must be at least :min.',
        'max' => ':Attribute may not be more than :max characters.',
        'exists' => 'Not found.',
        'category_id.required' => 'Please select Category.',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Article::orderBy('created_at', 'DESC')
                ->get())
                ->addColumn('action', 'admin.article.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'title' => 'required|string|max:45',
            'content' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], $this->customMessages);


        $item = new Article();
        $item->title = strip_tags(request()->post('title'));
        $item->content = request()->post('content');
        $item->slug = Str::slug(strip_tags(request()->post('title')), '-');

        if (request()->hasFile('thumbnail')) {
            $image = request()->file('thumbnail');
            $imageName = rand(1, 99999999999) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/article');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(1920, 1080)->save($imagePath . '/' . $imageName);

            $item->thumbnail = $imageName;
        } else {
            $item->thumbnail = 'default.jpg';
        }
        $item->save();

        return redirect()->route('admin.article.index')->with('success', "Data was successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::findOrFail($id);

        return view('admin.article.show', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::findOrFail($id);

        return view('admin.article.edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Article::findOrFail($id);

        request()->validate([
            'title' => 'required|string|max:45',
            'content' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], $this->customMessages);

        $item->title = strip_tags(request()->post('title'));
        $item->content = request()->post('content');
        $item->slug = Str::slug(strip_tags(request()->post('title')), '-');

        if (request()->hasFile('thumbnail')) {
            if ($item->thumbnail <> 'default.jpg') {
                $fileName = public_path() . '/img/article/' . $item->thumbnail;
                File::delete($fileName);
            }

            $image = request()->file('thumbnail');
            $imageName = rand(1, 99999999999) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/article');

            $imageGenerate = Image::make($image->path());
            $imageGenerate->resize(1920, 1080)->save($imagePath . '/' . $imageName);

            $item->thumbnail = $imageName;
        }

        $item->save();

        return redirect()->route('admin.article.index')->with('success', "Data was successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Article::findOrFail($id);

        if ($item->thumbnail <> 'default.jpg') {
            $fileName2 = public_path() . '/img/article/' . $item->thumbnail;
            File::delete($fileName2);
        }

        $itemDelete = $item->delete();

        return response()->json($itemDelete);
    }
}
