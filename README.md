# odtPHP

OdtPHP is a PHP librairy designed to use OpenDocument file as a template for PHP. It's a kind of PHPLib for OpenOffice
document.

http://sourceforge.net/projects/odtphp/

## Requirements and compatibility

PHP 7.1 or later and the `iconv` extension are required. PHP 5.3 through 7.0 are no longer supported.

The native PHP ZIP extension is recommended. ODF template generation has been verified on PHP 7.1.33, 7.4.33, 8.2.34,
and 8.4.26 with `E_ALL` enabled, including Unicode values, XML escaping, multiple pages, styles, images, and nested
segments. Both `PhpZipProxy` and the bundled `PclZipProxy` have been checked for variable replacement and reading and
exporting ODT archives with ZIP comments.

`Odf::setVars()` and `Segment::setVars()` use UTF-8 by default. Their legacy `ISO-8859` charset selector means
ISO-8859-1 (Latin-1); these values are converted to UTF-8 before optional XML escaping.

The bundled PclZip API has limitations outside normal ODF template generation:

- `PCLZIP_OPT_BY_EREG` still depends on the removed PHP `ereg()` function. Use `PCLZIP_OPT_BY_PREG` instead.
- General-purpose `PclZip::merge()` has a pre-existing defect that can corrupt second-entry offsets. Archive merging is
  not supported by this compatibility fix.
