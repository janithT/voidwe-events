<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Intro

<p>  This is an API-based Laravel application designed to ingest and manage event data from devices. 

The system is built in a SaaS-style, multi-tenant-friendly architecture. </p>

## Technology used

- Laravel Framework 12
- API Key–based authentication (X-API-KEY)
- Middleware for authentication and request handling
- Form Request validation classes
- Service layer for business logic
- Eloquent ORM with migrations and models
- Laravel Queues & Jobs
- Custom Laravel logging channels

## Key Features

- Event ingestion API (POST /api/events)
- Event listing API with filters and pagination (GET /api/events)
- API key–based authentication
- Idempotent event handling
- Background job processing
- Multi-tenant–ready data model
- Dedicated logging channel for event processing

## How to run

- Clone the project.
- Run composer install.
- php artisan migrate.
- php artisan serve. 
- php artisan queue:work for start background process.

## Time

- Setup and implementation - 3 hours
- Documentation - 1.5 hours

## Sample requests

- GET : /api/v1/events?tenant_key=acme&device_uid=DEV-001&type=location
- POST : /api/v1/events/