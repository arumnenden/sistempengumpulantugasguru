<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends CI_Model {

	public function get_where($where, $table)// fungsi untuk letak data
	{
		return $this->db->get_where($table, $where);
	}

	public function insert($data, $table)// fungsi untuk insert data
	{
		$this->db->insert($table, $data);
	}

	public function get_desc($table) //fungsi untuk menampilkan data
	{
		$this->db->ORDER_BY('id', 'desc');
		return $this->db->get($table);
	}

	public function delete($where, $table)// fungsi untuk delete data
	{
		$this->db->delete($table, $where);
	}

	public function update($where, $data, $table)// fungsi untuk update data 
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function ambilsatudata($id)
	{
       return $this->db->get('tb_user'); // ngambil data di table tb_user     
        
	}
	function GetDataUser() 
	{
        $Query = $this->db->get('tb_user');
        return $Query->result();
    }

	// public function download($params = array())
	// {
	// 	// inisiasi
 //        $this->db->select('*');
 //        $this->db->from('tb_tugas_jurnal');
 //        $this->db->where('status','1');
 //        $this->db->order_by('created','desc');

 //        if(array_key_exists('id',$params) && !empty($params['id']))
 //        {
 //            $this->db->where('id',$params['id']);
 //            //get records
 //            $query = $this->db->get();
 //            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
 //        }
 //        else
 //        {
 //            //set start and limit
 //            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
 //                $this->db->limit($params['limit'],$params['start']);
 //            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
 //                $this->db->limit($params['limit']);
 //            }
 //            //get records
 //            $query = $this->db->get();
 //            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
 //        }
 //        //return fetched data
 //        return $result;
 //    }
	public function download($params = array())// fungsi untuk download data
	{
		$this->db->select('*');
        $this->db->from('tb_tugas_jurnal');
	}
}