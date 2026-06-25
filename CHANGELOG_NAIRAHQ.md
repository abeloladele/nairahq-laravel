# NairaHQ Changelog

## NairaHQ-v1.0.2

### Fixed
- Fixed Laravel Cloud Composer build failure caused by PHP 8.5.7 runtime incompatibility.
- Pinned application runtime requirement to PHP `~8.3.0` because the locked `lcobucci/jwt 5.3.0` package does not support PHP 8.4 or 8.5.
- Added Composer `config.platform.php` override to `8.3.0`.
- Added Laravel Cloud PHP 8.3 deployment instructions.

### Security / Stability
- Avoided `--ignore-platform-reqs` because it can hide incompatible packages and cause production runtime failures.

## NairaHQ-v1.0.1

### Fixed
- Added initial Laravel Cloud PHP compatibility notes.

## NairaHQ-v1.0.0

### Added
- Initial NairaHQ accounting starter package based on Akaunting.
