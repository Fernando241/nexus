# ADR-002: CurrentTenant Pattern

## Status

Accepted

## Context

Application services frequently require access to the tenant currently associated with the authenticated user.

Direct framework access through Auth::user() inside business logic would create unnecessary coupling between application code and Laravel.

## Decision

NEXUS introduces a CurrentTenant contract.

Use cases depend on the abstraction:

CurrentTenant

instead of directly depending on Laravel authentication services.

Current implementation:

LaravelCurrentTenant

resolves the tenant identifier from the authenticated user.

## Consequences

### Benefits

* Reduced framework coupling
* Explicit tenant access
* Easier testing
* Consistent tenant resolution across domains

### Tradeoffs

* Additional abstraction layer
* Requires dependency injection bindings

## Example Flow

Controller
→ UseCase
→ CurrentTenant
→ Query Object
→ Database

## Related Decisions

* ADR-001 Shared Table Multi-Tenancy
