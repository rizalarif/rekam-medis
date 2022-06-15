<form action="print_laporan_lengkap.php" method="post" enctype="multipart/form-data">
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Laporan Lengkap Per Bulan</h1>
</div>

<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
	<div class="box-body"  style="width:99.5%">
	  <table style="width:100%;line-height:40px;position:relative;top:-15px">
          <tr>
        <div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Bulan</label></td><td>:</td>
          <td><div>
              <select name="bulan"  class="form-control select2" required style="width:100%;">
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
              </select>
              <input type="hidden" name="id_server" value="<?php echo $server_items['id']?>">
              </div>
          </td>
          </div>
      </tr>
      <tr>
    <div class="form-group">
      <td style="font-size:90%"><label for="exampleInputEmail1">Tahun</label></td><td>:</td>
      <td><div>
          <select name="tahun"  class="form-control select2" required style="width:100%;">
            <?php
            $tahun = date('Y');
                for ($thn=2018; $thn <= $tahun; $thn++) {
                  echo "<option value=$thn>$thn</option> ";
                }
            ?>

          </select>
          <input type="hidden" name="id_server" value="<?php echo $server_items['id']?>">
          </div>
      </td>
      </div>
  </tr>
        <td></td>
        <td colspan="2"><div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-print"></i> &nbsp Print</button> &nbsp
              </div>
        </td>
      </tr>
    </table>
    </div>
  </div>
</section>
</form>
