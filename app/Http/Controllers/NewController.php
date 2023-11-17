<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewController extends Controller
{
    // menggunakan model Student untuk select data
    public function index()
    {
        $news = News::all();

        if (!empty($news)){
            $response = [
                'massage' => 'Menampilkan Data Semua News',
                'data' => $news,
            ];
            return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data tidak ada'
			];
			return response()->json($response, 200);
		    }
        }


    public function store(Request $request)
	{
        $input = [
		'title' => $request->title,
		'author' => $request->author,
		'content' => $request->content,
		'url' => $request->url,
        'url_image' =>$request->url_image,
        'published_at' =>$request->published_at,
		];

		$news = News::create($input);

		$response = [
			'message' => 'Data News Berhasil Dibuat',
			'data' => $news,
		];

		return response()->json($response, 201);
	}

    // ini buat uodate
    public function show(string $id)
    {
        $new = News::find($id);

		if ($news) {
			$response = [
				'message' => 'Get detail new',
				'data' => $new
			];

			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
    }

    // ini buat update
    public function update(Request $request, $id)
    {
        $new = News::find($id);

		if ($news) {
			$response = [
				'message' => 'News is updated',
				'data' => $news->update($request->all())
			];

			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
    }

    // ini buat destroy
    public function destroy(string $id)
    {
        $news = News::find($id);

		if ($news) {
			$response = [
				'message' => 'News is delete',
				'data' => $news->delete()
			];

			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}


}
