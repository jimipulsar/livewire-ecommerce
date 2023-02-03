<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    private $workingDir = 'uploads/news';

    public function news()
    {
        $segment = \request()->segment(count(\request()->segments()));
        $ucFirst = str_replace('-', ' ', ucfirst($segment));
        $selectGallery = 'uploads/news/portfolio/' . app()->getLocale();

        $galleries = array();

        foreach (File::allFiles($selectGallery) as $_file) {

            if (pathinfo($_file, PATHINFO_EXTENSION) == 'jpg') {
                $images = new \stdClass();
                $pathProduct = str_replace('-', ' ', $_file);

                $images->post = str_replace(' ', '-', basename($_file, '.jpg'));
                $images->title = str_replace("{$this->workingDir}/", '', $_file);
                $images->name = str_replace("{$this->workingDir}/", '', basename($_file, '.jpg'));
                $images->link = str_replace(' ', '-', strtolower($images->name));
                $images->url = str_replace("{$this->workingDir}/", '', $_file);
                $images->path = json_decode(file_get_contents(public_path('uploads/news/' . $images->name . "/" . app()->getLocale() . "/seo.json")));
//                dd($images->path->title);
                $images->cover = '/' . $pathProduct . '/_cover.jpg';

                $galleries[] = $images;


            }

        }
        $galleries = $this->pagination($galleries);

        return view('pages.news', [
            'galleries' => $galleries,
            'ucFirst' => $ucFirst
        ]);
    }

    public function pagination($items, $perPage = 5, $page = null, $options = [], $pageName = 'page')
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ], $options);
    }

    public function single(Request $request)
    {

        $single = new \stdClass();

        $single->name = strtolower(
            str_replace('-', ' ', $request->single)
        );

        $original = str_replace('-', ' ', $request->single);

        $selector = "{$this->workingDir}/" . $original;
        $single->preview = '/' . "{$this->workingDir}/" . $original . '/_cover.jpg';
        $directories = array();
        $latestGallery = 'uploads/news/portfolio/' . app()->getLocale();

        $latest = array();

        foreach (File::allFiles($latestGallery) as $_file) {

            if (pathinfo($_file, PATHINFO_EXTENSION) == 'jpg') {
                $images = new \stdClass();
                $pathProduct = str_replace('-', ' ', $_file);
//                dd($pathProduct);

                $images->post = str_replace(' ', '-', basename($_file, '.jpg'));
                $images->title = str_replace("{$this->workingDir}/", '', $_file);
                $images->name = str_replace("{$this->workingDir}/", '', basename($_file, '.jpg'));
                $images->link = str_replace(' ', '-', strtolower($images->name));
                $images->url = str_replace("{$this->workingDir}/", '', $_file);
                $images->path = json_decode(file_get_contents(public_path('uploads/news/' . $images->name . "/" . app()->getLocale() . "/seo.json")));
//                dd($images->path->title);
                $images->cover = '/' . $pathProduct . '/_cover.jpg';

                $latest[] = $images;


            }

        }
        $latest = $this->pagination($latest);
        // traduzione prodotto

        if (file_exists(public_path('uploads/news/') . $original . "/" . app()->getLocale() . "/seo.json")) {
            $fileLang = json_decode(file_get_contents(public_path('uploads/news/') . $original . "/" . app()->getLocale() . "/seo.json"));
            $article = file_get_contents(public_path('uploads/news/') . $original . "/" . app()->getLocale() . "/article.blade.php");
            foreach (File::directories($selector) as $_file) {

                $images = new \stdClass();

                $images->path = str_replace("{$this->workingDir}/", '', $_file);
                $images->link = str_replace(' ', '-', strtolower($images->path));
                $directories[] = $images;

            }

            return view('pages.single', [
                'single' => $single,
                'original' => $original,
                'fileLang' => $fileLang,
                'directories' => $directories,
                'article' => $article,
                'latest' => $latest
            ]);
        } else {
            abort(404);
        }
    }
}
