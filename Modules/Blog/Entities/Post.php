<?php

namespace Modules\Blog\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Blog\Presenters\PostPresenter;
use Modules\Core\Traits\NamespacedEntity;
use Modules\Media\Entities\File;
use Modules\Media\Support\Traits\MediaRelation;
use Modules\Tag\Contracts\TaggableInterface;
use Modules\Tag\Traits\TaggableTrait;
use Modules\User\Entities\Sentinel\User;

class Post extends Model implements TaggableInterface
{
    use Translatable;
    use MediaRelation;
    use PresentableTrait;
    use NamespacedEntity;
    use TaggableTrait;

    public $translatedAttributes = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        ];

    protected $fillable = [
        'category_id',
        'status',
        'title',
        'slug',
        'content',
        'sort',
        'category_only',
        'author_id',
        'editor_id',
        'meta_title',
        'meta_description',
    ];

    protected $table = 'blog__posts';
    protected $presenter = PostPresenter::class;
    protected $casts = [
        'status' => 'int',
        'category_only' =>'boolean',
    ];
    protected static $entityNamespace = 'asgardcms/post';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the thumbnail image for the current blog post.
     *
     * @return File|string
     */
    public function getThumbnailAttribute()
    {
        $thumbnail = $this->files()->where('zone', 'thumbnail')->first();

        if ($thumbnail === null) {
            return '';
        }

        return $thumbnail;
    }

    /**
     * Check if the post is in draft.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeDraft(Builder $query)
    {
        return $query->whereStatus(Status::DRAFT);
    }

    /**
     * Check if the post is pending review.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePending(Builder $query)
    {
        return $query->whereStatus(Status::PENDING);
    }

    /**
     * Check if the post is published.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->whereStatus(Status::PUBLISHED);
    }

    /**
     * Check if the post is unpublish.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeUnpublished(Builder $query)
    {
        return $query->whereStatus(Status::UNPUBLISHED);
    }

    /**
     * @param $method
     * @param $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        //i: Convert array to dot notation
        $config = implode('.', ['asgard.blog.config.post.relations', $method]);

        //i: Relation method resolver
        if (config()->has($config)) {
            $function = config()->get($config);

            return $function($this);
        }

        //i: No relation found, return the call to parent (Eloquent) to handle it.
        return parent::__call($method, $parameters);
    }
}
