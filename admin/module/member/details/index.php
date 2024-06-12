<?php 
    $id = $_GET['pelanggan'];
    $hasil = $lihat -> member_edit($id); // Assume this method fetches the member details by ID
?>
<a href="index.php?page=member" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Balik </a>
<h4>Details Member</h4>
<?php if(isset($_GET['success'])){?>
<div class="alert alert-success">
    <p>Edit Data Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['remove'])){?>
<div class="alert alert-danger">
    <p>Hapus Data Berhasil !</p>
</div>
<?php }?>
<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <td>ID Member</td>
                <td><?php echo $hasil['id_member'];?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo $hasil['nama'];?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?php echo $hasil['password'];?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo $hasil['alamat'];?></td>
            </tr>
            <tr>
                <td>Telpon</td>
                <td><?php echo $hasil['telpon'];?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $hasil['email'];?></td>
            </tr>
            <tr>
                <td>Tanggal Input</td>
                <td><?php echo $hasil['tgl_input'];?></td>
            </tr>
            <tr>
                <td>Tanggal Update</td>
                <td><?php echo $hasil['tgl_update'];?></td>
            </tr>
        </table>
    </div>
</div>
