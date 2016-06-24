<?php namespace App\Http\Controllers\Backend;

use App\Model\Article;
use App\Http\Controllers\Controller;

use App\Model\Tag;
use Request;

class ArticleController extends Controller {

	/**
	 * 显示文章列表(页面)
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Request::ajax() && array_key_exists('HTTP_X_PJAX',$_SERVER) && $_SERVER['HTTP_X_PJAX']){
			return response()->view('backend.article');
		}else if(Request::ajax()){
			$search = Request::input('search','');
			$sort = Request::input('sort');
			$order = Request::input('order');
			$limit = Request::input('limit');
			$offset = Request::input('offset');

//			\DB::enableQueryLog();

			$searcher = Article::whereRaw('1=1');
			trim($search) != '' && $searcher->whereRaw('concat(title,content_md) like \'%'.$search.'%\'');
			$total = $searcher->count();
			isset($offset) && isset($limit) && $searcher->skip($offset)->take($limit);
			isset($sort) && isset($order) && $searcher->orderBy($sort,$order);
			$data = $searcher->get();

			return [
				'total'=>$total,
				'rows'=>$data,
//				'log'=>\DB::connection()->getQueryLog(),
			];

		}

		return response('错误的列表',404);
	}

	/**
	 * 显示新建文章(页面)
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Request::ajax() && array_key_exists('HTTP_X_PJAX',$_SERVER) && $_SERVER['HTTP_X_PJAX']){
//			$data = [
//				'tags' => Tag::all()
//			];
			$data = [];

			return view('backend.article_create',$data);
		}

		return response('错误的页面',404);
	}

	/**
	 * 保存一篇新文章
	 *
	 * @return Response
	 */
	public function store()
	{
		$store_data = Request::only(['title','outline','content_md','content_html','tags','categories','status']);

		$article = new Article();
		$article->fill($store_data);

		return returnData($article->save(),[],true);
	}

	/**
	 * 显示特定文章详细(页面)
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		return response()->view('frontend.article',Article::find($id));

	}

	/**
	 * 编辑特定文章(页面)
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['article'] = Article::find($id);
//		$data['tags'] = Tag::whereIn('id',json_decode($data['article']['tags'],1))->get();

		return response()->view('backend.article_create',$data);
	}

	/**
	 * 更新特定文章
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$up_data = Request::only(['title','outline','content_md','content_html','tags','categories','status']);

		return returnData(Article::find($id)->fill($up_data)->save(),[],true);
	}

	/**
	 * 删除文章
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$count = Article::destroy($id);

		if($count > 0){
			return returnData(true,[],true);
		}

		return returnData(false,[],true);
	}

}
