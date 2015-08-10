<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Forone\Admin\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategoryController extends BaseController
{
    const URI = 'categories';
    const NAME = '分类';



    function __construct()
    {
        parent::__construct();
        view()->share('page_name', self::NAME);
        view()->share('uri', self::URI);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $results = [
            'columns' => [
                ['编号', 'id'],
                ['分类名', 'name'],
                ['创建时间', 'created_at'],
                ['更新时间', 'updated_at'],
                ['操作', 'buttons', function ($data) {
                    $buttons = [
                        ['查看'],
                        ['编辑'],
                    ];
                    return $buttons;
                }]
            ]
        ];
        $paginate = Category::paginate();
        $results['items'] = $paginate;
        return $this->view(self::URI.'.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->view(self::URI.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $data=$request->only('name');
        Category::create($data);
        return redirect()->route('admin.'.self::URI.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = Category::findOrFail($id);
        if ($data) {
            return view(self::URI."/show", compact('data'));
        }else{
            return $this->redirectWithError('数据未找到');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        if ($data) {
            return view(self::URI."/edit", compact('data'));
        } else {
            return $this->redirectWithError('数据未找到');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->only(['name']);
        Category::findOrFail($id)->update($data);
        return redirect()->route('admin.'.self::URI.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }
}
