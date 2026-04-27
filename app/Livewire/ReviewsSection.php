<?php

namespace App\Livewire;

use Livewire\Component;

class ReviewsSection extends Component
{
    public $model; // Project
    public $name = '';
    public $rating = 5;
    public $body = '';

    protected function rules()
    {
        return [
            'name' => auth()->check() ? 'nullable' : 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'body' => 'nullable|string|max:1000',
        ];
    }

    public function mount($model)
    {
        $this->model = $model;
        if (auth()->check()) {
            $this->name = auth()->user()->name;
        }
    }

    public function setRating($value)
    {
        $this->rating = $value;
    }

    public function submitReview()
    {
        $this->validate();

        // Check if user already reviewed
        if (auth()->check()) {
            $existing = $this->model->reviews()->where('user_id', auth()->id())->first();
            if ($existing) {
                session()->flash('error', __('You have already submitted a review.'));
                return;
            }
        }

        $review = $this->model->reviews()->create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'rating' => $this->rating,
            'body' => $this->body,
            'is_approved' => auth()->check() && auth()->user()->isAdmin() ? true : false,
        ]);

        if (!$review->is_approved) {
            \Illuminate\Support\Facades\Notification::route('mail', 'ceo@albalahy4u.com')
                ->notify(new \App\Notifications\NewReviewPending($review));

            // Notify Admins in Dashboard
            \App\Models\AdminNotification::create([
                'user_id' => null,
                'type' => 'info',
                'title' => 'New Review Pending',
                'message' => 'New ' . $this->rating . '-star review from ' . $this->name . '.',
                'data' => [
                    'review_id' => $review->id,
                    'model_type' => get_class($this->model),
                    'model_id' => $this->model->id
                ]
            ]);
        }

        $this->reset(['body', 'rating']);
        if (!auth()->check()) {
            $this->reset(['name']);
        }
        $this->rating = 5;

        session()->flash('message', __('Your review has been submitted and is pending approval.'));
    }

    public function render()
    {
        $reviews = $this->model->reviews()->where('is_approved', true)->latest()->get();
        $averageRating = $reviews->count() > 0 ? $reviews->avg('rating') : 0;

        return view('livewire.reviews-section', [
            'reviews' => $reviews,
            'averageRating' => $averageRating
        ]);
    }
}
