$(document).ready(function(){
    // Load data pengguna
    function loadContent(){
        $.ajax({
            url: "fetch_data.php",
            method: "GET",
            success: function(response) {
                $('#content').html(response);
            }
        });
    }

    loadContent(); // Load data pengguna saat halaman pertama kali dimuat

    // Menambah pengguna dengan AJAX
    $('#addUserForm').on('submit', function(e) {
        e.preventDefault(); // Mencegah refresh halaman

        $.ajax({
            url: "add_user.php", // File PHP untuk memproses tambah pengguna
            method: "POST",
            data: $(this).serialize(), // Mengambil data dari form
            success: function(response) {
                $('#addUserForm')[0].reset(); // Reset form setelah submit
                loadContent(); // Refresh data pengguna
                
                // SweetAlert untuk notifikasi sukses
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: response, 
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    });

    // Membuka modal edit saat tombol edit ditekan
    $(document).on('click', '.editUser', function(){
        var id = $(this).data('id');
        $.ajax({
            url: "edit_user.php",
            method: "POST",
            data: {id: id},
            dataType: "json",
            success: function(data) {
                $('#editUserId').val(data.id);
                $('#editName').val(data.name);
                $('#editAge').val(data.age);
                $('#editUserModal').modal('show');
            }
        });
    });

    // Simpan perubahan data pengguna
    $('#editUserForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "edit_user.php",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $('#editUserModal').modal('hide');
                loadContent();
                Swal.fire({
                    icon: 'success',
                    title: 'Data Diperbarui!',
                    text: response,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    });

    // Hapus pengguna
    $(document).on('click', '.deleteUser', function(){
        var id = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "delete_user.php",
                    method: "POST",
                    data: {id: id},
                    success: function(response) {
                        loadContent();
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus!',
                            text: response,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                });
            }
        });
    });
});
