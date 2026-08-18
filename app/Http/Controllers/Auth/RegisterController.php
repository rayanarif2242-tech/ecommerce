<?php
    
    namespace App\Http\Controllers\Auth;
   use App\Models\User;
    use App\Models\Admin;
    use App\Models\Writer;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Foundation\Auth\RegistersUsers;
    use Illuminate\Http\Request;
    
    class RegisterController extends Controller
    {
        use RegistersUsers;
        public function __construct()
        {
            $this->middleware('guest');
            $this->middleware('guest:admin');
            $this->middleware('guest:writer');
        }
            // app/Http/Controllers/Auth/RegisterController.php

    
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    public function showWriterRegisterForm()
    {
        return view('auth.register', ['url' => 'writer']);
    }
        // app/Http/Controllers/Auth/RegisterController.php

  
    public function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }
        // app/Http/Controllers/Auth/RegisterController.php

    
    public function createWriter(Request $request)
    {
        $this->validator($request->all())->validate();
        $writer = Writer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/writer');
    }
   public function showRegistrationForm()
{
    return view('auth.register');
}

protected function validator(array $data)
{
    return Validator::make($data, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);
}

protected function create(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    
}
  
   

  


     
    }