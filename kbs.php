
<script type="text/javascript" src="js/jquery.watermark.js"></script>

<script type="text/javascript">
 
 
      $(document).ready(function() {

$("#faq_search_input").watermark("Begin Typing to Search");

$("#faq_search_input").keyup(function()
{
var faq_search_input = $(this).val();
var dataString = 'keyword='+ faq_search_input;
if(faq_search_input.length>1)

{
$.ajax({
type: "GET",
url: "ajax-search.php",
data: dataString,
beforeSend:  function() {

$('input#faq_search_input').addClass('loading');

},
success: function(server_response)
{

$('#searchresultdata').html(server_response).show();
$('span#faq_category_title').html(faq_search_input);

if ($('input#faq_search_input').hasClass("loading")) {
 $("input#faq_search_input").removeClass("loading");
        } 

}
});
}return false;
});
});
	  
</script>
<style type="text/css">
/*This css contains code for the statis loading image in the right of the textbox */
#nitropage.faq .faqsearch .faqsearchinputbox input {
	font-size:16px;
	color:#6e6e6e;
	padding:10px;
	border:none;
	background:url(img/loading_static.gif) no-repeat right 50%;
	width:510px;
}

/*The css class below contains the animated loading image .this will be added on the dom later with Jquery*/
#nitropage.faq .faqsearch .faqsearchinputbox input.loading {
	background:url(img/loading_animate.gif) no-repeat right 50%;
}



#velabs a.prod-action:active,
#velabs a.prod-action:focus,
#velabs a.prod-action:hover,
#cdnlabs a.prod-action:active,
#cdnlabs a.prod-action:focus,
#cdnlabs a.prod-action:hover {
  background-position: -291px 0px;
}


#prod-content {
	position:relative;
	width:100%;
	margin-top:15px;
	
	letter-spacing:-0.04em;
  overflow:hidden;
  -moz-border-radius:			7px;
	-webkit-border-radius:		7px;
}

*html #prod-content {
	margin-top:3px;
	}
*html #cxpage #prod-content {
	margin-top:15px;
	}

*:first-child+html #prod-content {
	margin-top:3px;
	}
*:first-child+html #cxpage #prod-content {
	margin-top:15px;
	}

.prod-content-bottom,
.prod-content-bottom-w {
display: none;
}




#ve-index .prod-subsubhead, #vepage .prod-subsubhead {
	background: #fff;
	-moz-border-radius-topleft: 7px;
	-moz-border-radius-topright: 7px;
	-webkit-border-top-left-radius: 7px;
	-webkit-border-top-right-radius: 7px;
}
.prod-subsubhead h4 {
	display:block;
	float:left;
	margin:30px 0 0 0px;
	font-weight:bold;
	font-size:22px;
	line-height:22px;
	letter-spacing:-1px;
	color:#4f4f4f;
	padding: 0 20px 0 40px;
}
.prod-subsubhead h4 a, .prod-subsubhead h4 strong {
	color:#000;
}
.prod-subsubnav ul li a {
	color:#9e9e9e;
	padding:3px 10px;
}
.prod-subcontent {
	
}
#nitropagefaq .prod-content, #nitropagefaq .prod-content p, .addon-faq p {
	font-family:Helvetica, Arial, sans-serif;
	font-size:12px;
	line-height:18px;
	color:#777;
	padding-bottom:2em;
}
#nitropagefaq .prod-content p b, .addon-faq p b {
	display:block;
	font-family:"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;
	font-size:13px;
	color:#000;
	padding-bottom:0.5em;
}
#nitropage.faq .prod-content .faq_search_query {
	color:#8d1c1c;
	font-weight:bold;
}
#nitropagefaq .prod-content ul {
	font-size:12px;
	color:#333;
	list-style:circle outside;
	padding:0 0 2em 2em;
	margin-top:-1em;
}
#nitropagefaq .prod-content ul li {
	padding-bottom:0.1em;
}
#nitropage.faq .faqsearch {
	background:url(../img/greyscale-sprite__f050d77.png) no-repeat 0px -463px;
	margin:0 0 30px;
	padding:17px 0;
	width:587px;
}
#nitropage.faq .faqsearch .faqsearchinputbox {
	border:1px solid #ddd;
	margin:0 20px;
	background:#fff url(../img/textinputbg__5d76440.gif) repeat-x;
}


*html #nitropage.faq .faqsearch .faqsearchinputbox input {
	width:500px;
	padding:10px 0;
}


#youhack, #nitropage {
	background:#000000 url(../img/nitro-subcontentbg01__b06c041.gif) repeat-x top !important;
}
#youhack a, #nitropage a {
	color:#fff;
}
#youhack p, #nitropage p {
	color:#888;
}
#youhack a:hover, #nitropage a:hover, #youhack a:focus, #nitropage a:focus {
	color:#f8d043;
}

#youhack ul#prod-nav li a:hover, #youhack ul#prod-nav li a:focus, #nitropage ul#prod-nav li a:hover, #nitropage ul#prod-nav li a:focus, #youhack.overview ul#prod-nav li a.subnav-index, #nitropage.whynitro ul#prod-nav li a.subnav-whynitro, #nitropage.faq ul#prod-nav li a.subnav-faq, #nitropage.addons ul#prod-nav li a.subnav-addons, #nitropage.support ul#prod-nav li a.subnav-support {
	background:none;
	color:#F6E19A;
}

#nitropage #prod-content {
	margin:0;
	padding:30px 0;
	background:#000 url(../img/nitro-subcontentbg_top__947eec6.gif) no-repeat;
}
#youhack .prod-lcol {
	width:650px;
	border-right:1px solid #333;
	padding-bottom:70px;
}

#nitropage .prod-subsubhead {
	background:none;
	height:auto;
}
#nitropage .prod-subsubhead h4 {
	color:#888;
	margin:0;
	font-weight:normal !important;
}
#nitropage .prod-subsubhead h4 a, #nitropage .prod-subsubhead h4 strong {
	color:#fff;
	font-weight:normal !important;
}
#nitropage .prod-subsubnav {
	margin:0;
}
#nitropage .prod-subsubnav ul li a {
	color:#888;
}
#nitropage .prod-subsubnav ul li a:hover, #nitropage .prod-subsubnav ul li a:focus, #nitropage .prod-subsubnav ul li a.active {
	color:#f8d043;
	background:none;
}
#nitropage .prodtopline {
	border-color:#333;
}
#nitropage .prod-subcontent {
	padding:2px 0 0;
}
#nitropage .prod-content {
	border:0;
	margin:0;
	padding:15px 40px 0 10px;
}
#nitropage .mainfeatures p {
	padding:0;
}
#nitropage .mainfeatures p b {
	font-size:18px;
	font-weight:normal;
	color:#f6e19a;
}
#cxpage .quotebubble-thin-bttm {
	width:220px;
}
#cxpage .quotebubble-thin-bttm .qb-mid {
	background:#dedede;
	padding:12px 20px 15px;
}
#cxpage .quotebubble-thin-bttm .qb-top {
	height:8px;
	width:100%;
	font-size:1px;
	line-height:1px;
	background:url(../img/greyscale-sprite__f050d77.png) no-repeat left -19px;
}
#cxpage .quotebubble-thin-bttm .qb-bttm {
	height:30px;
	width:100%;
	font-size:1px;
	line-height:1px;
	background:url(../img/greyscale-sprite__f050d77.png) no-repeat left -35px;
}
#cxpage .quotebubble-thin-bttm .qb-top .qb-tr {
	width:8px;
	height:8px;
	float:right;
	background:#f3f3f3 url(../img/greyscale-sprite__f050d77.png) no-repeat -632px -19px;
}
#cxpage .quotebubble-thin-bttm .qb-bttm .qb-br {
	width:8px;
	height:8px;
	float:right;
	background:#f3f3f3 url(../img/greyscale-sprite__f050d77.png) no-repeat -632px -35px;
}

#nitropage .prod-sidebar cite strong {
	color:#fff;
}
#nitropage.faq .prod-content p b {
	color:#F6E19A;
	font-size:115%;
}
#nitropage .addon-faq p b {
	color:#fff;
	font-size:115%;
}
#nitropage.faq .faqsearch {
	background:url(../img/nitro_faqsearch__80573fb.gif)no-repeat;
}

.inputs {
	font-size:16px;
	color:#6e6e6e;
	padding:10px;
	border:none;
	background:url(img/loading_static.gif) no-repeat right 50%;
	width:510px;
}
</style>
<div id="nitropage" class="page_page youhackpage faq" style="height:800px">
<div id="content">
  <div id="contentdiv" class="page_page">
    <div class="prod-subhead">
      <div class="clearfix"> </div>
    </div>
    <div id="prod-content">
      <div class="prod-subsubhead">
        <h4 id="faq_title" style="margin-left:-10px"> <strong>Search Results For : </strong> <span id="faq_category_title">Keyword </span></h4>
        <div class="prodtopline" style="border-bottom :1px solid #EDEDED;height:30px;width:900px;margin:0px auto;border-color:#333; margin-left:20px"> </div>
      </div>
      <div class="prod-subcontent">
        <div class="prod-lcol fl-left">
          <div class="prod-content">
            <div class="faqsearch">
              <div class="faqsearchinputbox">
                <!-- The Searchbox Starts Here  -->
                <input  name="query" type="text" id="faq_search_input"  class="inputs"/>
                <!-- The Searchbox Ends  Here  -->
              </div>
            </div>
            <div id="searchresultdata" class="faq-articles" style="margin-left:16px;"> </div>
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="prod-content-bottom"> </div>
  </div>
</div>
<div id="footer"></div>
</div>

