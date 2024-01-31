    <?php

    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\ClientControlller;
    use App\Http\Controllers\ProductController;
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
