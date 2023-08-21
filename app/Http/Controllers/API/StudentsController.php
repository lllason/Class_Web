<?php
namespace App\Http\Controllers\Api;
 
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\ApiController;
 
class StudentsController extends ApiController
{
    public function index()
    {
        return $this->successResponse('Students successfully fetched.', StudentResource::collection(Student::all()));
    }
    
    public function store(Request $request)
    {
        //return array("action"=>'store');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'age' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->errorResponse('Error validation.', $validator->errors());       
        }
        return $this->successResponse('Post successfully created.', new StudentResource(
            Student::create($validator->validated())
        ));
    }
   
    public function show($id)
    {
        //return array("action"=>'show');
        $student = Student::find($id);
        if (is_null($student)) {
            return $this->errorResponse('Student does not exist.');
        }
        return $this->successResponse('Student successfully fetched.', new StudentResource($student));
    }
    
    public function update(Request $request, Student $student)
    {
        //return array("action"=>'update');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'age' => 'required'
        ]);
        if($validator->fails()){
            return $this->errorResponse('Error validation.', $validator->errors());       
        }
        $input = $validator->validated();
        $student->name = $input['name'];
        $student->address = $input['address'];
        $student->age = $input['age'];
        $student->save();
        
        return $this->successResponse('Student successfully updated.', new StudentResource($student));
    }
   
    public function destroy($id)
    {
        //return array("action"=>'destroy');
        $student = Student::find($id);
        if (is_null($student)) {
            return $this->errorResponse('Student does not exist.');
        }
        $student->delete();
        return $this->successResponse('Student successfully deleted.');
    }
}
?>