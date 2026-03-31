# Zaptilo WhatsApp API - Laravel SDK

## Overview

This is a Laravel package for sending WhatsApp template messages using Zaptilo API.

* Fully dynamic (RAW mode)
* No hardcoded templates
* Simple and flexible integration
* Supports all approved WhatsApp templates

---

## Installation

Install via Composer:

```bash
composer require zaptilo/laravel-whatsapp
```

---

## Configuration

Add the following to your `.env` file:

```env
ZAPTILO_BASE_URL=https://zaptilo.ai
ZAPTILO_AUTH_TOKEN=your_token_here
```

---

## 🔧 Publish Config (Optional)

```bash
php artisan vendor:publish --tag=zaptilo-config
```

This will create:

```bash
config/zaptilo.php
```

---

## 📌 Usage in Laravel App

### 1. Import Facade

```php
use Zaptilo;
```

---

### 2. Send Template Message (RAW)

Pass the full payload dynamically:

```php
$response = Zaptilo::sendTemplateRaw([
    "phone" => "+1234567890",
    "template" => [
        "name" => "your_template_name",
        "language" => [
            "code" => "en"
        ],
        "components" => [
            [
                "type" => "body",
                "parameters" => [
                    [
                        "type" => "text",
                        "text" => "Dynamic Value"
                    ]
                ]
            ]
        ]
    ]
]);

dd($response);
```

---

### Payload Structure

```php
[
    "phone" => "<recipient_phone_number>",
    "template" => [
        "name" => "<template_name>",
        "language" => [
            "code" => "<language_code>"
        ],
        "components" => [
            // Dynamic components based on template
        ]
    ]
]
```

---

### Best Practices

* Always construct payload dynamically, you can refer Developer tools from zaptilo
* Ensure template exists and is approved in WhatsApp Business Account

---

### 🔁 Example in Controller

```php
use Zaptilo;

class WhatsAppController extends Controller
{
    public function send()
    {
        $payload = request()->all();

        $response = Zaptilo::sendTemplateRaw($payload);

        return response()->json($response);
    }
}
```

---

## Fetch Templates

```php
$templates = Zaptilo::getTemplates();

dd($templates);
```

---

## ⚠️ Important Notes

* Follow WhatsApp Business API policies
* Payload must strictly match template structure

---

## 🏗️ Design Philosophy

This package is intentionally **RAW**:

* No abstraction layer
* No assumptions

👉 You have full control over request payload

---

## 📄 License

MIT

