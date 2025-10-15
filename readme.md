# Example Vite Theme for OJS

An example OJS theme showing how to configure Vite and use modern frontend libraries in your theme.

- ✔ Hot module reloading (including `.tpl` files)
- ✔ Modern JavaScript module imports
- ✔ Example setup for TailwindCSS 3

Supports themes for OJS 3.4 and 3.5.

## Usage

> This assumes you know [how to build a custom OJS theme](https://docs.pkp.sfu.ca/pkp-theming-guide/en/).

Install the dependencies.

```
npm install
```

Run vite in local development mode.

```
npm run start -- --host
```

Build vite assets before deploying your theme to production.

```
npm run build
```

## Credt

This library is distributed under GPL 3.0. It is based on [php-vite](https://github.com/mindplay-dk/php-vite) by [@mindplay-dk](https://github.com/mindplay-dk).
