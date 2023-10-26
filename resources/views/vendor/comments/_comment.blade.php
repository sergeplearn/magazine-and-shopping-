@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
  <div id="comment-{{ $comment->id }}" class="media">
@else
  <li id="comment-{{ $comment->id }}" class="media">
@endif
    <img class="me-3" width="40" height="40" src="https://www.gravatar.com/avatar/{{ md5($comment->commenter->email ?? $comment->guest_email) }}.jpg?s=64" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
    <div class="media-body">
        <h5 class="mt-0 mb-1">{{ $comment->commenter->name ?? $comment->guest_name }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>
        <div style="white-space: pre-wrap;">{!! $markdown->line($comment->comment) !!}</div>

        <div>
            @can('reply-to-comment', $comment)

                <button type="button" class="btn btn-rounded btn-sm btn-outline-primary" data-mdb-toggle="modal" data-mdb-target="#reply-modal-{{ $comment->id }}">
                   Reply
                </button>
            @endcan
            @can('edit-comment', $comment)
                    <button type="button" class="btn btn-rounded btn-sm btn-outline-primary" data-mdb-toggle="modal" data-mdb-target="#comment-modal-{{ $comment->id }}">
                       Edit
                    </button>
            @endcan
            @can('delete-comment', $comment)
                <a href="{{ route('comments.destroy', $comment->id) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();" class="btn btn-sm btn-outline-danger btn-rounded text-danger text-uppercase">Delete</a>
                <form id="comment-delete-form-{{ $comment->id }}" action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>

        @can('edit-comment', $comment)


            <!-- Modal -->
            <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Comment</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                            @method('PUT')
                            @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="message">Update your message here:</label>
                                <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary" data-mdb-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply-to-comment', $comment)



            <!-- Modal -->
            <div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reply to Comment</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('comments.reply', $comment->id) }}">
                            @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="message">Enter your message here:</label>
                                <textarea required class="form-control" name="message" rows="3"></textarea>
                                <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary" data-mdb-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-outline-primary btn-rounded">Reply</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>

        @endcan

        <br />{{-- Margin bottom --}}

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->id))
            @foreach($grouped_comments[$comment->id] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'reply' => true,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif

    </div>
@if(isset($reply) && $reply === true)
  </div>
@else
  </li>
@endif
