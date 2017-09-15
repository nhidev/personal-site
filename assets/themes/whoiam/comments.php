<!-- <?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
		return;
	}
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
  <h2 class="h2comments">
    <?php comments_number('Chưa có nhận xét', '1 bình luận', '% bình luận' );?>
  </h2>
  <ul class="commentlist">
    <?php wp_list_comments('callback=mytheme_comment'); ?>
  </ul>
<?php else : // this is displayed if there are no comments so far ?>
  <?php if ('open' == $post->comment_status) : ?>
    <!-- If comments are open, but there are no comments. -->
  <?php else : // comments are closed ?>
    <!-- If comments are closed. -->
    <p class="nocomments">Nhận xét đã bị đóng.</p>
  <?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
  <div id="respond">
    <h2 id="commentsForm">
      <?php comment_form_title( 'Gửi bình luận', 'Gửi bình luận đến %s' ); ?>
    </h2>
    <div class="cancel-comment-reply"> <small>
      <?php cancel_comment_reply_link(); ?>
    </small> </div>
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
      <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" onsubmit="return check_comment()">
        <?php if ( $user_ID ) : ?>
          <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Đăng xuất">Đăng xuất &raquo;</a></p>
        <?php else : ?>
          <p>
            <label for="author">Họ tên</label>
            <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
            <?php if ($req) echo "<font style='color:#F00'>*</font>"; ?>
              <span id="author_err" class="text_err" style="display:none">Vui lòng nhập họ tên của bạn</span> </p>
              <p>
                <label for="email">Email </label>
                <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                <?php if ($req) echo "<font style='color:#F00'>*</font>"; ?>
                  <span id="email_err" class="text_err" style="display:none">Vui lòng nhập Email của bạn</span> </p>
                  <p>
                    <label for="url">Điện thoại </label>
                    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> />
                    <?php if ($req) echo "<font style='color:#F00'>*</font>"; ?>
                      <span id="url_err" class="text_err" style="display:none">Vui lòng nhập số điện thoại</span> </p>
                    <?php endif; ?>
                    
                    <!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
                    
                    <p>
                      <label for="comment">Lời bình</label>
                      <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
                    </p>
                    <p>
                      <input name="submit" type="submit" id="submit" tabindex="5" value="Gửi" />
                      <?php comment_id_fields(); ?>
                    </p>
                    <?php do_action('comment_form', $post->ID); ?>
                  </form>
                <?php endif; // If registration required and not logged in ?>
              </div>
            <?php endif; // if you delete this the sky will fall on your head ?>
            <script type="text/javascript">
              function check_comment()
              {               
               var author = document.getElementById('author');
               var email = document.getElementById('email');
               var url = document.getElementById('url');
               if(author.value == '')
               {
                document.getElementById('author_err').style.display = 'inline';
                author.focus();
                return false;
              }
              if(email.value == '')
              {
                document.getElementById('email_err').style.display = 'inline';
                email.focus();
                return false;
              }
              if(url.value == '')
              {
                document.getElementById('url_err').style.display = 'inline';
                url.focus();
                return false;
              }
              return true;
            }
          </script> -->