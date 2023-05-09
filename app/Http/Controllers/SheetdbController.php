<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SheetDB\SheetDB;

class SheetdbController extends Controller
{
  public function get()
  {
    $sheetdb = new SheetDB('5nql68xhnf7ee');
    dd($sheetdb->get());
  }

  public function create()
  {
    $sheetdb = new SheetDB('5nql68xhnf7ee');
    //$sheetdb->create(['NOME' => 'teste']);
    //dd($sheetdb->get());
  }
}
