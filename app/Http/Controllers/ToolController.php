<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = Tool::with('mapel')->latest()->paginate(5);
        return view('admin.tool.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Mapel::with('tool')->get();
        return view('admin.tool.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_tool'     =>  'required|',
            'description'   =>  'required|',
            'image'         =>  'nullable|',
            'tautan'        =>  'required|url|',
            'parent_id'     =>  'required|exists:mapels,id',
        ]);



        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/tools', $image->hashName());

        // Create Tools
        $tool = Tool::create([
            'nama_tool'     => $request->nama_tool,
            'description'   => $request->description,
            'image'         => $image->hashName(),
            'tautan'        => $request->tautan,
            'parent_id'     => $request->parent_id,
        ]);

        // Update parent's 'active' status
        if ($request->input('parent_id')) {
            $activeParent = Tool::find($request->input('parent_id'));
            if ($activeParent) {
                $activeParent->update(['active' => true]);
            }
        }

        return redirect()->route('tool.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        return view('admin.tool.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tool $tool)
    {
        $this->validate($request, [
            'nama_tool'     =>  'required|',
            'description'   =>  'required|',
            'image'         =>  'nullable|',
            'tautan'        =>  'required|url|',
            'parent_id'     =>  'required|exists:mapels,id',
        ]);

        //untuk menyimpan gambar yang ada
        $existingImage = $tool->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/tools', $tool->hashName());

            //hapus gambar lama
            if ($existingImage) {
                Storage::delete('public/tools/' . $existingImage);
            }

            $tool->update([
                'nama_tool'     => $request->nama_tool,
                'description'   => $request->description,
                'tautan'        => $request->tautan,
                'image'         => $image->hashName(),


            ]);
        } else {
            $tool->update([
                'nama_tool'     => $request->nama_tool,
                'description'   => $request->description,
                'tautan'        => $request->tautan,
                'image'         => $existingImage //gunakan iamge yang sudah ada
            ]);
        }

        return redirect()->route('tool.index')->with(['success' => "Data Berhasil di Update!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        Storage::delete('public/tools/', $tool->image);
        $tool->delete();
        return redirect()->route('tool.index')->with(['successsss' => 'Data sudah dihapus']);
    }
}
