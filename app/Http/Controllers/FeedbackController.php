<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.feedback');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fio' => ['required', 'string', 'min:3'],
            'content' => ['required', 'string'],
        ]);
        $validated = $request->only(['fio', 'content']);
        $now = date('Y-m-d H:m');
        try {
            Storage::disk('local')->append('feedbacks.csv', "$now;" . $validated['fio'] . ";" . $validated['content']);
        } catch (Exception $e) {
            return redirect()->route('feedback.create')
                ->with('error', $e->getMessage());
        }
        return redirect()->route('feedback.create')
            ->with('success', 'Отзыв принят!');
    }
}
