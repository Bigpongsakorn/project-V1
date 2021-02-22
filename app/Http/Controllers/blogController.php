<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page'] = '/blog';
        $data['news'] = Blog::get();
        // dd($data);
        return view('blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['page'] = '/blog';
        return view('blog.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        try {
            if ($request->hasFile('news_pic')) {
                $path = public_path() . '/upload/news/'; // ที่อยู่ ที่เซฟรูป

                // upload new file
                $file = $request->file('news_pic');
                $extension = $file->getClientOriginalExtension(); // ส่วนขยายรูปภาพ
                $filename = time() . '.' . $extension;
                $file->move($path, $filename);
                $request->news_pic = $filename;
                $news_pic = $request->news_pic;
            }

            $table = [
                'news_name' => $request->news_name,
                'news_detail' => $request->news_detail,
                'staff_id' => $request->staff_id,
                'news_pic' => $news_pic,
                'created_at' => date('Y-m-d h:i:s'),
            ];
            // dd($table);

            Blog::Insert($table);

        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'กรอกข้อมูลไม่ครบถ้วน!');
        }
        return redirect('/blog/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['news'] = Blog::where('news_id', $id)->first();
        $data['allnews'] = Blog::where('news_id', '!=', $data['news']->news_id)->orderBy('news_id', 'desc')->limit('10')->get();
        // dd($data['news']->news_id);
        return view('blog.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page'] = '/blog';
        $data['staff_id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['blog'] = Blog::where('news_id', $id)->first();
        // dd($data);
        return view('blog.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request);
        try {
            $blog = Blog::select('news_pic')->where('news_id', $id)->first();
            if ($request->hasFile('news_pic')) {
                $path = public_path() . '/upload/news/'; // ที่อยู่ ที่เซฟรูป

                //code for remove old file
                if ($blog->news_pic != '') {
                    $file_old = $path . $blog->news_pic;
                    unlink($file_old);
                }

                // upload new file
                $file = $request->file('news_pic');
                $extension = $file->getClientOriginalExtension(); // ส่วนขยายรูปภาพ
                $filename = time() . '.' . $extension;
                $file->move($path, $filename);
                $request->news_pic = $filename;
                // $news_pic = $request->news_pic;
                $image = [
                    'news_pic' => $request->news_pic,
                ];
                Blog::where('news_id', $id)->update($image);
            }

            $table = [
                'news_name' => $request->news_name,
                'news_detail' => $request->news_detail,
                'staff_id' => $request->staff_id,
                'created_at' => date('Y-m-d h:i:s'),
            ];
            // dd($table);
            Blog::where('news_id', $id)->update($table);

        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'กรอกข้อมูลไม่ถูกต้อง!');
        }
        return redirect('/blog/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::where('news_id', $id)->delete();
        return redirect('/blog/index');
    }
}
