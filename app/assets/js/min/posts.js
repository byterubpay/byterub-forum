function init(){$(".reply-thread").show(),$(".drawer-button").show(),$(".reply-cancel").show(),$(".hide").hide(),$(".pagination").hide(),$(".replies-list b").show(),$(".content-control").show(),$(".hidden-post-content").hide()}function thread_reply(){$(".reply-box").slideDown(),$(".reply-thread").slideUp()}function post_reply(e){replyOpen||($("#post-reply-form-"+e).slideDown(),$("html, body").animate({scrollTop:$("#post-reply-form-"+e).offset().top},1e3),replyOpen=!0)}function post_edit(e,t){var n=get_post_content(e);$(".post-"+e+"-markdown-edit").markdown({savable:!0,parser:function(e){return getKramdown(e)},onShow:function(e){e.setContent(n)},onSave:function(n){update_post(e,t,n.getContent()),$(".post-content-"+e).html('<div class="markdown-inline-edit post-'+e+'-markdown-edit">'+n.parseContent()+"</div>")}})}function update_post(e,t,n){var o=!1;return $.post("/posts/update",{post_id:e,thread_id:t,submit:"true",body:n}).fail(function(){o=!1}),o}function cancel_thread_reply(){$(".reply-box").slideUp(),$(".reply-thread").slideDown()}function cancel_post_reply(e){$("#post-reply-form-"+e).slideUp(function(){replyOpen=!1})}function post_delete(e){$.ajax({async:!0,cache:!1,type:"GET",dataType:"text",url:"/posts/delete/"+e}).always(function(t){"true"==t&&$(".post-content-"+e).html("<p><em>[deleted]</em></p>")})}function drawer_open(e){$(".drawer-"+e).slideDown(function(){$(".drawer-buttons-"+e).html('<i onClick="drawer_close('+e+')" class="fa fa-toggle-up"></i>')})}function drawer_close(e){$(".drawer-"+e).slideUp(function(){$(".drawer-buttons-"+e).html('<i onClick="drawer_open('+e+')" class="fa fa-toggle-down"></i>')})}function get_post_content(e){return $.ajax({async:!1,cache:!1,type:"GET",dataType:"text",url:"/posts/get/"+e}).success(function(e){post_content="false"!=e?e:"Oops! There was an error trying to edit your post!"}),post_content}function content_hide(e){$(".content-control-"+e).html('<span onclick="content_show('+e+')">[ + ]</span>'),$(".content-block-"+e).slideUp(),drawer_close(e)}function content_show(e){$(".content-control-"+e).html('<span onclick="content_hide('+e+')">[ - ]</span>'),$(".content-block-"+e).slideDown(),drawer_open(e)}function vote(e,t){$.ajax({async:!1,cache:!1,type:"POST",url:"/votes/vote",data:{post_id:e,vote:t}}).done(function(n){"insightful"==t&&"true"==n?($(".insightful-"+e).addClass("disabled"),$(".irrelevant-"+e).removeClass("disabled")):"irrelevant"==t&&"true"==n&&($(".irrelevant-"+e).addClass("disabled"),$(".insightful-"+e).removeClass("disabled"))})}function get_url_param(e){e=e.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");var t=new RegExp("[\\?&]"+e+"=([^&#]*)"),n=t.exec(location.search);return null===n?"":decodeURIComponent(n[1].replace(/\+/g," "))}function show_children(e){children=e.data.parents,children.length&&children.forEach(function(e){$("#post-"+e).slideDown()}),$(".expand-label-"+e.data.head).slideUp()}$("#trunk").infinitescroll({navSelector:".pagination",nextSelector:".pagination a:last",itemSelector:".post-batch",debug:!1,dataType:"html",animate:!1,path:function(e){var t=get_url_param("sort");return""!==t?"?page="+e+"&sort="+t+"&no-sticky=1":"?page="+e+"&no-sticky=1"}},function(e,t,n){$(e)});var loadedAll=!1,replyOpen=!1;init(),$(".post-action-btn").click(function(e){e.preventDefault()}),$(".disabled-link").click(function(e){e.preventDefault()});var post_content=null;$(".edit-submit").click(function(){$(".post-edit-form").ajaxSubmit({url:"/posts/update",type:"post"})}),$(".content-block").each(function(){$(this).hasClass("hidden-post-content")||(id=$(this).attr("id"),post=$("#post-"+id),parents=post.attr("parents"),parents.length&&(parents=JSON.parse(parents),head=parents[parents.length-1],parents_original=parents.slice(),first_child=parents.slice(),first_child.reverse(),first_child=first_child[1],one_up=parents.shift(),parents.pop(),first_child&&(username=$(".user-post-"+first_child).html()),reply_count=0,show_posts=parents.slice(),parents.forEach(function(e){parent_object=$("#post-"+e),children=parent_object.attr("children"),children=JSON.parse(children),children.forEach(function(e){-1===$.inArray(e,parents_original)&&(child_object=$("#post-"+e),child_object.hide(),show_posts.push(e),reply_count++)}),head&&(parent_object.hide(),reply_count++)}),head&&parents.length&&reply_count&&username&&(reply_count-=1,reply_count?$(".expand-label-"+head).show().html('<i class="fa fa-reply-all"></i>'+username+" and at least "+reply_count+" others have replied (click to see replies).").click({parents:show_posts,head:head},show_children):$(".expand-label-"+head).show().html('<i class="fa fa-reply-all"></i>'+username+" has replied (click to see replies).").click({parents:show_posts,head:head},show_children))))}),$(document).ready(function(){$(".next-unread").click(function(){var e=parseInt($(this).attr("unread-id"));console.log("#unread-post-"+parseInt(e+1));var t=$("#unread-post-"+parseInt(e+1));t.length&&(console.log("obj found"),$(document).scrollTop(t.offset().top))}),$(".show-quote").click(function(){$(this).hasClass("active")?($(".parent-container",$(this).parent()).slideUp(),$(this).html('<i class="fa fa-quote-left"></i> Show parent comment.'),$(this).removeClass("active")):($(".parent-container",$(this).parent()).slideDown(),$(this).html('<i class="fa fa-quote-left"></i> Hide parent comment.'),$(this).addClass("active"))})});