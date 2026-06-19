# PHP_Laravel10_Shortcodes


## Project Description

PHP_Laravel10_Shortcodes is a Laravel 10-based dynamic shortcode processing application that demonstrates how custom shortcodes can be converted into HTML output using a shortcode parsing system.

The project allows users to write WordPress-like shortcodes inside a text editor and automatically renders them into styled HTML components such as alerts, badges, and buttons. It uses the tehwave/laravel-shortcodes package to handle shortcode compilation and provides a clean, modern UI for input and preview.

This project is designed to showcase custom shortcode implementation, Laravel package integration, and dynamic content rendering.


## Key Features

🔹 WordPress-like Shortcode System

🔹 Custom Shortcodes (Alert, Badge, Button)

🔹 Dynamic Shortcode Parsing to HTML

🔹 Live Preview of Rendered Output

🔹 Laravel 10 Integration

🔹 Clean and Modern UI Design

🔹 Bootstrap-based Responsive Layout

🔹 Secure and Scalable Architecture

🔹 Easy-to-Extend Shortcode System

🔹 Reusable Component-based Structure



## Technologies Used

* Laravel 10
* PHP 8+
* MySQL
* Bootstrap 5
* HTML5
* CSS3
* Laravel Blade Templates
* Composer
* tehwave/laravel-shortcodes Package



## Project Highlights

✨ Implementation of WordPress-style shortcodes in Laravel
✨ Custom shortcode classes for reusable UI components
✨ Real-time parsing of user input into HTML output
✨ Clean MVC architecture (Controller + Views + Config)
✨ Package-based integration for scalability
✨ Modern dark-themed UI for better UX
✨ Beginner-friendly and interview-ready project



## Application Flow

1. User opens the Shortcode Editor page
2. User writes shortcodes in textarea
3. System sends content to controller
4. Laravel Shortcode package parses content
5. Shortcodes are converted into HTML
6. Rendered output is displayed on preview panel
7. User views formatted UI components instantly


## Requirements

- PHP 8.1+
- Composer
- MySQL
- Laravel 10
- Node.js (optional for frontend assets)


---



## Installation Steps


---


## STEP 1: Create Laravel 10 Project

### Open terminal / CMD and run:

```
composer create-project laravel/laravel PHP_Laravel10_Shortcodes "10.*"

```

### Go inside project:

```
cd PHP_Laravel10_Shortcodes

```

#### Explanation:

Creates a fresh Laravel 10 application using Composer.

This is the base structure for building the Shortcodes system.




## STEP 2: Database Setup 

### Update database details:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel10_shortcodes
DB_USERNAME=root
DB_PASSWORD=

```

### Create database in MySQL / phpMyAdmin:

```
Database name: laravel10_shortcodes


```



#### Explanation:

Configures MySQL connection inside .env file.

Database stores all application data like posts and content.




## STEP 3: Install Package

### Run:

```
composer require tehwave/laravel-shortcodes

```

#### Explanation:

Installs tehwave/laravel-shortcodes via Composer.

This package provides shortcode parsing functionality.




## STEP 4: Publish Configuration

### Run:

```
php artisan vendor:publish --provider="Tehwave\Shortcodes\ShortcodesServiceProvider"

```

#### Explanation:

Publishes package config into Laravel project.

Allows customization of shortcode behavior and settings.





## STEP 5: Create Shortcodes Folder


### Make:

```
app/
└── Shortcodes/
    ├── AlertShortcode.php
    ├── ButtonShortcode.php
    └── BadgeShortcode.php

```

### app/Shortcodes/AlertShortcode.php

```
<?php

namespace App\Shortcodes;

use tehwave\Shortcodes\Shortcode;

class AlertShortcode extends Shortcode
{
    protected $tag = 'alert';

    public function handle(): ?string
    {
        return '<div class="alert alert-warning">'
            . $this->body .
            '</div>';
    }
}

```


### app/Shortcodes/ButtonShortcode.php

```
<?php

namespace App\Shortcodes;

use tehwave\Shortcodes\Shortcode;

class ButtonShortcode extends Shortcode
{
    protected $tag = 'button';

    public function handle(): ?string
    {
        $url = $this->attributes['url'] ?? '#';

        return sprintf(
            '<a href="%s" target="_blank" class="btn btn-primary">
                %s
            </a>',
            $url,
            $this->body
        );
    }
}

```

### app/Shortcodes/BadgeShortcode.php

```
<?php

namespace App\Shortcodes;

use tehwave\Shortcodes\Shortcode;

class BadgeShortcode extends Shortcode
{
    protected $tag = 'badge';

    public function handle(): ?string
    {
        return '<span class="badge bg-success">'
            .$this->body.
            '</span>';
    }
}

```

#### Explanation: 

Creates custom shortcode classes (Alert, Button, Badge).

Each class defines how a shortcode will render HTML.




## STEP 6: Update Config File

### config/shortcode.php

```
<?php

return [
    'shortcodes' => [
        'alert' => App\Shortcodes\AlertShortcode::class,
        'badge' => App\Shortcodes\BadgeShortcode::class,
        'button' => App\Shortcodes\ButtonShortcode::class,
    ],
];

```


#### Explanation: 

Registers all shortcode classes inside config/shortcode.php.

Laravel uses this file to map tags to classes.



## STEP 7: Create Controller

### Run:

```
php artisan make:controller ShortcodeController

```

### app/Http/Controllers/ShortcodeController.php

```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use tehwave\Shortcodes\Shortcode;

class ShortcodeController extends Controller
{
    public function index()
    {
        return view('shortcodes.index');
    }

    public function parse(Request $request)
    {
        $content = $request->content;

        $parsedContent = Shortcode::compile($content);

        return view(
            'shortcodes.index',
            compact('content', 'parsedContent')
        );
    }
}

```


#### Explanation: 

Handles input and processes shortcode parsing logic.

Converts raw shortcode text into HTML output.





## STEP 8: Add Routes

### routes/web.php

```
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortcodeController;

Route::get('/', [ShortcodeController::class, 'index']);

Route::post(
    '/parse',
    [ShortcodeController::class, 'parse']
);

```

#### Explanation: 

Defines URLs for opening page and submitting form.

Connects browser requests to controller methods.



## STEP 9: Create Blade UI


### resources/views/shortcodes/index.blade.php


```
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Shortcode Studio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            font-family: 'Inter', sans-serif;
            color: #e5e7eb;
        }

        /* TOP BAR */
        .topbar {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            padding: 18px 30px;
            border-bottom: 1px solid #1f2937;
        }

        .topbar h1 {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            color: #f8fafc;
        }

        .topbar span {
            font-size: 12px;
            color: #94a3b8;
        }

        /* MAIN CONTAINER */
        .container-box {
            max-width: 1200px;
            margin: 40px auto;
        }

        /* GRID */
        .layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        @media(max-width: 768px) {
            .layout {
                grid-template-columns: 1fr;
            }
        }

        /* CARD STYLE */
        .card-box {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .label {
            font-size: 13px;
            font-weight: 600;
            color: #94a3b8;
            margin-bottom: 10px;
        }

        /* TEXTAREA EDITOR */
        textarea {
            width: 100%;
            background: #0b1220;
            border: 1px solid #1f2937;
            border-radius: 12px;
            padding: 15px;
            min-height: 280px;
            color: #e5e7eb;
            font-family: monospace;
            font-size: 13px;
            outline: none;
        }

        textarea:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 2px rgba(56, 189, 248, 0.2);
        }

        /* BUTTON */
        .btn-run {
            margin-top: 15px;
            width: 100%;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-run:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(34, 197, 94, 0.3);
        }

        /* =========================
           MODERN OUTPUT UI
        ========================== */

        .modern-output {
            background: #0b1220;
            border: 1px solid #1f2937;
            border-radius: 14px;
            overflow: hidden;
        }

        .output-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            background: #111827;
            border-bottom: 1px solid #1f2937;
            font-size: 13px;
            font-weight: 600;
            color: #94a3b8;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 10px #22c55e;
        }

        .output-body {
            padding: 18px;
            min-height: 280px;
            color: #e5e7eb;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #64748b;
        }

        .empty-state .icon {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .output-body .alert {
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .output-body .btn {
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <div class="topbar">
        <h1>📘 Laravel Shortcode Studio</h1>
        <span>Convert shortcodes into dynamic HTML output</span>
    </div>

    <div class="container container-box">

        <form method="POST" action="/parse">
            @csrf

            <div class="layout">

                <!-- INPUT -->
                <div class="card-box">

                    <div class="label">✏️ Shortcode Editor</div>

                    <textarea name="content">
{{ $content ?? '[alert]Welcome to Laravel Shortcode Studio[/alert]

[badge]New Feature[/badge]

[button url="https://laravel.com"]Explore Laravel[/button]' }}
                    </textarea>

                    <button class="btn-run">
                        ▶ Run Shortcode Parser
                    </button>

                </div>

                <!-- OUTPUT (UPDATED ONLY THIS SECTION UI) -->
                <div class="card-box">

                    <div class="label">📄 Rendered Preview</div>

                    <div class="modern-output">

                        <div class="output-header">
                            <span>📄 Live Preview</span>
                            <span class="status-dot"></span>
                        </div>

                        <div class="output-body">

                            @isset($parsedContent)
                                {!! $parsedContent !!}
                            @else
                                <div class="empty-state">
                                    <div class="icon">⚡</div>
                                    <p>Run parser to see output here</p>
                                </div>
                            @endisset

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</body>

</html>
 
```



#### Explanation: 

Builds frontend interface for editor and preview.

Shows input area and rendered shortcode output.




## STEP 10: Run the Application  

### Start dev server:

```
php artisan serve

```


### Open in browser:

```
http://127.0.0.1:8000

```

#### Explanation:

Starts Laravel development server using Artisan.

Allows testing project in browser at localhost.



## Expected Output:

<img width="1911" height="951" alt="Screenshot 2026-06-19 164505" src="https://github.com/user-attachments/assets/057e5ebc-3735-4751-935d-8de4d968b6a1" />

<img width="1914" height="950" alt="Screenshot 2026-06-19 175532" src="https://github.com/user-attachments/assets/de351b2a-799c-4f68-af60-cfb55e7d2cee" />


---



## Project Folder Structure

```
PHP_Laravel10_Shortcodes/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── ShortcodeController.php
│   │
│   ├── Providers/
│   │   └── AppServiceProvider.php
│   │
│   └── Shortcodes/
│       ├── AlertShortcode.php
│       ├── ButtonShortcode.php
│       └── BadgeShortcode.php
│
├── config/
│   └── shortcode.php
│
├── resources/
│   └── views/
│       └── shortcodes/
│           └── index.blade.php
│
├── routes/
│   └── web.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   └── (assets)
│
├── vendor/
│   └── (composer packages)
│
├── .env
├── composer.json
├── package.json
├── artisan
└── README.md
```
