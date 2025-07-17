<?php
class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function get_menu_data() {
        // 1. Ambil data kategori
        $categories = $this->db->get('menu_categories')->result_array();

        // 2. Ambil data topping
        $toppings = $this->db->get('menu_toppings')->result_array();

        // 3. Ambil data menu dan join dengan kategori
        $this->db->select('menu_items.id, menu_items.name, menu_items.price, menu_items.image, menu_categories.id as category');
        $this->db->from('menu_items');
        $this->db->join('menu_categories', 'menu_items.category_id = menu_categories.id', 'left');
        $menu_items = $this->db->get()->result_array();

        // 4. Format data menjadi array JSON
        $data = [
            'categories' => $categories,
            'toppings' => $toppings,
            'menuItems' => $menu_items
        ];

        // 5. Return sebagai JSON
        header('Content-Type: application/json');
        echo json_encode($data);
        //echo "const menuData = " . json_encode($data, JSON_PRETTY_PRINT) . ";";
    }
    public function get_menu_detail($id)
        {
            // Ambil menu item
            $this->db->where('id', $id);
            $menuItem = $this->db->get('menu_items')->row_array();

            if (!$menuItem) {
                show_404();
                return;
            }

            // Ambil semua topping
            $toppings = $this->db->get('menu_toppings')->result_array();

            // Kirim data
            $data = [
                'menuItem' => $menuItem,
                'toppings' => $toppings
            ];

            header('Content-Type: application/json');
            echo json_encode($data);
        }

}
