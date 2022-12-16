<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerFormRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(BannerFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/banner/', $filename);
            $validatedData['image'] = "uploads/banner/$filename";
        }

        $validatedData['status'] = $request->status == true ? '1' : '0';

        Banner::create([
            'title' => $validatedData['title'],
            'url' => $validatedData['url'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status']
        ]);

        return redirect()->route('admin.banner.index')->with('message', 'Banner added!');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(BannerFormRequest $request, Banner $banner)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {

            $destination = $banner->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/banner/', $filename);
            $validatedData['image'] = "uploads/banner/$filename";
        }

        $validatedData['status'] = $request->status == true ? '1' : '0';

        Banner::where('id', $banner->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $banner->image,
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('admin.banner.index')->with('message', 'Banner updated!');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->count() > 0) {
            $destination = $banner->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $banner->delete();
            return redirect()->route('admin.banner.index')->with('message', 'Banner deleted!');
        }
        return redirect()->route('admin.banner.index')->with('message', 'Something went wrong!');
    }
}
