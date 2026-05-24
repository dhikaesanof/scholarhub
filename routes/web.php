<?php

use Illuminate\Support\Facades\Route;
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
use App\Livewire\Mentor\Dashboard as MentorDashboard;
use App\Livewire\Student\Dashboard as StudentDashboard;
use App\Livewire\Admin\Mentor\MentorList;
use App\Livewire\Mentor\Profile\Profile;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'blocked', 'role:STUDENT'])->group(function () {
    
    Route::get('/dashboard', StudentDashboard::class);

    Route::redirect('settings', 'settings/profile');

    Route::get('/scholarships', StudentScholarshipList::class);

    Route::get('/bookmarks', BookmarkList::class);

    Route::get('/assessment/history', AssessmentHistory::class);

    Route::get('/scholarships/{scholarship}', ScholarshipDetail::class);

    Route::get('/assessment/{scholarship}', TakeAssessment::class);

    Route::get('/assessment/result/{result}', AssessmentResultPage::class);

    Route::get('/student/mentors', MentorDirectory::class);

    Route::get('/student/mentors/{mentorId}', MentorDetail::class);
    
    Route::get('/student/bookings', BookingHistory::class);
    
    Route::get('/student/bookings/create/{slotId}',BookingCreate::class);

    Route::get('/student/profile',ProfileStudent::class);

    Route::get('/student/documents', DocumentMarketplace::class);

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

    Route::get('/mentor/dashboard', MentorDashboard::class);

    Route::get('/mentor/profile', Profile::class);

    Route::get('/mentor/schedules', ScheduleList::class);

});

Route::middleware(['auth', 'blocked', 'role:ADMIN'])->group(function () {

    Route::get('/admin/dashboard', AdminDashboard::class);

    Route::get('/admin/scholarships', ScholarshipList::class);

    Route::get('/admin/scholarships/create', CreateScholarship::class);

    Route::get('/admin/mentors', MentorList::class);

    Route::get('/admin/scholarships/{scholarship}/edit', EditScholarship::class);

    Route::get('/admin/assessment/questions', QuestionList::class);

    Route::get('/admin/scholarships/{scholarship}/assessments', QuestionList::class);

    Route::get('/admin/students', StudentList::class);

    Route::get('/admin/mentor-earnings', MentorEarnings::class);

    Route::get('/admin/documents', DocumentList::class);

});

require __DIR__.'/auth.php';
