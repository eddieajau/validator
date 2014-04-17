# Contributing to this Package

## Testing

Clone the repository to your local system.

Have Composer dump the autoload files.

```bash
$ composer dump-autoload
```

Run the unit tests.

```bash
$ phpunit
PHPUnit 4.0.12 by Sebastian Bergmann.

Configuration read from /.../validator/phpunit.xml

............................

Time: 203 ms, Memory: 9.75Mb

OK (28 tests, 34 assertions)
```

Run the code sniffer with the [Joomla](https://github.com/joomla/coding-standards) standard.

## Releasing

Create an annotated tag for the version number (no prefix or suffix). Use the full [SemVer](http://semver.org) number.

```bash
$ git tag -a 1.0.0 -m "Tagging version 1.0.0"
```

Push the tag to the repository.

```bash
$ git push --tags origin
```
