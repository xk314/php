<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"I:\phpstudy\WWW\myproject\public/../application/home\view\article\detail.html";i:1525688669;}*/ ?>

      <div class="mainbar">
        <div class="article">
          <h2><?php echo $article['title']; ?></h2>
          <div class="clr"></div>
          <p>Posted by <a href="#"><?php echo $article['username']; ?></a> <span>&nbsp;&bull;&nbsp;</span> Filed under <a href="#"><?php echo $article['classname']; ?></a>, <a href="#">internet</a></p>
          <p><?php echo $article['content']; ?></p>
          <p>Tagged: <a href="#">orci</a>, <a href="#">lectus</a>, <a href="#">varius</a>, <a href="#">turpis</a></p>
          <p><a href="#"><strong>Comments (<?php echo $article['comment_count']; ?>)</strong></a> <span>&nbsp;&bull;&nbsp;</span> <?php echo $article['addate']; ?> <span>&nbsp;&bull;&nbsp;</span> <a href="javascript:void(0)"><strong>Edit</strong></a></p>
        </div>
        <div class="article">
          <h2><span>3</span> Responses</h2>
          <div class="clr"></div>
          <div class="comment"> <a href="#"><img src="/static/home/images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
            <p><a href="#">admin</a> Says:<br />
              April 20th, 2009 at 2:17 pm</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.</p>
          </div>
          <div class="comment"> <a href="#"><img src="/static/home/images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
            <p><a href="#">Admin</a> Says:<br />
              April 20th, 2009 at 3:21 pm</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo.</p>
          </div>
          <div class="comment"> <a href="#"><img src="/static/home/images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
            <p><a href="#">admin</a> Says:<br />
              April 20th, 2009 at 2:17 pm</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.</p>
          </div>
        </div>
        <div class="article">
          <h2><span>Leave a</span> Reply</h2>
          <div class="clr"></div>
          <form action="#" method="post" id="leavereply">
            <ol>
              <li>
                <label for="name">Name (required)</label>
                <input id="name" name="name" class="text" />
              </li>
              <li>
                <label for="email">Email Address (required)</label>
                <input id="email" name="email" class="text" />
              </li>
              <li>
                <label for="website">Website</label>
                <input id="website" name="website" class="text" />
              </li>
              <li>
                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="8" cols="50"></textarea>
              </li>
              <li>
                <input type="image" name="imageField" id="imageField" src="/static/home/images/submit.gif" class="send" />
                <div class="clr"></div>
              </li>
            </ol>
          </form>
        </div>
      </div>
