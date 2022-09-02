<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public const STATUSES = [
        'DRAFT' => 'DRAFT',
        'ACTIVE' => 'ACTIVE',
        'BLOCKED' => 'BLOCKED',
    ];

    protected $fillable = [
        'title', 'description', 'content', 'image', 'author', 'status', 'category_id', 'source_id'
    ];

    public function category ():BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function source ():BelongsTo
    {
        return  $this->belongsTo(Source::class,'source_id','id');
    }

}
