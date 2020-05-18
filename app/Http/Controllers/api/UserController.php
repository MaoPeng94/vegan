<?php
namespace App\Http\Controllers\api;
use Illuminate\Http\Request; 
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Traits\ImageUploader;
use App\User; 
use App\Identify;
use App\Cuisine;
use App\Astrological;
use App\Industry;
use App\Marital;
use App\Spiritual;
use App\Alcohol;
use App\Tabacco;
use App\Friend420;
use App\Havechildren;
use App\Haveanimal;
use App\Condition;
use App\UserSetting;


class UserController extends BaseController 
{

    use ImageUploader;

    public $successStatus = 200;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('Vegan Token')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'firstname'=>'string|required',
            'lastname' => 'string|required',
            'phone' => 'required|string|unique:users',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users', 
            'birthday'=> 'required|date',
            'identify_id' => 'required|integer',
            'cuisine_id' => 'required|integer',
            'astrological_id' => 'required|integer',
            'industry_id' => 'required|integer',
            'password' => 'required|same:c_password', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $validator->validated(); 
        $input['password'] = bcrypt($input['password']);
        $uploaded = $request->photos;
        if(isset($uploaded) && count($uploaded) > 0 ){
            $photos = [];
            foreach($uploaded as $key => $photo){
                sleep(1);
                $photos[] = $this->ImageUpload($photo);
            }
            $input['photos'] = json_encode($photos);
        }
       
        $user = User::create($input); 
        $success['username'] =  $user->username;
        $success['user_id'] = $user->id;
        return response()->json(['success'=>$success], $this-> successStatus); 
    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function get_general_resources() {
        $resources = array();
        try{
            $resources['identifies'] = Identify::select(["id", "identify as name"])->get();
            $resources['cuisines'] = Cuisine::select(["id", "cuisine as name"])->get();
            $resources['astrologicals'] = Astrological::select(['id', 'astrological as name'])->get();
            $resources['industries'] = Industry::select(['id', "industry as name"])->get();
            return response()->json($resources, $this->successStatus);
        }
        catch(\Illuminate\Database\QueryException $e){
            return $this->sendError("Database Error", "Oop, Something went wrong!", 500);

        }
    }

    public function get_match_resources(){
        $resources  = array();
        try{
            $resources['identifies'] = Identify::select(["id", "identify as name"])->get();
            $resources['conditions'] = Condition::select(["id", "name"])->get();
            $resources['spirituals'] = Spiritual::select(["id", "name"])->get();
            $resources['maritals'] = Marital::select(["id", "name"])->get();
            $resources['alcohols'] = Alcohol::select(['id', 'name'])->get();
            $resources['tabaccoes'] = Tabacco::select(['id', "name"])->get();
            $resources['friend420s'] = Friend420::select(['id', "name"])->get();
            $resources['havechildren'] = Havechildren::select(['id', "name"])->get();
            $resources['haveanimal'] = Haveanimal::select(['id', "name"])->get();
            return response()->json($resources, $this->successStatus);
        }
        catch(\Illuminate\Database\QueryException $e){
            return $this->sendError("Database Error", "Oop, Something went wrong!", 500);

        }
    }

    public function check_valid_username(Request $request){
        $validator = Validator::make($request->all(), [ 
            'username'=>'string|required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $username = $request->username;
        try{
            $count = User::where("username", $username)->count();
            return response()->json(array("success"=>$count),  $this->successStatus);
        }
        catch(\Illuminate\Database\QueryException $e){
            return $this->sendError("Database Error", "Oop, Something went wrong!", 500);
        }
    }

    public function check_valid_email(Request $request){
        $validator = Validator::make($request->all(),[
            "email"=>"email|required",
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $email = $request->email;
        try{
            $count = User::where("email", $email)->count();
            return response()->json(array("success"=>$count),  $this->successStatus);
        }
        catch(\Illuminate\Database\QueryException $e){
            return $this->sendError("Database Error", "Oop, Something went wrong!", 500);
        }
    }

    public function update_user_setting(Request $request){
        $data = $request->all();
        $identify = json_decode($data['identify']);
        $array = [];
        foreach($identify as $key=>$one){ $array[] = $one->id;}
        $data['identify'] =json_encode($array);
        $array = [];
        $condition = json_decode($data['conditions']);
        foreach($condition as $key=>$one){ $array[] = $one->id; }
        $data['conditions'] = json_encode($array);

        UserSetting::create($data);
    
    }

    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this->successStatus); 
    } 
}