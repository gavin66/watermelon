<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
Use App\Model\Category;
use Request;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if ( Request::ajax() && array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'] ) {
            return response()->view('backend.category');
        } else if ( Request::ajax() ) {
            $search = Request::input('search', '');
            $sort = Request::input('sort');
            $order = Request::input('order');
            $limit = Request::input('limit');
            $offset = Request::input('offset');

//			\DB::enableQueryLog();

            $searcher = Category::whereRaw('1=1');
            trim($search) != '' && $searcher->whereRaw('concat(name,desc) like \'%' . $search . '%\'');
            $total = $searcher->count();
            isset( $offset ) && isset( $limit ) && $searcher->skip($offset)->take($limit);
            isset( $sort ) && isset( $order ) && $searcher->orderBy($sort, $order);
            $data = $searcher->get();

            return [
                'total' => $total,
                'rows'  => $data,
//				'log'=>\DB::connection()->getQueryLog(),
            ];

        }

        return response('错误的列表', 404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $store_data = Request::only([ 'name', 'desc' ]);

        $tag = new Category();
        $tag->fill($store_data);

        return returnData($tag->save(), [ ], true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show( $id ) {
        //
        return response()->view('frontend.article', Category::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit( $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update( $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( $id ) {
        $count = Category::destroy($id);

        if ( $count > 0 ) {
            return returnData(true, [ ], true);
        }

        return returnData(false, [ ], true);
    }

}
