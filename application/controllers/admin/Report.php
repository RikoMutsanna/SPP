<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('report_model');
  }
  
  public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
           if($filter == '1'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan_dibayar'];
                $tahun = $_GET['tahun_dibayar'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'admin/report/cetak?filter=1&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->report_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun_dibayar'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'admin/report/cetak?filter=2&tahun='.$tahun;
                $transaksi = $this->report_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'admin/report/cetak';
            $transaksi = $this->report_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('admin/report'.$url_cetak);
    $data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->report_model->option_tahun();
    $this->load->view('admin/pembayaran/report', $data);
  }
}
  
  public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
             if($filter == '1'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan_dibayar'];
                $tahun = $_GET['tahun_dibayar'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->report_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun_dibayar'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->report_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->report_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        
    ob_start();
    $this->load->view('print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
        require_once('./docs/assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data Transaksi.pdf', 'D');
  }
}