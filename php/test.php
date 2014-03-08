<?php
require_once('phpcount.php');
PHPCount::AddHit(16);
echo PHPCount::GetHits(16);
/*echo "PAGE1 NON: " . PHPCount::GetHits("page1") . "\nPAGE1 UNIQUE: " . PHPCount::GetHits("page1", true);
echo "\n\n" . PHPCount::GetHits("page2");
$ntot = PHPCount::GetTotalHits();
$utot = PHPcount::GetTotalHits(true);
echo "###$ntot!!!!$utot";*/
?>