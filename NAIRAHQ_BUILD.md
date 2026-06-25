# NairaHQ Accounting Build

Version: NairaHQ-v1.0.0
Base: Akaunting open-source Laravel accounting application
Target users: freelancers, small businesses, agencies, vendors, and SMEs.

## What this build provides

- Multi-company accounting foundation
- Customer and vendor management
- Invoices, bills, quotes, recurring documents, payments, and expenses
- Bank accounts, transfers, reconciliation, categories, taxes, reports, dashboards
- Role-based access control and API authentication foundation
- Laravel Cloud/local deployment instructions
- Admin recovery command for production support

## Staff Engineer Notes

- This package uses the existing Akaunting accounting engine as the starting point. That is safer than rebuilding ledger, tax, invoice, and permission logic from scratch.
- The right next step is product hardening: Nigerian localization, payments, tenancy strategy, plan billing, audit logs, and onboarding.
- Do not edit files directly in `vendor/`. Use Laravel services, modules, events, jobs, policies, and migrations.
- Do not expose APP_DEBUG in production. Production 500 errors must be diagnosed through Laravel Cloud logs, `storage/logs`, and Sentry/Bugsnag.

## Core Product Direction

NairaHQ should become a beginner-friendly accounting SaaS with:

- Simple dashboard: revenue, expenses, outstanding invoices, net profit
- Fast invoice creation for freelancers and SMEs
- Expense capture with receipt upload
- Customer/vendor management
- Nigerian currency defaults and tax-ready reporting
- Payment collection through Nigerian gateways in a later version
- Owner, accountant, staff, and viewer roles

