<?php
namespace App\Http\Controllers;//use App\User;
use App\Models\Author; // <-- your model is 
use App\Models\Books; 
use Illuminate\Http\Response; // Response Components
use App\Traits\ApiResponser; // <-- use to standardized our code 
use Illuminate\Http\Request; // <-- handling http request in lumen
use DB;


Class AuthorController extends Controller {
 // use to add your Traits ApiResponser
 use ApiResponser;
 private $request;
 public function __construct(Request $request){
 $this->request = $request;
 }
 
 /**
 * Return the list of usersjob
 * @return Illuminate\Http\Response
 */
 public function index()
 {
 $authors = Author::all();
 return $this->successResponse($authors);
 
 }
 /**
 * Obtains and show one userjob
 * @return Illuminate\Http\Response
 */
 public function show($id)
 {
 $authors = Author::findOrFail($id);
 return $this->successResponse($authors); 
 }

 public function add(Request $request )
 {
     $rules = [ 
     'fullname' => 'required|max:150',
     'gender' => 'required|max:10',
     'birthday' => 'required|date',

     ];
     $this->validate($request,$rules);
     $authors = Author::create($request->all());
     //$books = Books::findOrFail($request->primarykey);
     return $this->successResponse($authors, Response::HTTP_CREATED);
 }

 public function update(Request $request,$id)
 {
    $rules = [ 
        'fullname' => 'required|max:150',
        'gender' => 'required|max:10',
        'birthday' => 'required|date',
   
        ];
        $this->validate($request,$rules);
        $authors = Author::findOrFail($id);
        
        $authors->fill($request->all());
        // if no changes happen
        if ($authors->isClean()) {
        return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $authors->save();
        return $this->successResponse($authors);
 }

 public function delete($id)
 {
     $authors = Author::findOrFail($id);
     $authors->delete();
     return $this->successResponse($authors);
 
}
}