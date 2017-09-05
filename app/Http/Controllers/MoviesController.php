<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Movie;
class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        $name = $request->get('name');
        
        if($name){
            return $this->findMovies($name);
        }
        return Movie::all();
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
        $this->validate(request(),[
                'name' => 'required|unique:movies',
                'director' => 'required',
                'duration' => 'required|min:1|max:500',
                'releaseDate' => 'required|unique:movies',
                'imageUrl' => 'required|url',
                'genres' => 'required',
            ]);
        return Movie::create($request->all());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::FindOrFail($id);
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
       $this->validate(request(),[
                'name' => 'required|unique:name',
                'director' => 'required',
                'duration' => 'required|min:1|max:500',
                'releaseDate' => 'required|unique:releaseDate',
                'imageUrl' => 'required|url',
                'genres' => 'required',
            ]);
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return $movie;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return $movie;
    }
    public function findMovies($name){
        return Movie::where('name', 'like','%'. $name .'%')->get();
    }   
}