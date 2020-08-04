<!DOCTYPE html>
<html>
<head>
	<title>Library Session</title>
</head>
<body>

<h2>Menampilkan data session</h2><br />

<form method="POST">
<input type="text" name="nama" id="nama">
<button type="submit">Send</button>
</form>

<p>Selamat datang, <strong><?php echo $this->session->userdata('username');?></strong><br />



</body>
</html>
