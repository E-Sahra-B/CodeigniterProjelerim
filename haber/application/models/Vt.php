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
        $result = $this->db->select('*')->from('haber')->order_by('eklemeTarihi', 'DESC')->get()->result();
        return $result;
    }

    function kategorilerlist()
    {
        $result = $this->db->select('*')->from('kategori')->get()->result();
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
        $result = $this->db->query("SELECT * FROM haber 
        INNER JOIN kategori
        ON haber.kategoriId=kategori.kategoriId WHERE haber.id={$id}")->row();
        // $this->db->where('id', $id);
        // $query = $this->db->get('haber');
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
        // $builder = $db->table('haber');
        // $builder->select('*');
        // $builder->join('kategori', 'kategori.kategoriId = haber.kategoriId');
        // $result = $builder->get();

        // $this->db->select('*');
        // $this->db->from('haber');
        // $this->db->join('kategori', 'kategori.kategoriId = haber.kategoriId');
        // $result = $this->db->get();
        $result = $this->db->query('SELECT * FROM haber AS h 
        INNER JOIN kategori AS k 
        ON h.kategoriId=k.kategoriId 
        ORDER BY h.eklemeTarihi DESC 
        LIMIT 4')->result();
        return $result;
    }

    function kategoriyeGoreHaberler($sefKategoriAdi)
    {
        $result = $this->db->query("SELECT * FROM haber AS h INNER JOIN kategori AS k ON h.kategoriId=k.kategoriId 
        WHERE k.sefKategoriAdi='{$sefKategoriAdi}'")->result();
        return $result;
    }
    function kategoriyeGoreHaber($id)
    {
        $result = $this->db->query("SELECT * FROM haber AS h INNER JOIN kategori AS k ON h.kategoriId=k.kategoriId 
        WHERE h.id='{$id}'")->row();
        return $result;
    }

    function kategoriHaberInnerJoin()
    {
        $result = $this->db->query('SELECT * FROM haber AS h 
        INNER JOIN kategori AS k 
        ON h.kategoriId=k.kategoriId ORDER BY h.eklemeTarihi DESC')->result();
        return $result;
    }
}
