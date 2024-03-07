<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <p class="mb-2">Menampilkan Data User</p>

    <a href="<?= BASEURL; ?>Tambahuser" class="btn btn-success mb-2">Tambah Data</a>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Artikel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="row justify-content-center text-center">
                    <div class="col-md-6">
                        <?php Flasher::flash(); ?>
                    </div>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data['data'] as $item) :
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item['nama'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-danger ml-2 hapus" data-toggle="modal" data-target="#exampleModal" data-nama="<?= $item['nama'] ?>" data-id="<?= $item['id'] ?>">Hapus User</button>
                                        <form action="<?= BASEURL; ?>UpdateUser" method="post">
                                            <input type="hidden" name="nama" value="<?= $item['nama'] ?>">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <input type="hidden" name="email" value="<?= $item['email'] ?>">
                                            <button type="submit" class="btn btn-warning ml-2">Update User</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>HapusUser/hapus" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" id="label"></label>
                        <input type='hidden' id='id' name='id'></input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Hapus User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.hapus').click(function() {
            const nama = $(this).data('nama');
            const id = $(this).data('id');
            $('#label').text('Apakah Anda Yakin Ingin Menghapus ' + nama);
            $('#id').val(id);
        });

    });
</script>

<!-- .container-fluid -->