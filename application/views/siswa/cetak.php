<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SMKN 1 DEPOK</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style type="text/css" media="all">
  	table{
  		border-collapse: collapse;
  		width: 100%;
  	}
	 td{
	}
  </style>
</head>
<body>
	<h1 style="text-align: center">Nilai rapot</h1>
	<?php echo "Tanggal : ".date('d-m-Y'); ?>
	<hr style="margin-bottom: 30px;">
	<table>
	<td >
	<div style="margin-left: 15px;">
	Nama Siswa   : <?= $siswa->nama; ?> <br>
	Nisn &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $siswa->nisn; ?> <br>
	Bidang studi : <?= $siswa->jurusan; ?> 
	</div>
	</td>
	<td align="right">
	<div style="margin-right: 15px;">
		Tahun pelajaran : <?= $siswa->tahunajaran ?> <br>
		Kelas : &nbsp; <?= $siswa->tingkat ?> <?= $siswa->jurusan ?> <?= $siswa->ruangkelas ?> <br>
		Semester : &nbsp;&nbsp; &nbsp; &nbsp;  <?= $semester ?> <br>
	</div>
	</td>
	</table>
	<br>
	<table border="1">
		<thead>
			<tr>
				<th rowspan="3">No</th>
				<th rowspan="3">Mata Pelajaran</th>
				<th colspan="4">Pengetahuan</th>
				<th colspan="4">Keterampilan</th>
			</tr>
			<tr>
				<th rowspan="2">KB</th>
				<th colspan="2">Nilai</th>
				<th rowspan="2">Predikat</th>
				<th rowspan="2">KB</th>
				<th colspan="2">Nilai</th>
				<th rowspan="2">Predikat</th>
				
			</tr>
			<tr>
				<th>Angka</th>
				<th>Huruf</th>
				<th>Angka</th>
				<th>Huruf</th>

			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($user as $u): ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $u->namamapel; ?></td>
				<td>77</td>
				<td><?= substr($u->rata,0,2) ?></td>
				<?php if (substr($u->rata,0,2) >= 90): ?>
					<td>A</td>
				<?php elseif ((substr($u->rata,0,2) <= 90) and (substr($u->rata,0,2) >= 77) ): ?>
					<td>B</td>
				<?php elseif (substr($u->rata,0,2) <= 76): ?>
					<td style="color:red;">D</td>
				<?php endif; ?>

				<?php if (substr($u->rata,0,2) >= 77): ?>
					<td>Tuntas</td>
				<?php elseif(substr($u->rata,0,2) < 77): ?>
					<td>Remedial</td>
				<?php endif; ?>

				<td>77</td>
				<td><?= substr($u->tugas,0,2) ?></td>
				<?php if (substr($u->tugas,0,2) >= 90): ?>
					<td>A</td>
				<?php elseif ((substr($u->tugas,0,2) <= 90) and (substr($u->tugas,0,2) >= 77) ): ?>
					<td>B</td>
				<?php elseif (substr($u->tugas,0,2) <= 76): ?>
					<td style="color:red;">D</td>
				<?php endif; ?>

				<?php if (substr($u->tugas,0,2) >= 77): ?>
					<td>Tuntas</td>
				<?php elseif (substr($u->tugas,0,2) < 77): ?>
					<td>Remedial</td>
				<?php endif; ?>

			</tr>	
			<?php endforeach ?>
		</tbody>
	</table>
<script>window.print();</script>
</body>
</html>