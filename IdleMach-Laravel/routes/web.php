<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('/about', function () {
    return view('public.about');
})->name('about');

Route::get('/contact', function () {
    return view('public.contact');
})->name('contact');

Route::get('/how-it-works', function () {
    return view('public.how-it-works');
})->name('how-it-works');

Route::get('/machines', function () {
    return view('public.machines');
})->name('machines');

Route::get('/machine-details', function () {
    return view('public.machine-details');
})->name('machine-details');

Route::get('/login', function () {
    return view('public.login');
})->name('login');

Route::get('/register', function () {
    return view('public.register');
})->name('register');

Route::prefix('owner')->name('owner.')->group(function () {
    Route::get('/dashboard', function () {
        return view('owner.dashboard');
    })->name('dashboard');

    Route::get('/company-profile', function () {
        return view('owner.company-profile');
    })->name('company-profile');

    Route::get('/machines', function () {
        return view('owner.machines');
    })->name('machines');

    Route::get('/add-machine', function () {
        return view('owner.add-machine');
    })->name('add-machine');

    Route::get('/availability', function () {
        return view('owner.availability');
    })->name('availability');

    Route::get('/booking-requests', function () {
        return view('owner.booking-requests');
    })->name('booking-requests');

    Route::get('/accepted-bookings', function () {
        return view('owner.accepted-bookings');
    })->name('accepted-bookings');

    Route::get('/ongoing-work', function () {
        return view('owner.ongoing-work');
    })->name('ongoing-work');

    Route::get('/completed-work', function () {
        return view('owner.completed-work');
    })->name('completed-work');

    Route::get('/earnings', function () {
        return view('owner.earnings');
    })->name('earnings');

    Route::get('/payment-history', function () {
        return view('owner.payment-history');
    })->name('payment-history');

    Route::get('/reviews', function () {
        return view('owner.reviews');
    })->name('reviews');

    Route::get('/notifications', function () {
        return view('owner.notifications');
    })->name('notifications');

    Route::get('/profile', function () {
        return view('owner.profile');
    })->name('profile');
});

Route::prefix('buyer')->name('buyer.')->group(function () {
    Route::get('/dashboard', function () {
        return view('buyer.dashboard');
    })->name('dashboard');

    Route::get('/explore-machines', function () {
        return view('buyer.explore-machines');
    })->name('explore-machines');

    Route::get('/booking-requests', function () {
        return view('buyer.booking-requests');
    })->name('booking-requests');

    Route::get('/accepted-bookings', function () {
        return view('buyer.accepted-bookings');
    })->name('accepted-bookings');

    Route::get('/ongoing-work', function () {
        return view('buyer.ongoing-work');
    })->name('ongoing-work');

    Route::get('/completed-bookings', function () {
        return view('buyer.completed-bookings');
    })->name('completed-bookings');

    Route::get('/payments', function () {
        return view('buyer.payments');
    })->name('payments');

    Route::get('/reviews', function () {
        return view('buyer.reviews');
    })->name('reviews');

    Route::get('/notifications', function () {
        return view('buyer.notifications');
    })->name('notifications');

    Route::get('/profile', function () {
        return view('buyer.profile');
    })->name('profile');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');

    Route::get('/machines', function () {
        return view('admin.machines');
    })->name('machines');

    Route::get('/machine-approvals', function () {
        return view('admin.machine-approvals');
    })->name('machine-approvals');

    Route::get('/bookings', function () {
        return view('admin.bookings');
    })->name('bookings');

    Route::get('/payments', function () {
        return view('admin.payments');
    })->name('payments');

    Route::get('/reviews', function () {
        return view('admin.reviews');
    })->name('reviews');

    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('reports');

    Route::get('/business-rules', function () {
        return view('admin.business-rules');
    })->name('business-rules');

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');
});
