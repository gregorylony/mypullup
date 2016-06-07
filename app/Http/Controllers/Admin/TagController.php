<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Tag;

class TagController extends Controller
{

    protected $fields = [
        'tag' => '',
        'title' => '',
        'subtitle' => '',
        'meta_description' => '',
        'page_image' => '',
        'layout' => 'blog.layout.index',
        'reverse_direction' => 0,
    ];

    public function create() {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.tag.create', $data);
    }

    public function store(TagCreateRequest $request){
        $tag = new Tag();
        foreach (array_keys($this->fields) as $field) {
            $tag->$field = $request->get($field);
        }
        $tag->save();

        return redirect('/admin/tag')->withSuccess("Le tag '$tag->tag' a bien été créé.");
    }

    public function edit($id) {
        $tag = Tag::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $tag->$field);
        }

        return view('admin.tag.edit', $data);
    }

    public function update(TagUpdateRequest $request, $id){
        $tag = Tag::findOrFail($id);
        foreach (array_keys(array_except($this->fields, ['tag'])) as $field) {
            $tag->$field = $request->get($field);
        }
        $tag->save();

        return redirect("/admin/tag/$id/edit")->withSuccess("Modifications effectuées");
    }

    public function destroy($id) {
        $tag = Tag::findOrfail($id);
        $tag->delete();

        return redirect('/admin/tag')->withSuccess("Le tag '$tag->tag' a bien été supprimé.");
    }

    public function index () {
        $tags = Tag::all();
        return view('admin.tag.index')->withTags($tags);
    }
}
