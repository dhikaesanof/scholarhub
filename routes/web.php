<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Livewire\Volt\Volt;
use App\Livewire\Admin\Scholarship\ScholarshipList;
use App\Livewire\Admin\Scholarship\CreateScholarship;
use App\Livewire\Admin\Scholarship\EditScholarship;
use App\Livewire\Student\Scholarship\ScholarshipList as StudentScholarshipList;
use App\Livewire\Student\Scholarship\ScholarshipDetail;
use App\Livewire\Admin\Assessment\QuestionList;
use App\Livewire\Student\Assessment\TakeAssessment;
use App\Livewire\Student\Assessment\AssessmentResultPage;
use App\Livewire\Student\Assessment\AssessmentHistory;
use App\Livewire\Student\Bookmark\BookmarkList;
use App\Livewire\Admin\Dashboard\Dashboard as AdminDashboard;
use App\Livewire\Mentor\Dashboard\Dashboard as MentorDashboard;
use App\Livewire\Student\Dashboard as StudentDashboard;
use App\Livewire\Admin\Mentor\MentorList;
use App\Livewire\Mentor\Profile\ProfileEdit;
use App\Livewire\Student\Mentor\MentorDirectory;
use App\Livewire\Student\Mentor\MentorDetail;
use App\Livewire\Mentor\Schedule\ScheduleList;
use App\Livewire\Student\Booking\BookingCreate;
use App\Livewire\Student\Booking\BookingHistory;
use \App\Livewire\Student\Profile\ProfileStudent;
use App\Livewire\Admin\Student\StudentList;
use App\Livewire\Admin\Mentor\MentorEarnings;
use \App\Livewire\Admin\Document\DocumentList;
use App\Livewire\Student\Document\DocumentMarketplace;
use App\Http\Controllers\Student\DocumentPreviewController;
use App\Livewire\Student\Document\MyDocuments;
use \App\Livewire\Student\Roadmap\RoadmapDetail;
use App\Livewire\Student\Roadmap\RoadmapHistory;
use App\Livewire\Public\LandingPage;
use App\Livewire\Mentor\Profile\ProfileView;
use App\Models\User;
use App\Models\Scholarship;
use App\Notifications\ScholarshipClosingSoonNotification;

Route::get(
    '/test-notification',
    function () {

        $user =
            User::first();

        $scholarship =
            Scholarship::first();

        $user->notify(

            new ScholarshipClosingSoonNotification(
                $scholarship
            )
        );

        return 'Notification Sent';
    }
);

Route::get('/test-email', function () {

    Mail::raw(

        'Hello from ScholarHub',

        function ($message) {

            $message->to(
                'dhikaesanof@student.ub.ac.id'
            );

            $message->subject(
                'ScholarHub Test'
            );
        }
    );

    return 'Email sent!';
});

Route::get('/', LandingPage::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/scholarships', StudentScholarshipList::class);

Route::get('/scholarships/{scholarship}', ScholarshipDetail::class);

Route::get('/mentors', MentorDirectory::class);

Route::get('/mentors/{mentorId}', MentorDetail::class);

Route::get('/documents', DocumentMarketplace::class);

Route::middleware(['auth', 'blocked', 'role:STUDENT'])->group(function () {
    
    Route::get('/dashboard', StudentDashboard::class);

    Route::redirect('settings', 'settings/profile');

    Route::get('/bookmarks', BookmarkList::class);

    Route::get('/assessment/history', AssessmentHistory::class);

    Route::get('/assessment/{scholarship}', TakeAssessment::class);

    Route::get('/assessment/result/{result}', AssessmentResultPage::class);
    
    Route::get('/student/bookings', BookingHistory::class);
    
    Route::get('/student/bookings/create/{slotId}',BookingCreate::class);

    Route::get('/student/profile',ProfileStudent::class);

    Route::get('/student/documents/{id}/preview', DocumentPreviewController::class)->name('student.documents.preview');

    Route::get('/student/my-documents', MyDocuments::class);

    Route::get('/student/documents/{id}/stream',[DocumentPreviewController::class, 'stream'])->name('student.documents.stream');

    Route::get('/student/roadmaps', RoadmapHistory::class);

    Route::get('/student/roadmaps/{id}', RoadmapDetail::class);

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    
});

Route::middleware(['auth', 'blocked', 'role:MENTOR'])->group(function () {

    Route::get('/mentor/dashboard', MentorDashboard::class)->name('mentor.dashboard.dashboard');

    Route::get('/mentor/profile', ProfileView::class)->name('mentor.profile');

    Route::get('/mentor/profile/edit', ProfileEdit::class)->name('mentor.profile.edit');

    Route::get('/mentor/schedules', ScheduleList::class)->name('mentor.schedules');

});

Route::middleware(['auth', 'blocked', 'role:ADMIN'])->group(function () {

    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');

    Route::get('/admin/scholarships', ScholarshipList::class)->name('admin.scholarships');

    Route::get('/admin/scholarships/create', CreateScholarship::class)->name('admin.scholarships.create');

    Route::get('/admin/scholarships/{scholarship}/edit', EditScholarship::class)->name('admin.scholarships.edit');
    
    Route::get('/admin/scholarships/{scholarship}/assessments', QuestionList::class)->name('admin.scholarships.assessments');
    
    Route::get('/admin/mentors', MentorList::class)->name('admin.mentors');
    
    Route::get('/admin/mentor-earnings', MentorEarnings::class)->name('admin.mentor-earnings');
    
    Route::get('/admin/assessment/questions', QuestionList::class)->name('admin.assessment.questions');
    
    Route::get('/admin/students', StudentList::class)->name('admin.students');

    Route::get('/admin/documents', DocumentList::class)->name('admin.documents');

});

require __DIR__.'/auth.php';
