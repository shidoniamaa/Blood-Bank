<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\BloodType;
use App\Model\Client;
use App\Model\Contact;
use App\Model\DonationRequest;
use App\Model\Governorate;
use App\Model\Post;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    public function home()
    {
        $client = Client::first();

        auth('client-web')->login($client);
        $donation_requests = DonationRequest::paginate(7);
        $posts = Post::where('publish_date', '<', Carbon::now()->toDateString())->take(9)->get();
        return view('front.home', compact(['posts', 'donation_requests']));
    }

//  --------------------------- About --------------------------------
    public function about()
    {
        $setting = Setting::first();
        return view('front.about', compact('setting'));
    }

//  --------------------------- toggleFavourite --------------------------------
    public function toggleFavourite(Request $request)
    {

        $toggle = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1, 'success', $toggle);
    }

    //  --------------------------- All Donation Request--------------------------------
    public function donationRequest()
    {

        $blood_types = BloodType::all();
        $governorates = Governorate::all();
        $donation_requests = DonationRequest::paginate(5);
        return view('front.donation-request', compact(['blood_types', 'governorates', 'donation_requests']));
    }

    //  ---------------------------Donation Request Details --------------------------------
    public function donationDetails($id)
    {

        $donation_request = DonationRequest::findOrFail($id);
        return view('front.request-details', compact('donation_request'));
    }

    //  --------------------------- contact Us --------------------------------
    public function contactUs()
    {

        $contact = Contact::first();
        return view('front.contact-us', compact('contact'));
    }

//  --------------------------- Post Details--------------------------------

    public function postDetails($id)
    {

        $post = Post::findOrFail($id);
        $relatedPosts = Post::where('category_id', $post->category_id)->take(4)->get();
        return view('front.post-details', compact('post', 'relatedPosts'));
    }

//  --------------------------- --------------------------------


}
