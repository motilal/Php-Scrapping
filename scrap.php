<?php
include 'htmldom.php';
$html = file_get_html('https://aviosgroup.com/who-we-are');

$team_members = array();
$who_we_are = file_get_html('https://aviosgroup.com/who-we-are');
foreach ($who_we_are->find('.team-member') as $key => $value) {
    $team_members[$key]['name'] = @$value->find('div.bio-content > .title > h3', 0)->plaintext;
    $team_members[$key]['designation'] = @$value->find('div.bio-content > .title > h4', 0)->plaintext;
    $team_members[$key]['detail'] = @$value->find('div.bio-content > .details > p', 0)->plaintext;
    $team_members[$key]['linkedin'] = @$value->find('div.bio-content > .details > .linkedin', 0)->href;
    $team_members[$key]['image'] = 'https://aviosgroup.com' . @$value->find('div.bio-image > img', 0)->src;
}
echo "<pre>"; print_r($team_members); die;
?>