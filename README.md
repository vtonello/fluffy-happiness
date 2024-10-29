# Fluffy-happiness

La estructura de modelos y tablas, con sus migraciones.

De las órdenes se debe almacenar sus datos básicos, como comprador, domicilio de entrega, datos de facturación, así como también de los productos vendidos en la orden.

## Tables Structure

### customers
| Column | Type | Key |
|--------|------|-----|
| id | int | PK |
| name | string | |
| email | string | |
| phone | string | |
| created_at | datetime | |
| updated_at | datetime | |

### addresses
| Column | Type | Key |
|--------|------|-----|
| id | int | PK |
| customer_id | int | FK |
| street | string | |
| city | string | |
| state | string | |
| zip_code | string | |
| country | string | |
| is_billing | boolean | |
| is_shipping | boolean | |
| created_at | datetime | |
| updated_at | datetime | |

### orders
| Column | Type | Key |
|--------|------|-----|
| id | int | PK |
| order_number | string | |
| customer_id | int | FK |
| shipping_address_id | int | FK |
| billing_address_id | int | FK |
| subtotal | decimal | |
| tax | decimal | |
| shipping_cost | decimal | |
| total | decimal | |
| status | string | |
| created_at | datetime | |
| updated_at | datetime | |

### order_items
| Column | Type | Key |
|--------|------|-----|
| id | int | PK |
| order_id | int | FK |
| product_id | int | FK |
| quantity | int | |
| unit_price | decimal | |
| subtotal | decimal | |
| created_at | datetime | |
| updated_at | datetime


Rutas, controladores y demas, para poder crear una orden por API y luego ver su detalle.




## 🚀 Inicio Rápido

### Prerequisitos

Antes de comenzar, asegúrate de tener instalado:

- [ ] Docker
- [ ] Docker Compose
- [ ] Git (opcional)

### ⚙️ Configuración Inicial

1. Clona el repositorio (o copia los archivos de configuración)
2. Crea un archivo `.env` en la raíz del proyecto con las siguientes variables:

```env
APP_NAME=fluffy-happiness
APP_ENV=local
APP_KEY=base64:6s/9VJoGdY5byXm/lHEpW/InjmjL0nwBZaSTh+JfsxE=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://127.0.0.1:8080

DB_CONNECTION=mysql
DB_HOST=172.20.0.2
DB_PORT=3306
DB_DATABASE=fluffy-happiness
DB_USERNAME=user-fluffy-happiness
DB_PASSWORD=qwerty123
DB_ROOT_PASSWORD=${DB_PASSWORD}
```

### 🐳 Despliegue con Docker Compose

1. Levanta los contenedores:
```bash
docker-compose up -d
```

2. Verifica el estado de los contenedores:
```bash
docker-compose ps
```

### 🛠️ Configuración de Laravel

Una vez que los contenedores estén en ejecución, ejecuta los siguientes comandos:

1. Genera la clave de la aplicación:
```bash
docker-compose exec laravel php artisan key:generate
```

2. Ejecuta las migraciones:
```bash
docker-compose exec laravel php artisan migrate
```

3. Carga los datos iniciales:
```bash
docker-compose exec laravel php artisan db:seed
```

## 📝 Acceso a la Aplicación

- **Documentación API**: [http://localhost:8080/request-docs](http://localhost:8080/request-docs)

## 🔧 Comandos Útiles

### Gestión de Contenedores

```bash
# Ver logs
docker-compose logs -f

# Detener contenedores
docker-compose down

# Acceder al shell de Laravel
docker-compose exec laravel bash
```

## 📦 Estructura del Proyecto

Los contenedores principales son:

- **laravel**: Aplicación Laravel (puerto 8080)
- **database**: MariaDB (puerto 3306, interno)

## 💾 Persistencia de Datos

- Los datos de la base de datos se almacenan en el volumen `v-database`
- La carpeta `storage/app` está montada como volumen para persistencia de archivos


![](/mnt/Datos/Proyectos/fluffy-happiness/public/images/EstructuraTablas.png)
![](/mnt/Datos/Proyectos/fluffy-happiness/public/images/CrearOrdenes.png)
![](/mnt/Datos/Proyectos/fluffy-happiness/public/images/ConfirmacionOrdenPorEmail.png)
