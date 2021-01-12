<html>
    <head>
        <title>Pencarian Data Berdasarkan Periode Tanggal</title>
    </head>
    <body>
        <div style="border:1px solid #B0C4DE; padding:10px; overflow:auto; width:1113px; height:500px;">
        <?php
            $Open = mysql_connect("localhost","root","");
                if (!$Open){
                die ("Koneksi ke Engine MySQL Gagal !");
                }
            $Koneksi = mysql_select_db("barang");
                if (!$Koneksi){
                die ("Koneksi ke Database Gagal !");
                }
        ?>
        <form action="fil_ter.php" method="post" name="postform">
            <p align="center"><font color="orange" size="3"><b>Pencarian Data Berdasarkan Periode Tanggal</b></font></p><br />
            <table border="0">
                <tr>
                    <td width="125"><b>Dari Tanggal</b></td>
                    <td colspan="2" width="190">: <input type="date" name="tanggal_awal" size="16" />             
                    </td>
                    <td width="125"><b>Sampai Tanggal</b></td>
                    <td colspan="2" width="190">: <input type="date" name="tanggal_akhir" size="16" />      
                    </td>
                    <td colspan="2" width="190"><input type="submit" value="Pencarian Data" name="pencarian"/></td>
                    <td colspan="2" width="70"><input type="reset" value="Reset" /></td>
                </tr>
            </table>
        </form><br />
        <p>
        <?php
            //proses jika sudah klik tombol pencarian data
            if(isset($_POST['pencarian'])){
            //menangkap nilai form
            $tanggal_awal=$_POST['tanggal_awal'];
            $tanggal_akhir=$_POST['tanggal_akhir'];
            if(empty($tanggal_awal) || empty($tanggal_akhir)){
            //jika data tanggal kosong
            ?>
            <script language="JavaScript">
                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='lihatlaporan.php';
            </script>
            <?php
            }else{
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
            <?php
            $query=mysql_query("SELECT * FROM header_penjualan INNER JOIN details_penjualan ON header_penjualan.no_transaksi=details_penjualan.no_trans where tanggal between '".$tanggal_awal."' and'".$tanggal_akhir."'");
            }
        ?>
        </p>
        <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#FF6600">
                <th width="10" height="40">No_Transaksi</td> 
                <th width="60">Kode_minuman</td> 
                <th width="70">Jumlah</td> 
                <th width="60">Harga_Satuan</td>   
            </tr>
            <?php
            //menampilkan pencarian data
            while($row=mysql_fetch_array($query, MYSQLI_ASSOC)){
            ?>
            <tr>
                <td align="center" height="30"><?php echo $row['no_transaksi']; ?></td>
                <td align="center"><?php echo $row['kode_minuman']; ?></td>
                <td align="center"><?php echo $row['quantity'];?></td>
                <td align="center"><?php echo $row['harga'];?></td>
            </tr>
            <?php
            }
            ?>    
            <tr>
                <td colspan="4" align="center"> 
                <?php
                //jika pencarian data tidak ditemukan
                if(mysql_num_rows($query)==0){
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                }
                ?>
                </td>
            </tr> 
        </table>
        <br>
        <br>
        <br>
        <td>
            <button class="button"><a href="login.php">HOME</a></button></td>
                        <button class="button"><a href="lihatlaporan.php">Back</a></button></td>
        <?php
        }
        else{
            unset($_POST['pencarian']);
        }
        ?>
        <iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
    </body>
</html>