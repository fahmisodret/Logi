<?php
namespace App\Http\Controllers;
use Services\TestService;
use App\Http\Requests\TestRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
  public function create(
    TestRequest $request, 
    TestService $testService
  )
  {    
   $post = $createPostService->handle($request->all());
    return redirect()->back()->withSuccess($message);
  }
}