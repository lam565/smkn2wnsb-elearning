<?php
	$file=$_POST['id'];
?>

<a class="media" href="files/materi/<?php echo $file; ?>"></a>
<script type="text/javascript">
	$(function () {
		$('.media').media({width: 868});
	});
</script>