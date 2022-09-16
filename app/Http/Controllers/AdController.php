<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Image;
use App\Http\Requests\Ad as AdRequest;
use Illuminate\Http\Request;

class AdController extends Controller
{

    public function __construct()
    {
        //$this->middleware('role:ADMIN');
    }

    public function index() {
        $ads = Ad::all();
        return view('ad.index', compact('ads'));
    }

    public function show(Ad $ad)
    {
        return view('ad.show', compact('ad'));
    }

    public function create()
    {
        return view('ad.new');
    }

    public function store(AdRequest $adRequest)
    {

        $ad = Ad::create($adRequest->all());

        if(isset($adRequest->images))

        foreach ($adRequest->images as $image) {
            Image::create([
                'url' => $image['url'],
                'caption' => $image['caption'],
                'ad_id' => $ad->id
            ]);
        }

        return redirect()->route('ads.show', $ad->slug)->with('success', "L'annonce a été bien enregistrée");
    }

    public function edit(Ad $ad)
    {
        return view('ad.edit', compact('ad'));
    }

    public function update(Request $adRequest, Ad $ad)
    {

        $validation = $adRequest->validate([
            'title' => 'required|min:10|unique:ads,title,'.$ad->id,
            'cover_image' => ['required', 'url'],
            'introduction' => ['required', 'min:20'],
            'content' => ['required', 'min:100'],
            'rooms' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'images.*.url' => ['sometimes','required','url'],
            'images.*.caption' => ['sometimes','required','string']
        ]);

        $ad->update($validation);

        $cleans = [];

        foreach ($ad->images as $image) {

            $trouve = false;

            if(isset($adRequest->images))

            foreach ($adRequest->images as $imageReq) {
                if($image->id == $imageReq["id"]) {
                    $trouve = true;
                    break;
                }
            }

            if(!$trouve) {
                $cleans[] = $image->id;
            }

        }

        foreach ($cleans as $id) {
            Image::find($id)->delete();
        }

        if(isset($adRequest->images))
        foreach ($adRequest->images as $image) {

            Image::updateOrCreate([
                'id' => $image['id'] ?? null

            ], ['url' => $image['url'], 'caption' => $image['caption'], 'ad_id' => $ad->id]);
        }

        return redirect()->route('ads.show', $ad->slug)->with('success', 'L\'annonce a bien été modifiée');
    }
}
