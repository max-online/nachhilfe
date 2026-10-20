<?php

namespace App\Models;

use Database\Factories\InquiryFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'phone', 'subject', 'grade', 'message'])]
class Inquiry extends Model
{
    /** @use HasFactory<InquiryFactory> */
    use HasFactory;

    public const SUBJECTS = [
        'Mathematik',
        'Deutsch',
        'Englisch',
        'Französisch',
        'Latein',
        'Spanisch',
        'Anderes',
    ];
}
