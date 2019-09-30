<?php
$_GET['library']=1;
define('BIBTEXBROWSER_BIBTEX_LINKS',false); // no [bibtex] link by default
require_once('bibtexbrowser.php');
global $db;
$db = new BibDataBase();
$db->load('biblio.bib');

// printing all 2014 entries
// can also be $query = array('year'=>'.*');
$query = array('year'=>'2014');
$entries=$db->multisearch($query);
uasort($entries, 'compare_bib_entries');

foreach ($entries as $bibentry) {
  echo $bibentry->toHTML()."<br/>";
}
?>