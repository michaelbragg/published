# Published, a WordPress theme.

[![license](https://img.shields.io/github/license/michaelbragg/published.svg)](https://github.com/michaelbragg/published)  [![Build Status](https://travis-ci.org/michaelbragg/published.svg?branch=master)](https://travis-ci.org/michaelbragg/published)  [![GitHub release](https://img.shields.io/github/release/michaelbragg/published.svg)](https://github.com/michaelbragg/published)  [![Packagist](https://img.shields.io/packagist/v/michaelbragg/published.svg)](https://packagist.org/packages/michaelbragg/published)  [![Packagist](https://img.shields.io/packagist/dt/michaelbragg/published.svg)](https://packagist.org/packages/michaelbragg/published)  [![GitHub issues](https://img.shields.io/github/issues/michaelbragg/published.svg)](https://github.com/michaelbragg/published)  [![Libraries.io for GitHub](https://img.shields.io/librariesio/github/michaelbragg/published.svg)](https://github.com/michaelbragg/published)

An elegant minimal WordPress theme.

- [Readme](https://github.com/michaelbragg/published/blob/master/readme.md)
- [Issues](https://github.com/michaelbragg/published/issues/)
- [Continuous Integration](https://codeship.com/projects/xxxxx/)
- [Production](https://www.michaelbragg.nested/)

## Dependencies

- [GIT](https://git-scm.com/downloads/)
- [PHP](http://www.php.net/)
- [NodeJS](https://nodejs.org/)

## Installation

*We recommend installing this dependancy via Composer.*

### As a Composer Dependancy

To include these standards as part of a project. Require this repository
as a development dependancy:

```
composer require michaelbragg/published
```

## Making Your Changes

Make your changes locally on a new branch based off `origin/master`. Commit your changes to your new branch and regularly push your work to the same named branch on the server.
When you need feedback or help, or you think the branch is ready for merging, open a pull request.
After someone else has reviewed and signed off on the feature, you can merge it into master.

## Documentation

During the Alpha/Beta stages, due to constant changes, documentation will be mainly written in-line. With a dedicated section being created at the first major release.

### Folder Structure

```
├── _assets/
│   └── ui/
├── _scripts/
│   └── qa
├── ui/
├── inc/
│   ├── assets.php
│   ├── media.php
│   └── template-tags.php
├── js/
├── languages/
├── module-templates/
├── page-templates/
├── template-parts/
├── comments.php
├── composer.json
├── footer.php
├── functions.php
├── header.php
├── index.php
├── package.json
└── readme.md
```

- `_assets/` stores the pre-processed source files and artwork.
- `_scripts/` holds the bash scripts used for setting up and running tasks on the repository.

## Reporting Issues

If you spot any issues please create a ticket via GitHub's [Issue Tracker](https://github.com/michaelbragg/published/issues/). Including the issue, the browser and operating system, and how to replicate it. If the issue is security related please use the contact information below.

## Contributing to this project

This project follow the WordPress Coding Standard for [PHP](https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/), [HTML](https://make.wordpress.org/core/handbook/best-practices/coding-standards/html/), [CSS](https://make.wordpress.org/core/handbook/best-practices/coding-standards/css/) and [JavaScript](https://make.wordpress.org/core/handbook/best-practices/coding-standards/javascript/).

## Contact

Michael Bragg - [michael@michaelbragg.net](michael@michaelbragg.net)

## Copyright

Unless otherwise stated © Michael Bragg. All rights reserved.
