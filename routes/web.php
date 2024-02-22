    <?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\ClientControlller;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\PermessionsController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\UserController;
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
    Route::post('/updateCategory', [CategoryController::class, 'update_category']);
    Route::post('/updateproducts', [ProductController::class, 'update_product']);
    Route::post('/updaterole', [RoleController::class, 'update_role']);
    Route::post('/updateUser', [UserController::class, 'updateUsers']);
    Route::post('/updateclients/{id}', [ClientControlller::class, 'update_client']);

Route::middleware(['myAuth', 'CheckRole'])->group(function () {
    // Categories
    Route::get('/showcategory', [CategoryController::class, 'list_categories'])->name('Show-the-categories');
    Route::post('/addcategory', [CategoryController::class, 'create_category'])->name('create-category');
    Route::delete('/deletecategory/{id}', [CategoryController::class, 'delete_category'])->name('delete-category');
    Route::get('/editcategory/{id}', [CategoryController::class, 'edit_category'])->name('edit-category');

    // products
    Route::get('/products', [ProductController::class, 'list_products'])->name('Show-the-products');
    Route::get('/editproduct/{id}', [ProductController::class, 'edit_product'])->name('edit-product');
    Route::post('/addproducts', [ProductController::class, 'add_product'])->name('add-product');
    Route::get('/deleteproduct/{id}', [ProductController::class, 'delete_product'])->name('delete-product');

    // roles
    Route::get('/roles', [RoleController::class, 'show_roles'])->name('Show-the-rols');
    Route::post('/addRole', [RoleController::class, 'add_roles'])->name('add-an-role');
    Route::get('/deleteRole/{id}', [RoleController::class, 'deleteRole'])->name('delete-an-role');
    Route::get('/editRole/{id}', [RoleController::class, 'editRole'])->name('edit-an-role');
  
    // users
    Route::get('/users', [UserController::class, 'show_users'])->name('show-users');
    Route::post('/addUser', [UserController::class, 'addUsers'])->name('add-users');
    Route::get('/deleteUser/{id}', [UserController::class, 'deleteUsers'])->name('delete-users');
    Route::get('/editUser/{id}', [UserController::class, 'editUsers'])->name('edit-users');
    
    // clients
    Route::get('/clients', [ClientControlller::class, 'list_clients'])->name('show-list-clients');
    Route::post('/addclients', [ClientControlller::class, 'add_client'])->name('add-client');
    Route::get('/deleteclient/{id}', [ClientControlller::class, 'delete_client'])->name('delete-client');
    Route::get('/editclient/{id}', [ClientControlller::class, 'edit_client'])->name('edit-client');

 
      // permessions & home-page
    Route::get('/permessions', [PermessionsController::class, 'show_permessions'])->name('show-permessions');
    });

    // auth 
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/registerpost', [AuthController::class, 'registerPost']);
    Route::get('/login', [AuthController::class, 'login']);
    Route::get('/forgetpassword', [AuthController::class, 'forgetpassword']);
    Route::post('/resetpasswordPost', [AuthController::class, 'sendemail']);
    Route::post('/newpasswordPost', [AuthController::class, 'addpassword']);
    Route::get('/resetwithemail/{token}', [AuthController::class, 'reset'])->name('resetwithemail');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/loginpost', [AuthController::class, 'loginpost']);

    Route::get('/', [HomeController::class, 'index'])->name('home-page')->middleware('myAuth');
    Route::get('/filter', [HomeController::class, 'index'])->name('home-page')->middleware('myAuth');
    Route::post('/', [HomeController::class, 'index'])->name('home-page')->middleware('myAuth');
    Route::post('/filter', [HomeController::class, 'filter'])->name('home-page')->middleware('myAuth');
     

