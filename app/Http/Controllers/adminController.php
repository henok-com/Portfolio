<?php

namespace App\Http\Controllers;

use App\Models\portfolio_images;
use App\Models\skills;
use App\Models\whoami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function signin(Request $request) {
        return view('manage.signin');
    }
    public function authenticate(Request $request) {

        $user = $request->validate([
            "uname" => 'required',
            "pass" => 'required'
        ]);
        
        if(Auth::attempt(["username" => $user['uname'], "password" => $user['pass']])) {
            $request->session()->regenerate();
            return redirect()->intended("/dashboard");
        }

        return back()->withErrors([
            "uname" => "Username or password is incorrect!!!"
        ])->onlyInput("uname");
    }
    
    public function admin(Request $request) {
        return view('manage.dashboard');
    }

    public function editWhoami(Request $request) {
    
        $bio = whoami::all();
        $bio_id = '';
        $bio_text = '';
        $bio_image = '';
        foreach($bio as $b) {
            $bio_text = $b->bio;
            $bio_image = $b->bio_image;
        }
        return view('manage.editwhoami', [
            'bio_text' => $bio_text,
            'bio_image' => $bio_image
        ]);
    }
    public function updateWhoami(Request $request) {
        $whoami = whoami::find(1);
        if($request->input("bio") && !$request->hasFile('bio_image')) {
            $whoami->bio = $request->input("bio");
            $whoami->save();
            return redirect('/dashboard')->with("success", "The biography is updated successfully");
        } else if(
            !$request->input("bio") &&
             $request->hasFile("bio_image") &&
             $request->file("bio_image")->isValid()
        ) {
            $bio_image = $request->file("bio_image");
            $extension = $bio_image->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
                $whoami->bio_image = $bio_image->store('images', 'public');
                $whoami->save();
                return redirect("/dashboard")->with('success', 'The file is uploaded successfully!!!');
            } else {
                return back()->withErrors('The supported files are .png, .jpg, .jpeg');
            }
            
        } else {
            return back()->withErrors( 'The upload is fail due to the input it is given.');
        }
        
    }

    public function createSkill(Request $request) {
        return view("manage.createskill");
    }

    public function saveSkill(Request $request) {
        $skill = new skills;
        if($request->hasFile("skillImage") && $request->file("skillImage")->isValid()) {
            $skillImage = $request->file("skillImage");
            $extension = $skillImage->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
                Storage::delete('public/' . $skill->skillImage);
                $skill->skillImage = $skillImage->store('images', 'public');
            } else {
                return back()->withErrors('The supported files are .png, .jpg, .jpeg');
            }
        }
        $skill->skillName = $request->skillName;
        $skill->percent = $request->percent;
        $skill->save();
        return redirect('/edit/skills')->with("success", "The skill " . $request->skillName . " Created Successfully");
    }

    public function editSkills(Request $request) {
        $skills = skills::all();
        return view('manage.editskills', [
            'skills' => $skills
        ]);
    }
    public function editSkill(Request $request, int $id) {
        $skill = skills::find($id);
        if($skill) {
            return view('manage.editskill', [
                'skill' => $skill
            ]);
        }
        return redirect("/edit/skills");
    }

    public function updateSkill(Request $request, int $id) {
        $skill = skills::find($id);
        if($request->hasFile("skillImage") && $request->file("skillImage")->isValid()) {
            $skillImage = $request->file("skillImage");
            $extension = $skillImage->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
                Storage::delete('public/' . $skill->skillImage);
                $skill->skillImage = $skillImage->store('images', 'public');
            } else {
                return back()->withErrors('The supported files are .png, .jpg, .jpeg');
            }
        }
        $skill->skillName = $request->skillName;
        $skill->percent = $request->percent;
        $skill->save();
        return redirect("/edit/skills")->with('success', 'The skill is updated successfully!!!');
    }

    public function deleteSkill(Request $request, int $id) {
        $skill = skills::find($id);
        Storage::delete('public/' . $skill->skillImage);
        $skillName = $skill->skillName;
        $skill->delete();
        return redirect("/edit/skills")->with('success', 'The Skill ' . $skillName . ' is deleted successully!!!');
    }

    public function createWork(Request $request) {
        $image = new portfolio_images;
        if($request->hasFile("work_image") && $request->file("work_image")->isValid()) {
            $work_image = $request->file("work_image");
            $extension = $work_image->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "svg") {
                Storage::delete('public/' . $image->imagePath);
                $image->imagePath = $work_image->store('images', 'public');
                $image->save();
                return redirect("/edit/works")->with("success", "The work image is added successully");
            } else {
                return back()->withErrors('The supported files are .png, .jpg, .jpeg');
            }
        }  else {
            return back()->withErrors("You didn't select any photos");
        }
    }

    public function editWorks(Request $request) {
        $images = portfolio_images::all();
        return view('manage.editworks', [
            'images' => $images
        ]);
    }

    public function editWork(Request $request, int $id) {
        $image = portfolio_images::find($id);
        if($request->hasFile("work_image") && $request->file("work_image")->isValid()) {
            $work_image = $request->file("work_image");
            $extension = $work_image->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "svg") {
                Storage::delete('public/' . $image->imagePath);
                $image->imagePath = $work_image->store('images', 'public');
                $image->save();
                return redirect("/edit/works")->with("success", "The work image is updated successully");
            } else {
                return back()->withErrors('The supported files are .png, .jpg, .jpeg');
            }
        }  else {
            return back()->withErrors("You didn't select any photos");
        }
    }

    public function deleteWork(Request $request, int $id) {
        $image = portfolio_images::find($id);
        Storage::delete('public/' . $image->imagePath);
        $image->delete();
        return redirect("/edit/works")->with('success', 'Image is successfully deleted');
    }

    public function logout(Request $request) {
        if($request->method() === "GET") {
            return back();
        }
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect("/");
    }
}
