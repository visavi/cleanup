Cleanup
=========

[![Latest Stable Version](https://poser.pugx.org/visavi/cleanup/v/stable)](https://packagist.org/packages/visavi/cleanup)
[![Total Downloads](https://poser.pugx.org/visavi/cleanup/downloads)](https://packagist.org/packages/visavi/cleanup)
[![Latest Unstable Version](https://poser.pugx.org/visavi/cleanup/v/unstable)](https://packagist.org/packages/visavi/cleanup)
[![License](https://poser.pugx.org/visavi/cleanup/license)](https://packagist.org/packages/visavi/cleanup)

## Cleaning composer vendor directory

It cleans up any tests, descriptions, documentation, examples, etc.

* .git
* .github
* test
* tests
* travis
* demo
* example
* examples
* doc
* docs
* license
* changelog*
* changes*
* faq*
* contributing*
* history*
* upgrading*
* upgrade*
* readme*
* {,.}*.yml
* *.md
* *.xml
* *.txt
* *.dist
* *.neon
* .php_cs*
* .scrutinizer
* .gitignore
* .gitattributes
* .editorconfig
* .phpstorm.meta.php
* dockerfile
* composer.lock

## Installing

```
composer require visavi/cleanup
```
   
## Run
```
./vendor/bin/cleanup
```

## Option
--help (-h) - Display help message

--include (-i) - include new rules pattern

--exclude (-e) - excludes from the pattern rule

--verbose (-v) - Increase the verbosity of messages

--path (-p) - Find on specific path

--dry (-d) - Run without actual remove

*the list of arguments must be passed by a comma*

## Example
```
./vendor/bin/cleanup -v --path symfony --include *.zip,*.rar --exclude doc,docs,test
```

## License

The class is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
