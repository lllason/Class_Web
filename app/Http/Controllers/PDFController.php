<?php
      
namespace App\Http\Controllers;
       
use Illuminate\Http\Request;
use App\Mail\MailExample;
use PDF;
use Mail;
    
class PDFController extends Controller
{
       
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["email"] = "lllason@gmail.com";
        $data["title"] = "From AI 碗公班 ";
        $data["body"] = "從 Dashboard3 送出　(陳弘文) ";
    
        $pdf = PDF::loadView('emails.myTestMail', $data);
        $data["pdf"] = $pdf;
  
        Mail::to($data["email"])->send(new MailExample($data));
    
        // dd (dump & die)
         dd('Mail sent successfully');
    }
       
}
