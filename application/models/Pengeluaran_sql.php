<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran_sql extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->tabel = "pengeluaran";
        $this->tabel_prefix = "pen";
    }

    public function sumFixCost($where = "")
    {
        $this->db->select('sum(biaya) as biaya');
        if (!empty($where)) {
            return $this->get($where);
        } else return $this->get(['m.tipe =' => 0]);
    }
} //End
