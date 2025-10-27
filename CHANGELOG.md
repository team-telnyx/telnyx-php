# Changelog

## 5.0.0 (2025-10-27)

Full Changelog: [v4.1.0...v5.0.0](https://github.com/team-telnyx/telnyx-php/compare/v4.1.0...v5.0.0)

### ⚠ BREAKING CHANGES

* remove confusing `toArray()` alias to `__serialize()` in favour of `toProperties()`

### Features

* **api:** add method to upload JSON documents ([643be7f](https://github.com/team-telnyx/telnyx-php/commit/643be7fba6041edfa30c95895aa9cfa6d37f33fd))
* **api:** added webhook public key ([4fef9c8](https://github.com/team-telnyx/telnyx-php/commit/4fef9c874acbf025f289cc1e5b66b5315e49ddf3))
* **api:** manual updates ([8de74fe](https://github.com/team-telnyx/telnyx-php/commit/8de74feba69963556872d94afd656eeb569ff422))
* **api:** manual updates ([571b16c](https://github.com/team-telnyx/telnyx-php/commit/571b16caccf584163c92c069efece6db1022eda4))
* define more models ([e2a13b6](https://github.com/team-telnyx/telnyx-php/commit/e2a13b63a9e2a623ebb8414cd5e9907aaca2e1b3))
* remove confusing `toArray()` alias to `__serialize()` in favour of `toProperties()` ([1b36bb9](https://github.com/team-telnyx/telnyx-php/commit/1b36bb9f0c3ee20b15fe2fdc9244b8b28ddf3ed6))


### Documentation

* update package description and add keywords ([#6](https://github.com/team-telnyx/telnyx-php/issues/6)) ([715c69e](https://github.com/team-telnyx/telnyx-php/commit/715c69e2e516e995279264ca7e06ba5692a644e5))

## 4.1.0 (2025-10-16)

Full Changelog: [v4.0.0...v4.1.0](https://github.com/team-telnyx/telnyx-php/compare/v4.0.0...v4.1.0)

### Features

* ENGDESK-45836: Document private endpoint for republishing account events ([8b49daa](https://github.com/team-telnyx/telnyx-php/commit/8b49daa1ce8a804dba672157cccd81370c3c900d))
* Fix broken link to List SIM card action ([56cfe76](https://github.com/team-telnyx/telnyx-php/commit/56cfe761b96c276697144312cd6ffe01beaca687))
* MSG-5978: Add BRN fields to toll-free verification OpenAPI specs ([c83ab33](https://github.com/team-telnyx/telnyx-php/commit/c83ab335232dd26962ec306c46dc2c8fa7b6d6c6))
* Retell assistants import ([3089d71](https://github.com/team-telnyx/telnyx-php/commit/3089d7140ad1abc2b11ee3b9b970a28f8e39bceb))


### Bug Fixes

* inverted retry condition ([4213773](https://github.com/team-telnyx/telnyx-php/commit/4213773cd9d821b2531a9b7d4ed69b598aaa7e38))


### Chores

* add license ([8b06ca9](https://github.com/team-telnyx/telnyx-php/commit/8b06ca916d7973c60ad549fb077bb8c7915193f4))

## 4.0.0 (2025-10-08)

Full Changelog: [v0.0.1...v4.0.0](https://github.com/team-telnyx/telnyx-php/compare/v0.0.1...v4.0.0)

### ⚠ BREAKING CHANGES

* **api:** extract APIError to shared models

### Features

* AISWE-456: Fix OpenAPI filter properties to use proper nested object structure ([38745d0](https://github.com/team-telnyx/telnyx-php/commit/38745d01ebfeb4836b735f502ac872a99969430b))
* AISWE-458: Remove S3 operations from OpenAPI spec ([d542c65](https://github.com/team-telnyx/telnyx-php/commit/d542c656ab4e445ed7a310780ba3af5806006d18))
* **api:** extract APIError to shared models ([baff83a](https://github.com/team-telnyx/telnyx-php/commit/baff83a56e1f54334bae4c775b2f79bc5df4b08a))
* **api:** manual updates ([b674d1e](https://github.com/team-telnyx/telnyx-php/commit/b674d1e1c6ddd3cb5f8857363819e2e08b0cabe4))
* **api:** manual updates ([8f25319](https://github.com/team-telnyx/telnyx-php/commit/8f25319d306f5a721113320653a72505c73ff6bd))
* **api:** manual updates ([d5ba677](https://github.com/team-telnyx/telnyx-php/commit/d5ba6779097dc41d87bf403da642885aa8522e77))
* **api:** manual updates ([874eba7](https://github.com/team-telnyx/telnyx-php/commit/874eba723f48b973a60ebb18984cd56f2a1777b1))
* **api:** manual updates ([5b51c44](https://github.com/team-telnyx/telnyx-php/commit/5b51c44870c5bcc879eb344526401993068fcc21))
* **api:** manual updates ([c4c57c4](https://github.com/team-telnyx/telnyx-php/commit/c4c57c402ff0b6c7d10c659c7088d1148d7667e0))
* **api:** manual updates ([a086b9c](https://github.com/team-telnyx/telnyx-php/commit/a086b9c3533e9f71245819b1fecdd8f7b5f9f254))
* **api:** rename enums with problematic characters ([0631f03](https://github.com/team-telnyx/telnyx-php/commit/0631f033f065c57f2c5f62f7f065d6a937c0f438))
* **client:** add raw methods ([88093c1](https://github.com/team-telnyx/telnyx-php/commit/88093c192b5200d88397ea47c82c531e5e082ac8))
* **client:** support raw responses ([ae4ce5b](https://github.com/team-telnyx/telnyx-php/commit/ae4ce5b4ba0b118c1f4589eae283072120203dfe))
* Engdesk 44932 ([a837b4f](https://github.com/team-telnyx/telnyx-php/commit/a837b4f22d5ff96f2027946c266a14e5042d21b1))
* ENGDESK-45343: Add CustomHeaders documentation to TeXML Dial endpoints ([a89af91](https://github.com/team-telnyx/telnyx-php/commit/a89af919972fd06cc1cd2945657333135ae7164f))
* FILE-1746: Convert edge-compute API from Swagger 2.0 to OpenAPI 3.1.0 ([64e0815](https://github.com/team-telnyx/telnyx-php/commit/64e08157279d733af8c556358593888c960573f8))
* Fix listing deepgram languages for transcription start ([3532141](https://github.com/team-telnyx/telnyx-php/commit/3532141fb74a16e2e1536a5c458782cb6f9a98f4))
* MSG-5944: added mobile_only field to messaging profiles ([4e5f2fe](https://github.com/team-telnyx/telnyx-php/commit/4e5f2fedadbabfeefa5712b22428a63bb6f60924))
* recommend against using businessContactEmail ([89d7a19](https://github.com/team-telnyx/telnyx-php/commit/89d7a19eea76e1264033f0906a570089ee0b9e8c))
* TELAPPS-5367: Update transcription start docs ([71edb05](https://github.com/team-telnyx/telnyx-php/commit/71edb054ed4882c9a5571cf60192412d1ee9dd11))
* warm transfer ([81d57f3](https://github.com/team-telnyx/telnyx-php/commit/81d57f31c475245e4a288d59a6129d089403776d))


### Bug Fixes

* **ci:** release doctor workflow ([b87b220](https://github.com/team-telnyx/telnyx-php/commit/b87b2200c37aa655f1a2f7a83062028367bcddf2))
* **client:** elide client methods in docs ([8d0c661](https://github.com/team-telnyx/telnyx-php/commit/8d0c6611284f3189f7235fad6e3a4f9611c126ef))
* **client:** properly import fully qualified names ([bf15f5b](https://github.com/team-telnyx/telnyx-php/commit/bf15f5bf60bc84e033e9658fef40e81245fa46c6))
* uncomment production API base URL and remove localhost reference ([b76361f](https://github.com/team-telnyx/telnyx-php/commit/b76361fe8549f179cef4afc1f9d93780e7cabdf4))


### Chores

* add extension variable on dev docs ([eda5c90](https://github.com/team-telnyx/telnyx-php/commit/eda5c905b8b7b3151ca2b0d2c9296f8c9fb30fd3))
* bump version from 3.0.0 to 3.0.1 ([258cede](https://github.com/team-telnyx/telnyx-php/commit/258cede6403460798495f36920c02b04446f005b))
* configure new SDK language ([7ab7135](https://github.com/team-telnyx/telnyx-php/commit/7ab7135f20e053855c680ebe9c9514bf63a085a6))
* **docs:** update readme formatting ([c7ad8f5](https://github.com/team-telnyx/telnyx-php/commit/c7ad8f52024580c1da34fb026c95968adc172622))
* fix lints in UnionOf ([e409095](https://github.com/team-telnyx/telnyx-php/commit/e409095e4ecabdd34461e7ec1deaec9f875cf750))
* **internal:** codegen related update ([c6509ed](https://github.com/team-telnyx/telnyx-php/commit/c6509ed30219d0008e1ecb8c325e190f35e30cd8))
* **internal:** restructure some imports ([15c5b0a](https://github.com/team-telnyx/telnyx-php/commit/15c5b0a558cc8363f9641cd76a2c7d05108fee54))
* many fixes ([7b6d962](https://github.com/team-telnyx/telnyx-php/commit/7b6d96205a6e078344467adeeca7082b624e0c0f))
* refactor methods ([bccc3b1](https://github.com/team-telnyx/telnyx-php/commit/bccc3b18cfc0835c99a440941a9320f769cc8b98))
* sync repo ([ef5c196](https://github.com/team-telnyx/telnyx-php/commit/ef5c1965bac77129d2358d8a7a53dfae545ac984))
* update github actions workflow cache and checkout from v2 to v3 ([a1b4489](https://github.com/team-telnyx/telnyx-php/commit/a1b4489478ce2f4f01f6209af5cd3d66dcaee555))
* update SDK settings ([f54fc16](https://github.com/team-telnyx/telnyx-php/commit/f54fc162ff35e6c8224e50ffe96101727e8e6d1a))
