<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\File;
use App\Services\UploadTrait;
use Request;

class MediaController extends Controller {
    use UploadTrait;

    /**
     * MediaController constructor.
     */
    public function __construct() {

        $this->initialize();

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index() {
        if ( Request::ajax() && array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'] ) {
            return response()->view('backend.media', [ 'files' => File::all() ]);
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
        //
        $this->uploadFiles(true,function($file){
            $fileMode = File::create([
                'name' => $file->name,
                'size' => $file->size,
                'type' => $file->type,
                'url' => $file->url,
                'thumbnail_url' => $file->thumbnail_url,
                'absolute_path' => $file->absolute_path,
            ]);
            $file->id = $fileMode->id;
            $file->zhens = 'zhenshide';
        });

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
        //

        $file = File::findOrFail($id)->delete();

        return response()->json(['code'=>0]);

//        $this->deleteFiles($this->options['print_response'], $file->absolute_path ,function() use ($file){
//            $file->delete();
//        });

    }

}
