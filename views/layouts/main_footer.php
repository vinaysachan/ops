<footer>
    <span class="text-left">
	Copyright &copy; 2012 - <?= date('Y') ?>  All rights reserved. 
	<a target="" href="#">Dev OPS</a> 
    </span>
    <span class="text-right pull-right">
	<ul class="footer-links">  
	    <li><a href="<?= URL . 'blog' ?>">Articles - Blogs</a></li> 
	    <!--	    <li><a href="">Jobs</a></li> -->
	    <li><a href="<?= URL . 'jobs/interview_question_answer' ?>">Interview Questions</a></li> 
	</ul> 
    </span> 
</footer>
<script lang="javascript" type="text/javascript">
    $(document).ready(function () {
        var item = $('ul.left_menu li.active');
        item.parent().parent().addClass('active');
        item.addClass('current');
    });
</script>