Cleanup
=========

[![Latest Stable Version](https://poser.pugx.org/visavi/cleanup/v/stable)](https://packagist.org/packages/visavi/cleanup)
[![Total Downloads](https://poser.pugx.org/visavi/cleanup/downloads)](https://packagist.org/packages/visavi/cleanup)
[![Latest Unstable Version](https://poser.pugx.org/visavi/cleanup/v/unstable)](https://packagist.org/packages/visavi/cleanup)
[![License](https://poser.pugx.org/visavi/cleanup/license)](https://packagist.org/packages/visavi/cleanup)

## Cleaning composer vendor directory

A zero-dependency CLI script that strips development junk from your `vendor`
directory: tests, documentation, CI configs, dotfiles, editor settings and
other files that packages ship but your application never loads at runtime.

Useful when deploy size matters: shared hosting with inode/disk quotas,
Docker images, serverless bundles, or just keeping backups smaller.
Depending on the dependencies, it typically shaves off 10–30% of vendor
size and thousands of files.

## How it works

The script walks the `vendor` tree and deletes files and directories
matching the built-in pattern list (see below). Matching is
case-insensitive, so `tests`, `Tests` and `TESTS` are all caught.

Safety measures:

* **Symlinks are never followed.** A symlinked package (e.g. a composer
  `path` repository) is left untouched, and symlinks inside deleted
  directories are removed as links only — the target survives.
* **Refuses to run outside vendor.** The script checks that it is
  installed next to `vendor/autoload.php` and exits otherwise, so an
  accidental run from a repo checkout cannot sweep your home directory.
* **Dry mode.** Run with `--dry` first to preview what would be deleted.

> **Note:** cleaning vendor is meant for the final deploy artifact.
> After cleanup, things like `composer dump-autoload`, package tests or
> docs are gone — reinstall with `composer install` to get them back.
> Some licenses formally require the license text to be distributed with
> the code; keep that in mind and use `--exclude license` if it matters
> for your case.

## Requirements

PHP >= 8.0

## Installing

```
composer require visavi/cleanup
```

## Run

```
./vendor/bin/cleanup
```

Preview without deleting:

```
./vendor/bin/cleanup --dry
```

## Options

| Option | Short | Description |
|---|---|---|
| `--help` | `-h` | Display help message |
| `--include` | `-i` | Add patterns to the built-in list, comma separated |
| `--exclude` | `-e` | Remove patterns from the built-in list, comma separated |
| `--verbose` | `-v` | Print every deleted file instead of progress dots |
| `--path` | `-p` | Clean only a specific path inside vendor |
| `--dry` | `-d` | List what would be deleted without removing anything |

## Examples

Clean only symfony packages, also delete archives, but keep docs and tests:

```
./vendor/bin/cleanup -v --path symfony --include '*.zip,*.rar' --exclude doc,docs,test
```

Keep license files:

```
./vendor/bin/cleanup --exclude license
```

Strip files from a single flat directory (e.g. drop all Carbon locale files
your app does not use):

```
./vendor/bin/cleanup --path nesbot/carbon/src/Carbon/Lang --include '*.php'
```

Typical deploy step:

```
composer install --no-dev --optimize-autoloader
./vendor/bin/cleanup
```

## Default patterns

* .git
* .github
* .circleci
* .idea
* .vscode
* .psalm
* .temp
* test
* tests
* demo
* example
* examples
* doc
* docs
* benchmark
* benchmarks
* license
* authors*
* changelog*
* changes*
* faq*
* contributing*
* history*
* upgrading*
* upgrade*
* readme*
* makefile
* *.yml
* .*.yml
* *.yaml
* .*.yaml
* *.md
* *.rst
* *.txt
* *.dist
* *.neon
* *.cache
* phpunit.xml
* phpcs.xml
* psalm.xml
* .php_cs*
* .php-cs-fixer*
* .gitignore
* .gitattributes
* .gitmodules
* .editorconfig
* .dockerignore
* .mailmap
* .ds_store
* .phpstorm.meta.php
* dockerfile*
* docker-compose*
* composer.lock

## License

The class is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
