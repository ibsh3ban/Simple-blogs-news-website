<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class AboutController extends Controller
{

    public function aboutpage(){
    $about = About::find(1);
    return view('admin.about.about_page',compact('about'));
}

    public function updateAbout(Request $request){

    $about_id = $request->id;

    if ($request->file('about_image')) {
        $image = $request->file('about_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->resize(523,605)->save('upload/about_page/'.$name_gen);



        $save_url = 'upload/about_page/'.$name_gen;

        About::findOrFail($about_id)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'about_image' => $save_url,

        ]);
        $notification = array(
        'message' => 'About Updated with Image Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

    } else{

        About::findOrFail($about_id)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,

        ]);
        $notification = array(
        'message' => 'Home Slide Updated without Image Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

    } // end Else

 } // End Method

   public function about(){
    $about = About::find(1);
    return view('frontend.about',compact('about'));

 }
   public function multiimage(){
    return view('admin.about.about_multi_image');

 }


    public function storeMultiImage(Request $request){
        $image = $request->file('multi_image');
        foreach ($image as $multi_image){

        $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($multi_image)->resize(220,220)->save('upload/multi/'.$name_gen);



        $save_url = 'upload/multi/'.$name_gen;

        MultiImage::insert([

            'multi_image' => $save_url,
            'created_at'=> Carbon::now()

        ]);
       }  //end foreach
        $notification = array(
        'message' => 'Multi Images saved Successfully',
        'alert-type' => 'success'
    );

       return redirect()->back()->with($notification);
    }

    public function AllMultiImage(){

        $allMultiImage = MultiImage::all();
        return view('admin.about.all_multiimage',compact('allMultiImage'));

     }// End Method

     public function EditMultiImage($id){

        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about.edit_multiimage',compact('multiImage'));

     }// End Method

     public function UpdateMultiImage(Request $request){

        $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(220,220)->save('upload/multi/'.$name_gen);



            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::findOrFail($multi_image_id)->update([

                'multi_image' => $save_url,

            ]);
            $notification = array(
            'message' => 'About Updated with Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.multi.image')->with($notification);

        }

     }// End Method


    public function DeleteMultiImage($id){
        $multi = MultiImage::findOrfail($id);
        $img = $multi->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Deleted Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);




    }







 }




