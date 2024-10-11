<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
public function index()
{
// You can pass data to the view if needed
return view('home');
}
}


?>
