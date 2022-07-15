<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{Country, State, City};
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Helpers\File;

class UserController extends Controller
{
    use File;

    private $imagepath =  'admin/user/';
    private $thumb_arr = [
        ['w' => 100],
    ];

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
            return redirect()->back()->with(['success' => 'Profile successfully updated.', 'tab' => 'editprofile']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update Profile.', 'tab' => 'editprofile']);
    }

    /**
     * Update Password on submit
     */
    function updatePassword(Request $request)
    {
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
            return redirect()->back()->with(['success' => 'Password updated successfully!!', 'tab' => 'changepassword']);
        }
        return redirect()->back()->with(['fail' => 'Unable to update password.', 'tab' => 'changepassword']);
    }

    /**
     * Function to update profile image
     */
    function updateProfileImage(Request $request)
    {      
        $request->validate([
            'image' => 'required|image|mimes:png,gif,svg|max:2048' //''
        ],
        [
            'image.image' => 'The image must be a file of type: jpeg, png, gif, svg.'
        ]);
        //pr($request->all(),1);
        $user = auth()->user();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            //pr($file,1);
            $originalImagePath = $this->file($file, $this->imagepath, $this->thumb_arr);
            if (!empty($user->image)) {
                $this->deleteFile($user->image, $this->thumb_arr);         
            }
            $user->image = $originalImagePath;
            $upd = $user->save();
            if($upd){
                return response()->json(['success' => 'Profile image updated successfully.']);
            }
        }

        return response()->json(['error' => 'Error updating profile image.']);
    }

}
