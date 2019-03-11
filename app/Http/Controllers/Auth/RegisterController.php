<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\CompanyDetails;
use App\ContactDetails;
use Salaros\Vtiger\VTWSCLib\WSClient;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        $companyDetails = new CompanyDetails;
        $companyDetails->user_id = $user->id;
        $companyDetails->email = $data['email'];
        $companyDetails->name = $data['name'];
        $companyDetails->save();

        $contactDetails = new ContactDetails;
        $contactDetails->user_id = $user->id;
        $contactDetails->email = $data['email'];
        $contactDetails->save();

        $client = new WSClient(env('serveraddress') . "/webservice.php", env('crm_username'), env('crm_useraccesskey'));
        $accounts_data = array(
            'cf_1326'               => $user->id,
            'accountname'           => $data['name'],
            'email1'                => $data['email'],
            'assigned_user_id'      => '19x1',
        );
        $client->entities->createOne('Accounts', $accounts_data);

        $contacts_data = array(
            'cf_1338'               => $user->id,
            'lastname'              => $data['email'],
            'assigned_user_id'      => '19x1',
        );
        $client->entities->createOne('Contacts', $contacts_data);

        return $user;
    }
}
