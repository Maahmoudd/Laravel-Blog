use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->name('comments.store');

Route::post('newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('login', [SessionsController::class, 'create'])->name('login.create');
    Route::post('login', [SessionsController::class, 'store'])->name('login.store');
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware(['can:admin', 'prefix' => 'admin'])->group(function () {
    Route::resource('posts', AdminPostController::class);
});
