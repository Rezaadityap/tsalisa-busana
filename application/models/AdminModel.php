<?php

class AdminModel extends CI_Model
{
    public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

?>