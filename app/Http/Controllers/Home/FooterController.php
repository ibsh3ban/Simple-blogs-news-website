<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{
    public function FooterSetup(){

        $allfooter = Footer::find(1);
        return view('admin.footer.footer_all',compact('allfooter'));

    }
    // end method
 }
