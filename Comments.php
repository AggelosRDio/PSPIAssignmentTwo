<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Nick Cave - Comments</title>
<link rel="stylesheet" type="text/css" href="Content/PageContent.css">
<style type="text/css">

@media (min-width: 992px){
    
}

@media (max-width: 1200px){
    .container { width: 1000px; }
}

.header{
	text-align:center;
	font-size:32px;
	margin-top:30px;
	color:white;
}

</style>



</head>

<body>

	<header id="home_header">
		<div class="header">NICK CAVE</div>
			
	</header>
	<div class="pgcnt-heading" style="height: 25px; text-align:center; margin-top:30px;">
		<a href="index.html" class="nav-option" style="color:white">HOME / </a>
		<a href="biography.html" class="nav-option" style="color:white">BIOGRAPHY / </a>
		<a href="Multimedia/index.html" class="nav-option" style="color:white">MULTIMEDIA / </a>
		<a href="Work.html" class="nav-option" style="color:white">WORK / </a>
		<a href="Comments.php" class="nav-option" style="color:white">COMMENTS / </a>
        <a href="Quiz.htm" class="nav-option" style="color:white">QUIZ </a>

	</div>
    
    <div id="comments" style="margin-left: 50px; width: 1000px;">
    </div>   
    
    <div id="errorDiv">
    </div>
    
    
    <div class="container" style="width: auto;">
        <form action="CommentListener.php" method="post" style="margin-left: 35px; width:auto;">
    
            <span style="color: white;">Comment:</span><br/><br/>  
            <textarea name="comment" style="auto;" placeholder="Enter your comments here..."></textarea><br /><br/>
        
            <span style="color: white;">Email:</span><br/><br/> 
            <input type="text" name="email"/> <br /><br/>
    
            <input type="submit" class="submit" value="Submit Comment" onclick="formSubmit(event)"/>
        </form>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
       sendCommentPageRequest(1);
        
    });
    
    function GoToPreviousPage(e){
        e.preventDefault();
        debugger;
        var pageNo = $("#previous").data("page");
        $("#comments").html("");
        if (pageNo === 'undefined')
            return false;
        
        sendCommentPageRequest(pageNo);
        
        return false;
    }
    
    function GoToNextPage(e){
        e.preventDefault();
        debugger;
        
        var pageNo = $("#next").data("page");
        $("#comments").html("");
        if (pageNo === 'undefined')
            return false;
        
        sendCommentPageRequest(pageNo);
        
        return false;
    }
    
    function sendCommentPageRequest(pageNo){
        
        if (pageNo <= 0){
            return false;
        }
        
        $.ajax({
           type: "POST",
           url: "CommentReader.php",
           data: {
                page: pageNo
           },
           success: function(items){
                $("#comments").html(items);
           } 
            
        });
    }
    
    function formSubmit(e){
        
        e.preventDefault();
        
        var email = $('[name="email"]').val();
        
        if (!email || email === "")
            email = "Anonymous@nomail.com"
        
        if (!IsValidEmail(email)){
            $("#errorDiv").html("<ul><li><span style=\"color: red;\" id=\"errorMessage\">Email Value is not a valid email</span></li></ul>");//<br/><br/>
            return false;
        }
        
        $.ajax({
            type: "POST",
            url: "CommentListener.php",
            data: {
                comment: $('[name="comment"]').val(),
                email: email 
            }
        });
        //location.reload();
        return false;
        
    }
    
    function IsValidEmail(email){
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    
</script>

</body>

</html>
