<?php

namespace App\Models;

use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['slug', 'title', 'content'])]
class Page extends Model
{
    /** @use HasFactory<PageFactory> */
    use HasFactory;

    /**
     * Find a page by its slug or fail with a 404.
     */
    public static function findBySlug(string $slug): self
    {
        return static::query()->where('slug', $slug)->firstOrFail();
    }

    /**
     * Turn a display phone number like "0202 – 59 07 55" into a dialable "tel:" value.
     */
    public static function phoneLink(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone);

        return str_starts_with($digits, '0') ? '+49'.substr($digits, 1) : $digits;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'content' => 'array',
        ];
    }
}
