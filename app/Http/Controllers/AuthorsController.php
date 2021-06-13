<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Authors;
use App\Traits\ApiResponser;

class AuthorsController extends Controller
{
    use ApiResponser;
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getAuthors(){
        $authors = Authors::all();
        return response()->json($authors, 200);
    }

    public function index()
    {
        $authors = Authors::all();
        return $this->successResponse($authors);
    }

    public function add(Request $request ){
        $rules = [
        'id' => 'required|numeric|min:1|not_in:0',
        'fullname' => 'required|max:150',
        'gender' => 'required|max:10|in:Male,Female',
        'birthday' => 'required|date',
        ];
        $this->validate($request,$rules);
        // $authorsjob = authorJob::findOrFail($request->jobid);
        // UNCOMMENT LAST
        $author = Authors::create($request->all());
        return $this->successResponse($author, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        // $author = Authors::findOrFail($id);
        $author = Authors::where('id', $id)->first();    
        return $this->successResponse($author);    
        // return $this->errorResponse('author ID is not found', Response::HTTP_NOT_FOUND); 
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'id' => 'required|numeric|min:1|not_in:0',
            'fullname' => 'required|max:150',
            'gender' => 'required|max:10|in:Male,Female',
            'birthday' => 'required|date',
            ];

            $this->validate($request, $rules);
            // $author = author::findOrFail($id);  
            $author = Authors::where('id', $id)->firstOrFail(); 
            $author->fill($request->all());
            if ($author->isClean()) {
                return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $author->save();
            return $this->successResponse($author);

        
          
        
    }

    public function delete($id)
    {
        // $author = Authors::findOrFail($id);
        $author = Authors::where('id', $id)->first();  
        $author->delete();
        return $this->successResponse($author);
        
    }
}
