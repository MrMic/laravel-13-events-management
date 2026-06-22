## [5.22.1] - 2026-06-22

### 🚀 Features

- *(policies)* Add authorization policies for attendee and event

### 🐛 Bug Fixes

- *(models)* Type relations so reminder command resolves attendees

### ⚙️ Miscellaneous Tasks

- *(changelog)* Update CHANGELOG.md
## [5.19.1] - 2026-06-10

### 🚀 Features

- *(auth)* Add authorization gates and middleware

### ⚙️ Miscellaneous Tasks

- *(changelog)* Update CHANGELOG.md
- Ignore php-cs-fixer cache files
## [5.17.1] - 2026-06-08

### 🚀 Features

- *(auth)* Implement logout endpoint with token revocation

### ⚙️ Miscellaneous Tasks

- *(changelog)* Update CHANGELOG.md
## [5.15.1] - 2026-06-04

### 🚜 Refactor

- *(auth)* Migrate EventController to HasMiddleware interface

### ⚙️ Miscellaneous Tasks

- *(changelog)* Update CHANGELOG.md
## [5.14.1] - 2026-06-02

### 🚀 Features

- *(api)* Add auth endpoints and static analysis tooling

### ⚙️ Miscellaneous Tasks

- *(changelog)* Update CHANGELOG.md
## [5.13.1] - 2026-05-20

### 🚜 Refactor

- *(api)* Extract CanLoadRelationships trait

### ⚙️ Miscellaneous Tasks

- *(changelog)* Update CHANGELOG.md
## [5.11.1] - 2026-05-12

### 🚀 Features

- *(api)* Add optional relation loading to events index
## [5.10.1] - 2026-05-11

### 🚀 Features

- *(api)* Implement CRUD endpoints for attendees

### ⚙️ Miscellaneous Tasks

- *(changelog)* Update CHANGELOG.md
- *(changelog)* Update CHANGELOG.md
## [5.9.1] - 2026-05-07

### 🚀 Features

- *(api)* Add API resources for Event, Attendee, and User

### ⚙️ Miscellaneous Tasks

- *(changelog)* Update CHANGELOG.md
## [5.8.1] - 2026-05-06

### 🚀 Features

- *(api)* Implement update and destroy endpoints for events

### ⚙️ Miscellaneous Tasks

- *(changelog)* Update CHANGELOG.md
## [5.7.1] - 2026-05-05

### 🚀 Features

- *(api)* Implement store endpoint for events

### ⚙️ Miscellaneous Tasks

- *(changelog)* Update CHANGELOG.md
## [5.6.1] - 2026-05-04

### 🚀 Features

- *(api)* Implement index and show endpoints for events

### ⚙️ Miscellaneous Tasks

- Add changelog, cliff config, and README link
- *(changelog)* Add GitHub Action to auto-update CHANGELOG.md
- *(changelog)* Update CHANGELOG.md
## [5.5.0] - 2026-05-01

### 🚀 Features

- *(api)* Scaffold events & attendees REST API with Sanctum
- *(db)* Add seeders and factory for events and attendees
