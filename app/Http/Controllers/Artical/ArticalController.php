<?php

namespace App\Http\Controllers\Artical;

use App\Artical;
use App\Http\Requests\CreateArticalRequest;
use App\Http\Requests\UpdateArticalRequest;
use Forone\Admin\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Requests;

class ArticalController extends BaseController
{
    const URI = 'articals';
    const NAME = '文章';


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
                ['文章名', 'name'],
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
        $paginate = Artical::paginate();
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
    public function store(CreateArticalRequest $request)
    {
        $data=$request->only('name');
        Artical::create($data);
        return redirect()->route('admin.'.URI.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = Arical::findOrFail($id);
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
        $data = Artical::find($id);
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
    public function update(UpdateArticalRequest $request, $id)
    {
        $data = $request->only(['name']);
        Artical::findOrFail($id)->update($data);
        return redirect()->route('admin.'.URI.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
