
<div style="text-align:center;">
         <h1 style="font-size:25px; text-align:center;padding-bottom:20px;">Comments</h1>
         <form action="{{url('add_comment')}}" method="post">

         @csrf
            <textarea name="comment" id="" placeholder="Share something..." style="width:500px; height:50px;border-radius:10px;"></textarea><br>
            <input type="submit" class="btn btn-primary" value="Comment">
         </form>
      </div>
      <br>

      <div style="padding-left:20%;">
         <h1 style="font-size:20px; padding:20px;">All Comments</h1>

         @foreach($comment as $comment)
         <div>

            <!-- Comment -->

            <b style="font-size:18px;">{{$comment->name}}</b>
            <p style="font-size:15px;">&emsp;{{$comment->comment}}</p><br><hr>
            <a href="javascript::void(0);" style="color:blue;" onclick="reply(this)" data-Commentid="{{$comment->id}}">Add reply</a>

            <!-- Reply  -->
            @foreach($reply as $replies)

            @if($replies->comment_id == $comment->id)
            <div style="padding-left:3%; padding-bottom:10px; padding-top:10px;">
               <b>{{$replies->name}}</b>
               <p>{{$replies->reply}}</p>
               <a href="javascript::void(0);" style="color:blue;" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
            </div>
            @endif
            @endforeach

         </div>
         <br><hr>

         @endforeach

       <!-- Reply textbox -->
         <div style="display:none;" class="replyDiv">
         <form action="{{url('add_reply')}}" method="POST">
            @csrf
            <input type="text" id="commentId" name="commentId" hidden>
            <textarea name="reply"  placeholder="Write something here" style="height:100px; width:500px; border-radius:15px;"></textarea><br>
            <button type="submit" class="btn btn-warning">Reply</button><a href="javascript::void(0);" class="btn btn-secondary" onclick="reply_close(this)">Close</a>

         </form>
      </div>
      </div>
