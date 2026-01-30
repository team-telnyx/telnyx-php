# Changelog

## 6.2.2 (2026-01-30)

Full Changelog: [v6.2.1...v6.2.2](https://github.com/team-telnyx/telnyx-php/compare/v6.2.1...v6.2.2)

### Bug Fixes

* use PaginationMeta schema for ListFaxesResponse.meta ([4e9bd01](https://github.com/team-telnyx/telnyx-php/commit/4e9bd0160f3b0ecd08f47c9c3f9bd97cda05a3e8))

## 6.2.1 (2026-01-30)

Full Changelog: [v6.2.0...v6.2.1](https://github.com/team-telnyx/telnyx-php/compare/v6.2.0...v6.2.1)

### Bug Fixes

* remove deprecated TeXML API endpoints from OpenAPI spec ([b51b437](https://github.com/team-telnyx/telnyx-php/commit/b51b437bbf8b11fa339e9464d52e3a595f4a2162))
* used redirect count instead of retry count in base client ([1e82f7c](https://github.com/team-telnyx/telnyx-php/commit/1e82f7c7412ab1e5979ce84023c308926ba08c81))

## 6.2.0 (2026-01-30)

Full Changelog: [v6.1.0...v6.2.0](https://github.com/team-telnyx/telnyx-php/compare/v6.1.0...v6.2.0)

### Features

* add setters to constant parameters ([6ebbf2c](https://github.com/team-telnyx/telnyx-php/commit/6ebbf2c5c428440480c1dc1d5611612a38d0d983))


### Chores

* **internal:** ignore stainless-internal artifacts ([20cd09b](https://github.com/team-telnyx/telnyx-php/commit/20cd09b3181e8e7cd5fd626484ccc57e6c0b6157))

## 6.1.0 (2026-01-29)

Full Changelog: [v6.0.0...v6.1.0](https://github.com/team-telnyx/telnyx-php/compare/v6.0.0...v6.1.0)

### Features

* **api:** revert bad update to spec ([f2698fe](https://github.com/team-telnyx/telnyx-php/commit/f2698fe106c67db9d74b9fbcc74e7d25f1324873))

## 6.0.0 (2026-01-29)

Full Changelog: [v5.0.0...v6.0.0](https://github.com/team-telnyx/telnyx-php/compare/v5.0.0...v6.0.0)

### ⚠ BREAKING CHANGES

* replace special flag type `omittable` with just `null`
* use aliases for phpstan types
* improve identifier renaming for names that clash with builtins
* Resolved all codegen errors
* use camel casing for all class properties
* **client:** redesign methods

### Features

* (draft/don't review) ENGDESK-38070-c: add deepgram keyword documentation ([48f3623](https://github.com/team-telnyx/telnyx-php/commit/48f362349925608a8de9955c92d6d3e9e3147581))
* [PORT-4538] Fix ambiguous oneOf instances on porting service and documents ([a114c68](https://github.com/team-telnyx/telnyx-php/commit/a114c68d6fc0192e7734896d181996cdd77a3d3a))
* add `BaseResponse` class for accessing raw responses ([0ae6a7e](https://github.com/team-telnyx/telnyx-php/commit/0ae6a7e3b51d7971e0aebf3d2cf75639641ed37a))
* Add AI Assistant spec updates for FE tickets ([922ba21](https://github.com/team-telnyx/telnyx-php/commit/922ba2163fde0dad6bf87244313970fd914774b5))
* Add AI assistant voice settings, telephony config, and tools updates ([fafd707](https://github.com/team-telnyx/telnyx-php/commit/fafd70798600e10bb8370cf4d0e75fee88f12782))
* Add deepgram/nova-3 transcription engine option to record_start ([fa37ab5](https://github.com/team-telnyx/telnyx-php/commit/fa37ab55384d6e7bf5ee1b18de5a67ca1d20cd7a))
* add idempotency header support ([3677408](https://github.com/team-telnyx/telnyx-php/commit/367740899e0d450b38a58ccaf36569776ca05d43))
* Add Post /v2/calls/:call_control_id/actions/ai_assistant_add_messages ([8f45329](https://github.com/team-telnyx/telnyx-php/commit/8f45329f6a529c0eda9af2c7d9506bf237768406))
* Add response schemas for telco data usage report endpoints ([5e48406](https://github.com/team-telnyx/telnyx-php/commit/5e4840656a643d7b783701c3774116023c0c957b))
* Add widget_settings to AI Assistant and import_ids to ImportAssistant… ([73a044a](https://github.com/team-telnyx/telnyx-php/commit/73a044a4c10494ae95a412e375bdfa2ddf85dd00))
* Ai 1967 part 2 ([cfa98b4](https://github.com/team-telnyx/telnyx-php/commit/cfa98b4c2513d1d80f5cf061b0cb7bcdda4763d6))
* AI-1842: Add MCP Servers and Integrations sections ([22b5fed](https://github.com/team-telnyx/telnyx-php/commit/22b5fede2c31960b93f95b3e5b8f870fe84b4a63))
* allow both model class instances and arrays in setters ([3026a76](https://github.com/team-telnyx/telnyx-php/commit/3026a76618ab0785d6103e50092d14815b50cd3d))
* alright, shut up redocly ([b0ce3bb](https://github.com/team-telnyx/telnyx-php/commit/b0ce3bb70572b2c32f275d9ea5ca113cda7b2bfc))
* **api:** fix default pagination by correctly using nested params ([3547d06](https://github.com/team-telnyx/telnyx-php/commit/3547d06ec2758481cd6b9fb27840ffb90fc2d5e0))
* **api:** join all 10dlc operations into messaging_10dlc group ([1446db8](https://github.com/team-telnyx/telnyx-php/commit/1446db88ef237bee914823cba28a1e56366c968b))
* **api:** manual updates ([0250eac](https://github.com/team-telnyx/telnyx-php/commit/0250eacfef0bcdffb7eb71aff9a1d9a15427f25d))
* **api:** manual updates ([5545413](https://github.com/team-telnyx/telnyx-php/commit/5545413d7aab3dfda5085a0cb4637f9ab9e1b5f0))
* **api:** manual updates ([5f2a2cf](https://github.com/team-telnyx/telnyx-php/commit/5f2a2cfa5b434632cc5de2f0f0fb53ac2b9815bf))
* **api:** manual updates ([5f92b73](https://github.com/team-telnyx/telnyx-php/commit/5f92b73ac3e0bf8f3482bc573cca5dc3d0f319ba))
* **api:** manual updates ([826ca86](https://github.com/team-telnyx/telnyx-php/commit/826ca862cc494c1bb47366da6566741f667ada09))
* **api:** manual updates ([6c81b5f](https://github.com/team-telnyx/telnyx-php/commit/6c81b5fa3e4721a15744d781019122eb698225df))
* **api:** manual updates ([d744a71](https://github.com/team-telnyx/telnyx-php/commit/d744a71c4718e111944bbb88eae665b24c763851))
* **api:** manual updates ([410c039](https://github.com/team-telnyx/telnyx-php/commit/410c03997d45407ff21b725a3cdc103ffc4a432e))
* **api:** manual updates ([cbd572a](https://github.com/team-telnyx/telnyx-php/commit/cbd572ad0e89cd5fa2ce8c7923c80379e235fae8))
* **api:** messaging_10dlc group with all their endpoints ([bdf35d3](https://github.com/team-telnyx/telnyx-php/commit/bdf35d3d803348db138c7b94446f2aefed28b4a9))
* **api:** PHP codegen error fixes ([396ae11](https://github.com/team-telnyx/telnyx-php/commit/396ae11130c0da0d84df40cc01daa19a2e996152))
* **api:** php publishing config ([07b0e87](https://github.com/team-telnyx/telnyx-php/commit/07b0e87024ab457d6900ed0505e210e1730cd08c))
* **api:** reverted previous commit ([cb96f1d](https://github.com/team-telnyx/telnyx-php/commit/cb96f1de101a2ccc59ea1dfa811478df0ae52ca0))
* Chat completions response schema update ([12e8183](https://github.com/team-telnyx/telnyx-php/commit/12e818372a2ea62a862a20c45e817e18d7ce571e))
* **client:** add separate models for 2 events ([f0653ad](https://github.com/team-telnyx/telnyx-php/commit/f0653ad67bf154ad505680299421cdf98275d060))
* **client:** redesign methods ([d5bc8a8](https://github.com/team-telnyx/telnyx-php/commit/d5bc8a8c4a0679ed0972aad9bde70f7d82323f1d))
* Deploy dev/mc vady wip ([848239f](https://github.com/team-telnyx/telnyx-php/commit/848239fad4941df22da7a77533eb2cdae2edbdfa))
* Deploy dev/mc vady wip ([629f483](https://github.com/team-telnyx/telnyx-php/commit/629f483c060794be15d54cb4919aa7f274f0b861))
* Document supervising leg of call ([71e5520](https://github.com/team-telnyx/telnyx-php/commit/71e5520573fe3d7dc01fd4e164cb0f9c4ac9ca66))
* DOTCOM-5145. Update redocly lint to block new lint errors or warning being introduced ([4661025](https://github.com/team-telnyx/telnyx-php/commit/466102518f4888339ce601287a56fe2a94a6659b))
* DOTCOM-5179. Fix Redocly errors in outbound-voice-profiles.json ([d2fc73a](https://github.com/team-telnyx/telnyx-php/commit/d2fc73a1c51380b13964c81e6f9046381d8c663a))
* Draft. DOTCOM-5184. Fix 44 errors in the spec as reported by Redocly on video ([c540988](https://github.com/team-telnyx/telnyx-php/commit/c540988811cb74929a5f82c8993587ff6b266037))
* Engdesk 47920/wireless cleanup ([69800f9](https://github.com/team-telnyx/telnyx-php/commit/69800f90e64ad2853db167fdf7905829b9e1f816))
* ENGDESK-44767 - Document force remove calls from queue ([f013eb9](https://github.com/team-telnyx/telnyx-php/commit/f013eb9a6e8797d97fa1747b9c3c0fa14ae55783))
* ENGDESK-45429 - Add sip_region documentation for dial and transfer command ([f37c0ae](https://github.com/team-telnyx/telnyx-php/commit/f37c0aed9bb68ac6615111d0183bf39ddcd6d8c1))
* ENGDESK-46399 - Add sip_call_id filter for retreiving recordings ([b3a9480](https://github.com/team-telnyx/telnyx-php/commit/b3a9480566ef67132b7a2ae858616cbd5c03e7a0))
* ENGDESK-47508 - part 2 shared schema fixes ([6cbf31a](https://github.com/team-telnyx/telnyx-php/commit/6cbf31a121dea85e02da73f72da247109a2793f0))
* ENGDESK-47518 document mobile number and mobile voice connection endpoints ([54f9596](https://github.com/team-telnyx/telnyx-php/commit/54f95962fb48282f68a5fc76de8dd58fb5b0c67b))
* ENGDESK-47580: Add quickship and exclude_held_numbers filters to inexplicit number order API ([0d8bd6f](https://github.com/team-telnyx/telnyx-php/commit/0d8bd6f303e64e90fdc18126e8c0beca34f34415))
* ENGDESK-47580: Add quickship and exclude_held_numbers to InexplicitNumberOrderResponse ([a1ee3c1](https://github.com/team-telnyx/telnyx-php/commit/a1ee3c198f58a5d467851a3c1bf8d2576c6b2d0b))
* ENGDESK-47706: Update TranscriptionEngineDeepgramConfig Schema ([212a925](https://github.com/team-telnyx/telnyx-php/commit/212a925987f9b4f4a668fb47c6be872ae65b1112))
* ENGDESK-47736: added discriminator fields to oneOffs that were missing them ([dcea96f](https://github.com/team-telnyx/telnyx-php/commit/dcea96f7d40884c5edf37405dbccd873a76cab7b))
* ENGDESK-47759 - fix missing meta definition in authorized ips spec ([6897225](https://github.com/team-telnyx/telnyx-php/commit/6897225e125566997e550412b65445ed1ada017b))
* ENGDESK-47883: Fix all lint errors in telapps owned APIs ([3095560](https://github.com/team-telnyx/telnyx-php/commit/3095560313585de770f1ad8ba60411971df899f2))
* ENGDESK-47886: Fix API spec for emergency.json ([bc98d72](https://github.com/team-telnyx/telnyx-php/commit/bc98d72b81eef1bf431a7883b2b2303ef641efe0))
* ENGDESK-47914 - fix warnings in numbers.json file ([f90dc0a](https://github.com/team-telnyx/telnyx-php/commit/f90dc0af51803a1575243010b1b4451b7f1d82c6))
* ENGDESK-47947 - fix wrong type on user-addresses request object ([826042c](https://github.com/team-telnyx/telnyx-php/commit/826042cdb8bd1963eec89611e69cde203e9c4765))
* ENGDESK-48016 - document simultaneous ringing for CredentialConnections ([52f610e](https://github.com/team-telnyx/telnyx-php/commit/52f610ef273d784d2fb77b965584e8bc3e3242d5))
* ENGDESK-48254: Release noise suppression details docs to prod ([784d840](https://github.com/team-telnyx/telnyx-php/commit/784d8403518936200bb08fdc9db813143251131b))
* FILE-1066: presigned url doc strings ([1f32389](https://github.com/team-telnyx/telnyx-php/commit/1f32389d87d619e2c2da0eb3cdfb2f5a7d49d059))
* Fix broken documentation links ([c86d35b](https://github.com/team-telnyx/telnyx-php/commit/c86d35bd2d514951c561cef30717ab10afd6aa3a))
* Fix campaign usecase endpoint: /registry/enum/usecase → /10dlc/enum/usecase ([3815567](https://github.com/team-telnyx/telnyx-php/commit/3815567cb901c85b2f14954b06ceed73643c2e81))
* Fix invalid responses ([cb3137e](https://github.com/team-telnyx/telnyx-php/commit/cb3137e4b19d5709771aabdf9f2a85ab0b3b4fc4))
* fix links ([408b470](https://github.com/team-telnyx/telnyx-php/commit/408b4709dc397d5134b43d71ee9869b625ff1847))
* Fix Redocly linting errors and warnings in TDA reporting specs ([ab376af](https://github.com/team-telnyx/telnyx-php/commit/ab376afdecab16be3cb24989488d2a2bd1e171c6))
* Fix Redocly linting warnings in Number Lookup spec ([0c066c5](https://github.com/team-telnyx/telnyx-php/commit/0c066c5686c7962fb7065110eb6189cdeacfd30f))
* Fix Redocly linting warnings in OAuth and Integration Secrets specs ([6f951ce](https://github.com/team-telnyx/telnyx-php/commit/6f951ce467d377303499517ca19598f98a05f434))
* fix-external-connection-link ([88d7bc8](https://github.com/team-telnyx/telnyx-php/commit/88d7bc8d7350bfde511be1455d46dc2cb55d5aa8))
* fix-redocly-lint-issues ([d386a39](https://github.com/team-telnyx/telnyx-php/commit/d386a394b0982924748836c6986042b091aca1a0))
* Fixing lint errors ([e2b5874](https://github.com/team-telnyx/telnyx-php/commit/e2b58741d1ce992b8e38f7dd7bd742db8ff47bc2))
* hotfix: restore 10dlc prefixes ([36b860f](https://github.com/team-telnyx/telnyx-php/commit/36b860f610c64605ea2b6193d50b71c39110e42b))
* implement oauth flow ([88ec851](https://github.com/team-telnyx/telnyx-php/commit/88ec851d61f9a55684cd9cbe11ca106d01f96ff0))
* improve identifier renaming for names that clash with builtins ([e8b8e8d](https://github.com/team-telnyx/telnyx-php/commit/e8b8e8ddf20da82d7e2009b908c506c0af4a0357))
* Improve messaging API naming and navigation ([b8f4ef3](https://github.com/team-telnyx/telnyx-php/commit/b8f4ef3546a774501600b5644ce7e7c6499925b6))
* improved phpstan type annotations ([89f6d05](https://github.com/team-telnyx/telnyx-php/commit/89f6d053a1109d4ab2fcbd29f1f499394ea023b7))
* jira-engdesk-48800 add organizations-related docs to the external api… ([0edbfb0](https://github.com/team-telnyx/telnyx-php/commit/0edbfb0b0c08e8517041b338630f0cb79e0d269d))
* jira-engdesk-49089 add new connection jitter buffer related fields ([f6eeac0](https://github.com/team-telnyx/telnyx-php/commit/f6eeac0e18efa0db31cefb25c1a218b1f5e526c7))
* messaging meta object with required fields ([43a6fd2](https://github.com/team-telnyx/telnyx-php/commit/43a6fd259333ad672a70bf424371b83c23ccf40e))
* Msg 6152 ([a8157d3](https://github.com/team-telnyx/telnyx-php/commit/a8157d352775261bf5b2d5445fada038124f2781))
* MSG-6076: webhook event for 10DLC campaign suspended status ([c31da09](https://github.com/team-telnyx/telnyx-php/commit/c31da0972a4c8d4483b6b0626a6bf172efa07921))
* MSG-6140: Add SMS OTP endpoints for Sole Prop brands ([8bca2e5](https://github.com/team-telnyx/telnyx-php/commit/8bca2e58378bbc3456d47b30230c42f5839fe9ba))
* MSG-6145: OTP status endpoint ([c6cd995](https://github.com/team-telnyx/telnyx-php/commit/c6cd99561917687d436449d39e3116abaa06a876))
* MSG-6148: adding the new campaignVerifyAuthorizationToken field and missing GET OTP endpoint ([9c2dcca](https://github.com/team-telnyx/telnyx-php/commit/9c2dcca55a7ea5d32529cd1b6e604f0361b5facb))
* MSG-6160 fix messaging lint issues ([ac95719](https://github.com/team-telnyx/telnyx-php/commit/ac95719c2fbb53427f29a12b5ee816d0fa2cd83b))
* MSG-6166 fix empty schema responses ([2ab47be](https://github.com/team-telnyx/telnyx-php/commit/2ab47be3327a564f75189b1a17be49cc838fd34f))
* MSG-6179: Add discriminator fields to Messaging API schemas for improved SDK performance ([b72f7aa](https://github.com/team-telnyx/telnyx-php/commit/b72f7aade3b23ab3998401ad479283b6399a742c))
* MSG-6181: Reorganize mobile phone number messaging endpoints and fix … ([d98fb2d](https://github.com/team-telnyx/telnyx-php/commit/d98fb2dcb4bcc0af3f2a6ddc8d4f2d5ce9941578))
* MSG-6228: MSG-6228: Add smart_encoding option for SMS character encoding optimization ([312d211](https://github.com/team-telnyx/telnyx-php/commit/312d211a3d66c4673de684e172123bed5ed2525c))
* NETAPPS_687: Fixed IGW spec to match current API. ([154113e](https://github.com/team-telnyx/telnyx-php/commit/154113e433a44130d83af8d0ac3057d2d20d8282))
* NUM-6334/NUM-6335 - fix redocly lint errors ([74f19f9](https://github.com/team-telnyx/telnyx-php/commit/74f19f9e075e17552786907dfd93cbcf43c62d86))
* PORT-4528: Fix lint errors for porting ([248c6de](https://github.com/team-telnyx/telnyx-php/commit/248c6deeedbd15c1e4b6540b4fe4932eaa29e2dd))
* port-4551: remove CustomerServiceRecordStatusChanged webhook doc ([14e7e24](https://github.com/team-telnyx/telnyx-php/commit/14e7e24df0dad27c7a9684dd848d299857e307a1))
* PORT-4553: Add a discriminator to portout webhook ([a0fffef](https://github.com/team-telnyx/telnyx-php/commit/a0fffefb86934c7c084c6f6978e57239b143a0d1))
* PORTAL-5787 - document query parameter to handle messaging service error ([514a9c2](https://github.com/team-telnyx/telnyx-php/commit/514a9c2c573330e73cc8f9da94e5d6fc102cf925))
* Refactored README to only contain useful information and reflect accu… ([d7c09a4](https://github.com/team-telnyx/telnyx-php/commit/d7c09a4588e55ded16570095c1463ba86901f13e))
* replace special flag type `omittable` with just `null` ([4e58c89](https://github.com/team-telnyx/telnyx-php/commit/4e58c8946c21e3e83e1b144c909276afc209a264))
* simplify and make the phpstan types more consistent ([ad3c97c](https://github.com/team-telnyx/telnyx-php/commit/ad3c97cb65dc1e125cfbf158cf9b3a7676034f0d))
* split out services into normal & raw types ([68e3d68](https://github.com/team-telnyx/telnyx-php/commit/68e3d6883db5698734a3e11e15c9c3465efc3058))
* support unwrapping envelopes ([b37f4d2](https://github.com/team-telnyx/telnyx-php/commit/b37f4d20c4600a4f35eba85ae614f1c498e82977))
* TBS-3422: Fix redocly errors ([12f499b](https://github.com/team-telnyx/telnyx-php/commit/12f499b5556a66676ea6b5e1a08290d3ed28a573))
* TBS-3422: Fix TBS redocly errors ([e340a2a](https://github.com/team-telnyx/telnyx-php/commit/e340a2ac9661a4420491a4a646b2426b3902b015))
* TELAPPS Add GET /texml/Accounts/{account_sid}/Queues endpoint ([8ba8e8f](https://github.com/team-telnyx/telnyx-php/commit/8ba8e8f243faf71970a0ba67a919a84f9eb40ccb))
* TELAPPS-47889 Add texml queue endpoint ([0e2b254](https://github.com/team-telnyx/telnyx-php/commit/0e2b25470c0735c4f9b47a69366e73f60e1439b9))
* TELAPPS-5399 Add region to conference commands ([71f8a26](https://github.com/team-telnyx/telnyx-php/commit/71f8a26fbcb6f18b4b9d8f72762566201f086b40))
* TELAPPS-5428 Add speech-to-text WS endpoint ([7020f14](https://github.com/team-telnyx/telnyx-php/commit/7020f14a68d03b91a6788675cb28177fb562ab8c))
* TELAPPS-5459: Add Azure to transcription start ([a1709fc](https://github.com/team-telnyx/telnyx-php/commit/a1709fc8fbb8048bf5de1b3e9b2844059f86d8b5))
* TELAPPS-5507: Add Krisp engine description for noise suppression ([52008e1](https://github.com/team-telnyx/telnyx-php/commit/52008e1661403198eb6b9c84e9dbece5477fffef))
* TELAPPS-ENGDESK-46395 Add keep_after_hangup to enqueue command ([9366884](https://github.com/team-telnyx/telnyx-php/commit/9366884324b3ade17baeb8bd8661011d96229bd1))
* TELAPPS-ENGDESK-46395 Add PATCH /queues/{queue_name}/calls/{call_control_id} endpoint ([ed84936](https://github.com/team-telnyx/telnyx-php/commit/ed849364cb18ec0e1c5c69abf89b8b88f6bec36f))
* TELAPPS-ENGDESK-47967 Add black_threshold parameter to send_fax request ([168e249](https://github.com/team-telnyx/telnyx-php/commit/168e2492716279d8d29e5cdfe99296752b5b80dc))
* TELAPPS-ENGDESK-48790 Remove duplicated webhooks ([78b5c34](https://github.com/team-telnyx/telnyx-php/commit/78b5c34cababac79b0fb8f529cbc7dc8326d07c0))
* Update voicemail_detection description with AMD enablement info ([489c155](https://github.com/team-telnyx/telnyx-php/commit/489c155537a77cec46e13580eaa7106671669ecc))
* Updated README to include the step for make buildcontainer bundle to … ([3fbb33d](https://github.com/team-telnyx/telnyx-php/commit/3fbb33d479b46edff2789c229d720ab754ae349a))
* use aliases for phpstan types ([7a837ea](https://github.com/team-telnyx/telnyx-php/commit/7a837ea6c7d03f5a6c324ae364ff83c99ef03cbe))
* use camel casing for all class properties ([451ebc0](https://github.com/team-telnyx/telnyx-php/commit/451ebc010a6ae8d4dc1cac21daae6391ca871a73))


### Bug Fixes

* a number of serialization errors ([b01a121](https://github.com/team-telnyx/telnyx-php/commit/b01a1217f17b98677bb515ddeaca2698adea5327))
* **api:** 10dlc prefixes ([1c84775](https://github.com/team-telnyx/telnyx-php/commit/1c84775bf4c366d1c67a5924ced97bd7182e71f9))
* correct broken hyperlinks in Submit Campaign endpoint description ([3ca3b60](https://github.com/team-telnyx/telnyx-php/commit/3ca3b6053491e3edff712fd82d9d97f81f791fa0))
* correct broken link to List SIM Card Actions endpoint in SIM car… ([13f349e](https://github.com/team-telnyx/telnyx-php/commit/13f349e3f2e68ac3cbe22610d3235a8777274706))
* correctly serialize dates ([2a57524](https://github.com/team-telnyx/telnyx-php/commit/2a57524a6b2c42f45e0b38130b25803b023819eb))
* ensure auth methods return non-nullable arrays ([e267cc5](https://github.com/team-telnyx/telnyx-php/commit/e267cc50c27327661b7d456e0bc4713bd83dbb34))
* make text field optional in AssistantSmsChatReq schema ([add2fb4](https://github.com/team-telnyx/telnyx-php/commit/add2fb4024ae4ab4442cb7220977873ba521a140))
* phpStan linter errors ([6a2b762](https://github.com/team-telnyx/telnyx-php/commit/6a2b7620f2d207a7a4a7f1163c5a38a9493bbbc7))
* remove duplicate types ([eca31cf](https://github.com/team-telnyx/telnyx-php/commit/eca31cf631aec5973c6bb6e22139277376ce7506))
* rename invalid types ([3981401](https://github.com/team-telnyx/telnyx-php/commit/398140139cc4cd8fd2882301fef50d13e65ac981))
* revert accidental code deletion ([208b2dc](https://github.com/team-telnyx/telnyx-php/commit/208b2dc392c31d288c1700514b2e0669c70e0073))
* **stainless:** fixes the messsages typo ([f4003ac](https://github.com/team-telnyx/telnyx-php/commit/f4003ac5d2b4b893d868105db5331539505933ed))
* support arrays in query param construction ([fe6e225](https://github.com/team-telnyx/telnyx-php/commit/fe6e225ca4a34a1fd30898c364e3409e5f45d6d9))
* **test:** naming collision in request parameters ([96914a4](https://github.com/team-telnyx/telnyx-php/commit/96914a44ae206c660ce951fc4cbcadddf2e25e75))
* typos in README.md ([11c2e58](https://github.com/team-telnyx/telnyx-php/commit/11c2e58acfddc99c04ea9f7091d77b17e2d917ab))
* update broken MDR report link in GetMessage endpoint ([2699795](https://github.com/team-telnyx/telnyx-php/commit/26997956b319b8942acf0848585938982818a49a))


### Chores

* add git attributes and composer lock file ([6b658c6](https://github.com/team-telnyx/telnyx-php/commit/6b658c6f6d3aa73e630e750f81fa597d65aa4f69))
* be more targeted in suppressing superfluous linter warnings ([e01e4c0](https://github.com/team-telnyx/telnyx-php/commit/e01e4c073f0c2ea092737610e44c8d5da0b5ea29))
* better support for phpstan ([d9913c8](https://github.com/team-telnyx/telnyx-php/commit/d9913c86c75d1c8dae30815281ca1dc2c3af4102))
* **client:** refactor error type constructors ([f9e09b1](https://github.com/team-telnyx/telnyx-php/commit/f9e09b1ff88a6e3d70ddbc5f8aa2033a43ae7e5e))
* **client:** send metadata headers ([c05d5f8](https://github.com/team-telnyx/telnyx-php/commit/c05d5f8ce24bcbd444c70825a5e709979eb3edc0))
* ensure constant values are marked as optional in array types ([436e102](https://github.com/team-telnyx/telnyx-php/commit/436e102a6b91c4a1c12a0666c41a33602159467e))
* fix typo in descriptions ([6eb4535](https://github.com/team-telnyx/telnyx-php/commit/6eb4535d62ff795243542df8dc71a4c7b04afcbb))
* formatting ([dc0bb38](https://github.com/team-telnyx/telnyx-php/commit/dc0bb38da1350a5b24ec7045cf03b7d123e8360b))
* **internal:** add a basic client test ([3e4646c](https://github.com/team-telnyx/telnyx-php/commit/3e4646c96246b01ab91e9ef9abf30e3f9b77d03c))
* **internal:** codegen related update ([2739e75](https://github.com/team-telnyx/telnyx-php/commit/2739e759c6f14e5fe66260287eec31ee61a6e13c))
* **internal:** codegen related update ([8828b39](https://github.com/team-telnyx/telnyx-php/commit/8828b39947f141a5d608864f15a7f8bcac9b9409))
* **internal:** codegen related update ([a258a2a](https://github.com/team-telnyx/telnyx-php/commit/a258a2a159d0173a9f453982ae03e36c45364334))
* **internal:** codegen related update ([e7bc2b7](https://github.com/team-telnyx/telnyx-php/commit/e7bc2b7649279aa598fc3a24c8d9b4c34e68389d))
* **internal:** codegen related update ([e672b60](https://github.com/team-telnyx/telnyx-php/commit/e672b60d8b1bcd5029d7af3c7aab79ab9c815f6d))
* **internal:** codegen related update ([22b6e6a](https://github.com/team-telnyx/telnyx-php/commit/22b6e6ace1e3d0a41286a2657715468a5c30c8e7))
* **internal:** codegen related update ([17fef7c](https://github.com/team-telnyx/telnyx-php/commit/17fef7caead62344927d4e45572f42b80f0d9257))
* **internal:** codegen related update ([467d5b6](https://github.com/team-telnyx/telnyx-php/commit/467d5b61f48a0cc8f1252b33f857b1fdfad628d0))
* **internal:** codegen related update ([e9d2d00](https://github.com/team-telnyx/telnyx-php/commit/e9d2d00f1e8b33a809c24fec26ffb7bf3a4c77eb))
* **internal:** codegen related update ([742589e](https://github.com/team-telnyx/telnyx-php/commit/742589eaff17da8c1d5a21015cf8d11af1650d52))
* **internal:** codegen related update ([0aba14f](https://github.com/team-telnyx/telnyx-php/commit/0aba14f55aa8ae3c3d5dd8697eca403a29386955))
* **internal:** codegen related update ([dd41eb3](https://github.com/team-telnyx/telnyx-php/commit/dd41eb3129e702f08fbcc88ea079111e9b1dac47))
* **internal:** codegen related update ([370db61](https://github.com/team-telnyx/telnyx-php/commit/370db616de83bc8cb12bde71ca9360eab6c94660))
* **internal:** codegen related update ([de2fe3a](https://github.com/team-telnyx/telnyx-php/commit/de2fe3a5e38197ac6288da2692b89c6f9168049b))
* **internal:** improve pagination tests ([e1cebdc](https://github.com/team-telnyx/telnyx-php/commit/e1cebdcaa6f7112106cee6be80df7ac40b7b2b1f))
* **internal:** minor test script reformatting ([0e8035b](https://github.com/team-telnyx/telnyx-php/commit/0e8035b5ca2ab51a32c9fa2b633a60255a86038f))
* **internal:** refactor auth by moving concern from base client into client ([d29a138](https://github.com/team-telnyx/telnyx-php/commit/d29a138a9360391b268bc0a4954148b7de0a77e6))
* **internal:** update `actions/checkout` version ([2ef1687](https://github.com/team-telnyx/telnyx-php/commit/2ef1687317ba0e16759e1f8072c6e0c346b88c76))
* **internal:** update phpstan comments ([07a49cb](https://github.com/team-telnyx/telnyx-php/commit/07a49cb869b0f1493e0bb0871dac8e9910dbbfe6))
* **internal:** use single quote instead of double quote string ([b5a27b0](https://github.com/team-telnyx/telnyx-php/commit/b5a27b0d0a4dec64aa148616b11491892ef1d36a))
* none ([7ca410d](https://github.com/team-telnyx/telnyx-php/commit/7ca410d8024d8816e37d7e93a3fa7576b97e28df))
* **readme:** remove beta warning now that we're in ga ([30e3dbf](https://github.com/team-telnyx/telnyx-php/commit/30e3dbf5b2a8b8a7c6d0b7a80d6dd76d26795720))
* Resolved all codegen errors ([fa23422](https://github.com/team-telnyx/telnyx-php/commit/fa234223613c6727e6e333fe98fd85a76f16f8de))
* switch from `#[Api(optional: true|false)]` to `#[Required]|#[Optional]` for annotations ([2a449a2](https://github.com/team-telnyx/telnyx-php/commit/2a449a2ea228dedc3177b87f49801af3475cdd10))
* typing updates ([23f3ffc](https://github.com/team-telnyx/telnyx-php/commit/23f3ffc78e7782c09653e83d5df2e8c4d3e7cdb9))
* use `$self = clone $this;` instead of `$obj = clone $this;` ([e0d1235](https://github.com/team-telnyx/telnyx-php/commit/e0d1235cf0980bea31d62c599e3d554cc994afc8))
* use non-trivial test assertions ([9b194f5](https://github.com/team-telnyx/telnyx-php/commit/9b194f5cf2b0c96699f7d385ddeeb5d2710b6a30))
* use pascal case for phpstan typedefs ([a2f0b26](https://github.com/team-telnyx/telnyx-php/commit/a2f0b26182f6e5854e3f4b337c5662872c176999))
* use single quote strings ([1f5c044](https://github.com/team-telnyx/telnyx-php/commit/1f5c044829647ebeeac90d38ce9d26719edf933f))

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
