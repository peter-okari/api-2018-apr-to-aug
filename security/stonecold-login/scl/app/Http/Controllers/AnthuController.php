<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Hash;
use DB;
use App\Anthu;
use Session;

class AnthuController extends Controller
{
    public function login(){
         return view('anthu.login', array('title' => 'Login'));
    }

    public function attemptLogin(Request $request){
        //request validate
        $this->validate($request, [
            'email' => 'required|email',
        ]);

         if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {

             return redirect()->route('anthu.profile');
         } else {
             return redirect('login')->withErrors([
             'failed' => 'Username or password incorrect']);

         }
    }


    public function logout(){
      //log them out
      Auth::logout();
      //redirect to home route
      return redirect()->route('/');
    }

    public function profile(){
    
dd(Auth::check());
      $user = Auth::user();
      dd($user);
        $me = Auth::user(); //returns logged in user
        $me = Anthu::find(Auth::id());//returns logged in user using the model
    }

    /**
     * Inserts some mock data into the anthu table
     * @return null
     */
    public function mockr(){

      //empty the table.. :D
      Anthu::truncate();

      echo 'Anthu table truncated...<br/>';

      //create some users

      //OOP Approach -- uses Eloquent ORM
      $wambua = new Anthu();
      $wambua->name = 'Wambua Mumo';
      $wambua->email = "wambua@example.com";
      $wambua->password = Hash::make('123456');
      $wambua->save();

      //simple select

      echo "first user inserted : id --> {$wambua->anthu_id}....<br/>";

      $walubengo = new Anthu();
      $walubengo->name = "Walubengo Mwambingu";
      $walubengo->email = "wmwambingu@example.com";
      $walubengo->password = Hash::make('123456');
      $walubengo->save();

      echo "second user inserted : id --> {$walubengo->anthu_id}....<br/>";


      //Using laravel's query builder(Fluent)
      //insert single
      //NB: Timestamps must be added manually when using fluent
      DB::table('anthu')->insert(
        ['name' => 'Muthemba Gaturu','email' => 'mgaturu@example.com', 'password' => Hash::make('123456'),'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")]
      );
      //insert multiple
      DB::table('anthu')->insert([
        ['name' => 'Sironka Naiswako','email' => 'sironka@example.com', 'password' => Hash::make('123456'),'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        ['name' => 'Njakini Flora','email' => 'njakini@example.com', 'password' => Hash::make('123456'),'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")]
      ]);

      echo 'Last bunch..';
      $total = count(Anthu::all());
      echo "<br/> Total number of users {$total}";

    }


}
