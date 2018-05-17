# [MFF.dk](https://github.com/TanvirAlam/polling-system)

This is an open source project that was built and maintained by @TanvirAlam.

## Installation

### Prerequisites

*   To run this project, you must have PHP 7 installed.
*   You should setup a host on your web server for your local domain. For this you could also configure Laravel Docker (laradock).

### Step 1

Begin by cloning this repository to your machine, and installing all Composer & NPM dependencies.

```bash
git clone git@github.com:TanvirAlam/polling-system.git
cd council && composer install && npm install
php artisan council:install
npm run dev | npm run watch
```

### Step 2
