<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'carts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['product_id', 'name', 'image', 'price', 'quantity'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];




    public function getCartWithProducts($cartId)
    {
        $query = $this->db->table('carts')
            ->select('products.*, productincarts.amount')
            ->join('productincarts', 'productincarts.cart_id = carts.id')
            ->join('products', 'products.id = productincarts.product_id')
            ->where('carts.id', $cartId)
            ->get();

        return $query->getResult();
    }
    public function getCartWithProductsByUserId($userId)
    {
        $query = $this->db->table('usercarts')
            ->select('products.*, productincarts.amount, (products.price * productincarts.amount) as total_price')
            ->join('carts', 'usercarts.cart_id = carts.id')
            ->join('productincarts', 'carts.id = productincarts.cart_id')
            ->join('products', 'productincarts.product_id = products.id')
            ->where('usercarts.user_id', $userId)
            ->get();

        return $query->getResultArray();
    }
    public function addToCart($userId, $productId, $amount)
    {
        // Get the cart ID for the user
        $cartId = $this->getCartIdByUserId($userId);

        // If the user doesn't have a cart, generate a new empty cart
        if ($cartId === null) {
            $cartId = $this->generateNewCartForUser($userId);
        }

        $productInCartData = [
            'product_id' => $productId,
            'amount' => $amount,
            'cart_id' => $cartId
        ];
        $this->db->table('productincarts')->insert($productInCartData);
    }
    public function deleteFromCart($userId, $productId)
    {
        // Get the cart ID for the user
        $cartQuery = $this->db->table('usercarts')
            ->select('cart_id')
            ->where('user_id', $userId)
            ->get();

        $cartResult = $cartQuery->getRow();
        $cartId = $cartResult->cart_id;

        // Delete the product from the productincarts table
        $this->db->table('productincarts')
            ->where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->delete();
    }
    public function countCartValue($userid)
    {
        $cart = $this->getCartWithProductsByUserId($userid);
        $totalAmount = 0;

        foreach ($cart as $item) {
            $totalAmount += $item['total_price'];
        }
        return $totalAmount;
    }
    public function countCartsByUserId($userId)
    {
        return $this->db->table('usercarts')
            ->join('carts', 'carts.id = usercarts.cart_id')
            ->join('productincarts', 'productincarts.cart_id = carts.id')
            ->where('usercarts.user_id', $userId)
            ->countAllResults();
    }

    public function pager($userId)
    {
        $perPage = 10; // Number of records to display per page
        $totalCarts = $this->countCartsByUserId($userId);

        $pager = \Config\Services::pager(null, null, true);
        /*$pager->setBaseURL('/cart/index') // Set the base URL for pagination links
        ->setTotalRows($totalCarts)
            ->setPerPage($perPage);

        return $pager;*/
        return null;
    }


    public function generateNewCartForUser($userId)
    {
        // Check if the user already has a cart
        $existingCart = $this->db->table('usercarts')
            ->where('user_id', $userId)
            ->get()
            ->getRow();

        // If a cart already exists, you can return the existing cart ID or handle the scenario as per your requirements
        if ($existingCart !== null) {
            return $existingCart->cart_id;
        }

        // Create a new empty cart
        $this->db->table('carts')->insert(['id' => null]);

        // Get the inserted cart ID
        $cartId = $this->db->insertID();

        // Associate the new cart with the user
        $this->db->table('usercarts')->set(['user_id' => $userId, 'cart_id' => $cartId])->insert();

        // Return the generated cart ID
        return $cartId;
    }
    public function getCartIdByUserId($userId)
    {
        $cart = $this->db->table('usercarts')
            ->where('user_id', $userId)
            ->get()
            ->getRow();

        if ($cart !== null) {
            return $cart->cart_id;
        }

        return null;
    }
    public function releaseCartByUserId($userId)
    {
        $this->db->table('usercarts')
            ->where('user_id', $userId)
            ->delete();
        $this->generateNewCartForUser($userId);
    }
}
