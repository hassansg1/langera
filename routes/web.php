<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');


Route::group(['middleware' => ['auth']], function () {
    Route::post('clearSession', [App\Http\Controllers\HomeController::class, 'clearSession']);
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
    Route::resources([
        'user' => \App\Http\Controllers\UserController::class,
        'course' => \App\Http\Controllers\CourseController::class,
        'article' => \App\Http\Controllers\ArticleController::class,
        'permission' => \App\Http\Controllers\PermissionController::class,
        'idea' => \App\Http\Controllers\IdeaController::class,
        'source' => \App\Http\Controllers\SourceController::class,
        'files' => \App\Http\Controllers\FilesController::class,
        'flash_card' => \App\Http\Controllers\FlashCardController::class,
        'to_do_list' => \App\Http\Controllers\ToDoListController::class,
        'quick_link' => \App\Http\Controllers\QuickLinkController::class,
        'chat' => \App\Http\Controllers\ChatController::class,
    ]);

    Route::post('chat/data', [\App\Http\Controllers\ChatController::class, 'chatData'])->name('chat.chatData');
    Route::post('group/create', [\App\Http\Controllers\ChatController::class, 'createGroup'])->name('create.group');
    Route::post('add/group/messages', [\App\Http\Controllers\ChatController::class, 'addGroupMessages'])->name('add.group.messages');
    Route::post('group/messages', [\App\Http\Controllers\ChatController::class, 'groupMessages'])->name('group.messages');
    Route::post('get/chat/group', [\App\Http\Controllers\ChatController::class, 'chatGroupData'])->name('chat.group.data');
    Route::post('get/chat/user', [\App\Http\Controllers\ChatController::class, 'chatUserData'])->name('chat.user.data');

    Route::get('article/createNew/{courseId}', [\App\Http\Controllers\ArticleController::class, 'createNew'])->name('article.createNew');
    Route::post('add_to_article', [\App\Http\Controllers\IdeaController::class, 'addToArticle'])->name('idea.add_to_article');
    Route::post('add_source_to_article', [\App\Http\Controllers\SourceController::class, 'addToArticle'])->name('source.add_to_article');
    Route::get('myCourse/{id}', [\App\Http\Controllers\MyCourseController::class, 'index']);
    Route::get('getCourses', [\App\Http\Controllers\AjaxController::class, 'getCoursesDropdown']);
    Route::get('addNewIdea', [\App\Http\Controllers\AjaxController::class, 'addNewIdea']);
    Route::post('saveUserCourses', [\App\Http\Controllers\AjaxController::class, 'saveUserCourses']);
    Route::post('saveOutlining', [\App\Http\Controllers\AjaxController::class, 'saveOutlining']);
    Route::post('saveWriting', [\App\Http\Controllers\AjaxController::class, 'saveWriting']);
    Route::post('pdfOutlining', [\App\Http\Controllers\AjaxController::class, 'pdfOutlining']);
    Route::post('pdfWriting', [\App\Http\Controllers\AjaxController::class, 'pdfWriting']);


});
