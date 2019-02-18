# Change Log
All notable changes to this project will be documented in this file.

After some early deviations this project now adheres to [Semantic Versioning](http://semver.org/).

## [4.0.0-beta1] - 2018-11-12

### Added
- Added `PagesInterface`.
- Added `Driver` namespace.
- `TCPDI` backend as a complement to `FPDI`.

### Removed
- Removed deprecated symbols.
- Removed symfony finder support.

### Fixed
- Support merging PDFs of version `> 1.4` using the `TCPDI` driver.

### Changed
- Require php `>= 7.1`.
- Changed the signature of `Merger::__construct()` to consume a `driver`.
- Merger no longer resets state after merge, explicit call to `reset()` needed.
- Classes now generally marked as `final`.
- Moved `Source` to its own namespace.

## [3.1.1] - 2017-12-11

### Fixed
- Support for php 7.2 (removed assertions with string argument)

## [3.1] - 2017-10-31

### Added
- `Pages` argument to `Merger::addFinder()`.
- `Pages` argument to `Merger::addIterator()`.
- `Merger::addFile()` to replace `addFromFile()`.
- `Merger::reset()` to clear added pdfs.

### Changed
- Bumped `setasign/fpdi` dependecy version to `2.0`.
- No longer stores added content in temporary files on disk.

### Deprecated
- Methods handling temporary files in `Merger`.
- `Merger::addFromFile()`. Use `addFile()` instead.
- `Pages::getPages()`. Iterate your pages object instead.

## [3.0] - 2016-03-02

### Changed
- Now using the official FPDI package backend.

## [2.4] - 2014-11-17

### Added
- Added `setTempDir()` to Merger.

## [2.3.2] - 2014-07-07

### Changed
- PSR-4

## [2.3.1] - 2013-11-18

### Added
- Added `addFinder()` to Merger.

## [2.3] - 2013-11-18

### Changed
- Injecting FPDI is now optional.

### Added
- Added `addIterator()` to Merger.

## [2.2] - 2013-10-26

### Added
- Pages now support `addPage()` and `addRange()`.

## [2.1.1] - 2013-03-14

### Added
- Now allows merging of Landscape and Portrait pages (thanks to @willoller).

## [2.1] - 2013-01-31

### Changed
- Moved to `blendisnl` namespace.

## [2.0] - 2012-10-02

### Changed
- FPDI must be injected when creating a new libmergepdf instance.

## [1.0]
- Initial release
