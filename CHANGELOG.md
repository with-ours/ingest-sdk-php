# Changelog

## 0.8.2 (2026-01-30)

Full Changelog: [v0.8.1...v0.8.2](https://github.com/with-ours/ingest-sdk-php/compare/v0.8.1...v0.8.2)

### Chores

* **internal:** ignore stainless-internal artifacts ([b1eb23d](https://github.com/with-ours/ingest-sdk-php/commit/b1eb23d82eb8e66b57b0f21489715b404c717c92))

## 0.8.1 (2026-01-28)

Full Changelog: [v0.8.0...v0.8.1](https://github.com/with-ours/ingest-sdk-php/compare/v0.8.0...v0.8.1)

### Chores

* remove custom code ([dca259e](https://github.com/with-ours/ingest-sdk-php/commit/dca259e6de907c000ccf7c0c7cccccff1b753bee))

## 0.8.0 (2026-01-23)

Full Changelog: [v0.7.0...v0.8.0](https://github.com/with-ours/ingest-sdk-php/compare/v0.7.0...v0.8.0)

### ⚠ BREAKING CHANGES

* replace special flag type `omittable` with just `null`
* use aliases for phpstan types

### Features

* add idempotency header support ([8768337](https://github.com/with-ours/ingest-sdk-php/commit/876833763794f9ed30a6b3dbafce937294870fb5))
* **api:** api update ([9391b2e](https://github.com/with-ours/ingest-sdk-php/commit/9391b2ef11cacb7ff540cbd0f73d93a4a1c33904))
* **api:** api update ([b38fb99](https://github.com/with-ours/ingest-sdk-php/commit/b38fb99cb5fc37b98094b45d2f6575c93c0120dd))
* **api:** api update ([66f2e00](https://github.com/with-ours/ingest-sdk-php/commit/66f2e00c2a9c70a852a907db6f5acc3eeb433c8b))
* improved phpstan type annotations ([42986ea](https://github.com/with-ours/ingest-sdk-php/commit/42986ea37d3a535cc97660f504ace4926b337a1d))
* replace special flag type `omittable` with just `null` ([f77213a](https://github.com/with-ours/ingest-sdk-php/commit/f77213a8fad2387610834ec0fd66b5943790612c))
* simplify and make the phpstan types more consistent ([d802bd3](https://github.com/with-ours/ingest-sdk-php/commit/d802bd3ed071c8806e09779e0dd723ef50c2e687))
* support unwrapping envelopes ([df1697d](https://github.com/with-ours/ingest-sdk-php/commit/df1697d4e73481ae9b5850e4973d2b6af5bfdfea))
* use aliases for phpstan types ([141c7ea](https://github.com/with-ours/ingest-sdk-php/commit/141c7ea39816969faf81878145823cb30f73b64d))


### Bug Fixes

* a number of serialization errors ([7d1ae8b](https://github.com/with-ours/ingest-sdk-php/commit/7d1ae8b4dd450376bea1cacba945348a34dec52e))
* bad merge ([ada9c96](https://github.com/with-ours/ingest-sdk-php/commit/ada9c963a16780cecaa7c4bbc86064ae595fabd5))
* correctly serialize dates ([45c555a](https://github.com/with-ours/ingest-sdk-php/commit/45c555a353e6ae2983a44e08b28d906557eaeaf1))
* support arrays in query param construction ([3bc2b47](https://github.com/with-ours/ingest-sdk-php/commit/3bc2b4725369316139b36a7123383a9e395fc170))
* typos in README.md ([a733c64](https://github.com/with-ours/ingest-sdk-php/commit/a733c6445f7613b5e9b366b273a3eab8b5189743))


### Chores

* add git attributes and composer lock file ([c42ab89](https://github.com/with-ours/ingest-sdk-php/commit/c42ab89364882ceba6283f9a5f7e1be6c9969d1b))
* **internal:** add a basic client test ([911f496](https://github.com/with-ours/ingest-sdk-php/commit/911f4964e5b531d453a16f1e2e65f52ee4e34b7e))
* **internal:** codegen related update ([443c0d9](https://github.com/with-ours/ingest-sdk-php/commit/443c0d96fa132ed40c8f41ba481d63e9495f5272))
* **internal:** codegen related update ([3502a27](https://github.com/with-ours/ingest-sdk-php/commit/3502a27ce9b95763e79241546c733554840f50fb))
* **internal:** codegen related update ([4eb017a](https://github.com/with-ours/ingest-sdk-php/commit/4eb017a5186be81087e907cbf3cce6048379445b))
* **internal:** codegen related update ([150e404](https://github.com/with-ours/ingest-sdk-php/commit/150e4041fe44d7d3027c0003bd444f92fe90d711))
* **internal:** codegen related update ([f3adf61](https://github.com/with-ours/ingest-sdk-php/commit/f3adf6148772c9d49cd36af193433578816deec2))
* **internal:** codegen related update ([36a84c2](https://github.com/with-ours/ingest-sdk-php/commit/36a84c28d86f462dbe39d20e250050dc2803aa3a))
* **internal:** codegen related update ([2e5c2b1](https://github.com/with-ours/ingest-sdk-php/commit/2e5c2b17951c57b3e66637dc31a20333347458b1))
* **internal:** codegen related update ([6c57d31](https://github.com/with-ours/ingest-sdk-php/commit/6c57d31b751cd33389f109556d093365087ed983))
* **internal:** codegen related update ([2e821be](https://github.com/with-ours/ingest-sdk-php/commit/2e821be037e8cce607b07f4adfdbd700b1126fb4))
* **internal:** codegen related update ([3d18e3e](https://github.com/with-ours/ingest-sdk-php/commit/3d18e3ec3869eb8a1bf5ffdd33d294c5dbed37b5))
* **internal:** codegen related update ([c66412d](https://github.com/with-ours/ingest-sdk-php/commit/c66412dd5b9edac1dbc2ae57be44e6e5c508b93e))
* **internal:** minor test script reformatting ([03f2057](https://github.com/with-ours/ingest-sdk-php/commit/03f205759706012d4b23dbca39918e27938d5820))
* **internal:** refactor auth by moving concern from base client into client ([80b41d7](https://github.com/with-ours/ingest-sdk-php/commit/80b41d71c69ecf8fa0dc75a7d2ea3d7647894a02))
* **internal:** update `actions/checkout` version ([e527f04](https://github.com/with-ours/ingest-sdk-php/commit/e527f043f6892d4a3b5d95320031bfcb8c6bbd8c))
* **internal:** update phpstan comments ([585e163](https://github.com/with-ours/ingest-sdk-php/commit/585e1635e48432a94dfc6fb8f74f5b3f764c3faf))
* **readme:** remove beta warning now that we're in ga ([ee4231d](https://github.com/with-ours/ingest-sdk-php/commit/ee4231dc35eb57478c1c559ba11f9256151a591b))

## 0.7.0 (2025-12-10)

Full Changelog: [v0.6.0...v0.7.0](https://github.com/with-ours/ingest-sdk-php/compare/v0.6.0...v0.7.0)

### Features

* split out services into normal & raw types ([bb68040](https://github.com/with-ours/ingest-sdk-php/commit/bb6804028209b69fa56994357820c474972d42c3))


### Chores

* use `$self = clone $this;` instead of `$obj = clone $this;` ([c92998d](https://github.com/with-ours/ingest-sdk-php/commit/c92998dadd0deb2cbcb6bf9cab71c10f436cf8cc))

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
