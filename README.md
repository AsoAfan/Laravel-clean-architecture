# Laravel Clean Architecture

A modular, scalable, and maintainable Laravel project following the principles of **Clean Architecture**. This architecture separates concerns into layers: **Domain**, **Application**, **Infrastructure**, and **Presentation**.

---

## 🧱 Project Structure

```
app/
├── Application/        # Use Cases, DTOs, Interfaces
├── Domain/             # Entities, Value Objects, Domain Services
├── Infrastructure/     # Persistence, External services, Framework logic
├── Presentations/      # Presentation layer (Controllers, Routes, ...etc)
├── Providers/          # Service Providers
```

---

## 🧠 Architecture Overview

- **Domain**: Core business rules (pure PHP). No Laravel dependencies.
- **Application**: Use cases and service contracts. Also, framework-agnostic.
- **Infrastructure**: Implements Application interfaces using Laravel features (e.g., Eloquent, Queues).
- **Presentation**: Routes, Controllers, Middleware — Laravel-specific input/output layer.
- **Providers**: Laravel service providers for bootstrapping and binding services.

---

## 🔧 Path Helper Functions

To simplify file handling and maintain structure across layers, we provide Laravel-style path helpers.

### 📁 Located in:
```
app/Support/helpers.php
```

### 🧩 Available Helpers:
```php
infrastructure_path('Support/SomeFile.php');
domain_path('User/Entities/UserEntity.php');
application_path('User/UseCases/CreateUser.php');
```

### ⚙️ Setup
Make sure it's autoloaded in `composer.json`:

```json
"autoload": {
  "files": [
    "app/Support/helpers.php"
  ]
}
```

Then run:

```bash
composer dump-autoload
```

---

## 📦 Installation

```bash
git clone https://github.com/AsoAfan/Laravel-clean-architecture.git
cd Laravel-clean-architecture
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

---

## 📚 Commands

- `php artisan serve` — Start the Laravel dev server
- `php artisan test` — Run the test suite
- Working on more commands...

---

## ✅ Best Practices

### Domain Layer
| Component           | Suggested Path         | Layer  | Reason / Notes                                         |
|---------------------|------------------------|--------|--------------------------------------------------------|
| **Entities**        | `Domain/Entities/`     | Domain | Core business models (e.g., `UserEntity`).             |
| **ValueObjects**    | `Domain/ValueObjects/` | Domain | Encapsulate small, immutable concepts (e.g., `Email`). |
| **Domain Services** | `Domain/Services/`     | Domain | Logic that doesn’t belong to a single entity.          |
| **Domain Events**   | `Domain/Events/`       | Domain | Optional: pure business events.                        |
| **Aggregates**      | `Domain/Aggregates/`   | Domain | Optional: aggregate roots, if using DDD.               |

### Application Layer
| Component          | Suggested Path                                        | Layer       | Reason / Notes                                     |
|--------------------|-------------------------------------------------------|-------------|----------------------------------------------------|
| **UseCases**       | `Application/UseCases/`                               | Application | Core business logic, orchestrates flow.            |
| **DTOs**           | `Application/DTOs/`                                   | Application | Transfer data between layers.                      |
| **Interfaces**     | `Application/Interfaces/` or `Application/Contracts/` | Application | Defines contracts for repositories, services, etc. |
| **Services**       | `Application/Services/`                               | Application | Domain-related services reused across use cases.   |
| **Tasks**          | `Application/Tasks/`                                  | Application | Optional for reusable logic blocks.                |
| **Jobs** (generic) | `Application/Jobs/`                                   | Application | Only if they are framework-agnostic (pure PHP).    |


### Infrastructure Layer
| Component                     | Suggested Path                             | Layer            | Reason / Notes                                          |
|-------------------------------|--------------------------------------------|------------------|---------------------------------------------------------|
| **Jobs (Queueable)**          | `Infrastructure/Jobs/`                     | Infrastructure   | Laravel jobs using queues, framework-dependent.         |
| **Notifications**             | `Infrastructure/External/Notifications/`   | Infrastructure   | External communication: email, SMS, etc.                |
| **Mails**                     | `Infrastructure/External/Mails/`           | Infrastructure   | Mailables, tied to framework.                           |
| **Events** (Laravel)          | `Infrastructure/Events/`                   | Infrastructure   | Framework events (UserRegistered, etc.).                |
| **Listeners**                 | `Infrastructure/Listeners/`                | Infrastructure   | Handle Laravel events (e.g., dispatch job, send email). |
| **Console Commands**          | `Infrastructure/Console/Commands/`         | Infrastructure   | Artisan commands.                                       |
| **Policies**                  | `Infrastructure/Authorizations/Policies/`  | Infrastructure   | Authorization logic (Laravel-specific).                 |
| **Exceptions**                | `Infrastructure/Exceptions/`               | Infrastructure   | Centralized exception handling.                         |
| **Support (Helpers)**         | `Infrastructure/Support/`                  | Infrastructure   | Shared helpers like `infrastructure_path()`.            |
| **Repositories (Eloquent)**   | `Infrastructure/Persistence/Repositories/` | Infrastructure   | Implementation of repository interfaces.                |
| **Models (Eloquent)**         | `Infrastructure/Persistence/Models/`       | Infrastructure   | Framework ORM models, tied to DB.                       |
| **Migrations**                | `Infrastructure/Persistence/Migrations/`   | Infrastructure   | Laravel-specific, part of DB setup.                     |
| **Observers**                 | `Infrastructure/Persistence/Observers/`    | Infrastructure   | Laravel observers for model events.                     |



### Presentation Layer
| Component       | Suggested Path                                 | Layer        | Reason / Notes                                             |
|-----------------|------------------------------------------------|--------------|------------------------------------------------------------|
| **Controllers** | `Http/Controllers/`                            | Presentation | Entry point for requests, stays near routing.              |
| **Routes**      | `routes/` or `Http/routes/`                    | Presentation | Laravel-specific, but you can group by module/version.     |
| **Requests**    | `Http/Requests/`                               | Presentation | For input validation, tied to Laravel's request lifecycle. |
| **Responses**   | `Http/Responses/` or `Infrastructure/Support/` | Presentation | For consistent API responses (e.g., `ApiResponse`).        |
| **Middlewares** | `Http/Middleware/`                             | Presentation | Laravel-specific, part of routing lifecycle.               |

### Presentation Layer
| Component             | Suggested Path   | Layer     | Reason / Notes                                          |
|-----------------------|------------------|-----------|---------------------------------------------------------|
| **Service Providers** | `Providers/`     | Framework | Laravel bootstrapping — registering bindings, services. |

---


You may test each layer independently or mock dependencies using Laravel's testing helpers.

---

## 🙌 Credits

Inspired by:
- Uncle Bob’s Clean Architecture
- Laravel Hexagonal Architecture
- DDD principles

