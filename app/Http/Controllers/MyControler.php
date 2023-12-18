<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Fan;
use App\Http\Requests\postfan;

use Maatwebsite\Excel\Facades\Excel;

use DB;
use Storage;
use Response;


class MyControler extends Controller
{
    public function exportTable(){
        $fp = fopen("appealDatabase.csv", 'w');

        $table = DB::table("users")
                        ->join("appeals","users.id",'=',"appeals.user_id")
                        ->select("appeals.name",
                                 "appeals.email",
                                 "appeals.value",
                                 "users.ip_address")
                        ->get();
        
        $arr = $table->toArray();

        foreach ($arr as $row) {
            $fields = json_decode(json_encode($row), true);
            fputcsv($fp, $fields);
        };
        
        fclose($fp);
    }
    
    public function addAppeal(){
        
        if(request('name') == '' || request('email') == '' || request('value') == '')
        {
            return ["Result"=>"400 Bad Request"];
        };

        $user_data = array(
            "ip_address" => "",
        );
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = 1;
        $user_data["ip_address"] = strval($ip);

        $user = User::where("ip_address", "=", $ip)->first();

        if($user == null){
            User::create($user_data);
        }else{
            $user_id = $user->id;
        }

        $bad_words = ["попа"];

        $good_words = "***";

        $name = request('name');
        $name = str_ireplace($bad_words,  $good_words, $name);

        $email = request('email');
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return ["Result"=>"400 Bad Request"];
        };

        $value = request('value');
        $value = str_ireplace($bad_words,  $good_words, $value);

        $val = array(
            'name' => $name,
            'value' => $value,
        );
        
        $appeal_data = array(
            "user_id" => $user_id,
            "name" => $name,
            "email" => $email,
            "value" => $value,
        );

        Appeal::create($appeal_data);

        return ["Result"=>"201 Appeal Created"];
    }

    public function findAppealById($id)
    {
        $appeal_data = array(
            "id" => 0,
            "user_id" => 0,
            "name" => "",
            "email" => "",
            "value" => "",
        );
        
        $appeal = Appeal::find($id); // where("атрибут", "значение атрибута");

        $appeal_data["id"] = $appeal->id;
        $appeal_data["user_id"] = $appeal->user_id;
        $appeal_data["name"] = $appeal->name;
        $appeal_data["email"] = $appeal->email;
        $appeal_data["value"] = $appeal->value;

        //dump($appeal_data);

        return $appeal_data;
    }

    public function getConcerts(){
        $concerts = DB::table('concerts')->get();
        return $concerts;
    }

    public function getImage($name)
    {
        $imageFromDB = DB::table("image")
                            ->where("name", "=", $name)
                            ->first();
        $filePath = $imageFromDB->file_path;
        $Path = Storage::path($filePath);
        return response()->file($Path);
    }

    public function getSample($name)
    {
        $imageFromDB = DB::table("sample")
                            ->where("name", "=", $name)
                            ->first();
        $filePath = $imageFromDB->file_path;
        $Path = Storage::path($filePath);
        return response()->file($Path);
    }

    public function getText($name)
    {
        $text = DB::table("texts")
                            ->where("name", "=", $name)
                            ->first();
        return Response::json($text->value);
    }

    public function getFile($path)
    {
        //$File = Storage::get($path);
        $filePath = Storage::path($path);
        return response()->file($filePath);
    }

}
