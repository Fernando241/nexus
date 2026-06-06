# NEXUS

NEXUS is a modular multi-tenant SaaS platform focused on commercial management, inventory control, natural product manufacturing, and operational traceability.

The project is being built as a long-term backend engineering and software architecture exercise, emphasizing scalability, maintainability, domain separation, and real-world SaaS design principles.

---

# Vision

NEXUS is designed to evolve into a scalable SaaS ecosystem capable of supporting:

- Multi-branch commercial operations
- Natural products manufacturing workflows
- Batch and expiration traceability
- Omnichannel sales
- Inventory and warehouse management
- Subscription-based SaaS distribution
- Modular feature activation per tenant

The system is intentionally structured to simulate real production-oriented engineering decisions instead of tutorial-level development.

---

# Core Architectural Goals

- Build a scalable modular monolith
- Maintain clear domain boundaries
- Protect business rules from framework coupling
- Apply pragmatic clean architecture principles
- Develop API-first backend systems
- Support future SaaS multi-tenancy scaling
- Create maintainable and evolvable backend infrastructure

---

# Current Stack

- Laravel 13
- PHP 8.4
- Docker Compose
- MySQL 8.4
- Redis
- React (planned)
- Vite

---

# Architectural Approach

NEXUS follows a pragmatic modular monolith architecture organized by business domains.

Current internal structure:

app/
├── Domains/
│ ├── Identity/
│ ├── Product/
│ └── Shared/
│
├── Http/
├── Models/
└── Providers/

```

The architecture separates:

* Domain → business rules and core logic
* Application → use cases and orchestration
* Infrastructure → framework, persistence, and external tools

---

# Multi-Tenancy Strategy

NEXUS currently implements a shared-table multi-tenant strategy using `tenant_id` isolation.

This approach was selected because it provides:

* Lower infrastructure complexity
* Efficient scaling for SaaS workloads
* Simpler operational management
* Strong relational integrity using foreign keys

---

# Current Progress

Implemented:

* Dockerized development environment
* Laravel API-first foundation
* Modular domain structure
* Identity domain
* Product domain
* Tenant persistence
* User ↔ Tenant relationship
* Authentication with Sanctum
* CurrentUser abstraction
* CurrentTenant abstraction
* Tenant-aware query strategy
* Multi-tenant isolation tests
* Vertical slices:
  - Register User
  - Login User
  - List Users
  - Create Product
  - List Products

---

# Engineering Philosophy

NEXUS prioritizes:

* Architecture over shortcuts
* Long-term maintainability
* Incremental evolution
* Explicit domain boundaries
* Real engineering tradeoffs
* Production-oriented thinking

The project intentionally avoids premature overengineering while still maintaining clean architectural direction.

---

# Project Status

Current phase:
Multi-Tenant Foundation Completed

Current Focus:
Business Domain Expansion (Products)
```
