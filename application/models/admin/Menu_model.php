<?php
class Menu_model extends CI_Model
{
   
    public function get_all_menu()
    {
        $data = [];
        $parent = $this->db->select('*')
            ->from('master_menu')
            ->where('idparent', 0)
            ->get()->result();
        foreach ($parent as $row) {
            $child = $this->db->select('*')
                ->from('master_menu')
                ->where('idparent', $row->idmenu)
                ->get();
            $data[] = [
                'idmenu' => $row->idmenu,
                'namamenu' => $row->nama_menu,
                'aktif' => $row->aktif,
                'submenu' => $child->result_array()
            ];
        }
        return $data;
    }

    public function get_menu_by_grup($idgrorup = null)
    {
        $data = [];
       
        $filter_parent = [
            'user_group_detail.idgroup' => $idgrorup,
            'master_menu.idparent' => 0,
        ];

        $parent = $this->db->select(
                                    'master_menu.idparent,
                                    user_group_detail.idmenu,
                                    user_group_detail.idgroup,
                                    master_menu.nama_menu,
                                    master_menu.url,
                                    master_menu.icon,
                                     ')
            ->from('user_group_detail')
            ->join('master_menu', ' user_group_detail.idmenu = master_menu.idmenu','left')
            ->where($filter_parent)
            ->order_by('master_menu.urutan', 'asc')
            ->get()->result();

        foreach ($parent as $item) {
           
           
            $filter_child = [
                'master_menu.idparent' => $item->idmenu,
                'user_group_detail.idgroup' => $idgrorup
            ];

            $child = $this->db->select('master_menu.idmenu,
                                        master_menu.nama_menu,
                                        master_menu.url,
                                        master_menu.icon,
                                      
                                        ')
                ->from('user_group_detail')
                ->join('master_menu', ' user_group_detail.idmenu = master_menu.idmenu','left')
                ->where($filter_child)
                ->order_by('master_menu.urutan', 'asc')
                ->get()->result();
               
            $data[] = array(
                "id_menu" => $item->idmenu,
                "nama_menu" => $item->nama_menu,
                "icon" => $item->icon,
                "submenu" => $child
            );
            
        }
        return $data;
    }
    public function get_group()
    {
        $query = $this->db->select('*')
            ->from('user_group')
            ->order_by('urutan','asc')
            ->get()->result();
        return $query;
    }

    function add_item_group($data)
    {
        $query = $this->db->where('idmenu', $data['idmenu'])
            ->where('idgroup', $data['idgroup'])
            ->from('user_group_detail')

            ->count_all_results();

        if (!$query > 0) {

            return $this->db->insert('user_group_detail', $data);

        }else{
            return false;

        }
    }

    function delete_item_group($data){
      
        return $this->db->delete('user_group_detail', $data);
           
    }

}
