<?php
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