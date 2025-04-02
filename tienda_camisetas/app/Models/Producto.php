<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    
    protected $fillable = [
        'nombre', 'talla', 'precio', 'stock', 'color', 'temporada', 'material', 'descuento', 'imagen', 'equipo_id', 'proveedor_id', 'talla_id'
    ];
    
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
    
    public function talla()
    {
        return $this->belongsTo(Talla::class, 'talla_id');
    }
    
    public function carritos()
    {
        return $this->belongsToMany(Carrito::class, 'producto_carrito', 'producto_id', 'carrito_id')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
    
    // Constructor
    public function __construct($nombre = "", $equipo = null, $talla = null, $color = "", $material = "", $imagen = "")
    {
        parent::__construct();
        $this->setNombre($nombre);
        $this->equipo_id = $equipo ? $equipo->id : null;
        $this->talla_id = $talla ? $talla->id : null;
        $this->color = $color;
        $this->material = $material;
        $this->imagen = $imagen;
    }
    
    public function getID(): int
    {
        return $this->id;
    }
    
    public function getNombre(): string
    {
        return $this->nombre;
    }
    
    public function setNombre(string $nombre): void
    {
        
        $this->nombre = $nombre;
    }

    public function getPrecio(): string
    {
        return $this->precio;
    }
    
    public function setPrecio(string $precio): void
    {
        
        $this->precio = $precio;
    }
    
    public function getStock(): int
    {
        return $this->stock;
    }
    
    public function setStock(int $stock): void
    {
        if ($stock < 0) {
            throw new \InvalidArgumentException("El stock no puede ser negativo.");
        }
        $this->stock = $stock;
    }
    
    public function getDescuento(): int
    {
        return $this->descuento;
    }
    
    public function setDescuento(int $descuento): void
    {
        if ($descuento < 0 || $descuento > 100) {
            throw new \InvalidArgumentException("El descuento debe estar entre 0 y 100.");
        }
        $this->descuento = $descuento;
    }
    
    public function mostrar_info(): string
    {
        return "Producto: {$this->nombre}, Precio: {$this->precio}, Stock: {$this->stock}";
    }
    
    public function actualizar_stock(int $new_cant): void
    {
        if ($new_cant < 0) {
            throw new \InvalidArgumentException("La cantidad de stock no puede ser negativa.");
        }
        $this->stock = $new_cant;
    }
    
    public function aplicar_descuento(): int
    {
        return intval($this->precio - ($this->precio * ($this->descuento / 100)));
    }
    
    public function es_disponible(): bool
    {
        return $this->stock > 0;
    }
}
