<!DOCTYPE html>
<html>

<head>
	<title>@yield('title')</title>
	<!-- offline -->
	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('public/css/app.css') }}"> --}}
	<!-- online -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<!-- bagian judul halaman -->
				<h3> @yield('title') </h3>

				<!-- bagian kontent -->
				@yield('content')
			</div>
		</div>
	</div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script>
	$("#pendidikan").click(function(){
	  $(".form-pendidikan").append(`<hr><div class="form-group"><label for="">Nama Sekolah / Universitas</label><input type="text" name="nama_sekolah_univ[]" placeholder="Masukkan Nama Sekolah / Univ" class="form-control" required></div><div class="form-group"><label for="">Jurusan</label><input type="text" name="jurusan[]" placeholder="Jurusan" class="form-control" required></div><div class="form-group"><label for="">Tahun Masuk</label><input type="date" name="tahun_masuk[]" placeholder="tahun_masuk" class="form-control" required></div><div class="form-group"><label for="">Tahun Lulus</label><input type="date" name="tahun_lulus[]" placeholder="tahun_lulus" class="form-control" required></div>`);
	});
	$("#pengalaman").click(function(){
	  $(".form-pengalaman").append(`<hr><div class="form-group"><label for="">Perusahaan</label><input type="text" name="perusahaan[]" placeholder="Nama perusahaan" class="form-control" required></div><div class="form-group"><label for="">Jabatan</label><input type="text" name="jabatan[]" placeholder="Jabatan" class="form-control" required></div><div class="form-group"><label for="">Tahun</label><input type="date" name="tahun[]" placeholder="Tahun" class="form-control" required></div><div class="form-group"><label for="">Keterangan</label><textarea name="keterangan[]" id="" class="form-control" required></textarea></div>`);
	});
  </script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
	integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
	integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>

</html>