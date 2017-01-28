<?php

define("INDEX_CHECK_LBARMAN", "TRUE");

header("Content-Type: text/html; charset=UTF-8"); 
require_once('inc/config.php');
require_once('inc/EditableContent.class.php');
require_once('inc/Sql.class.php');

/*
 * SAVE EDITABLE CONTENT
 */
 
if(isset($_POST["contentId"]) && is_numeric($_POST["contentId"])) {
    
   $contentId = $_POST["contentId"];
   
   $contentValueId = "contentValue".$contentId;
   $value = $_POST[$contentValueId];
      
   $content = new EditableContent($contentId);
   $content->setValue($value);
   $content->updateContent();
}

?>


<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>PriFi</title>
      <link href="style.css" rel="stylesheet"/>
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.6.0/styles/default.min.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.6.0/highlight.min.js"></script>
      <script src="highlightjs-line-numbers.min.js"></script>
      <script src="https://use.fontawesome.com/0ed8ae37da.js"></script>
      <?php
	if(isset($_GET['edit'])){ ?>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
      <script>tinymce.init({ selector:'textarea',
      plugins: "textcolor",
  toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | forecolor backcolor | bullist numlist outdent indent" });
      </script>
	<?php
}
?>
   </head>
   <body>
      <div id="corpus">
         <article class="markdown-body">
            <h1>
               <a href="#prifi" class="headeranchor-link" aria-hidden="true">
               <span class="headeranchor">
               </span>
               </a>
               The PriFi Project
            </h1>

            <p>Welcome to the PriFi headquarters. We try to centralize here important information to work as efficiently as possible. Let's keep it updated ! Everybody can edit <b>latest updates</b>.</p>

            <h3>
               <a href="#latestupdates" class="headeranchor-link" aria-hidden="true">
               <span class="headeranchor">
               </span>
               </a>
               Latest updates
            </h3>
            <p>
               <div id="edithis"><a href="index.php?edit">edit this block !</a></div>
               <div id="zonetoedit">
               <?php new EditableContent(1, isset($_GET['edit']), true, ""); ?>
               </div>
            </p>
            <h3>
               <a href="#git" class="headeranchor-link" aria-hidden="true">
               <span class="headeranchor">
               </span>
               </a>
               People
            </h3>
            <div style="clear:both"></div>
            <div class="people">
               <img src="img/jp.jpg" alt="Jean-Pierre Hubaux" class="imgPortrait epflPicture">      
               <p>Prof. Jean-Pierre Hubaux<br /><span class="place">EPFL</span></p>
               <p class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> jean-pierre.hubaux@epfl.ch</p>
               <p class="skype"><i class="fa fa-skype" aria-hidden="true"></i> hubauxcetjp</p>
            </div>
            <div class="people">
               <img src="img/bryan.jpg" alt="Bryan Ford" class="imgPortrait">         
               <p>Prof. Bryan Ford<br /><span class="place">EPFL</span></p>
               <p class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> bryan.ford@epfl.ch</p>
               <p class="skype"><i class="fa fa-skype" aria-hidden="true"></i> baford</p>
               <p class="github"><i class="fa fa-github" aria-hidden="true"></i> <a href="https://github.com/bford">bford</a></p>
            </div>
            <div class="people">
               <img src="img/mahdi.jpg" alt="Mahdi Zamani" class="imgPortrait">          
               <p>Mahdi Zamani<br /><span class="place">Yale</span></p>
               <p class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> mahdi.zamani@<span class="place">Yale</span>.edu</p>
               <p class="skype"><i class="fa fa-skype" aria-hidden="true"></i> ashizam</p>
               <p class="github"><i class="fa fa-github" aria-hidden="true"></i> <a href="https://github.com/mahdiz">mahdiz</a></p>
            </div>
            <div class="people">
               <img src="img/italo.jpg" alt="Italo Dacosta" class="imgPortrait epflPicture">         
               <p>Italo Dacosta<br /><span class="place">EPFL</span></p>
               <p class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> italo.dacosta@epfl.ch</p>
               <p class="skype"><i class="fa fa-skype" aria-hidden="true"></i> iidp_gt</p>
               <p class="github"><i class="fa fa-github" aria-hidden="true"></i> <a href="https://github.com/italod">italod</a></p>
            </div>
            <div class="people">
               <img src="img/ludovic.png" alt="Ludovic Barman" class="imgPortrait">       
               <p>Ludovic Barman<br /><span class="place">EPFL</span></p>
               <p class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> ludovic.barman@epfl.ch</p>
               <p class="skype"><i class="fa fa-skype" aria-hidden="true"></i> ludovic.barman</p>
               <p class="github"><i class="fa fa-github" aria-hidden="true"></i> <a href="https://github.com/mahdiz">lbarman</a></p>
            </div>
            <div class="people">
               <img src="img/noimg.png" alt="Julien Weber" class="imgPortrait">       
               <p>Julien Weber<br /><span class="place">EPFL</span></p>
               <p class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> julien.weber@epfl.ch</p>
               <p class="skype"><i class="fa fa-skype" aria-hidden="true"></i> <span class="tofill">xxx</span></p>
               <p class="github"><i class="fa fa-github" aria-hidden="true"></i> <a href="https://github.com/xxx"><span class="tofill">xxx</span></a></p>
            </div>
            <div class="people">
               <img src="img/noimg.png" alt="Matthieu Girod" class="imgPortrait">       
               <p>Matthieu Girod<br /><span class="place">EPFL</span></p>
               <p class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> mathieu.girod@epfl.ch</p>
               <p class="skype"><i class="fa fa-skype" aria-hidden="true"></i> <span class="tofill">xxx</span></p>
               <p class="github"><i class="fa fa-github" aria-hidden="true"></i> <a href="https://github.com/xxx"><span class="tofill">xxx</span></a></p>
            </div>
            <div class="people">
               <img src="img/noimg.png" alt="Mohamad Hadi El Hajj" class="imgPortrait">       
               <p>Mohamad Hadi El Hajj<br /><span class="place">EPFL</span></p>
               <p class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> mae77@mail.aub.edu</p>
               <p class="skype"><i class="fa fa-skype" aria-hidden="true"></i> <span class="tofill">xxx</span></p>
               <p class="github"><i class="fa fa-github" aria-hidden="true"></i> <a href="https://github.com/moehajj">moehajj</a></p>
            </div>
            <p>
            
            <h3>
               <a href="#git" class="headeranchor-link" aria-hidden="true">
               <span class="headeranchor">
               </span>
               </a>
               git
            </h3>
            <p>The git repositories used are :
            <ul>
               <li><i class="code_snippet"><a href="https://www.github.com/lbarman/prifi_dev">github.com/lbarman/prifi_dev</a></i> used for the source code of PriFi. <br />Request access to: Ludovic</li>
               <p><i class="fa fa-code-fork" aria-hidden="true"></i> <i class="code_snippet">master</i> : managed by Mahdi. Based on the first prototype (non-SDA) version.<br />
                  <i class="fa fa-code-fork" aria-hidden="true"></i> <i class="code_snippet">PriFi-SDA</i> : managed by Ludovic. New message-driven version.<br />
                  <i class="fa fa-code-fork" aria-hidden="true"></i> <i class="code_snippet">PriFi-SDA-moehaji</i> : managed by Ludovic and Italo. Work not yet merged with <i class="code_snippet">PriFi-SDA</i>. 
               </p>
               <li><i class="code_snippet"><a href="https://www.github.com/lbarman/prifisim_dev">github.com/lbarman/prifisim_dev</a></i> used for the simulator PriFi-Sim. <br />Request access to: Ludovic</li>
               <li><i class="code_snippet"><a href="https://git.epfl.ch/polyrepo/private/repository/manage.go?id=11658">git.epfl.ch/repo/prifi.git</a></i> used for the papers and presentations. <br />Request access to: Bryan, Italo, or Ludovic. Requires an <span class="place">EPFL</span> account (we can create <span class="place">EPFL</span> guest accounts)</li>
            </ul>
            </p>
            <p>For now, all repositories are <i>private</i>, due to patenting constraints. Please do not redistribute any of this material.</p>
            
            <h3>
               <a href="#git" class="headeranchor-link" aria-hidden="true">
               <span class="headeranchor">
               </span>
               </a>
               Code fork
            </h3>
            <p>The fork between <i class="code_snippet">master</i> and <i class="code_snippet">PriFi-SDA</i> is due to a major rewrite of the code in Spring 2016. Ludovic rewrote a message-driven version of the code, while Mahdi kept building upon the sequential version of the code. Sooner or later, we will need to merge those forks.</p>
            <p>The new architecture is more modular : <i class="code_snippet">PriFi-Lib</i> contains the core behavior and logic of PriFi, but does not know how to communicate between nodes (it receives abstract <i class="code_snippet">SendToX()</i> and <i class="code_snippet">Receive()</i> methods). The <a href="https://github.com/dedis/cothority">SDA</a> (Secure Distributed Algorith, developped by DeDiS, <span class="place">EPFL</span>), is a framework that (among other things) handles the network and the encoding of messages, and allows protocols to be deployed easily.</p>
            <p>More details on this : <br />(extracted from : <i class="code_snippet">https://github.com/lbarman/prifi_dev/blob/PriFi-SDA/README.md</i>)
            <pre><code class="">The new code is organized in two main parts :

1) PriFi-Lib, which is network-agnostic; it takes an interface "MessageSender" that 
gives it functions like SendToRelay(), SendToTrustee, ... and ReceivedMessage()

This help developing PriFi, as without the network, the protocol becomes much simpler
(at least 50% less line of codes); I hope we can develop new functionalities without 
knowing anything about the network, or SDA

this code is located in https://github.com/lbarman/prifi_dev/tree/PriFi-SDA/lib/prifi

2) PriFi-SDA-Wrapper, that does the mapping between the tree entities of SDA and our 
roles (Relay, Trustee, etc), and provides the MessageSender interface discussed above.

This binder now uses SDA, which is very convenient, but could use any library. In 
particular, it could use SDA and direct TCP/UDP streams in parallel for performance 
reasons. For now, simply using SDA is great, we will check the performances later.
</code></pre>
            </p>
            <p>&nbsp;</p>
            <p>Architecture of the new version :</p>
            <div id="imgblock">
               <img src="img/code-after.png" id="code_after" />
            </div>
            <p>New contributors should build upon the <i class="code_snippet">PriFi-SDA</i> version.</p>

            <h3>
               <a href="#docs" class="headeranchor-link" aria-hidden="true">
               <span class="headeranchor">
               </span>
               </a>
               Documents
            </h3>
            <p>
            <ul>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./docs/wpes16-final.pdf">WPES 2016</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./docs/prifi-hotpets16.pdf">HotPETS 2016</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./docs/lbarman_semester_project_june_2016.pdf">LBarman EPFL report June 2016</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./docs/prifi_lbarman_report_jan16.pdf">LBarman EPFL report Janury 2016</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./docs/osdi14-poster.pdf">Poster OSDI 2014</a></li>
            </ul>

</p>
	<p>Please <b>do not redistribute</b> !</p>
            
            
            <h3>
               <a href="#docs" class="headeranchor-link" aria-hidden="true">
               <span class="headeranchor">
               </span>
               </a>
               Graphs &amp; Schemas
            </h3>
            <p>
            <ul>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/daga.pdf">DAGA</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/fig-slot.pdf">Slots and Rounds</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/network-setup-crop.pdf">Lbarman Deterlab experiment setup</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/network-asymetry-crop.pdf">Network Diagram</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/exp2-vary-clients-trustees.pdf">Exp2 - Vary Clients and Trustees</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/exp3-vary-cellsize.pdf">Exp3 - Vary the cellsize</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/exp4-vary-clients-trustees.pdf">Exp4 - Vary Clients and Trustees</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/exp10-window-lat.pdf">Exp10 - pipelining (Latency)</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/exp10-window-tp.pdf">Exp10 - pipelining (Throughput)</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/scenario4_1up10down_CRAWDAD-2.pdf">PriFiSim - Number of messages and bytes</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/scenario4_1up10down_CRAWDAD-3.pdf">PriFiSim - Latency</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/ncontrol-msg-crop.pdf">Mohamad - Number of control messages</a></li>
               <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./exp/time-margin-crop.pdf">Mohamad - Time to react</a></li>
               <li><i class="fa fa-file-code-o" aria-hidden="true"></i> <a href="./exp/msc_diagram.svg">Message Sequence Diagram</a></li>
            </ul>
            </p>

<p>Please <b>do not redistribute</b>! </p>
            

            <div id="author" style="display:none;">
               <div id="author_photo">
                  <img src="../../img/portrait_380.gif" width="380" height="380" alt="Ludovic Barman" id="imgPortrait">                  
               </div>
               <div id="author_text">
                  <div id="title"><strong>Ludovic Barman</strong></div>
                  <div id="date">written on : <br /><strong>21 / 08 / 2016</strong></div>
                  <div id="homepage"><a href="https://lbarman.ch/index.php#blog">blog</a> / <a href="https://lbarman.ch/">homepage</a></div>
               </div>
            </div>
         </article>
      </div>
      <script>
         hljs.initHighlightingOnLoad();
         hljs.initLineNumbersOnLoad();
      </script>
   </body>
</html>
