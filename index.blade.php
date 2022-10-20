        <div class="ope-container">
            <span class="upChange change" data-id="{{ $post->id }}">⇧UP</span>
            <span class="downChange change" data-id="{{ $post->id }}">⇩DWN</span>
            <span class="topChange change" data-id="{{ $post->id }}">  ⇧TOP</span>
            <span class="downChange change">⇩BTM</span>
        </div>
        
        {{ --- upto downto ---}}
        
        
        <form method="post" action="{{ route('posts.checked', $post) }}">
             @method('PATCH')
             @csrf
             <input type="checkbox" {{ $post->is_done ? 'checked' : ''; }}>
        </form>
        
        
        <input class="title-update" type="text" value="{{ $post->title}}" name="updateTitle" onfocus="this.select();">

