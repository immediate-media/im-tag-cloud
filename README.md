# IM Tag Cloud

`IM Tag Cloud` is a Wordpress Plugin that allows to include a tag cloud on specific post types for sites.

This plugin was created using the IM plugin skeleton [immediate/im-wp-plugin](https://github.immediate.co.uk/WCP-Packages/im-wp-plugin).

## Static Analysis
This plugin comes with the following pre-configured static analysis checks:
- PHPMD
- PHPCS
- PHPUnit
- PHPLint

These can be run as a group or individually using the commands defined in composer.json (under the 'scripts' key).

### Running Locally
Two options exist when running these tests locally:
- Ensure that your environment has the correct version of PHP (and/or extensions) setup
- Run via docker

Note that both options require you to have set up a `COMPOSER_AUTH` environment variable in order to allow composer access to our private packages and that you will need to be on the VPN

To run the checks on the host system directly run:
- `$ composer update`
- `$ composer run-tests`

To run the checks via docker run:
- `$ docker buildx build --secret id=COMPOSER_AUTH -f docker/Dockerfile -t php-docker .`
- `$ docker run php-docker composer run-tests`
