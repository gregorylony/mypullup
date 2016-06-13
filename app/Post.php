<?php

namespace App;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = [
        'title', 'subtitle', 'content_raw', 'page_image', 'meta_description', 'layout', 'is_draft', 'published_at',
    ];

    public function getPublishDateAttribute($value) {
        return $this->published_at->format('M-j-Y');
    }

    public function getPublishTimeAttribute($value) {
        return $this->published_at->format('g:i A');
    }

    public function getContentAttribute($value) {
        return $this->content_raw;
    }

    public function tags() {
        return $this->belongsToMany('App\Tag', 'post_tag_pivot');
    }

    public function setTitleAttribute($value) {
      $this->attributes['title'] = $value;

      if (! $this->exists) {
        $this->setUniqueSlug($value, '');
      }
    }

    protected function setUniqueSlug($title, $extra) {
        $slug = str_slug($title.'-'.$extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }

    public function setContentRawAttribute($value) {
        $this->attributes['content_raw'] = $value;
        $this->attributes['content_html'] = Markdown::convertToHtml($value);
    }

    public function syncTags(array $tags) {
        Tag::addNeededTags($tags);

        if (count($tags)) {
            $this->tags()->sync(
                Tag::whereIn('tag', $tags)->lists('id')->all()
            );
            return;
        }

        $this->tags()->detach();
    }
}
