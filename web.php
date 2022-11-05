Route::patch('/posts/{post}/checked', [PostController::class, 'checked'])
    ->name('posts.checked')
    ->where('post', '[0-9]+');
