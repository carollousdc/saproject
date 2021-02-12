<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Penjualan extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME), 1);
        $this->load->model('produk_sql', 'produk');
        $this->load->model('kasir_detail_sql', 'kasir_detail');
        $this->load->model('purchase_detail_sql', 'purchase_detail');
        $this->load->model('pengeluaran_sql', 'pengeluaran');
        $this->load->model('kasir_sql', 'kasir');
    }

    function get_data()
    {
        $list = $this->kasir->get_datatables(['id !=' => 'temporary']);
        $data = [];
        $row = [];
        $no = $_POST['start'];
        foreach ($list as $key => $value) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = date('d F Y', strtotime($value->buy_date));
            $row[] = $value->customer;
            $row[] = number_format($this->kasir_detail->sumTotal($value->id)->qty, 2, ",", ".");
            $row[] = '<span><button data-id="' . $value->id . '" class="btn btn-primary btn_edit">Lihat</button><button style="margin-left: 5px;" data-id="" class="btn btn-danger btn_hapus">Hapus</button></span>';
            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => $this->kasir->count_all(),
            "recordsFiltered" => $this->kasir->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function getDataFinancial()
    {
        $data = [];
        //Revenue percentage
        $y_value = intval($this->kasir_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))))])->qty);
        $n_value = intval($this->kasir_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d')])->qty);
        ($y_value > 0 && $n_value) ? $x_revenue = (($y_value - $n_value) / $y_value) * 100 : $x_revenue = "-";
        ($y_value > $n_value) ? $getCondition = '<span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> ' : $getCondition = '<span class="description-percentage text-success"><i class="fas fa-caret-up"></i> ';
        $data['percentageRevenue'] = '<span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> ' . abs(round(($x_revenue), 2)) . ' %</span>';
        //Cost percentage
        $y_value = $this->purchase_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))))])->qty + $this->kasir_detail->sumModalTotal(['date(buy_date)' => date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))))])->qty;
        $n_value = $this->purchase_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d')])->qty + $this->kasir_detail->sumModalTotal(['date(buy_date)' => date('Y-m-d')])->qty;
        ($y_value > 0 && $n_value) ? $x_value = (($y_value - $n_value) / $y_value) * 100 : $x_value = "-";
        ($y_value > $n_value) ? $getCondition = '<span class="description-percentage text-success"><i class="fas fa-caret-down"></i> ' : $getCondition = '<span class="description-percentage text-danger"><i class="fas fa-caret-up"></i> ';
        $data['percentageCost'] = $getCondition . abs(round(($x_value), 2)) . ' %</span>';
        //Net income percentage
        $y_value = $this->kasir_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))))])->qty - ($this->purchase_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))))])->qty + $this->kasir_detail->sumModalTotal(['date(buy_date)' => date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))))])->qty);
        $n_value = $this->kasir_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d')])->qty - ($this->purchase_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d')])->qty + $this->kasir_detail->sumModalTotal(['date(buy_date)' => date('Y-m-d')])->qty);
        ($y_value > 0 && $n_value) ? $x_netIncome = (($y_value - $n_value) / $y_value) * 100 : $x_netIncome = "-";
        ($y_value > $n_value) ? $getCondition = '<span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> ' : $getCondition = '<span class="description-percentage text-success"><i class="fas fa-caret-up"></i> ';
        $data['percentageNetIncome'] = $getCondition . abs(round(($x_netIncome), 2)) . ' %</span>';
        //Goal Day percentage
        $x_value = $n_value - ($this->pengeluaran->sumFixCost()->biaya / 30);
        ($n_value > $this->pengeluaran->sumFixCost()->biaya) ? $getCondition = '<span class="description-percentage text-success"><i class="fas fa-caret-up"></i> ' : $getCondition = '<span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> ';
        $data['percentageGoalDay'] = $getCondition . number_format((abs(round(($x_value), 2))), 2, ",", ".") . '</span>';
        $data['grossIncomePie'] = $this->kasir_detail->sumMasterTotal()->qty;
        $data['balancePie'] = $this->kasir_detail->sumModalTotal()->qty;
        $data['spendingPie'] = $this->pengeluaran->sumFixCostOther()->biaya;
        $data['netIncomePie'] = ($data['grossIncomePie'] - $data['balancePie']);
        $data['bepPie'] = $this->pengeluaran->sumFixCost()->biaya + $data['spendingPie'];

        $data['bep'] = "Rp. " . number_format(($this->pengeluaran->sumFixCost()->biaya / 30), 2, ",", ".");
        $data['grossIncome'] = "Rp. " . number_format($this->kasir_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d')])->qty, 2, ",", ".");
        $data['spending'] = number_format($this->pengeluaran->sumFixCostOther(['date(buy_date)' => date('Y-m-d')])->biaya, 2, ",", ".");
        $data['netIncome'] = "Rp. " . number_format($this->kasir_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d')])->qty - ($this->purchase_detail->sumMasterTotal(['date(buy_date)' => date('Y-m-d')])->qty + $this->kasir_detail->sumModalTotal(['date(buy_date)' => date('Y-m-d')])->qty), 2, ",", ".");
        $data['balance'] = "Rp. " . number_format($this->kasir_detail->sumModalTotal(['date(buy_date)' => date('Y-m-d')])->qty + $data['spendingPie'], 2, ",", ".");
        $output = array(
            "data" => $data,
        );
        echo json_encode($output);
    }
}//End