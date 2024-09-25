<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends BackendController
{


    public function index()
    {

        $authId = auth()->user()->id;
        $role = auth()->user()->role;
        if ($role != 'admin') {
            $usersData = User::where('id', '=', $authId)->get();
            return view($this->_backend_page_path . 'users.index', compact('usersData'));
        } else {
            $usersData = User::where('id', '!=', $authId)->get();
            return view($this->_backend_page_path . 'users.index', compact('usersData'));
        }

    }

    public function deleteFile($id)
    {
        $userData = User::findOrFail($id);
        $userImage = $userData->image;
        if (file_exists($userImage) && is_file($userImage)) {
            unlink($userImage);
            return true;
        } else {
            return true;
        }


    }


    public function updateProfile(Request $request,$id)
    {
        $authId = $id ?? auth()->user()->id;
        if ($request->isMethod('post')) {
            $userData = User::findOrFail($authId);
            $userData->name = $request->name;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/users/');
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
                if ($this->deleteFile($authId) && $file->move($uploadPath, $imageName)) {
                    $userData->image = "uploads/users/" . $imageName;
                } else {
                    return redirect()->back()->with('error', 'Image not uploaded');
                }

            }
            $userData->save();
            return redirect()->back()->with('success', 'Profile updated successfully');

        } else {
            $userData = User::findOrFail($authId);
            return view($this->_backend_page_path . 'users.update-profile', compact('userData'));
        }


    }


    public function updateRole(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        } else {
            $criteria = $request->criteria;
            $user = User::findOrFail($criteria);
            $role = $user->role;
            if ($role == 'admin') {
                $user->role = 'user';
            } else {
                $user->role = 'admin';
            }
            $user->save();
            return redirect()->back()->with('success', 'Role updated successfully');
        }

    }

    public function viewProfile($id)
    {
        $userData = User::findOrFail($id);
        return view($this->_backend_page_path . 'users.view-profile', compact('userData'));
    }
}
