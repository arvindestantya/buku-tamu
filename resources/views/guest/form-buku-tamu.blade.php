<!-- Modal Buku Tamu -->
<style>
  .modal-content {
    border-radius: 1.25rem !important;
    /* Lebih cekung dari default */
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    /* opsional, biar lebih elegan */
  }

  .modal-header {
    border-top-left-radius: 1.25rem !important;
    border-top-right-radius: 1.25rem !important;
  }

  .modal-footer {
    border-bottom-left-radius: 1.25rem !important;
    border-bottom-right-radius: 1.25rem !important;
  }
</style>
<div class="modal fade" id="modalBukuTamu" tabindex="-1" role="dialog" data-focus="false" data-backdrop="static" aria-labelledby="modalBukuTamuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="modalBukuTamuLabel">Selamat Datang di {{$unit->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formBukuTamu" method="post">
        @csrf
        <div class="modal-body">
          <input type="hidden" id="unit_id" name="unit_id" value="{{$unit->id}}">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="name" required>
          </div>
          <div class="form-group">
            <label for="hp">Nomor Handphone</label>
            <input type="tel" class="form-control" id="hp" name="no_handphone" pattern="^(\\+62|62|0)8[1-9][0-9]{7,12}$"
       minlength="10"
       maxlength="15"
       required
       title="Masukkan nomor HP valid, minimal 10 digit, contoh: 0812345678 atau +62812345678">
          </div>
          <div class="form-group">
            <label for="email">Email (opsional)</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="category">Jenis Pengunjung</label>
            <select name="category" id="category" class="form-control ">
              <option value="mahasiswa">Mahasiswa</option>
              <option value="umum">Umum</option>
              <option value="pegawai">Pegawai</option>


            </select>
          </div>
          <div class="form-group">
            <label for="tujuan">Tujuan Kunjungan</label>
            <textarea class="form-control" id="tujuan" name="purpose" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">Simpan</button>

        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#formBukuTamu').on('submit', function(e) {
      e.preventDefault();

      // Ambil unit_id dari URL atau atribut data
      const formData = {
        _token: "{{ csrf_token() }}",
        name: $('#nama').val(),
        no_handphone: $('#hp').val(),
        email: $('#email').val(),
        category: $('#category').val(),
        purpose: $('#tujuan').val(),
        unit_id: $('#unit_id').val(),
      };

      $.ajax({
        url: `/guest/store`, // pastikan route-nya sesuai
        type: 'POST',
        data: formData,

        success: function(response) {

          $('#modalBukuTamu').modal('hide');
          $('#formBukuTamu')[0].reset();
          successMsg(response.message);
        },
        error: function(xhr) {
          let err = xhr.responseJSON?.message || 'Terjadi kesalahan saat mengirim data';

        }
      });
    });
  });
</script>