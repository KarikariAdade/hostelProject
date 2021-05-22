<?php
include 'time-function.php';
$fetch_message = $conn->query("SELECT * FROM messages WHERE manager_id = '$admin_id' AND replied = 0") or die(mysqli_error($conn));
if (mysqli_num_rows($fetch_message) > 0) {
	while ($row = mysqli_fetch_assoc($fetch_message)) {

?>
<div class="comments-area">
	<article class="message-box">
		<div class="thumb-box">
			<a href="reply.php?id=<?= urlencode($row['id']);?>&manager=<?= urlencode($row['manager_id']);?>"  class="reply-btn">Reply Now</a>
		</div>
		<div class="content-box">
			<div class="name"><?= $row['full_name'] ?></div>
			<span class="date"><i class="la la-calendar"></i> <?= time_ago($row['date']); ?></span>
			<div class="text"><?= $row['message']; ?></div>
		</div>
	</article>
</div>
<?php
	}
}else{
	echo "There are no messages at the moment";
}
?>