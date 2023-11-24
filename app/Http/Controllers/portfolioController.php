<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\portfolio_images;
use App\Models\skills;
use App\Models\whoami;
use App\Models\User;
use Illuminate\Http\Request;

class portfolioController extends Controller
{
    
    public function index(Request $request) {
            return view('index');
    }

    public function whoami(Request $request) {
        $bio = whoami::select('bio', 'bio_image')->get();
        $bio_text = '';
        $bio_image = '';
        foreach($bio as $b) {
            $bio_text = $b->bio;
            $bio_image = $b->bio_image;
        }
        return view('whoami', [
            'bio' => $bio_text,
            'bio_image' => $bio_image
        ]);
    }
    
    public function skills(Request $request) {
        $skills = Skills::all();
        return view('skills', [
            'skills' => $skills
        ]);
    }

    public function works(Request $request) {
        $images = portfolio_images::all();
        return view('works', [
            'images' => $images
        ]);
    }

    public function contact(Request $request) {
        return view('getintouch');
    }

    public function storeMessage(Request $request) {
        $message = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "message" => "required"
        ]);

        $messages = new Messages;
        $messages->Name = $message["name"];
        $messages->Email = $message["email"];
        $messages->Messages = $message["message"];
        $messages->save();

        return redirect("/");
    }
    
    public function insertUser(Request $request) {
        $user = new User;
        $user->name = "Habteyes Muluneh";
        $user->username = "habtieMuluneh";
        $user->password = "habtie@123";
        $user->save();
    }

    public function insertBio(Request $request) {
        $whoami = new Whoami;
        $whoami->bio = " I am Skilled Cinematographer, Photographer, Videographer.";
        $whoami->save();
    }

    public function insertSkill(Request $request) {
        $skills = new skills;
        $skills->skillName = "Photoshop";
        $skills->percent = "70%";
        $skills->save();
    }

    public function insertImage(Request $request) {
        $image = new portfolio_images;
        $image->imagePath = "/assets/img3.jpeg";
        $image->save();
    }
}
