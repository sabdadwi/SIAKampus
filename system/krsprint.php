  <?php 
    include "printer.css"; ?>
  
<BODY onLoad="javascript:window.print()">
<?php
include "../config/koneksi.php";

?>
<style type="text/css">
.style4 {font-size: 12; }
.style7 {	font-size: 12;
	color: #265180;
	font-family: Georgia, "Times New Roman", Times, serif;
}
</style>
<table class="basic" width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="550" align="center"><strong>UNIVERSITAS LOKOMEDIA</strong></td>
  </tr>
  <tr>
    <td align="center">Jl. xxxxxx, Telp. (xxxx) xxxx,xxxx. Fax.xxxx</td>
  </tr>
  <tr>
    <td align="center">xxxx-xxxx xxxx xxxx, E-mail : xxxx@xxxx.xxxx. Homepage : xxxx.xxx.xx.xx</td>
  </tr>
</table>
<br><br>
<table id=tablestd>
  <?php  
  $sql="SELECT * FROM view_form_mhsakademik WHERE NIM='$_GET[NIM]'";
  $no=1;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
  ?>
    <tr>
      <td class=basic><strong>Tahun</strong></td>
      <td class=basic><strong>: <?php echo $_GET['tahun']; ?></td>
      <td rowspan=6 valign=top>
           <?  $sql="SELECT * FROM view_form_mhsakademik WHERE  NIM='$_GET[NIM]' GROUP BY NIM";
               $no=0;
               $qry=mysql_query($sql)
               or die ();
               while($data1=mysql_fetch_array($qry)){
               echo "<img alt='galeri' src='foto_mhs/$data1[foto]' height=130/>";
             }
           ?>              
      </td></tr>
    <tr>
      <td class=basic><strong>NIM</strong></td>
      <td class=basic><strong>: <?php echo $data['NIM']; ?></td>
    </tr>
    <tr>
      <td class=basic><strong>NAMA</strong></td>
      <td class=basic><strong>: <?php echo $data['nama_lengkap']; ?></td>
    </tr>
    <tr>
      <td class=basic><strong>Jurusan</strong></td>
      <td class=basic><strong>: <?php echo $data['kode_jurusan']; ?> - <?php echo $data['nama_jurusan']; ?></strong></td>
    </tr>
    <tr>
      <td class=basic><strong>Program Studi</strong></td>
      <td class=basic><strong>: <?php echo $data['nama_program']; ?></strong></td>
    </tr>
    <tr>
      <td class=basic><strong>Pembimbing</strong></td>
      <td class=basic><strong>: <?php echo $data['pembimbing']; ?>, <?php echo $data['Gelar']; ?></strong></td>
    </tr>
  </table>
<table id=tablemodul1>
<tr><td colspan=10 align=center bgcolor=#C0DCC0><strong>Kartu Rencana Studi (KRS)</strong></td></tr>
      <tr bgcolor="#CCCCCC">
        <th class=basic>No</th>
        <th class=basic>Kode <br>Matakuliah</th>
        <th class=basic>Nama <br>Matakuliah</th>
        <th class=basic>SKS</th>
        <th class=basic>Sem</th>
        <th class=basic> Kls</th>
        <th class=basic> Hari </th>
        <th class=basic>Jam <br>Mulai</th>
        <th class=basic>Jam <br>Selesai</th>
        <th class=basic>Dosen</th>
      </tr>

        <?php  
  $sql="SELECT * FROM krs1 WHERE tahun='$_GET[tahun]' AND NIM='$_GET[NIM]' ORDER BY semester,kelas";
  $no=0;
  $qry=mysql_query($sql)
  or die ();
  while($data=mysql_fetch_array($qry)){
  $no++;
  ?>      <tr valign="top">
        <td class=basic><?php echo $no; ?>
          </td>
        <td class=basic><?php echo $data['kode_mtk']; ?>
          </td>
        <td class=basic><span class="style4">
          <?php echo $data['nama_matakuliah']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['sks']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['semester']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['kelas']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['hari']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['jam_mulai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['jam_selesai']; ?>
        </span></td>
        <td class=basic><span class="style4">
          <?php echo $data['dosen']; ?>,  <?php echo $data['gelar']; ?>
        </span></td>
        <?php $Tot=$Tot+$data['sks']; ?>
      </tr>
      
	    <?php
  }
  ?>
  </table>
    <table id=tablestd>
        
      <tr>
        <td valign="top" class=basic>Total Keseluruhan SKS Ambil</td>
        <td valign="top" class=basic><?php echo number_format($Tot,0,',','.');  ?></td>
      </tr>
      <tr>
      <td class=basic>Batas Max Ambil SKS<td></tr>
  <?php
  }
  ?>
<dl><dd><div align="center"></div>
    </dd>
  </dl>
</form>
</body>
</html>
