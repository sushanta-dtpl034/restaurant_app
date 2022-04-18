<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{Country, State, City};
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * 
     */
    public function index(Request $request)
    {
        return view('admin.user.profile');
    }

    /**
     * Load Edit Password Page
     */
    public function editprofile(Request $request)
    {
        $user = auth()->user();        
        $countries = Country::all();
        $states = State::where("country_code", $user->country_code)->get(["state", "state_code"]);
        $city_value = [];
        if (!empty($user->city_id)) {
            $city_obj = City::find($user->city_id);
            $city_value = isset($user->country_code) ? [['id' => $city_obj->id, 'value' => $city_obj->city]] : [];
        }        
        return view('admin.user.profile', compact('user', 'countries', 'states', 'city_value'));
    }

    /**
     * Update Profile on form submit
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|digits:10',
            'alternate_number' => 'nullable|digits:10',
        ]);

        $user->name = ucfirst($request->name);
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->alternate_number = $request->alternate_number;
        $user->street_address = $request->street_address;
        $user->street_address2 = $request->street_address2;
        $user->country_code = $request->country_code;
        $user->state_code = $request->state_code;
        $user->city_id = $request->city_id;
        $user->zipcode = $request->zipcode;
        $user->modify_by = auth()->id();
        $upd = $user->save();

        if ($upd) {
            return redirect()->back()->with(['success' => 'Category successfully updated.','tab' => 'editprofile']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update category.','tab' => 'editprofile']);
    }

    /**
     * Update Password on submit
     */
    function updatePassword(Request $request){
        $request->validate([
            'current_password' => 'required|string|password',
            'password' => ['required', 'confirmed', Password::min(8)->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()],
        ]); 
        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $upd = $user->save();
        if ($upd) {
            return redirect()->back()->with(['success' => 'Password updated successfully!!','tab' => 'changepassword']);
        }
        return redirect()->back()->with(['fail' => 'Unable to update password.','tab' => 'changepassword']);   
    }
}
