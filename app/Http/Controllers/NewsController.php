<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // menggunakan model Student untuk select data
    public function index()
    {
        $news = News::all();

        if (!empty($news)){
            $response = [
                'massage' => 'Menampilkan Data berita',
                'data' => $news
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
            'description' => $request->description,
            'content' => $request->content,
            'url' => $request->url,
            'url_image' => $request->url_image,
            'category' => $request->category
		];

		$news = News::create($input);

		$response = [
			'message' => 'Data berita Berhasil Dibuat',
			'data' => $news,
		];

		return response()->json($response, 201);
	}

    // ini buat update
    public function show(string $id)
    {
        $news = News::find($id);

		if ($news) {
			$response = [
				'message' => 'Get detail new',
				'data' => $news
			];

			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data tidak ada'
			];

			return response()->json($response, 404);
		}
    }

    // ini buat update
    public function update(Request $request,string $id)
    {
        $news = News::find($id);
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
				'message' => 'data berita berhasil dihapus',
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

    public function search($title){

        //untuk cari berita berdasarkan titlenya
        $news = News::where('title', 'like', '%' . $title . '%')->get();
        if ($news->isEmpty()) {
            $news = [
                'message' => 'data not found'
            ];

            return response()->json($news, 404);
        }
        $news = [
            'message' => 'Get Searched News',
            'news' => $news
        ];

        return response()->json($news, 200);
    }

        // untuk cari berita category Sport
    public function sport()
    {
        $news = News::where('category', 'sport')->get();
        if ($news->isEmpty()) {
            $news = [
                'message' => 'data not found'
            ];

            return response()->json($news, 404);
        }
        $news = [
            'message' => 'Get Sport News',
            'total' => $news->count(),
            'news' => $news
        ];

        return response()->json($news, 200);
    }

    // Method untuk cari Category Finance
    public function finance()
    {
        $news = News::where('category', 'finance')->get();
        if ($news->isEmpty()) {
            $news = [
                'message' => 'data not found'
            ];

            return response()->json($news, 404);
        }
        $news = [
            'message' => 'Get Finance News',
            'total' => $news->count(),
            'news' => $news
        ];

        return response()->json($news, 200);
    }

    // Method Pencarian Category Autmotive
    public function automotive()
    {
        $news = News::where('category', 'automotive')->get();
        if ($news->isEmpty()) {
            $news = [
                'message' => 'data not found'
            ];

            return response()->json($news, 404);
        }
        $news = [
            'message' => 'Get Automotive News',
            'total' => $news->count(),
            'news' => $news
        ];

        return response()->json($news, 200);
    }
}



