<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Config\CreateTableModel;
use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\PageType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ModuleController extends CreateTableModel
{
    public function index()
    {
        $modules=Module::orderBy('order')->with('type')->get();
        $types=PageType::get();
        return view('admin.pages.modules')
        ->with('modules',$modules)
        ->with('types',$types);
    }

    public function insert(Request $request)
    {
        $page_type=$request->page_type;
        $name=$request->name;
        $url=Str::slug($name,'_');
        $order=$request->order;

        Module::create([
            'page_type' => $page_type,
            'name' => $name,
            'url' => $url,
            'order' => $order,
        ]);

        return $this->normal($url) ? back() : redirect()->route('admin.dashboard');
    }

}
