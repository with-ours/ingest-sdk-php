# Changelog

## 0.6.0 (2025-12-09)

Full Changelog: [v0.5.0...v0.6.0](https://github.com/with-ours/ingest-sdk-php/compare/v0.5.0...v0.6.0)

### ⚠ BREAKING CHANGES

* use camel casing for all class properties

### Features

* add `BaseResponse` class for accessing raw responses ([7036ed2](https://github.com/with-ours/ingest-sdk-php/commit/7036ed24098dd3167848fbdf8c4b388b08cc21fc))
* use camel casing for all class properties ([53006c7](https://github.com/with-ours/ingest-sdk-php/commit/53006c75b7711a52849b24f6ec664c2d8b5a59db))


### Chores

* switch from `#[Api(optional: true|false)]` to `#[Required]|#[Optional]` for annotations ([d257c06](https://github.com/with-ours/ingest-sdk-php/commit/d257c06271d3535f3f1e770b07f6a215afb26dfc))

## 0.5.0 (2025-12-06)

Full Changelog: [v0.4.3...v0.5.0](https://github.com/with-ours/ingest-sdk-php/compare/v0.4.3...v0.5.0)

### Features

* allow both model class instances and arrays in setters ([f31766f](https://github.com/with-ours/ingest-sdk-php/commit/f31766f5ea80c0502a1dc737733f2ddb237387fc))

## 0.4.3 (2025-12-04)

Full Changelog: [v0.4.2...v0.4.3](https://github.com/with-ours/ingest-sdk-php/compare/v0.4.2...v0.4.3)

### Chores

* be more targeted in suppressing superfluous linter warnings ([a9ea413](https://github.com/with-ours/ingest-sdk-php/commit/a9ea4136093700fa70af96fec00aa3ef946c5311))

## 0.4.2 (2025-12-03)

Full Changelog: [v0.4.1...v0.4.2](https://github.com/with-ours/ingest-sdk-php/compare/v0.4.1...v0.4.2)

### Chores

* formatting ([14e3f60](https://github.com/with-ours/ingest-sdk-php/commit/14e3f609d063fb14f2272761ddb355dfda6ea771))

## 0.4.1 (2025-11-27)

Full Changelog: [v0.4.0...v0.4.1](https://github.com/with-ours/ingest-sdk-php/compare/v0.4.0...v0.4.1)

### Chores

* use non-trivial test assertions ([ea6ee8b](https://github.com/with-ours/ingest-sdk-php/commit/ea6ee8bd70f2f09f37e50cccc7f656a174c3a657))
* use single quote strings ([1b3d9b3](https://github.com/with-ours/ingest-sdk-php/commit/1b3d9b3a06661e308c647a4e3e2fc815e568d287))

## 0.4.0 (2025-11-25)

Full Changelog: [v0.3.0...v0.4.0](https://github.com/with-ours/ingest-sdk-php/compare/v0.3.0...v0.4.0)

### Features

* **api:** api update ([14062be](https://github.com/with-ours/ingest-sdk-php/commit/14062bec5434e272fddccab6c1ff883829941141))
* **api:** api update ([55bc6c6](https://github.com/with-ours/ingest-sdk-php/commit/55bc6c64471be5a75a1d65bab27fcaa78e5f4634))


### Bug Fixes

* phpStan linter errors ([850047a](https://github.com/with-ours/ingest-sdk-php/commit/850047abdf6c4a770d73d1f7771e2a6514c8ccb2))


### Chores

* **client:** refactor error type constructors ([90d41e8](https://github.com/with-ours/ingest-sdk-php/commit/90d41e8baca5cf354781f59172a831feef48e9b8))

## 0.3.0 (2025-11-19)

Full Changelog: [v0.2.0...v0.3.0](https://github.com/with-ours/ingest-sdk-php/compare/v0.2.0...v0.3.0)

### ⚠ BREAKING CHANGES

* **client:** redesign methods

### Features

* **api:** manual updates ([c83ad63](https://github.com/with-ours/ingest-sdk-php/commit/c83ad6378b03d78dd3fe121284edbcd6632b96d9))
* **client:** redesign methods ([08982ca](https://github.com/with-ours/ingest-sdk-php/commit/08982cab3ceb6e223b928e3f2052aab5bd00f5fc))


### Bug Fixes

* rename invalid types ([bce1a32](https://github.com/with-ours/ingest-sdk-php/commit/bce1a323309bf5e5ffa76834e124e9dbe77cc8f4))


### Chores

* **internal:** codegen related update ([52de7b6](https://github.com/with-ours/ingest-sdk-php/commit/52de7b692f40dd2b108a2553055b963b189ce155))

## 0.2.0 (2025-11-05)

Full Changelog: [v0.1.0...v0.2.0](https://github.com/with-ours/ingest-sdk-php/compare/v0.1.0...v0.2.0)

### Features

* **api:** manual updates ([e2e8810](https://github.com/with-ours/ingest-sdk-php/commit/e2e8810d1b871b77aa42b38aab8c1f7649d22090))

## 0.1.0 (2025-11-05)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/with-ours/ingest-sdk-php/compare/v0.0.1...v0.1.0)

### Features

* **api:** manual updates ([801e915](https://github.com/with-ours/ingest-sdk-php/commit/801e915d1d0e84a5929527f782fee6b0ecc90a86))
* **api:** manual updates ([f3beb24](https://github.com/with-ours/ingest-sdk-php/commit/f3beb24d4db696aacbe0d47fc342e5ba0ef42e25))


### Chores

* **client:** send metadata headers ([4bbecb3](https://github.com/with-ours/ingest-sdk-php/commit/4bbecb39e24b00f9f972762ad39b45ce9bd2d493))
* configure new SDK language ([8c59014](https://github.com/with-ours/ingest-sdk-php/commit/8c590147e6c8dce32db578aa8300e98c122b7db3))
* update SDK settings ([c3c77b9](https://github.com/with-ours/ingest-sdk-php/commit/c3c77b932df1550533b4de9f9d684d2f2ad2c8c1))
