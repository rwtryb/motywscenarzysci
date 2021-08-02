<h2>Użytkownicy</h2>

<h3>Konsultanci</h3>

<?php
$args1 = array(
 'role' => 'konsultant',
 'orderby' => 'user_nicename',
 'order' => 'ASC'
);
 $subscribers = get_users($args1);
echo '<ul>';
 foreach ($subscribers as $user) {
 echo '<li>' . $user->display_name.'['.$user->user_email . ']</li>';
 }
echo '</ul>';
?>

<h3>Autorzy</h3>

<?php
$args2 = array(
 'role' => 'autor',
 'orderby' => 'user_nicename',
 'order' => 'ASC'
);
 $authors = get_users($args2);
echo '<ul>';
 foreach ($authors as $user) {
 echo '<li>' . $user->display_name.'['.$user->user_email . ']</li>';
 }
echo '</ul>';
?>

