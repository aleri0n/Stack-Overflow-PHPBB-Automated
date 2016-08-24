<?php
$servername = "localhost";
$username = "USERNAME";
$password = "PASSWORD";
$dbname = "USERNAME_DATABASE";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlo = "SELECT * FROM core_topics ORDER BY topic_id DESC LIMIT 1";
$resultfirst = $conn->query($sqlo);
while($row = $resultfirst->fetch_assoc()) {
      $topic_id =  $row["topic_id"] + 1;
}

$sqlp = "SELECT * FROM core_posts ORDER BY post_id DESC LIMIT 1";
$resultsecond = $conn->query($sqlp);
while($row = $resultsecond->fetch_assoc()) {
      $topic_first_post_id = $row["post_id"] + 1;
}

 if (htmlspecialchars($_POST["secret"]) == 'YOUR SECRET') {
   
   $forum_id = '15'; # For example if your forum URL was http://www.somewebsite.com/viewforum.php?f=15 you'd put 15 here.
   $icon_id = '0';   
   $topic_attachment = '0';
   $topic_reported = '0';
   $topic_title = $_POST["topic_title"];
   $topic_time = time();
   $topic_poster = '2'; # For example if your profile URL was http://www.warrior.pk/memberlist.php?mode=viewprofile&u=2 you'd put 2 here.
   $topic_time_limit = '0';
   $topic_views = '0';
   $topic_status = '1';
   $topic_type = '1';
   $topic_first_poster_name = 'Aleri0n'; # Your username.
   $topic_first_poster_colour = 'FF8000';
   $topic_last_post_id = $topic_first_post_id ;
   $topic_last_poster_id = '2'; # For example if your profile URL was http://www.warrior.pk/memberlist.php?mode=viewprofile&u=2 you'd put 2 here.
   $topic_last_poster_name = 'Aleri0n'; # Your username.
   $topic_last_poster_colour = 'FF8000';
   $topic_last_post_subject = $topic_title;
   $topic_last_post_time = $topic_time;
   $topic_last_view_time = $topic_time;
   
   echo $topic_title;
   echo $topic_body;
   
   $sqlsona = "INSERT INTO core_topics (topic_id, forum_id, icon_id, topic_attachment, topic_reported, topic_title, topic_poster, topic_time, topic_time_limit, topic_views, topic_status, topic_type, topic_first_post_id, topic_first_poster_name, topic_first_poster_colour, topic_last_post_id, topic_last_poster_id, topic_last_poster_name, topic_last_poster_colour, topic_last_post_subject, topic_last_post_time, topic_last_view_time, topic_moved_id, topic_bumped, topic_bumper, poll_title, poll_start, poll_length, poll_max_options, poll_last_vote, poll_vote_change, topic_visibility, topic_delete_time, topic_delete_reason, topic_delete_user, topic_posts_approved, topic_posts_unapproved, topic_posts_softdeleted)
VALUES ('$topic_id', '$forum_id', '0', '0', '0', '$topic_title', '$topic_poster', '$topic_time', '', '1', '0', '0', '$topic_first_post_id', '$topic_first_poster_name', '', '$topic_last_post_id', '$topic_last_poster_id', '$topic_last_poster_name', '', '$topic_last_post_subject', '$topic_last_post_time', '$topic_last_view_time', '0', '0', '0', '', '0', '0', '1', '0', '0', '1', '0', '', '0', '1', '0', '0')";

if ($conn->query($sqlsona) === TRUE) {
    echo "New record created successfully - Operation# 1";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$topic_body = $conn->real_escape_string($_POST["body"]);

   $sqlthird = "INSERT INTO core_posts (post_id, topic_id, forum_id, poster_id, icon_id, poster_ip, post_time, post_reported, enable_bbcode, enable_smilies, enable_magic_url, enable_sig, post_username, post_subject, post_text, post_checksum, post_attachment, bbcode_bitfield, bbcode_uid, post_postcount, post_edit_time, post_edit_reason, post_edit_user, post_edit_count, post_edit_locked, post_visibility, post_delete_time, post_delete_reason, post_delete_user, post_modified)
VALUES ('$topic_first_post_id', '$topic_id', '$forum_id', '$topic_last_poster_id', '0', '127.0.0.1', '$topic_time', '0', '1', '1', '1', '1', '', '$topic_title', '$topic_body', '00000000000000000001', '$topic_attachment', '', '', '1', '0', '', '0', '0', '0', '1', '0', '', '0', '$topic_time')";

if ($conn->query($sqlthird) === TRUE) {
    echo "New record created successfully - Operation# 2";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}
else {
   echo "FAILED"; 
}

mysqli_close($conn);

?>
