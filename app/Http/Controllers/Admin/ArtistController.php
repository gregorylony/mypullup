<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artist;

class ArtistController extends Controller
{
    protected $fields = [
        'name' => '',
        'phone' => '',
        'phone' => '',
        'phone' => '',
    ];

    public function index () {
        $artists = Artist::all();

        return view('admin.artists.index')->withArtists($artists);
    }
}
