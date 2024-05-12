<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/voting.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/questions.css'); ?>">
    <?php $this->load->view('header', ['title' => 'Home Page']); ?>
    <title>Question Details</title>
</head>
<body>
    <div class="question_page">
        <h2 class="question-title"><?php echo $question->title; ?></h2>
        <p><span><i class="fa fa-user" aria-hidden="true"></i></span><span><?php echo $question->username; ?></span></p>
        <p><span><i class="fas fa-calendar"></i> </span><span><?php echo date('F j, Y', strtotime($question->created_at)); ?></span></p>
        
        <p class="question-description"><?php echo $question->description; ?></p>
        <h3 class="question-comments">Comments: <p><i class="far fa-comment"></i> <?php echo $question->comment_count; ?></p></h3>
        <div id="comments">
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <p><span style="font-weight: 700;"><?php echo $comment->username; ?> : </span><span><?php echo htmlspecialchars($comment->comment); ?></span></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No comments yet.</p>
            <?php endif; ?>
        </div>
        <!-- comments -->
        <form id="commentForm">
            <input type="hidden" id="question_id" name="question_id" value="<?php echo $question->id; ?>">
            <textarea id="comment" name="comment" required></textarea>
            <button type="button" onclick="postComment()">Post Comment</button>
        </form>
        <div class="question-card-vote">
            <span class="upvote-group <?= $question->user_vote == 'up' ? 'active' : '' ?>" id="upvote_group_<?= $question->id; ?>">
                <a href="#" class="upvote" onclick="upvoteQuestion(<?= $question->id; ?>); return false;">
                    <i class="fas fa-thumbs-up"></i>
                </a>
                <span id="upvotes_<?= $question->id; ?>"><?= $question->upvotes; ?></span>
            </span>
            <span class="downvote-group <?= $question->user_vote == 'down' ? 'active' : '' ?>" id="downvote_group_<?= $question->id; ?>">
                <a href="#" class="downvote" onclick="downvoteQuestion(<?= $question->id; ?>); return false;">
                    <i class="fas fa-thumbs-down"></i>
                </a>
                <span id="downvotes_<?= $question->id; ?>"><?= $question->downvotes; ?></span>
            </span>
        </div>
        </div>
     
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        function handleVote(response, questionId) {
            $('#upvotes_' + questionId).text(response.upvotes);
            $('#downvotes_' + questionId).text(response.downvotes);
            if(response.currentVote === 'up') {
                $('#upvote_group_' + questionId).addClass('active');
                $('#downvote_group_' + questionId).removeClass('active');
            } else if(response.currentVote === 'down') {
                $('#downvote_group_' + questionId).addClass('active');
                $('#upvote_group_' + questionId).removeClass('active');
            } else {
                $('#upvote_group_' + questionId).removeClass('active');
                $('#downvote_group_' + questionId).removeClass('active');
            }
        }

        function upvoteQuestion(questionId) {
            $.ajax({
                url: '<?= base_url("question/upvote/"); ?>' + questionId,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    handleVote(response, questionId);
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        }

        function downvoteQuestion(questionId) {
            $.ajax({
                url: '<?= base_url("question/downvote/"); ?>' + questionId,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    handleVote(response, questionId);
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        }
        function postComment() {
            var questionId = $('#question_id').val();
            var comment = $('#comment').val();
            
            $.ajax({
                url: '<?php echo base_url('question/post_comment'); ?>',
                type: 'POST',
                data: { question_id: questionId, comment: comment },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Error: ' + (response.error || 'Unknown error'));
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        }
    </script>
</body>
</html>
