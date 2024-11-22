<?php
    require_once 'db.php';
    Class Carrito{
        private $db;

        public function __construct()
        {
            //usa la clase Databse; y con los dos puntos se dice que usa una clase estatica
            $this->db=Database::connect();
        }
         // Agregar un producto al carrito
        public function agregarProducto($idProducto, $cantidad = 1)
        {
            session_start();
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            if (isset($_SESSION['cart'][$idProducto])) {
                $_SESSION['cart'][$idProducto]['quantity'] += $cantidad;
            } else {
                // Obtener información del producto desde la base de datos
                $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
                $stmt->bind_param("i", $idProducto);
                $stmt->execute();
                $resultado = $stmt->get_result();
                $producto = $resultado->fetch_assoc();
                if ($producto) {
                    $_SESSION['cart'][$idProducto] = [
                        'id' => $producto['id'],
                        'name' => $producto['name'],
                        'price' => $producto['price'],
                        'quantity' => $cantidad,
                        'image' => $producto['image']
                    ];
                }
            }
        }
        // Actualizar la cantidad de un producto
        public function actualizarProducto($idProducto, $cantidad)
        {
            session_start();
            if (isset($_SESSION['cart'][$idProducto])) {
                $_SESSION['cart'][$idProducto]['quantity'] = $cantidad;
            }
        }
        // Eliminar un producto del carrito
        public function eliminarProducto($idProducto)
        {
            session_start();
            if (isset($_SESSION['cart'][$idProducto])) {
                unset($_SESSION['cart'][$idProducto]);
            }
        }
        // Obtener todos los productos del carrito
        public function obtenerProductos()
        {
            return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        }
        // Obtener el total del carrito
        public function obtenerTotal()
        {
            $total = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $producto) {
                    $total += $producto['price'] * $producto['quantity'];
                }
            }
            return $total;
        }
        public function cerrarConexion(){
            mysqli_close($this->db);
        }
    }
    $objC = new Carrito();
    $objC->cerrarConexion();  
?>