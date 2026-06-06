# ADR-001: Shared Table Multi-Tenancy

## Status

Accepted

## Context

NEXUS requires tenant isolation while maintaining operational simplicity and predictable infrastructure costs.

Several multi-tenancy approaches were considered:

* Database per tenant
* Schema per tenant
* Shared database with shared tables

The platform is intended to support a growing number of small and medium businesses while remaining operationally manageable.

## Decision

NEXUS adopts a Shared Table Multi-Tenancy strategy.

Tenant ownership is represented through a tenant_id foreign key on tenant-owned records.

Examples:

* users.tenant_id
* products.tenant_id

Data isolation is enforced explicitly through application queries.

## Consequences

### Benefits

* Lower infrastructure complexity
* Easier deployment and maintenance
* Strong relational integrity
* Simpler backups and migrations
* Efficient resource utilization

### Tradeoffs

* Every tenant-owned query must be tenant-aware
* Isolation depends on application discipline
* Additional testing is required to prevent data leakage

## Related Decisions

* ADR-002 CurrentTenant Pattern
* ADR-003 Query Object Strategy (future)
