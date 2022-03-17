<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class CreateTableModel extends Controller
{
    public function normal($url)
    {
        try {
            Schema::create($url, function (Blueprint $table) {
                $table->id();
                $table->enum('status',[0,1]);
                $table->foreignId('module')->constrained('modules')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('title');
                $table->text('content');
                $table->string('key');
                $table->string('desc');
                $table->string('img');
                $table->string('order_number');
                $table->timestamps();
                // $table->charset = 'utf8';
                // $table->collation = 'utf8_turkish_ci';
            });
    
            $ADD_MODULE='<?php
    
            namespace App\Models;
            
            use Illuminate\Database\Eloquent\Factories\HasFactory;
            use Illuminate\Database\Eloquent\Model;
            
            class '.ucfirst($url).' extends Model
            {
                use HasFactory;
                protected $table="'.$url.'";
                protected $guarded=[];
            }';
            File::put(app_path('Models').'/'.ucfirst($url).'.php',$ADD_MODULE);
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
}
