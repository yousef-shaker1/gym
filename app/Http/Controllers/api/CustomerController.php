<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResponce;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $customers = CustomerResponce::collection(Customer::all());
        return $this->apiResponse($customers,'ok', 200);
    }

    public function show(Request $request, $id){
        $customer = Customer::find($id);
        if(!$customer){
            return $this->apiResponse(null, 'customer not found', 404);
        }
        return $this->apiResponse(new CustomerResponce($customer),'ok', 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|unique:customers,email|between:2,100|email',
            'password' => 'required|min:6|max:16',
            'phone' => 'required|string',  
            'age' => 'required|numeric',  
            'birthdate' => 'required|date', 
            'address' => 'required|between:5,100',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $customer = Customer::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles_name' => ["user"],
        ]);

        return $this->apiResponse(new CustomerResponce($customer), "Created successfully", 201);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|min:4',
            'email' => 'nullable|unique:customers,email|between:2,100|email',
            'password' => 'nullable|min:6|max:16',
            'phone' => 'nullable|string',  
            'age' => 'nullable|numeric',  
            'birthdate' => 'nullable|date', 
            'address' => 'nullable|between:5,100',
        ]);
        
        $customer = Customer::find($id);
        if (!$customer) {
            return $this->apiResponse(null, "Customer not found", 404);
        }
        
        $validatedData = $validator->validated();
        
        if ($request->has('password')) {
            $validatedData['password'] = bcrypt($request->password);
            User::where('email', $customer->email)->update([
                'password' => bcrypt($request->password),
            ]);
        }
        
        $customer->update($validatedData);
        

        return $this->apiResponse(new CustomerResponce($customer), "edit customer successfully",200);
    }

    public function delete($id){
        $customer = Customer::find($id);
        if(!$customer){
            return $this->apiResponse(null, 'problem not found', 404);
        }
        User::where('email', $customer->email)->delete();
        $customer->delete();
        return $this->apiResponse(null, 'problem delete success', 404);
    }
}
