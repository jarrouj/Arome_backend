<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function show_social(){

        $social = Social::all();

        return view('admin.social.show_social',compact('social'));


    }
    public function update_social(){
        $social = Social::find(1);

        return view('admin.social.update_social',compact('social'));
    }


    public function update_social_confirm(Request $request){

        $social =Social::find(1);

        $social->phone=$request->phone;
        $social->email=$request->email;
        $social->map=$request->map;
        $social->location=$request->location;
        $social->linkedin=$request->linkedin;
        $social->tiktok=$request->tiktok;
        $social->instagram=$request->instagram;
        $social->facebook=$request->facebook;
        $social->twitter=$request->twitter;
        $social->dribble=$request->dribble;
        $social->medium=$request->medium;
        $social->behance=$request->behance;
        $social->whatsapp=$request->whatsapp;
        $social->youtube=$request->youtube;
        $social->discord=$request->discord;
        $social->threads=$request->threads;
        $social->snapchat=$request->snapchat;



        $social->phone_sh=$request->phone_sh;
        $social->email_sh=$request->email_sh;
        $social->map_sh=$request->map_sh;
        $social->location_sh=$request->location_sh;
        $social->linkedin_sh=$request->linkedin_sh;
        $social->tiktok_sh=$request->tiktok_sh;
        $social->instagram_sh=$request->instagram_sh;
        $social->facebook_sh=$request->facebook_sh;
        $social->twitter_sh=$request->twitter_sh;
        $social->dribble_sh=$request->dribble_sh;
        $social->medium_sh=$request->medium_sh;
        $social->behance_sh=$request->behance_sh;
        $social->whatsapp_sh=$request->whatsapp_sh;
        $social->youtube_sh=$request->youtube_sh;
        $social->discord_sh=$request->discord_sh;
        $social->threads_sh=$request->threads_sh;
        $social->snapchat_sh=$request->snapchat_sh;

        $social->save();

        return redirect('/admin/show_social')->with('message','Socials Updated');


    }
}
