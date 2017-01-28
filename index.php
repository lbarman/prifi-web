<?php

//Set no caching
/*
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
*/

$refs = array(
   array('prifi', 'PriFi: A Low-Latency and Tracking-Resistant Protocol for Local-Area Anonymous Communication. ', 'Barman, Ludovic; Zamani, Mahdi; Dacosta, Italo; Feigenbaum, Joan; Ford, Bryan; Hubaux, Jean-Pierre and Wolinsky, David. ', 'Proceedings of the 2016 ACM on Workshop on Privacy in the Electronic Society'),
   array('tor', 'Tor: The second-generation onion router. ', 'Dingledine, Roger; Mathewson, Nick and Syverson, Paul. ', ''), 
   array('dcnet', 'The dining cryptographers problem: Unconditional sender and recipient untraceability. ', 'Chaum, David. ', 'Journal of cryptology'), 
   array('anytrust', 'Scalable anonymous group communication in the anytrust model. ', 'Wolinsky, David I; Corrigan-Gibbs, Henry; Ford, Bryan and Johnson, Aaron. '),
   array('taattacks', 'Traffic analysis: Protocols, attacks, design issues, and open problems. ', 'Raymond, Jean-François. ', 'Springer'),
   array('sda', 'Secure Distributed Algorithm. ', 'DeDiS Lab, EPFL. ', '<a href="https://github.com/dedis/cothority">https://github.com/dedis/cothority</a>')
   );

/**
 * Call to add a "[x]" at this place, and a "[x] $title" when "printRefs()" is called
 */
function addRef($shortId, $title="", $authors="", $venue="") {
   global $refs;

   //search if it already exists
   $exists = false;
   for($i = 0; $i < sizeof($refs); $i++)
   {
      if ($refs[$i][0] == $shortId)
      {
         $exists = true;
         $visibleNumber = $i+1;
      }
   }

   //else, we insert it
   if(!$exists){
      $nextId = sizeof($refs);
      $refs[$nextId] = array($shortId, $title, $authors, $venue);

      $visibleNumber = $nextId+1; //we start at 1
   }
   print '<a class="ref" href="#ref'.($visibleNumber).'">['.$visibleNumber.']</a>';
}

/**
 * Prints all the "[x] $title" recorded with "addRef($title)"
 */
function printRefs() {
   global $refs;

   echo '<ol class="reflist">';

   $count = 1;
   foreach($refs as $ref) {
      $paper = $refs[$count-1];
      echo '<li id="ref'.$count.'">['.$count.'] '.$paper[2].'<b>'.$paper[1].'</b><i>'.$paper[3].'</i></li>';
      $count++;
   }

   echo '</ol>';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PriFi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="1 month" />
    <meta name="description" content="PriFi, a low-latency, tracking-resistant protocol for local-area anonymity" />
    <meta name="keywords" content="prifi,anonymous,communication,network,tor,dc,dining,cryptographer,low,latency,local,area,wlan,lan" />
    <link href="style.css" rel="stylesheet"/>
    <link type="image/x-icon" href="favicon.ico" rel="icon" />
    <link type="image/x-icon" href="favicon.ico" rel="shortcut icon" />
    <script src="https://use.fontawesome.com/c4d4979eb5.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
  </head>
  <body>
    <div id="corpus">
      <article class="markdown-body">
        <h1>
          <a href="#prifi" class="headeranchor-link" aria-hidden="true">
          <span class="headeranchor">
          </span>
          </a>
          <i class="fa fa-wifi" aria-hidden="true"></i> PriFi
        </h1>
        <p>PriFi <?php addRef('prifi'); ?> is an <b>anonymous communication network</b>, developped at the EPFL and Yale University. It <b>protects your privacy</b> by preventing your employers, ISPs and the governements to track what you are doing on the Internet; more precisely, it hides the <i>source</i> of your communications. Conceptually close to Tor <?php addRef('tor'); ?>, PriFi aims to provide <b>lower latency and better anonymity</b>, and is tailored for WLANs and LANs.</p>
        <p>PriFi is under active development; feel free to <a href="http://www.google.com/recaptcha/mailhide/d?k=01XNzZhMG2czWw9mdAY_bB9w==&amp;c=w_135JOXa6ijYewmALhdmizxPuFYjg9f7HCh97UQUNA=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\x3d01XNzZhMG2czWw9mdAY_bB9w\x3d\x3d\x26c\x3dw_135JOXa6ijYewmALhdmizxPuFYjg9f7HCh97UQUNA\x3d', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address"><i class="fa fa-envelope-o" aria-hidden="true"></i> contact us</a> if you want to contribute !</p>
	<div style="display:none">
        <h3>
          <a href="#stats" class="headeranchor-link" aria-hidden="true">
          <span class="headeranchor">
          </span>
          </a>
          <i class="fa fa-pie-chart" aria-hidden="true"></i> PriFi around the world
        </h3>
        <div class="meta">[graphic only visible when we will have statistics to show</div>
        <canvas id="myChart"></canvas>
</div>
        <h3>
          <a href="#whatitprovides" class="headeranchor-link" aria-hidden="true">
          <span class="headeranchor">
          </span>
          </a>
          <i class="fa fa-check" aria-hidden="true"></i> What PriFi provides
        </h3>
        <ul>
          <li><b>Strong anonymity</b> between the users of a PriFi network (typically, the member of an organization or a company).</li>
          <li style="margin-top:10px">Tracking protection against eavesdroppers such as : a <b>rogue employee</b>, someone doing a <b>parking lot attack</b>, your company or <b>Internet Service Provider</b>, or governemental organization.</li>
          <li style="margin-top:10px">Protection against <b>equivocation attacks</b></li>
        </ul>
        <h3>
          <a href="#howitworks" class="headeranchor-link" aria-hidden="true">
          <span class="headeranchor">
          </span>
          </a>
          <i class="fa fa-cogs" aria-hidden="true"></i> How it works
        </h3>
        <p>PriFi is build upon Dining Cryptographer Networks <?php addRef('dcnet'); ?>, a cryptographic primitive that provides perfect anonymity.<sup>1</sup> It is tailored for WLANs and LANs, hence it works best at your company, university campus, or in your home. <b>PriFi works like a trustless VPN</b> : install it on the computers of your users, and it anonymizes any kind of traffic transparently.</p>
        <p>PriFi uses a client-server infrastructure for performance and security. It relies mostly on existing infrastructure : a relay/router, a set of clients, and some additional servers. Those public servers, located anywhere on the planet, are <b>not</b> fully trusted; to be precise, they are in the <b>anytrust</b> model <?php addRef('anytrust'); ?>.</p>
        <div class="pictureframe">
          <img src="prifi_architecture.png" alt="PriFi architecture" />
          <div class="figlabel">Figure 1 : PriFi architecture relies on existing relay/clients, and requires additional public servers.</div>
        </div>
        <p>Those servers provide security; the first interesting property is the anytrust model, which means that as long as <b>any one</b> of the selected server is honest, PriFi will keep its security guarantees. In practice, your organization can select a set of server it trusts; those servers can get compromized, as long as <b>not all of them</b> are compromized, PriFi delivers strong anonymity.</p>
        <p>The second interesting property is the path taken by the data; unlike Tor and other mixnets, <b>the anonymized data does not go through the servers</b>. This is important since the latency to those server is usually orders of magnitude above the latency in a WLAN/LAN; In PriFi, this <b style="color:#9900FF">high latency path</b> matters only at setup. Once the setup phase is done, the packets from the clients to the Internet follow their <b style="color:#00B050">usual path</b>, with <b>no added hop</b> that would increases latency. </p>
        <div class="pictureframe">
          <img src="prifi_highlatpath.png" alt="PriFi high- and low- latency paths"/>
          <div class="figlabel">Figure 2 : <span style="color:#00B050">Low-latency path</span> (order of magnitude : 10ms) and <span style="color:#9900FF">high-latency path</span> (order of magnitude : 100ms).</div>
        </div>
        <p class="footnote"><sup>1</sup> This construction provides <i>perfect anonymity</i>; in particular, it is resistant to <i>traffic-analysis attacks</i> <?php addRef('taattacks'); ?>,  unlike Tor (and other systems). Those attacks exploit differences in traffic flows between users, and are an effective way to de-anonymize users. </p>
        <h3>
          <a href="#techdoc" class="headeranchor-link" aria-hidden="true">
          <span class="headeranchor">
          </span>
          </a>
          <i class="fa fa-file-text-o" aria-hidden="true"></i> Technical documents
        </h3>
        <ul>
          <li><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="./docs/wpes16-final.pdf">PriFi: A Low-Latency and Tracking-Resistant Protocol for Local-Area Anonymous Communication</a> <?php addRef('prifi'); ?> </li>
        </ul>
        <h3>
          <a href="#people" class="headeranchor-link" aria-hidden="true">
          <span class="headeranchor">
          </span>
          </a>
          <i class="fa fa-address-card-o" aria-hidden="true"></i> People
        </h3>
        <div style="clear:both"></div>
        <div class="people">
          <img src="img/bryan.jpg" alt="Bryan Ford" class="imgPortrait">         
          <p>Prof. Bryan Ford<br /><span class="place">EPFL</span></p>
          <p class="web"><i class="fa fa-link" aria-hidden="true"></i> <a href="http://www.brynosaurus.com/">www</a></p>
        </div>
        <div class="people">
          <img src="img/joan.jpg" alt="Joan Feigenbaum" class="imgPortrait">      
          <p>Prof. Joan Feigenbaum<br /><span class="place">Yale</span></p>
          <p class="web"><i class="fa fa-link" aria-hidden="true"></i> <a href="http://www.cs.yale.edu/homes/jf/">www</a></p>
        </div>
        <div class="people">
          <img src="img/jp.jpg" alt="Jean-Pierre Hubaux" class="imgPortrait epflPicture">      
          <p>Prof. Jean-Pierre Hubaux<br /><span class="place">EPFL</span></p>
          <p class="web"><i class="fa fa-link" aria-hidden="true"></i> <a href="https://people.epfl.ch/jean-pierre.hubaux">www</a></p>
        </div>
        <div class="people">
          <img src="img/mahdi.jpg" alt="Mahdi Zamani" class="imgPortrait">          
          <p>Mahdi Zamani<br /><span class="place">Yale</span></p>
          <p class="web"><i class="fa fa-link" aria-hidden="true"></i> <a href="http://www.cs.yale.edu/homes/zamani/">www</a></p>
        </div>
        <div class="people">
          <img src="img/italo.jpg" alt="Italo Dacosta" class="imgPortrait epflPicture">         
          <p>Italo Dacosta<br /><span class="place">EPFL</span></p>
          <p class="web"><i class="fa fa-link" aria-hidden="true"></i> <a href="https://people.epfl.ch/italo.dacosta">www</a></p>
        </div>
        <div class="people">
          <img src="img/ludovic.png" alt="Ludovic Barman" class="imgPortrait">       
          <p>Ludovic Barman<br /><span class="place">EPFL</span></p>
          <p class="web"><i class="fa fa-link" aria-hidden="true"></i> <a href="https://lbarman.ch">www</a></p>
        </div>
        <div class="people">
          <img src="img/noimg.png" alt="Jayshree Sarathy" class="imgPortrait">       
          <p>Jayshree Sarathy<br /><span class="place">Yale</span></p>
        </div>
        <div class="people">
          <img src="img/noimg.png" alt="Julien Weber" class="imgPortrait">       
          <p>Julien Weber<br /><span class="place">EPFL</span></p>
        </div>
        <div class="people">
          <img src="img/noimg.png" alt="Matthieu Girod" class="imgPortrait">       
          <p>Matthieu Girod<br /><span class="place">EPFL</span></p>
        </div>
        <p>
        <h3>
          <a href="#git" class="headeranchor-link" aria-hidden="true">
          <span class="headeranchor">
          </span>
          </a>
          <i class="fa fa-code-fork" aria-hidden="true"></i> git repositories
        </h3>
        <ul>
          <li>
            <i class="code_snippet"><a href="https://www.github.com/lbarman/prifi">github.com/lbarman/prifi</a></i> used for the source code of PriFi.
          </li>
          <li style="margin-top:10px"><i class="code_snippet"><a href="https://www.github.com/lbarman/prifisim_dev">github.com/lbarman/prifisim_dev</a></i> used for the simulator PriFi-Sim.</li>
          <li style="margin-top:10px"><i class="code_snippet"><a href="https://git.epfl.ch/polyrepo/private/repository/manage.go?id=11658">git.epfl.ch/repo/prifi.git</a></i> used for the papers and presentations. <br />Request access to: Italo, or Ludovic.</li>
        </ul>
        <h3>
          <a href="#refs" class="headeranchor-link" aria-hidden="true">
          <span class="headeranchor">
          </span>
          </a>
          <i class="fa fa-list-ol" aria-hidden="true"></i> References
        </h3>
        <?php printRefs(); ?>
      </article>
      <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['01/11', '02/11', '03/11', '04/11', '05/11', '06/11', '07/11'],
            datasets: [{
              label: 'MB anonymized',
              data: [12, 19, 3, 17, 6, 3, 7],
              backgroundColor: "rgba(106,196,246, 0.4)"
            }, {
              label: 'Max number of clients',
              data: [2, 29, 5, 5, 2, 3, 10],
              backgroundColor: "rgba(145,246,106, 0.4)"
            }]
          }
        });
      </script>
    </div>
  </body>
</html>
