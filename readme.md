Cleanup
=========

[![Latest Stable Version](https://poser.pugx.org/visavi/cleanup/v/stable)](https://packagist.org/packages/visavi/cleanup)
[![Total Downloads](https://poser.pugx.org/visavi/cleanup/downloads)](https://packagist.org/packages/visavi/cleanup)
[![Latest Unstable Version](https://poser.pugx.org/visavi/cleanup/v/unstable)](https://packagist.org/packages/visavi/cleanup)
[![License](https://poser.pugx.org/visavi/cleanup/license)](https://packagist.org/packages/visavi/cleanup)

###Cleaning composer vendor directory

It cleans up any tests, descriptions, documentation, examples, etc.

* test
* tests
* Tests
* travis
* demo
* example
* examples
* doc
* docs
* README*
* LICENSE*
* CHANGELOG*
* FAQ*
* CONTRIBUTING*
* HISTORY*
* UPGRADING*
* UPGRADE*
* package*
* readme*
* .travis.yml
* .scrutinizer
* .yml
* phpunit.xml*
* phpunit.php
* *.md
* .gitignore
* composer.json
    
### Installing

```
composer require visavi/cleanup
```
   
### Run
```
./vendor/bin/cleanup
```

### Option
include - include new rules pattern

exclude - excludes from the pattern rule

*the list of arguments must be passed by a comma*

### Example
```
./vendor/bin/cleanup --include *.lock,*.txt --exclude doc,docs,test
```

### License

The class is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
