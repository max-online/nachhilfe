<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InquiryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['required', Rule::in(Inquiry::SUBJECTS)],
            'grade' => ['nullable', 'string', 'max:20'],
            'message' => ['nullable', 'string', 'max:5000'],
        ]);

        Inquiry::create($data);

        return redirect()->to(route('home').'#kontakt')->with('inquiry_sent', true);
    }
}
