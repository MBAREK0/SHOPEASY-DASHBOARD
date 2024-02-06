    <?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\ClientControlller;
use App\Http\Controllers\PermessionsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */



    Route::get('/', [CategoryController::class, 'list_categories']);
    Route::get('/products', [ProductController::class, 'list_products']);
    Route::get('/roles', [RoleController::class, 'show_roles']);
    Route::post('/addRole', [RoleController::class, 'add_roles']);
    Route::get('/deleteRole/{id}', [RoleController::class, 'deleteRole']);
    Route::get('/editRole/{id}', [RoleController::class, 'editRole']);
    Route::post('/updaterole', [RoleController::class, 'update_role']);
    ////////////
    Route::get('/permessions', [PermessionsController::class, 'show_permessions']);
    Route::post('/addPermession', [PermessionsController::class, 'addPermessions']);
    Route::get('/deletePermession/{id}', [PermessionsController::class, 'deletePermessions']);
    Route::get('/editPermession/{id}', [PermessionsController::class, 'editPermessions']);
    Route::post('/updatePermession', [PermessionsController::class, 'updatePermessions']);

    Route::post('/addcategory', [CategoryController::class, 'create_category']);
    Route::post('/updateCategory', [CategoryController::class, 'update_category']);
    Route::delete('/deletecategory/{id}', [CategoryController::class, 'delete_category']);
    Route::get('/editcategory/{id}', [CategoryController::class, 'edit_category']);
    Route::get('/editproduct/{id}', [ProductController::class, 'edit_product']);
    Route::post('/updateproducts', [ProductController::class, 'update_product']);
    Route::post('/addproducts', [ProductController::class, 'add_product']);
    Route::get('/deleteproduct/{id}', [ProductController::class, 'delete_product']);
    Route::get('/clients', [ClientControlller::class, 'list_clients']);
    Route::post('/addclients', [ClientControlller::class, 'add_client']);
    Route::get('/deleteclient/{id}', [ClientControlller::class, 'delete_client']);
    Route::get('/editclient/{id}', [ClientControlller::class, 'edit_client']);
    Route::post('/updateclients/{id}', [ClientControlller::class, 'update_client']);
    Route::get('/allproducts', [ProductController::class, 'allproducts']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/registerpost', [AuthController::class, 'registerPost'])->name('registerpost');
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginpost', [AuthController::class, 'loginpost'])->name('loginpost');





