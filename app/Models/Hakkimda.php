<?php
    
            namespace App\Models;
            
            use Illuminate\Database\Eloquent\Factories\HasFactory;
            use Illuminate\Database\Eloquent\Model;
            
            class Hakkimda extends Model
            {
                use HasFactory;
                protected $table="hakkimda";
                protected $guarded=[];
            }