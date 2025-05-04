<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    //
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'status',
        'quantity',
        'image'
    ];

    protected function casts():array
    {
        return [
            'quantity' => 'integer'
        ];
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function borrowRequests(): BelongsToMany
    {
        return $this->belongsToMany(BorrowRequest::class, 'borrow_items')
        ->withPivot('quantity');
    }

    
}
