public function index()
{
        $posts = Post::orderby('pos', 'desc')->get();
        return view('index')
            ->with(['posts' => $posts]);
}




public function upto(Post $post)
    {
        $num = $post->pos;

        $target = DB::table('posts')->where('post_id', '>', $num)->min('post_id');

        if ($target == NULL)
        {
            return redirect()
                ->route('posts.index');
        }
        DB::table('posts')->where('pos', '=', $target)->update(['pos' => $num]);
        DB::table('posts')->where('id', '=', $post->id)->update(['pos' => $target]);
        return redirect()
            ->route('posts.index');
    }

    public function downTo(Post $post)
    {
        $num = $post->pos;

        $target = DB::table('posts')->where('pos', '<', $num)->max('pos');

        if ($target == NULL)
        {
            return redirect()
                ->route('posts.index');
        }
        DB::table('posts')->where('pos', '=', $target)->update(['pos' => $num]);
        DB::table('posts')->where('id', '=', $post->id)->update(['pos' => $target]);
        return redirect()
            ->route('posts.index');
    }
          
          
    public function checked(Post $post)
    {

        $post->is_done = !$post->is_done;

        $post->save();

        return redirect()
            ->route('posts.index');

    }
