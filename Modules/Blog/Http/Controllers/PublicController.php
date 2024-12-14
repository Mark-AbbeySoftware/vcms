<?php

namespace Modules\Blog\Http\Controllers;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\App;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\CategoryTranslation;
use Modules\Blog\Repositories\PostRepository;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Setting\Repositories\SettingRepository;


class PublicController extends BasePublicController
{
    /**
     * @var PostRepository
     */
    private $post;

    private $setting;
    private $maxCount;
    private $maxContacts;

    public function __construct(PostRepository $post,SettingRepository $setting)
    {
        parent::__construct();
        $this->post = $post;
        $this->setting=$setting;

    }

    public function index()
    {
        $posts = $this->post->allTranslatedIn(App::getLocale());
        $latestPosts = $this->post->latest();

        return view('blog.index', compact('posts', 'latestPosts'));
    }

    public function show($slug)
    {
        $post = $this->post->findBySlug($slug);

        $latestPosts = $this->post->latest();


        return view('blog.show', compact('post', 'latestPosts'));
    }

    public function byCategory($cat)
    {
        $categoryTrans = CategoryTranslation::where('slug', $cat)->first();
        $posts = $this->post->findByCategory($categoryTrans->category_id);
        $latestPosts = $this->post->latest();


        if ($cat === 'development')
        {
            return view('blog.development', compact('posts', 'latestPosts'));
        }

        return view('blog.category', compact('posts', 'latestPosts'));
    }

    public function slugByCategory($cat,$slug)
    {
        $post = $this->post->findBySlug($slug);
        $latestPosts = $this->post->latest();

        return view('blog.show', compact('post', 'latestPosts'));
    }

}
