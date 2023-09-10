<?php
class Vt extends CI_Model
{
    function loginkontrol($name, $password)
    {
        $result = $this->db->select('*')
            ->from('admin')
            ->where('name', $name)
            ->where('password', $password)
            ->get()->row();

        if (count(array($result)) != 1) {
            return false;
        } else {
            return $result;
        }
    }

    function haberEkle($data = array())
    {
        $result = $this->db->insert('haber', $data);
        return $result;
    }

    function haberlerlist()
    {
        $result = $this->db->select('*')
            ->from('haber')
            ->order_by('eklemeTarihi', 'DESC')
            ->get()->result();
        return $result;
    }

    function kategorilerlist() 
    {
        $result = $this->db->select('*')
            ->from('kategori')
            ->order_by('sira', 'ASC')
            ->get()->result();
        return $result;
    }

    function haberGuncelle($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('haber', $data);
        if ($this->db->affected_rows() >= 0) {
            return true;
        } else {
            return false;
        }
    }

    function haberGetir($id)
    {
        // $result = $this->db->query("SELECT * FROM haber 
        // INNER JOIN kategori
        // ON haber.kategoriId=kategori.kategoriId WHERE haber.id={$id}")->row();
        $result = $this->db->select('*')
            ->from('haber')
            ->join('kategori', 'haber.kategoriId = kategori.kategoriId')
            ->where('haber.id', $id)
            ->get()->row();
        return $result;
    }

    function habersil($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('haber');
        if ($this->db->affected_rows() >= 0) {
            return true;
        } else {
            return false;
        }
    }

    // function kategoriekleme($data = array())
    // {
    //     $result = $this->db->insert('kategori', $data);
    //     return $result;
    // }
    function kategoriekleme($data = array())
    {
       
        $result = $this->db->insert('kategori', $data);
        return $result;
    }

    function kategoriGetir($id)
    {
        $this->db->where('kategoriId', $id);
        $query = $this->db->get('kategori');
        return $query->row();
    }

    function kategoriguncelle($data, $id)
    {
        $this->db->where('kategoriId', $id);
        $this->db->update('kategori', $data);
        if ($this->db->affected_rows() >= 0) {
            return true;
        } else {
            return false;
        }
    }

    function kategorisil($id)
    {
        $this->db->where('kategoriId', $id);
        $this->db->delete('kategori');
        if ($this->db->affected_rows() >= 0) {
            return true;
        } else {
            return false;
        }
    }

    function son4Haber()
    {
        // $result = $this->db->query('SELECT * FROM haber AS h 
        // INNER JOIN kategori AS k 
        // ON h.kategoriId=k.kategoriId 
        // ORDER BY h.eklemeTarihi DESC 
        // LIMIT 4')->result();
        $result = $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId=k.kategoriId', 'INNER')
            ->order_by('h.eklemeTarihi', 'DESC')
            ->limit(4)
            ->get()->result();
        return $result;
    }

    function kategoriyeGoreHaberler($sefKategoriAdi)
    {
        // $result = $this->db->query("SELECT * FROM haber AS h INNER JOIN kategori AS k ON h.kategoriId=k.kategoriId 
        // WHERE k.sefKategoriAdi='{$sefKategoriAdi}'")->result();
        $result = $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId = k.kategoriId', 'INNER')
            ->where('k.sefKategoriAdi', $sefKategoriAdi)
            ->get()->result();
        return $result;
    }
    function kategoriyeGoreHaber($sefBaslik)
    {
        // $result = $this->db->query("SELECT * FROM haber AS h INNER JOIN kategori AS k ON h.kategoriId=k.kategoriId 
        // WHERE h.id='{$id}'")->row();
        $result = $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId = k.kategoriId', 'INNER')
            ->where('h.sefBaslik', $sefBaslik)
            ->get()->row();
        return $result;
    }
    function kategoriHaberInnerJoin()
    {
        // $result = $this->db->query('SELECT * FROM haber AS h 
        // INNER JOIN kategori AS k 
        // ON h.kategoriId=k.kategoriId ORDER BY h.eklemeTarihi DESC')->result();
        $result = $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId = k.kategoriId', 'INNER')
            ->order_by('h.eklemeTarihi', 'DESC')
            ->get()->result();
        return $result;
    }
    function kategoriSayisi() // toplam kategori sayısını veriyor
    {
        $result = $this->db->select('COUNT(*) as kategori_sayisi')->get('kategori')->row();
        return $result->kategori_sayisi;
    }
    function haberSayisi() // toplam haber sayısını veriyor
    {
        $result = $this->db->select('COUNT(*) as haber_sayisi')->get('haber')->row();
        return $result->haber_sayisi;
    }
    function totalProductsOfCategories()
    {
        // $result = $this->db->query('SELECT kategori.kategoriAdi as ad, kategori.sefKategoriAdi AS seoad,COUNT(haber.kategoriId) AS say FROM haber
        // INNER JOIN kategori ON haber.kategoriId = kategori.kategoriId
        // GROUP BY kategori.kategoriId')->result();

        $result = $this->db->select('kategori.kategoriAdi as ad, kategori.sefKategoriAdi AS seoad, COUNT(haber.kategoriId) AS say')
            ->from('haber')
            ->join('kategori', 'haber.kategoriId = kategori.kategoriId')
            ->group_by('kategori.kategoriId')
            ->order_by('kategori.sira', 'ASC')
            ->get()->result();
        return $result;
    }
    public function get_items($limit, $offset)
    {
        $result = $this->db->select('kategori.kategoriAdi as ad, kategori.sefKategoriAdi AS seoad, COUNT(haber.kategoriId) AS say')
            ->from('haber')
            ->join('kategori', 'haber.kategoriId = kategori.kategoriId')
            ->group_by('kategori.kategoriId')
            ->limit($limit, $offset)
            ->get()
            ->result();

        return $result;
    }
    public function get_category_counts($sefKategoriAdi)
    { //sef kategori adına göre haber sayısını veriyor
        $this->db->select('COUNT(haber.kategoriId) AS say');
        $this->db->from('haber');
        $this->db->join('kategori', 'haber.kategoriId = kategori.kategoriId');
        $this->db->where('kategori.sefKategoriAdi', $sefKategoriAdi);
        $query = $this->db->get();

        return $query->row()->say;
    }
    function kategoriyeGoreHaberlerLimitli($sefKategoriAdi, $limit, $offset)
    {
        $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId = k.kategoriId', 'INNER')
            ->where('k.sefKategoriAdi', $sefKategoriAdi)
            ->limit($limit, $offset);

        $query = $this->db->get();
        return $query->result();
    }


    function solust()
    {
        $result = $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId = k.kategoriId')
            ->where('h.gosterim', 'sol')
            ->order_by('h.eklemeTarihi', 'DESC')
            ->limit(1)
            ->get()->row();
        return $result;
    }
    function sol3()
    {
        // $result = $this->db->query('SELECT * FROM haber AS h 
        // INNER JOIN kategori AS k ON h.kategoriId=k.kategoriId 
        // WHERE h.gosterim=' . "sol" . ' ORDER BY h.eklemeTarihi DESC LIMIT 3;')->result();

        $result = $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId = k.kategoriId')
            ->where('h.gosterim', 'sol')
            ->order_by('h.eklemeTarihi', 'DESC')
            ->limit(3, 1)
            ->get()->result();
        return $result;
    }

    function ortaust()
    {
        $result = $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId = k.kategoriId')
            ->where('h.gosterim', 'orta')
            ->order_by('h.eklemeTarihi', 'DESC')
            ->limit(1)
            ->get()->row();
        return $result;
    }
    function orta2()
    {
        $result = $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId = k.kategoriId')
            ->where('h.gosterim', 'orta')
            ->order_by('h.eklemeTarihi', 'DESC')
            ->limit(2, 1)
            ->get()->result();
        return $result;
    }

    function sagust()
    {
        $result = $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId = k.kategoriId')
            ->where('h.gosterim', 'sag')
            ->order_by('h.eklemeTarihi', 'DESC')
            ->limit(1)
            ->get()->row();
        return $result;
    }
    function sag3()
    {
        $result = $this->db->select('*')
            ->from('haber AS h')
            ->join('kategori AS k', 'h.kategoriId = k.kategoriId')
            ->where('h.gosterim', 'sag')
            ->order_by('h.eklemeTarihi', 'DESC')
            ->limit(3, 1)
            ->get()->result();
        return $result;
    }

    // function select2($search)
    // {
    //     $this->db->select('kategoriAdi');
    //     $this->db->from('kategori'); 
    //     $this->db->like('kategoriId', $search); 
    //     $query = $this->db->get();
    //     return $query;
    // }

    function insert($from, $data = array())
    {//$this->vt->update('haber' , $values);
        $result = $this->db
            ->insert($from,$data);
        return $result;
    }

    function single($from, $where = array(),$sutun=null,$siralama=null)
    {//$this->vt->single('haber', array('id'=>$id));
        $result = $this->db
            ->from($from)
            ->where($where)
            ->order_by($sutun,$siralama)
            ->get()
            ->row();
        return $result;
    }

    function update($from, $where = array(), $data = array())
    { //$this->vt->update('haber', array('id'=>$id), $values);
        $results = $this->db
            ->where($where)
            ->update($from, $data);
        return $results;
    }

    //$this->db->where('kategoriId', $id);
    //$this->db->delete('kategori');
    function delete($from, $where)
    { //$this->vt->delete('haber', array('id'=>$id), $values);
        // $results = $this->db
        //     ->where($where)
        //     ->delete($from, array($where=>$id));
        
        $results = $this->db
        ->where($where)
        ->delete($from);
        return $results;
    }

    function session($type,$name,$message=null){
        $ci=get_instance();
        if ($type=='oku') {
            return $ci->session->userdata($name);
        }
        if ($type=='yaz') {
            return $ci->session->set_userdata($name,$message);
        }
        
    }

    function geridon() {
        return redirect($_SERVER['HTTP_REFERER']);
    }

    function list($from) 
    {
        $result = $this->db->select('*')
            ->from($from)
            ->get()->result();
        return $result;
    }

    function detail($from,$where=array())
    {
        $result = $this->db->select('*')
            ->from($from)
            ->where($where)
            ->get()->row();
        return $result;
    }

    // function grupby($from,$where= array(),$grup){
    //     $result = $this->db
    //         ->from($from)
    //         ->where($where)
    //         ->group_by($grup)
    //         ->get()
    //         ->result();
    //     return $result;
    // }

    //https://esma.dvebdemo.com.tr/
    //https://esma.dvebdemo.com.tr/admin
}
