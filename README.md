## Dash: Laravel admin panel

## Installation

Install the package in any laravel app executing:

```bash
composer require josegus/laravel-dash
```

Once installed, export js and css files executing:

```bash
php artisan vendor:publish --tag:laravel-dash:assets
``` 

## Configuration

Config file is documented itself, export it executing:

```bash
php artisan vendor:publish --tag=laravel-dash:config
```

## Customizing views

Export all view files:

```bash
php artisan vendor:publish --tag=laravel-dash:views
```

Export only layout views:

```bash
php artisan vendor:publish --tag=laravel-dash:layout-views
```

Export only auth views:

```bash
php artisan vendor:publish --tag=laravel-dash:auth-views
```

## Build from source

You can export the resources (js and sass files) to make your own build executing:

``bash
php artisan vendor:publish --tag=laravel-dash:resources
``

The assets will now be located in the `resources/dash` directory.

## DataTables

The best way to use DataTables in any Laravel app is to use [laravel-datatables](https://github.com/yajra/laravel-datatables),
from [Arjay Angeles (yajra)](https://github.com/yajra). The laravel-datatables package comes with many features to
include/use datatables y many ways.

I prefer to use `datatables()` helper with ajax server side. Dash comes with an abstract class to help you build your
ajax response. Here is an example for an User model :

### 1. Create a route to data source

Since we will return a json response, api.php is a good place to put your datatable routes. You can create the path and
route name as you wish, for example:

```php
<?php

Route::get('api/users', 'UsersController@index')->name('api.users.index');
``` 

### 2. Create a class to build your query

Create a class that extends `Dash\DataTables\Datatable` abstract class. Your class must implements `query()` function
from `Datatable`.  

```php
<?php
    
namespace App\DataTables;

use App\Users;
use Dash\DataTables\Datatable;

class UsersTable extends Datatable
{
    public function query()
    {
        return Users::query();
    }
}
```

### 3. Create a controller method

Use the datatable class created before inside the controller:

```php
<?php

namespace App\Http\Controllers\Api;

use App\DataTables\UsersTable;

class UsersController
{
    public function index()
    {
        return UsersTable::generate(); 
    }
}
```
The `generate` function inside `Datatable` class will take care of build the query and return a json response,
all with server side processing.

You may be wondering: why make a class just to return a simple `Users::query()`?

Well, this is the most simple example, but as you can imagine, query data source can become more complex, for example:

```php
public function query()
{
    return Users::query()
                ->where('status', 'active')
                ->whereHas('courses', function ($courses) {
                    $courses->where('status', 'open');
                })
                ->select(['id', 'name', 'email'])
                ->with(['posts']);
}
```

To separate controllers and datatables data source, I prefer to have all datatables classes in `App\DataTables` folder.

### 4. Create view

Create an html table in any blade file:

```html
<table class="js-datatable table table-bordered table-hover table-sm table-striped" style="width: 100%;">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Options</td>
        </tr>
    </thead>
</table>
```
Push the datatable script to `scripts` yield section:
```blade
@push(config('dash.sections.scripts'))
    <script>
        $(document).ready(function () {
            const config = dataTable({
                ajax: {
                    url: url('api/users'),
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    { name: 'options' },
                ],
                columnDefs: [
                    {
                        targets: 3,
                        sortable: false,
                        searchable: false,        
                        render: function (data, type, row) {
                            return `
                                <a href="/users/${ row.id }/edit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>                                
                            `;
                        }
                    }
                ],
            });

            $('.js-datatable').DataTable(config);
        });
    </script>
@endpush
```

## Javascript helpers

Take a look at `dataTable` and `url` helpers inside this repository at [resources/js/support/helpers.js](./resources/js/support/helpers.js). 

## TODO

- Add preview images
- Link to live preview
- More components: cards, dashboard templates, etc.