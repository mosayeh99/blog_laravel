<div>
    @if(!empty($comments->toArray()))
    <div class="post-comments">
        <p class="head">Comments</p>
    @foreach($comments as $comment)
        <div class="comment">
                <span class="comment-avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M12 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                       <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                    </svg>
                </span>
            <div class="comment-info">
                <p class="comment-body">{{$comment->comment_body}}</p>
                <p class="comment-created-at">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
    </div>
    @endif
</div>
