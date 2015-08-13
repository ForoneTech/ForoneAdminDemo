<?php

namespace App\Http\Controllers\Recycle;

use App\Category;
use Forone\Admin\Controllers\BaseController;
use App\Http\Requests;

class RecycleController extends BaseController
{
    const URI = 'recycle';
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
                ['名称', 'name'],
                ['操作', 'buttons', function ($data) {
                    $buttons = [
                        ['查看'],
                        ['彻底删除'],
                        ['还原'],
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }
}
