<?php
function selectState($state_cd_sel=null) {
  global $dbh;
  $sql = <<<HereDoc
select
  state_cd,
  state_cd_desc
from hscc_states
where active_sw = 'Y'
order by state_cd_desc asc
HereDoc;

  $sth = mysqli_query($dbh,$sql);

  echo <<<HereDoc
<select class="form-control" name="state_cd" id="state_cd">
  <option></option>
HereDoc;

  while ($row = mysqli_fetch_array($sth)) {
    foreach( $row AS $key => $val ){
      $$key = stripslashes($val);
    }
    # capture incoming selected value..
    $selected = ($state_cd == $state_cd_sel) ? ' selected = "selected"' : null;

    echo <<<HereDoc
    <option value="$state_cd"$selected>$state_cd_desc</option>
HereDoc;
  }
  echo <<<HereDoc
</select>
HereDoc;
}

function prettyStr($str) {
  # remove special characters..
  $str = preg_replace("/[^\w|\s|\-|`|#|\(|\)|&|\/]/",'',$str);

  $str = strtolower(trim($str));
  $temp_str = array();

  $temp_str = explode('-',$str);
  foreach ($temp_str as &$value) { $value = ucwords($value); }
  $str = implode('-',$temp_str);

  $temp_str = explode('(',$str);
  foreach ($temp_str as &$value) { $value = ucwords($value); }
  $str = implode('(',$temp_str);

  $temp_str = explode('Mc',$str);
  foreach ($temp_str as &$value) { $value = ucwords($value); }
  $str = implode('Mc',$temp_str);

  $temp_str = explode('`',$str);
  foreach ($temp_str as &$value) { $value = ucwords($value); }
  $str = implode('`',$temp_str);
  $str = preg_replace("/`/",'',$str);

  $str = preg_replace('/&/',' & ',$str);
  $str = preg_replace('/\b&\b/',' &amp; ',$str);
  $str = preg_replace("/\(/", ' (',$str);
  $str = preg_replace("/\)/", ') ',$str);
  $str = preg_replace("/\//", ' / ',$str);
  $str = preg_replace("/,/", ', ',$str);
  $str = preg_replace("/\./", '. ',$str);
  $str = preg_replace("/\s+/", ' ', $str);

  $str = trim(ucwords($str));
  $str = preg_replace_callback("/\b(\w{2}[\)]?)$/", function($matches) { return strtoupper($matches[0]); }, $str);
  $str = preg_replace_callback("/^(\w{2}[\)]?)\b/", function($matches) { return strtoupper($matches[0]); }, $str);

  $str = preg_replace("/\bLlc\b/i",'LLC', $str);
  $str = preg_replace("/^(Po Box|P.O. Box|P.O Box)/i", 'PO Box', $str);
  $str = preg_replace("/^apt\b/i", 'Apt', $str);
  $str = preg_replace("/^ste\b/i", 'Ste', $str);
  $str = preg_replace("/\busa\b/i", 'USA', $str);
  $str = preg_replace("/\bdc\b/i", 'DC', $str);
  $str = preg_replace("/\bCT\.?\b/i", 'Court', $str);
  $str = preg_replace("/\bJR\.?\b/i", 'Jr', $str);
  $str = preg_replace("/\bSR\.?\b/i", 'Sr', $str);
  $str = preg_replace("/\bA\b/i", 'a', $str);
  $str = preg_replace("/^a\b/i", 'A', $str);

  # standard address abbreviations..
  $str = preg_replace("/\bDR$/i", 'Dr', $str);
  $str = preg_replace("/\bRD$/i", 'Rd', $str);
  $str = preg_replace("/\bST$/i", 'St', $str);
  $str = preg_replace("/\bne\b/i", 'NE', $str);
  $str = preg_replace("/\bse\b/i", 'SE', $str);
  $str = preg_replace("/\bnw\b/i", 'NW', $str);
  $str = preg_replace("/\bsw\b/i", 'SW', $str);

  $str = preg_replace("/\band\b/i", 'and', $str);
  $str = preg_replace("/\bof\b/i", 'of', $str);

  return $str;
}

function highlight($text,$searchStr) {
  return preg_replace("/($searchStr)/Ui", '<span class="highlight_search">$1</span>', $text);
}

function errorHandler() {

}
?>
