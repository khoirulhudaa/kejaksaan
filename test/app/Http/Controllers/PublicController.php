<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Client $client)
    {
        $this->http = $client;
    }

    public function index()
    {
        $events    = Article::orderBy('updated_at', 'DESC')->limit(3)->get();
        return view('public.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendMessage(Request $request)
    {
        $name       = request()->post('name');
        $message    = request()->post('message');

        $promise = $this->http->requestAsync('GET', "https://api.zuwinda.com/v1.2/message/sms/send-text?content=Pesan melalui Web Otopet dari $name \n\n$message&token=1c6cdec1236b42d4a8e61294b92d8ada&to=089639626048");
        $response = $promise->wait();
        if ($response->getStatusCode() === 200) {
            return response()->json([
                'code' => 200,
                'status' => 'Success',
            ]);
        }
    }

    public function profile()
    {
        return view('public.profile');
    }

    public function events()
    {
        $data       = Article::orderBy('created_at', 'DESC')->get();
        $newest     = Article::orderBy('updated_at', 'DESC')->limit(1)->get();
        return view('public.events', compact('data', 'newest'));
    }

    public function detail($slug)
    {
        $data       = Article::where('slug', $slug)->orderBy('updated_at', 'DESC')->limit(1)->get();
        $events     = Article::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('public.detail', compact('data', 'events'));
    }
}
