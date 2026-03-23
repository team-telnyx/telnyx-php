# Changelog

## 7.9.0 (2026-03-23)

Full Changelog: [v7.8.0...v7.9.0](https://github.com/team-telnyx/telnyx-php/compare/v7.8.0...v7.9.0)

### Features

* **api:** manual updates ([f1522df](https://github.com/team-telnyx/telnyx-php/commit/f1522df43f4241f7d98b6aa7330f38cfac95effe))

## 7.8.0 (2026-03-20)

Full Changelog: [v7.7.0...v7.8.0](https://github.com/team-telnyx/telnyx-php/compare/v7.7.0...v7.8.0)

### Features

* Add Minimax provider support to Voice Designs and Voice Clones API spec ([689bacb](https://github.com/team-telnyx/telnyx-php/commit/689bacb213cc57a81340ea04d1a3a84f6b6dfc05))
* **api:** manual updates ([56df656](https://github.com/team-telnyx/telnyx-php/commit/56df656fd0ae29b9cc0b9b32d4794f3e163da41e))


### Bug Fixes

* use static properties instead of constants for PHP &lt;8.2 compatibility ([0c5f17c](https://github.com/team-telnyx/telnyx-php/commit/0c5f17c9570244566bca3939aa1f2caec692ced4))


### Documentation

* WhatsApp template components schema ([0f8f785](https://github.com/team-telnyx/telnyx-php/commit/0f8f7857b6276b7eadd5fcb00daa7fbbf9c0ed57))


### Refactors

* move webhook verification to separate trait to avoid merge conflicts ([8362e5b](https://github.com/team-telnyx/telnyx-php/commit/8362e5b1069baad4791a42ab692709d11a6fac37))

## 7.7.0 (2026-03-20)

Full Changelog: [v7.6.0...v7.7.0](https://github.com/team-telnyx/telnyx-php/compare/v7.6.0...v7.7.0)

### Features

* **api:** manual updates ([3218dde](https://github.com/team-telnyx/telnyx-php/commit/3218ddef09e5c48831e3d36a32f06590a0edb07d))
* **api:** manual updates ([a25c074](https://github.com/team-telnyx/telnyx-php/commit/a25c074d91e79cc34a45b526e7443c456fbe6442))
* **api:** manual updates ([eac80c9](https://github.com/team-telnyx/telnyx-php/commit/eac80c997cba5fdf78bfb88237644c7f43dc8cf6))
* TELAPPS-5668: Add call.cost webhook event documentation ([d200707](https://github.com/team-telnyx/telnyx-php/commit/d2007079280b23e103945cfeac200c07f8d44a0e))
* **wireless:** add traffic policy profiles endpoints to OpenAPI spec ([70146bb](https://github.com/team-telnyx/telnyx-php/commit/70146bbd1ffe5125854fa801d7f610fa9262255f))


### Documentation

* **tts:** Add Telnyx.Ultra model documentation ([ff96c10](https://github.com/team-telnyx/telnyx-php/commit/ff96c10b93da98aa561f8ddbf9d00dd599bc9e2b))

## 7.6.0 (2026-03-18)

Full Changelog: [v7.5.0...v7.6.0](https://github.com/team-telnyx/telnyx-php/compare/v7.5.0...v7.6.0)

### Features

* **api:** manual updates ([2028034](https://github.com/team-telnyx/telnyx-php/commit/20280349cdcbb188630df9f49c66db5fe2a02e45))

## 7.5.0 (2026-03-18)

Full Changelog: [v7.4.0...v7.5.0](https://github.com/team-telnyx/telnyx-php/compare/v7.4.0...v7.5.0)

### Features

* add message_history, send_message_history_updates, participants to AIAssistantStartRequest ([6869f40](https://github.com/team-telnyx/telnyx-php/commit/6869f407a9fc070df7ab695338a7e62c83890201))

## 7.4.0 (2026-03-18)

Full Changelog: [v7.3.0...v7.4.0](https://github.com/team-telnyx/telnyx-php/compare/v7.3.0...v7.4.0)

### Features

* port-4690: fix LOA configuration preview path (singular → plural) ([67e36e4](https://github.com/team-telnyx/telnyx-php/commit/67e36e4007643171dc97a1c7ed21cd0f341432a3))

## 7.3.0 (2026-03-17)

Full Changelog: [v7.2.0...v7.3.0](https://github.com/team-telnyx/telnyx-php/compare/v7.2.0...v7.3.0)

### Features

* add ai_assistant_join call control command OpenAPI spec ([038ed77](https://github.com/team-telnyx/telnyx-php/commit/038ed7742a9658f18578c9744d0af05a2c882f35))

## 7.2.0 (2026-03-16)

Full Changelog: [v7.1.0...v7.2.0](https://github.com/team-telnyx/telnyx-php/compare/v7.1.0...v7.2.0)

### Features

* CW-2881 update `filter[action_type]` enum ([c146a1e](https://github.com/team-telnyx/telnyx-php/commit/c146a1ece761dc2caf936c40b8e9b56cc370455b))

## 7.1.0 (2026-03-16)

Full Changelog: [v7.0.0...v7.1.0](https://github.com/team-telnyx/telnyx-php/compare/v7.0.0...v7.1.0)

### Features

* AI-2132: Add warm_message_delay_ms to transfer tool OpenAPI spec ([c1aeaab](https://github.com/team-telnyx/telnyx-php/commit/c1aeaab38bde3a18d95b92a92dc89e17680e53d7))


### Chores

* **internal:** tweak CI branches ([ba511dc](https://github.com/team-telnyx/telnyx-php/commit/ba511dcda518b346aacd676983c177e4734166b7))

## 7.0.0 (2026-03-14)

Full Changelog: [v6.74.0...v7.0.0](https://github.com/team-telnyx/telnyx-php/compare/v6.74.0...v7.0.0)

### ⚠ BREAKING CHANGES

* remove unused webhook params

### Features

* Add enable_thinking parameter to chat completions API ([cb7dd2d](https://github.com/team-telnyx/telnyx-php/commit/cb7dd2d18e51d4a264176cd7f446e297ec9c19b3))
* add public x402 payment endpoints to external specs ([b9ef3a7](https://github.com/team-telnyx/telnyx-php/commit/b9ef3a7ffbfa5fda120e6b6a7cf017961c227d27))
* Add Voice Designs and Voice Clones API specification ([a736f8f](https://github.com/team-telnyx/telnyx-php/commit/a736f8f6a4fc3a1bc11ed24e5718d534352021a0))
* AI-2131: Add expressive_mode boolean to VoiceSettings ([565ec08](https://github.com/team-telnyx/telnyx-php/commit/565ec08efd8af1f70feba6187f5e6ef53abd60f8))
* **api:** manual updates ([f2ed6f0](https://github.com/team-telnyx/telnyx-php/commit/f2ed6f0679e90f533ea0a650c0d0cbcb2b310b4e))
* **api:** manual updates ([bd565e4](https://github.com/team-telnyx/telnyx-php/commit/bd565e4fcf5e864fb3afcb64101d13d27fccb2ce))
* **api:** manual updates ([c36e043](https://github.com/team-telnyx/telnyx-php/commit/c36e0437fc7a6540985e62261ebd5e39e92f13be))
* **api:** Merge pull request [#27](https://github.com/team-telnyx/telnyx-php/issues/27) from stainless-sdks/fix/whatsapp-message-templates-conflict ([309d5aa](https://github.com/team-telnyx/telnyx-php/commit/309d5aa364f7ec3c456e0a1fef186155bb6fed94))
* **api:** Merge pull request [#29](https://github.com/team-telnyx/telnyx-php/issues/29) from stainless-sdks/fix-add-voice-model ([1beff75](https://github.com/team-telnyx/telnyx-php/commit/1beff75a3072b897d0cb78d093d94f75da9f1c2a))
* **api:** update OpenAPI spec or Stainless config ([1beff75](https://github.com/team-telnyx/telnyx-php/commit/1beff75a3072b897d0cb78d093d94f75da9f1c2a))


### Bug Fixes

* add missing vertical enum values for 10DLC brand creation (ENGDESK-49040) ([3bd9ad4](https://github.com/team-telnyx/telnyx-php/commit/3bd9ad45c61876dc351c896933dbebfedf9fb1ed))
* **call-recordings:** align OpenAPI spec with implementation ([07cb413](https://github.com/team-telnyx/telnyx-php/commit/07cb4136120a4cc4f9374ee484ba8b9e51e377df))
* remove unused webhook params ([4d77959](https://github.com/team-telnyx/telnyx-php/commit/4d77959d8c253712cac52eab1b779552740fd306))
* rename whatsapp.message_templates to whatsapp.templates to avoid conflict ([309d5aa](https://github.com/team-telnyx/telnyx-php/commit/309d5aa364f7ec3c456e0a1fef186155bb6fed94))
* update wait_seconds example to 0.5 ([265dcef](https://github.com/team-telnyx/telnyx-php/commit/265dceffb3ea188e4ddc6f7e85c40cdfd1cb8935))


### Reverts

* restore stainless.yml changes removed in 1de6067 ([f7f9ee4](https://github.com/team-telnyx/telnyx-php/commit/f7f9ee422b7f41e2cecaba85aa6f2b73cdf3d28e))

## 6.74.0 (2026-03-10)

Full Changelog: [v6.73.1...v6.74.0](https://github.com/team-telnyx/telnyx-php/compare/v6.73.1...v6.74.0)

### Features

* **api:** manual updates ([07e75fb](https://github.com/team-telnyx/telnyx-php/commit/07e75fbab0e9021728866c87bfc009dafd077ac3))

## 6.73.1 (2026-03-10)

Full Changelog: [v6.73.0...v6.73.1](https://github.com/team-telnyx/telnyx-php/compare/v6.73.0...v6.73.1)

### Bug Fixes

* add title to InviteTool.invite for Stainless SDK ([61f4448](https://github.com/team-telnyx/telnyx-php/commit/61f4448b4419a9362ff33ca8027c27ead1df0249))

## 6.73.0 (2026-03-10)

Full Changelog: [v6.72.0...v6.73.0](https://github.com/team-telnyx/telnyx-php/compare/v6.72.0...v6.73.0)

### Features

* **messaging:** add wait_seconds to OutboundMessagePayload example ([3559413](https://github.com/team-telnyx/telnyx-php/commit/3559413361fbc93368bafb1165b72828050c1a52))

## 6.72.0 (2026-03-10)

Full Changelog: [v6.71.0...v6.72.0](https://github.com/team-telnyx/telnyx-php/compare/v6.71.0...v6.72.0)

### Features

* **api:** manual updates ([9c5537e](https://github.com/team-telnyx/telnyx-php/commit/9c5537ecda679dec9c853c680f74551b65410689))

## 6.71.0 (2026-03-10)

Full Changelog: [v6.70.0...v6.71.0](https://github.com/team-telnyx/telnyx-php/compare/v6.70.0...v6.71.0)

### Features

* CW-2881 publish wireless VoLTE docs to prod ([646e35c](https://github.com/team-telnyx/telnyx-php/commit/646e35c46aa7b6a4e0e49760f9fa78adf1f07996))

## 6.70.0 (2026-03-09)

Full Changelog: [v6.69.0...v6.70.0](https://github.com/team-telnyx/telnyx-php/compare/v6.69.0...v6.70.0)

### Features

* TELAPPS-ENGDESK-49737 Add prevent_double_bridge param to dial ([0afab73](https://github.com/team-telnyx/telnyx-php/commit/0afab7343e2976fdd6351b98cd6527223de8bded))

## 6.69.0 (2026-03-09)

Full Changelog: [v6.68.0...v6.69.0](https://github.com/team-telnyx/telnyx-php/compare/v6.68.0...v6.69.0)

### Features

* MSG-6418: remove flashcall from hosted number verification codes endpoint ([84dbc7f](https://github.com/team-telnyx/telnyx-php/commit/84dbc7f8b5aa07b35a6e5eac2e339c7d8380ed90))

## 6.68.0 (2026-03-06)

Full Changelog: [v6.67.0...v6.68.0](https://github.com/team-telnyx/telnyx-php/compare/v6.67.0...v6.68.0)

### Features

* Assistant tags ([4e5cef8](https://github.com/team-telnyx/telnyx-php/commit/4e5cef839b579741f10717346691298a72eb7b73))


### Documentation

* **messaging:** Add wait_seconds to message response schemas ([be256a0](https://github.com/team-telnyx/telnyx-php/commit/be256a01537d71a1eb053c6e196c21e954d4492f))

## 6.67.0 (2026-03-05)

Full Changelog: [v6.66.0...v6.67.0](https://github.com/team-telnyx/telnyx-php/compare/v6.66.0...v6.67.0)

### Features

* Changing a tag for filebased STT endpoint ([23e64ac](https://github.com/team-telnyx/telnyx-php/commit/23e64aca0da0df532fd9fb785bc07d54e0179cc6))

## 6.66.0 (2026-03-05)

Full Changelog: [v6.65.0...v6.66.0](https://github.com/team-telnyx/telnyx-php/compare/v6.65.0...v6.66.0)

### Features

* **api:** manual updates ([69ec321](https://github.com/team-telnyx/telnyx-php/commit/69ec321d499ac82572b83ef6133e23caeb488f30))

## 6.65.0 (2026-03-04)

Full Changelog: [v6.64.0...v6.65.0](https://github.com/team-telnyx/telnyx-php/compare/v6.64.0...v6.65.0)

### Features

* **api:** manual updates ([5cee3da](https://github.com/team-telnyx/telnyx-php/commit/5cee3da3503c148969189ecc700015a022260981))

## 6.64.0 (2026-03-04)

Full Changelog: [v6.63.0...v6.64.0](https://github.com/team-telnyx/telnyx-php/compare/v6.63.0...v6.64.0)

### Features

* **api:** manual updates ([b8c43d0](https://github.com/team-telnyx/telnyx-php/commit/b8c43d06b922f4149407773f31af3b5c94235401))

## 6.63.0 (2026-03-04)

Full Changelog: [v6.62.0...v6.63.0](https://github.com/team-telnyx/telnyx-php/compare/v6.62.0...v6.63.0)

### Features

* [TDA-6425] Add Session Analysis API spec to public docs ([548bb2d](https://github.com/team-telnyx/telnyx-php/commit/548bb2dee20c0ede0ebcae92656703d631a76725))
* Add AI Assistant spec updates for FE tickets ([922ba21](https://github.com/team-telnyx/telnyx-php/commit/922ba2163fde0dad6bf87244313970fd914774b5))
* Add deepgram/nova-3 transcription engine option to record_start ([fa37ab5](https://github.com/team-telnyx/telnyx-php/commit/fa37ab55384d6e7bf5ee1b18de5a67ca1d20cd7a))
* Add dynamic_variables field to scheduled event schemas ([556c5e5](https://github.com/team-telnyx/telnyx-php/commit/556c5e5d70626c9fe6f6721745e368a93e9cd9e5))
* Add ED25519 webhook signature verification ([766d8f1](https://github.com/team-telnyx/telnyx-php/commit/766d8f10db26a74a6d87cb2e15c89de4c8c7b309))
* Add Label parameter to Dial Conference Participant endpoint ([f7961b1](https://github.com/team-telnyx/telnyx-php/commit/f7961b1f68ee43134a14ff5aa09b92dcafe8daa0))
* Add Minimax and Resemble voice providers for speak commands ([b10e41a](https://github.com/team-telnyx/telnyx-php/commit/b10e41a0219f64172170add47a84aca3b131717c))
* Add missing TTS voice settings schemas and update voice descriptions ([67298cf](https://github.com/team-telnyx/telnyx-php/commit/67298cf0bf185c0cf4c53cff22ab40c46b1ff241))
* Add OpenAI-compatible embeddings API spec ([0eaecec](https://github.com/team-telnyx/telnyx-php/commit/0eaececf61b0a17d3f11775c3c236fc567d349c1))
* Add Post /v2/calls/:call_control_id/actions/ai_assistant_add_messages ([8f45329](https://github.com/team-telnyx/telnyx-php/commit/8f45329f6a529c0eda9af2c7d9506bf237768406))
* add setters to constant parameters ([f6cad02](https://github.com/team-telnyx/telnyx-php/commit/f6cad02e947698b895ac008893cf487a913b8f88))
* Add smart encoding fields to messaging API spec ([1d3a2c1](https://github.com/team-telnyx/telnyx-php/commit/1d3a2c18e67381275fc29f29ff461227df171899))
* Add Texml parameter to create call endpoint [ENGDESK-49187] ([2755294](https://github.com/team-telnyx/telnyx-php/commit/2755294d1ed13c45acbf59a47985f10c49ef1ac0))
* Add text-to-speech WebSocket streaming OpenAPI spec ([0940056](https://github.com/team-telnyx/telnyx-php/commit/0940056c80e91dba186e7f34d59fca08ba5f2ed6))
* Add TTS file-based endpoint spec ([6e398b3](https://github.com/team-telnyx/telnyx-php/commit/6e398b38db562d86d9c5b65c2e60a02638408598))
* Add widget_settings to AI Assistant and import_ids to ImportAssistant… ([73a044a](https://github.com/team-telnyx/telnyx-php/commit/73a044a4c10494ae95a412e375bdfa2ddf85dd00))
* AI-2078 Feature: API endpoint to disable AI assistant mid-conversation ([3795fe3](https://github.com/team-telnyx/telnyx-php/commit/3795fe30036680730d2896f8461b5de3e0119966))
* AI-2086: Add AI Missions endpoints to inference spec ([172b5bf](https://github.com/team-telnyx/telnyx-php/commit/172b5bfefd7a65994a910420109b33018e6bc7aa))
* AI-2090: Add skip_turn tool type to assistant config schema ([d5d120e](https://github.com/team-telnyx/telnyx-php/commit/d5d120e1c9e2781b6ccd79b460baafba85995ff0))
* AI-2093: Add language_boost to MiniMax voice settings ([412e95d](https://github.com/team-telnyx/telnyx-php/commit/412e95d858737c8678b3ce1a3864f42748372c8a))
* AI-2106: Add invite tool schema to inference OpenAPI spec ([d24385b](https://github.com/team-telnyx/telnyx-php/commit/d24385b8a42f35bc8c11458b96ee1099520dc9b9))
* Align transfer tool AMD spec with portal: premium mode, drop continue actions ([3b1f392](https://github.com/team-telnyx/telnyx-php/commit/3b1f3926c08d117a59784b8f52db705db89ea073))
* **api:** add webhook verification ([d471a3b](https://github.com/team-telnyx/telnyx-php/commit/d471a3b4f563d1146b044f801f80ab81380589b4))
* **api:** fix default pagination by correctly using nested params ([3547d06](https://github.com/team-telnyx/telnyx-php/commit/3547d06ec2758481cd6b9fb27840ffb90fc2d5e0))
* **api:** manual updates ([b9381f7](https://github.com/team-telnyx/telnyx-php/commit/b9381f7f1dcfa65085115ae3d5dc0ca78eac9dbb))
* **api:** manual updates ([02be47a](https://github.com/team-telnyx/telnyx-php/commit/02be47a19cd482ebb80eb78908345d693e0fd796))
* **api:** manual updates ([13ce176](https://github.com/team-telnyx/telnyx-php/commit/13ce176a3e0a967805c2efb4d3e8fc1a07bd5a06))
* **api:** manual updates ([d96df35](https://github.com/team-telnyx/telnyx-php/commit/d96df351be8ee164a21b4ce49830c2b473e6bb6a))
* **api:** manual updates ([5e710cd](https://github.com/team-telnyx/telnyx-php/commit/5e710cd062ce90f178709c714d34808bb19c3bba))
* **api:** manual updates ([bc51ba9](https://github.com/team-telnyx/telnyx-php/commit/bc51ba9875cc4bb12d221ca24925aca37654802e))
* **api:** manual updates ([4d71333](https://github.com/team-telnyx/telnyx-php/commit/4d71333a863f9868be7a1070da778df7aa65f773))
* **api:** manual updates ([465964d](https://github.com/team-telnyx/telnyx-php/commit/465964d20ac07325cd8485b8e89c10b4db1a350f))
* **api:** manual updates ([363ffce](https://github.com/team-telnyx/telnyx-php/commit/363ffce0e9f37083bf866ee83f36f2cb608c186e))
* **api:** manual updates ([d559beb](https://github.com/team-telnyx/telnyx-php/commit/d559beb1c1b44b47152b9a20d4d23cf69a2f3b0c))
* **api:** manual updates ([f2040a8](https://github.com/team-telnyx/telnyx-php/commit/f2040a828a9e6c2ec1e7db4ef61136bc6dd0772d))
* **api:** manual updates ([35fc30a](https://github.com/team-telnyx/telnyx-php/commit/35fc30a0077e8d0de14660378e440a899b7799d0))
* **api:** manual updates ([305f673](https://github.com/team-telnyx/telnyx-php/commit/305f673516fcd9d88c00d595f518668d3735cff2))
* **api:** manual updates ([44f4455](https://github.com/team-telnyx/telnyx-php/commit/44f44557b6d9d8cdc1c951a2a5f5d9a2ed150a8a))
* **api:** manual updates ([f18f12f](https://github.com/team-telnyx/telnyx-php/commit/f18f12fcb9b414c1d4e7f4953dc2146902207eaa))
* **api:** manual updates ([f3bf2f2](https://github.com/team-telnyx/telnyx-php/commit/f3bf2f2dd0eb8276db7d6cc81b246d194c4525cb))
* **api:** manual updates ([1684f75](https://github.com/team-telnyx/telnyx-php/commit/1684f7570055f49ed215fe3ad79691ade521b49a))
* **api:** manual updates ([3fd4cd0](https://github.com/team-telnyx/telnyx-php/commit/3fd4cd07022601e4d0faaf1ddbacf9228dc2b1bf))
* **api:** manual updates ([d9bd72c](https://github.com/team-telnyx/telnyx-php/commit/d9bd72c060a793ea16bb8c57d7ace17bda7a7246))
* **api:** manual updates ([8f82304](https://github.com/team-telnyx/telnyx-php/commit/8f823048bb9a89c7e77aba269a46d5c30b619bda))
* **api:** manual updates ([6ea6fa9](https://github.com/team-telnyx/telnyx-php/commit/6ea6fa95a6111e7a2a8a61aea6abdb3002f882c8))
* **api:** manual updates ([b19a42a](https://github.com/team-telnyx/telnyx-php/commit/b19a42a8e7a3846fca12c37d43546d0b7cc68b2d))
* **api:** manual updates ([9fe45ca](https://github.com/team-telnyx/telnyx-php/commit/9fe45ca3edf2de56cf255e5037c9bbde0f6bdeda))
* **api:** manual updates ([6e8f71d](https://github.com/team-telnyx/telnyx-php/commit/6e8f71d6cc1ab8bfb20b025e7fa9e3e3cfec9f8d))
* **api:** manual updates ([1f09e38](https://github.com/team-telnyx/telnyx-php/commit/1f09e386b9a9d4d27052590ee4bf64591bc97ab6))
* **api:** manual updates ([4586f01](https://github.com/team-telnyx/telnyx-php/commit/4586f01628527e10c850a40d6188f0de1780927e))
* **api:** manual updates ([a9d142f](https://github.com/team-telnyx/telnyx-php/commit/a9d142f32df1aff447dbc53c9dd6038dad960580))
* **api:** manual updates ([124b090](https://github.com/team-telnyx/telnyx-php/commit/124b090aefd9cc3a61b159756b40bab7f392973e))
* **api:** manual updates ([8d5bbf0](https://github.com/team-telnyx/telnyx-php/commit/8d5bbf03cc7f5356cd62f58e9b673bdf772207d2))
* **api:** manual updates ([3d22dce](https://github.com/team-telnyx/telnyx-php/commit/3d22dce627368e583f65351ce5ab87358e907c97))
* **api:** manual updates ([b39c806](https://github.com/team-telnyx/telnyx-php/commit/b39c806069baa6d9ddeddaa0457026bf2f207298))
* **api:** manual updates ([0a8b2fa](https://github.com/team-telnyx/telnyx-php/commit/0a8b2faa595d19adc5a9e458f5cc27db50190d65))
* **api:** manual updates ([90b9b9e](https://github.com/team-telnyx/telnyx-php/commit/90b9b9e698c7498e378dabbf19e570c6816ca87c))
* **api:** manual updates ([3d73641](https://github.com/team-telnyx/telnyx-php/commit/3d73641c693bca875f8750fb024c469b9e2df6cb))
* **api:** manual updates ([2fe1ae9](https://github.com/team-telnyx/telnyx-php/commit/2fe1ae92cfaef9809d5e45e4ec041d41c06251cb))
* **api:** manual updates ([bef3f0f](https://github.com/team-telnyx/telnyx-php/commit/bef3f0fcc61bd006e6cec97057d30ac8ee1da7e8))
* **api:** manual updates ([ba1f28b](https://github.com/team-telnyx/telnyx-php/commit/ba1f28bf658b629a8a415df021c118a995bf5fcf))
* **api:** manual updates ([218378b](https://github.com/team-telnyx/telnyx-php/commit/218378b26a7e5044017b379bbb7dfe944a080021))
* **api:** manual updates ([0250eac](https://github.com/team-telnyx/telnyx-php/commit/0250eacfef0bcdffb7eb71aff9a1d9a15427f25d))
* **api:** manual updates ([5545413](https://github.com/team-telnyx/telnyx-php/commit/5545413d7aab3dfda5085a0cb4637f9ab9e1b5f0))
* **api:** manual updates to include models ([cbafb8c](https://github.com/team-telnyx/telnyx-php/commit/cbafb8c42982318859a31a628fd60eca4b4f2658))
* **api:** Merge pull request [#22](https://github.com/team-telnyx/telnyx-php/issues/22) from stainless-sdks/add-all-webhook-models ([6cab36b](https://github.com/team-telnyx/telnyx-php/commit/6cab36b2d6f24278e7b4129b31a2f9c264a61526))
* **api:** Merge pull request [#23](https://github.com/team-telnyx/telnyx-php/issues/23) from stainless-sdks/fix/deepgram-nova3-enum-duplicates ([85ce0a0](https://github.com/team-telnyx/telnyx-php/commit/85ce0a03813828749979dc36976af0d191680acc))
* **api:** revert bad update to spec ([5616b63](https://github.com/team-telnyx/telnyx-php/commit/5616b639c5e470af0178e0c8569a562e39b54754))
* Changing the tag for TTS endpoint ([024e5e0](https://github.com/team-telnyx/telnyx-php/commit/024e5e0465d28d6291a32a50e6c28f56ca00d09c))
* Deploy dev/mc vady wip ([848239f](https://github.com/team-telnyx/telnyx-php/commit/848239fad4941df22da7a77533eb2cdae2edbdfa))
* Deploy dev/mc vady wip ([629f483](https://github.com/team-telnyx/telnyx-php/commit/629f483c060794be15d54cb4919aa7f274f0b861))
* ENGDESK-49554: Add quail_voice_focus to noise suppression engine enums ([f7d7e09](https://github.com/team-telnyx/telnyx-php/commit/f7d7e09b43e2180b2dfc12095ba38052683c9833))
* Fix broken documentation links ([c86d35b](https://github.com/team-telnyx/telnyx-php/commit/c86d35bd2d514951c561cef30717ab10afd6aa3a))
* fix links ([408b470](https://github.com/team-telnyx/telnyx-php/commit/408b4709dc397d5134b43d71ee9869b625ff1847))
* fix schema in emergency address schema ([f77c073](https://github.com/team-telnyx/telnyx-php/commit/f77c0733c26b3b1bbaf94dd3c52c0da9a454a69f))
* fix-external-connection-link ([88d7bc8](https://github.com/team-telnyx/telnyx-php/commit/88d7bc8d7350bfde511be1455d46dc2cb55d5aa8))
* fix-redocly-lint-issues ([d386a39](https://github.com/team-telnyx/telnyx-php/commit/d386a394b0982924748836c6986042b091aca1a0))
* fix-stainless-sdk-timeout ([2fa7aba](https://github.com/team-telnyx/telnyx-php/commit/2fa7abab551f9edab1b3376513e667abeac4fb4b))
* implement oauth flow ([88ec851](https://github.com/team-telnyx/telnyx-php/commit/88ec851d61f9a55684cd9cbe11ca106d01f96ff0))
* jira-engdesk-48800 add organizations-related docs to the external api… ([0edbfb0](https://github.com/team-telnyx/telnyx-php/commit/0edbfb0b0c08e8517041b338630f0cb79e0d269d))
* jira-engdesk-49089 add new connection jitter buffer related fields ([f6eeac0](https://github.com/team-telnyx/telnyx-php/commit/f6eeac0e18efa0db31cefb25c1a218b1f5e526c7))
* Limit detection_mode enum to disabled and detect only ([41491fe](https://github.com/team-telnyx/telnyx-php/commit/41491fef737b4a12f31f68fee65e43e421b8166e))
* Merge TTS file-based spec into text-to-speech.json ([8bcb4ec](https://github.com/team-telnyx/telnyx-php/commit/8bcb4ec15f261eb9b5f29ddaabb47936868a087c))
* MSG-6148: adding the new campaignVerifyAuthorizationToken field and missing GET OTP endpoint ([9c2dcca](https://github.com/team-telnyx/telnyx-php/commit/9c2dcca55a7ea5d32529cd1b6e604f0361b5facb))
* MSG-6228: MSG-6228: Add smart_encoding option for SMS character encoding optimization ([312d211](https://github.com/team-telnyx/telnyx-php/commit/312d211a3d66c4673de684e172123bed5ed2525c))
* PORTAL-5923: Add stored_payment_transactions endpoint to OpenAPI docs ([c209462](https://github.com/team-telnyx/telnyx-php/commit/c2094625089d7e5de1fa11bea96ee056f4782a9f))
* Revert "fix emergency settings -schema" ([ea47650](https://github.com/team-telnyx/telnyx-php/commit/ea47650e73a4e01b88b075c6f19d40ac0696929e))
* **stt:** add SttClientEvent schema for Stainless WebSocket config ([8f0c688](https://github.com/team-telnyx/telnyx-php/commit/8f0c688cdddf078149c6ab931fa21a9a29fb0897))
* **stt:** add WebSocket event schemas for Stainless SDK generation ([d462fe4](https://github.com/team-telnyx/telnyx-php/commit/d462fe4825253dabfd6302dd46a0db6572aef3ff))
* TELAPPS Add ApplicationSid param ([a6551ea](https://github.com/team-telnyx/telnyx-php/commit/a6551ea25b595da27626a65a56ccfa93f0f62d35))
* TELAPPS Add GET /texml/Accounts/{account_sid}/Queues endpoint ([8ba8e8f](https://github.com/team-telnyx/telnyx-php/commit/8ba8e8f243faf71970a0ba67a919a84f9eb40ccb))
* TELAPPS Add interim_results to deepgram config ([c3fa763](https://github.com/team-telnyx/telnyx-php/commit/c3fa763ac54ce96fc76e4c8443b3e5dff0fcb72a))
* TELAPPS Add prevent_double_bridge to bridge command ([c94c83c](https://github.com/team-telnyx/telnyx-php/commit/c94c83c28237f91d5c1becbb69a02df69fca9bdc))
* TELAPPS-5507: Add Krisp engine description for noise suppression ([52008e1](https://github.com/team-telnyx/telnyx-php/commit/52008e1661403198eb6b9c84e9dbece5477fffef))
* TELAPPS-ENGDESK-47967 Add black_threshold parameter to send_fax request ([168e249](https://github.com/team-telnyx/telnyx-php/commit/168e2492716279d8d29e5cdfe99296752b5b80dc))
* TELAPPS-ENGDESK-48790 Remove duplicated webhooks ([78b5c34](https://github.com/team-telnyx/telnyx-php/commit/78b5c34cababac79b0fb8f529cbc7dc8326d07c0))
* TELAPPS-ENGDESK-48951 add channels to conf record start ([71d4e2f](https://github.com/team-telnyx/telnyx-php/commit/71d4e2ff671db989fce514f06ccea8987a3d09ae))
* Update voicemail_detection description with AMD enablement info ([489c155](https://github.com/team-telnyx/telnyx-php/commit/489c155537a77cec46e13580eaa7106671669ecc))
* use `$_ENV` aware getenv helper ([652eab5](https://github.com/team-telnyx/telnyx-php/commit/652eab5f7afbbe93574f313ca514443104cef555))


### Bug Fixes

* add [@var](https://github.com/var) annotations for coerce return types ([1ee3f1f](https://github.com/team-telnyx/telnyx-php/commit/1ee3f1f191f441947943751e9cdeeb2cc8b3ec32))
* **client:** revert change to certain pagination metadata types ([feb6375](https://github.com/team-telnyx/telnyx-php/commit/feb6375c5b9c058c1b2eb3ace1bfdc8e964a61e2))
* correct broken link to List SIM Card Actions endpoint in SIM car… ([13f349e](https://github.com/team-telnyx/telnyx-php/commit/13f349e3f2e68ac3cbe22610d3235a8777274706))
* inline parsing to satisfy PHPStan return types ([591e8e8](https://github.com/team-telnyx/telnyx-php/commit/591e8e8f0e1d83108edf0f1508b9ad1f12c0207e))
* make text field optional in AssistantSmsChatReq schema ([add2fb4](https://github.com/team-telnyx/telnyx-php/commit/add2fb4024ae4ab4442cb7220977873ba521a140))
* move unsupported string formats to x-format ([81a8ddb](https://github.com/team-telnyx/telnyx-php/commit/81a8ddbd1f334233b7d99dcfe2aa8d567fda1c51))
* narrow porting event_type enums for SDK discriminator support ([74c178c](https://github.com/team-telnyx/telnyx-php/commit/74c178c16fc14e6c783c41911e806107a7b40518))
* OAS drift — 10dlc.json (messaging-campaign-registry) ([4688269](https://github.com/team-telnyx/telnyx-php/commit/4688269f1e68aeb47c3d801bab5a6281ef449e99))
* OAS drift — messaging.json (messaging-settings + messaging-outbound) ([6167fb7](https://github.com/team-telnyx/telnyx-php/commit/6167fb77bfe42c97dbbffb2d578f7babd4f009d8))
* OAS drift — toll-free-verification.json (messaging-tf-verify) ([fba0790](https://github.com/team-telnyx/telnyx-php/commit/fba0790c0ddc8cf979ef73bcbc1b7619c9c177e9))
* OAS drift — verify.json (messaging-2fa) ([cab074b](https://github.com/team-telnyx/telnyx-php/commit/cab074bad71fd9c076241fa8bfc64464d88ea9d2))
* PHPStan lint errors ([d1d0932](https://github.com/team-telnyx/telnyx-php/commit/d1d093220482d8cd4df9a5e35031d10548b60c8f))
* remove deprecated TeXML API endpoints from OpenAPI spec ([8ffc576](https://github.com/team-telnyx/telnyx-php/commit/8ffc576c883f2af9049cfe44cec1f3d4d8ad134a))
* remove invalid discriminators from string enum schemas ([a0a56b0](https://github.com/team-telnyx/telnyx-php/commit/a0a56b00756fe6fe6efcae43bbcc046b78dffe0f))
* resolve merge conflict in webhooks ([67c3453](https://github.com/team-telnyx/telnyx-php/commit/67c3453e9ce72e079398c706ea5c1eef77210fec))
* StringFormatNotSupported ([5e1e638](https://github.com/team-telnyx/telnyx-php/commit/5e1e6382f2152b47d2451cb90bdf4e9701a98bf5))
* typos in README.md ([11c2e58](https://github.com/team-telnyx/telnyx-php/commit/11c2e58acfddc99c04ea9f7091d77b17e2d917ab))
* update broken MDR report link in GetMessage endpoint ([2699795](https://github.com/team-telnyx/telnyx-php/commit/26997956b319b8942acf0848585938982818a49a))
* use PaginationMeta schema for ListFaxesResponse.meta ([c9e2035](https://github.com/team-telnyx/telnyx-php/commit/c9e203570f96d735175648037787543cb2edb0ca))
* Use proper converter pattern and fix test key format ([e563ed5](https://github.com/team-telnyx/telnyx-php/commit/e563ed53c68b40a65e8b60835597086c2b6bc49c))
* used redirect count instead of retry count in base client ([71d9bcc](https://github.com/team-telnyx/telnyx-php/commit/71d9bcca9e0d1a86e9a8d639ae7c642dbde8acac))


### Chores

* add git attributes and composer lock file ([6b658c6](https://github.com/team-telnyx/telnyx-php/commit/6b658c6f6d3aa73e630e750f81fa597d65aa4f69))
* bring back other changes ([6081ba0](https://github.com/team-telnyx/telnyx-php/commit/6081ba0bf9b8894fbb62e883e37f7b695652bd05))
* **docs:** add missing descriptions ([89c9441](https://github.com/team-telnyx/telnyx-php/commit/89c9441026ffca1bf0f469c7d6b821a030d9d602))
* fix typo in descriptions ([6eb4535](https://github.com/team-telnyx/telnyx-php/commit/6eb4535d62ff795243542df8dc71a4c7b04afcbb))
* **internal:** codegen related update ([e1f16f4](https://github.com/team-telnyx/telnyx-php/commit/e1f16f4596d30c8a2cc63f65edf5c89244402a63))
* **internal:** codegen related update ([2739e75](https://github.com/team-telnyx/telnyx-php/commit/2739e759c6f14e5fe66260287eec31ee61a6e13c))
* **internal:** codegen related update ([8828b39](https://github.com/team-telnyx/telnyx-php/commit/8828b39947f141a5d608864f15a7f8bcac9b9409))
* **internal:** codegen related update ([a258a2a](https://github.com/team-telnyx/telnyx-php/commit/a258a2a159d0173a9f453982ae03e36c45364334))
* **internal:** codegen related update ([e7bc2b7](https://github.com/team-telnyx/telnyx-php/commit/e7bc2b7649279aa598fc3a24c8d9b4c34e68389d))
* **internal:** codegen related update ([e672b60](https://github.com/team-telnyx/telnyx-php/commit/e672b60d8b1bcd5029d7af3c7aab79ab9c815f6d))
* **internal:** codegen related update ([22b6e6a](https://github.com/team-telnyx/telnyx-php/commit/22b6e6ace1e3d0a41286a2657715468a5c30c8e7))
* **internal:** ignore stainless-internal artifacts ([47aa5d2](https://github.com/team-telnyx/telnyx-php/commit/47aa5d232c342ae01cff2274ef50efa0eec7333b))
* **internal:** minor test script reformatting ([0e8035b](https://github.com/team-telnyx/telnyx-php/commit/0e8035b5ca2ab51a32c9fa2b633a60255a86038f))
* **internal:** php cs fixer should not be memory limited ([17dd0a6](https://github.com/team-telnyx/telnyx-php/commit/17dd0a6d775b5c4cee3004772d9e3ce725962b1e))
* **internal:** remove mock server code ([c4c1e83](https://github.com/team-telnyx/telnyx-php/commit/c4c1e83869d36d9138b758a5337f7e77e0e9570a))
* **internal:** update `actions/checkout` version ([2ef1687](https://github.com/team-telnyx/telnyx-php/commit/2ef1687317ba0e16759e1f8072c6e0c346b88c76))
* **internal:** update phpstan comments ([07a49cb](https://github.com/team-telnyx/telnyx-php/commit/07a49cb869b0f1493e0bb0871dac8e9910dbbfe6))
* **internal:** upgrade phpunit ([83696da](https://github.com/team-telnyx/telnyx-php/commit/83696dae05262befaa431a1b4eda521c2deddea8))
* **readme:** remove beta warning now that we're in ga ([30e3dbf](https://github.com/team-telnyx/telnyx-php/commit/30e3dbf5b2a8b8a7c6d0b7a80d6dd76d26795720))
* **release:** add packagist trigger on published release ([bc6a722](https://github.com/team-telnyx/telnyx-php/commit/bc6a722a20a0d37899223d6d69439cb6f7adc425))
* **test:** update skip reason message ([02fab82](https://github.com/team-telnyx/telnyx-php/commit/02fab82d8dac1a15321dfd72479a3adf1d879dde))
* update mock server docs ([4ab7726](https://github.com/team-telnyx/telnyx-php/commit/4ab77269bba4054698132af6df2de0f2a1a9d1da))


### Documentation

* add service_provider_login_url to authentication provider settings ([6fc1d65](https://github.com/team-telnyx/telnyx-php/commit/6fc1d65b20ac9a729ed30c672ea32b2efda755ef))
* **call-control:** Add missing conference endpoints ([77bb120](https://github.com/team-telnyx/telnyx-php/commit/77bb12095b673eca36b2b54ae5bd2614c1429257))
* **call-control:** Add missing parameters to call control endpoints ([1ef59be](https://github.com/team-telnyx/telnyx-php/commit/1ef59bed3448ed87a0cea2b0a0e31b85da1fa01d))
* **call-control:** Add missing params to hangup, bridge, answer ([83055d8](https://github.com/team-telnyx/telnyx-php/commit/83055d8fd797d1cb26eaabd7385126725129f239))
* **call-control:** Add queue CRUD endpoints ([040ea7c](https://github.com/team-telnyx/telnyx-php/commit/040ea7c514f05c3ec0a8b03a5653c775a11c6577))
* **call-scripting:** add Timeout and TimeLimit to InitiateTexmlCall ([ee932d7](https://github.com/team-telnyx/telnyx-php/commit/ee932d74cfab47bbeec01dd56c8f6096525a2407))

## 6.62.0 (2026-03-04)

Full Changelog: [v6.61.0...v6.62.0](https://github.com/team-telnyx/telnyx-php/compare/v6.61.0...v6.62.0)

### Features

* **api:** manual updates ([24944e2](https://github.com/team-telnyx/telnyx-php/commit/24944e228f7962a84564d57b354a146a59cfa327))

## 6.61.0 (2026-03-04)

Full Changelog: [v6.60.0...v6.61.0](https://github.com/team-telnyx/telnyx-php/compare/v6.60.0...v6.61.0)

### Features

* **api:** manual updates ([9d82e05](https://github.com/team-telnyx/telnyx-php/commit/9d82e055a4d5c6db79cc5a200b4627b6ae3b1713))

## 6.60.0 (2026-03-03)

Full Changelog: [v6.59.0...v6.60.0](https://github.com/team-telnyx/telnyx-php/compare/v6.59.0...v6.60.0)

### Features

* **api:** manual updates ([6110247](https://github.com/team-telnyx/telnyx-php/commit/6110247ac8c4331c9f19ddf86ead42e94ef7d39c))

## 6.59.0 (2026-03-03)

Full Changelog: [v6.58.0...v6.59.0](https://github.com/team-telnyx/telnyx-php/compare/v6.58.0...v6.59.0)

### Features

* **api:** manual updates ([175d669](https://github.com/team-telnyx/telnyx-php/commit/175d669a1e0cdaf8e0c212fa81a2f985270c7ab0))

## 6.58.0 (2026-03-03)

Full Changelog: [v6.57.0...v6.58.0](https://github.com/team-telnyx/telnyx-php/compare/v6.57.0...v6.58.0)

### Features

* [TDA-6425] Add Session Analysis API spec to public docs ([01e4a05](https://github.com/team-telnyx/telnyx-php/commit/01e4a05bd7e07568d8566d1b0dec8c61f1290bf8))

## 6.57.0 (2026-03-03)

Full Changelog: [v6.56.0...v6.57.0](https://github.com/team-telnyx/telnyx-php/compare/v6.56.0...v6.57.0)

### Features

* AI-2106: Add invite tool schema to inference OpenAPI spec ([c158f88](https://github.com/team-telnyx/telnyx-php/commit/c158f88673131a714aeb11ce64deadf714bd30d5))
* **api:** add webhook verification ([11de4c7](https://github.com/team-telnyx/telnyx-php/commit/11de4c788a136a78bd2e7411615f31ecf9164e2f))
* **api:** manual updates ([86c402c](https://github.com/team-telnyx/telnyx-php/commit/86c402ce76083809601754b5cf57440db0feb721))
* **api:** manual updates ([bcf822e](https://github.com/team-telnyx/telnyx-php/commit/bcf822e68a1e96c122693ab5f41fcd70349ba00c))
* Changing the tag for TTS endpoint ([1ec27fd](https://github.com/team-telnyx/telnyx-php/commit/1ec27fd6a6d32c4bdbb427a715057e9c36d24d83))
* Merge TTS file-based spec into text-to-speech.json ([2dd406b](https://github.com/team-telnyx/telnyx-php/commit/2dd406be9d41aa7fb1af056d817f80c3fd74223b))


### Bug Fixes

* narrow porting event_type enums for SDK discriminator support ([f21e5bd](https://github.com/team-telnyx/telnyx-php/commit/f21e5bda074d5b35f69e6e87f469621591730178))
* resolve merge conflict in webhooks ([7d9dd8d](https://github.com/team-telnyx/telnyx-php/commit/7d9dd8d7383284df44add3c0c7afd1b9498a2211))


### Chores

* **docs:** add missing descriptions ([ad264ae](https://github.com/team-telnyx/telnyx-php/commit/ad264ae2a0a654e689f104f644fa639a65fb47fb))

## 6.56.0 (2026-02-27)

Full Changelog: [v6.55.0...v6.56.0](https://github.com/team-telnyx/telnyx-php/compare/v6.55.0...v6.56.0)

### Features

* **api:** manual updates ([11abde6](https://github.com/team-telnyx/telnyx-php/commit/11abde611185a72d69f6b76a0d62b20404343f24))

## 6.55.0 (2026-02-27)

Full Changelog: [v6.54.0...v6.55.0](https://github.com/team-telnyx/telnyx-php/compare/v6.54.0...v6.55.0)

### Features

* **api:** manual updates ([336cd2c](https://github.com/team-telnyx/telnyx-php/commit/336cd2c2b4ce86ca9fd077cab63f08bc75db6fbd))
* **api:** manual updates ([204045f](https://github.com/team-telnyx/telnyx-php/commit/204045fe112c181c4e2e2f1be200b3efe858b8e2))

## 6.54.0 (2026-02-27)

Full Changelog: [v6.53.0...v6.54.0](https://github.com/team-telnyx/telnyx-php/compare/v6.53.0...v6.54.0)

### Features

* Add TTS file-based endpoint spec ([e5fa211](https://github.com/team-telnyx/telnyx-php/commit/e5fa211c2778357c865dac706b9ac0617247c9ec))


### Chores

* **internal:** upgrade phpunit ([cea300b](https://github.com/team-telnyx/telnyx-php/commit/cea300bd459d62a006ea3fd8c125ab1812d93da7))

## 6.53.0 (2026-02-26)

Full Changelog: [v6.52.0...v6.53.0](https://github.com/team-telnyx/telnyx-php/compare/v6.52.0...v6.53.0)

### Features

* **api:** manual updates ([6ed3278](https://github.com/team-telnyx/telnyx-php/commit/6ed32787f0beeeeb23d5ddb7d4d58370b2359983))

## 6.52.0 (2026-02-26)

Full Changelog: [v6.51.0...v6.52.0](https://github.com/team-telnyx/telnyx-php/compare/v6.51.0...v6.52.0)

### Features

* **api:** manual updates ([6a1fd0b](https://github.com/team-telnyx/telnyx-php/commit/6a1fd0bfd552bc9807948b3bf4642ae4d374fb05))


### Chores

* bring back other changes ([3bd609b](https://github.com/team-telnyx/telnyx-php/commit/3bd609be2ceae332c1121825dcfefb4216d57325))

## 6.51.0 (2026-02-26)

Full Changelog: [v6.50.0...v6.51.0](https://github.com/team-telnyx/telnyx-php/compare/v6.50.0...v6.51.0)

### Features

* **api:** manual updates ([e7726b8](https://github.com/team-telnyx/telnyx-php/commit/e7726b81410aa0d02ffc6722f15c7f33f4abd95d))

## 6.50.0 (2026-02-26)

Full Changelog: [v6.49.0...v6.50.0](https://github.com/team-telnyx/telnyx-php/compare/v6.49.0...v6.50.0)

### Features

* TELAPPS-ENGDESK-48951 add channels to conf record start ([4295494](https://github.com/team-telnyx/telnyx-php/commit/4295494d44430eba19c5e5ed3c3aeda7cbd7ffce))

## 6.49.0 (2026-02-26)

Full Changelog: [v6.48.0...v6.49.0](https://github.com/team-telnyx/telnyx-php/compare/v6.48.0...v6.49.0)

### Features

* **api:** manual updates ([760cc0c](https://github.com/team-telnyx/telnyx-php/commit/760cc0c94d86bc2feb180027e3669374c79c5f9c))

## 6.48.0 (2026-02-26)

Full Changelog: [v6.47.0...v6.48.0](https://github.com/team-telnyx/telnyx-php/compare/v6.47.0...v6.48.0)

### Features

* Add text-to-speech WebSocket streaming OpenAPI spec ([ae7e9f6](https://github.com/team-telnyx/telnyx-php/commit/ae7e9f63558a76a120b46724d3417ebc56c01b60))


### Chores

* **internal:** codegen related update ([28b8739](https://github.com/team-telnyx/telnyx-php/commit/28b8739ac296279af5eb9b0de300a518bd26c0c5))

## 6.47.0 (2026-02-25)

Full Changelog: [v6.46.0...v6.47.0](https://github.com/team-telnyx/telnyx-php/compare/v6.46.0...v6.47.0)

### Features

* **api:** manual updates ([4eeb907](https://github.com/team-telnyx/telnyx-php/commit/4eeb907a214b75e08d0d0023a89997c99f01b3d5))

## 6.46.0 (2026-02-25)

Full Changelog: [v6.45.0...v6.46.0](https://github.com/team-telnyx/telnyx-php/compare/v6.45.0...v6.46.0)

### Features

* PORTAL-5923: Add stored_payment_transactions endpoint to OpenAPI docs ([15a74d7](https://github.com/team-telnyx/telnyx-php/commit/15a74d77fb72a7ae5b4ec618a99c56479538bf3b))


### Documentation

* **call-control:** Add missing params to hangup, bridge, answer ([0298f78](https://github.com/team-telnyx/telnyx-php/commit/0298f785b50cade0b80d254073b74fac70635648))
* **call-control:** Add queue CRUD endpoints ([488f7e7](https://github.com/team-telnyx/telnyx-php/commit/488f7e7702c824208b87b71797451c9d13b1a5b7))

## 6.45.0 (2026-02-25)

Full Changelog: [v6.44.0...v6.45.0](https://github.com/team-telnyx/telnyx-php/compare/v6.44.0...v6.45.0)

### Features

* TELAPPS Add prevent_double_bridge to bridge command ([9052449](https://github.com/team-telnyx/telnyx-php/commit/90524498b27a91733d5f4618500f19260bc35085))

## 6.44.0 (2026-02-25)

Full Changelog: [v6.43.0...v6.44.0](https://github.com/team-telnyx/telnyx-php/compare/v6.43.0...v6.44.0)

### Features

* **api:** manual updates ([29594d4](https://github.com/team-telnyx/telnyx-php/commit/29594d44864eec4543e011d9e6970dda3b853780))

## 6.43.0 (2026-02-25)

Full Changelog: [v6.42.0...v6.43.0](https://github.com/team-telnyx/telnyx-php/compare/v6.42.0...v6.43.0)

### Features

* Add missing TTS voice settings schemas and update voice descriptions ([7084546](https://github.com/team-telnyx/telnyx-php/commit/708454620c290b237bc17101fa93496ff6738922))

## 6.42.0 (2026-02-22)

Full Changelog: [v6.41.4...v6.42.0](https://github.com/team-telnyx/telnyx-php/compare/v6.41.4...v6.42.0)

### Features

* **api:** manual updates ([b5880da](https://github.com/team-telnyx/telnyx-php/commit/b5880da01c01ff5abe5f54f47e8763a98905a2b4))

## 6.41.4 (2026-02-22)

Full Changelog: [v6.41.3...v6.41.4](https://github.com/team-telnyx/telnyx-php/compare/v6.41.3...v6.41.4)

### Bug Fixes

* OAS drift — toll-free-verification.json (messaging-tf-verify) ([8ec466e](https://github.com/team-telnyx/telnyx-php/commit/8ec466eceffdf58b3269565e5ddfee82ec55b71c))
* OAS drift — verify.json (messaging-2fa) ([235309b](https://github.com/team-telnyx/telnyx-php/commit/235309b3ba53f0de762545cc6979c1ade60684a6))

## 6.41.3 (2026-02-21)

Full Changelog: [v6.41.2...v6.41.3](https://github.com/team-telnyx/telnyx-php/compare/v6.41.2...v6.41.3)

### Bug Fixes

* OAS drift — 10dlc.json (messaging-campaign-registry) ([d9c48cc](https://github.com/team-telnyx/telnyx-php/commit/d9c48ccd16aa97e4375b9242ebfcc662d8819aaa))

## 6.41.2 (2026-02-21)

Full Changelog: [v6.41.1...v6.41.2](https://github.com/team-telnyx/telnyx-php/compare/v6.41.1...v6.41.2)

### Bug Fixes

* OAS drift — messaging.json (messaging-settings + messaging-outbound) ([6df1f68](https://github.com/team-telnyx/telnyx-php/commit/6df1f682c19f912f5b08b6119c2906285bd29ef8))

## 6.41.1 (2026-02-20)

Full Changelog: [v6.41.0...v6.41.1](https://github.com/team-telnyx/telnyx-php/compare/v6.41.0...v6.41.1)

### Bug Fixes

* StringFormatNotSupported ([a9f51d4](https://github.com/team-telnyx/telnyx-php/commit/a9f51d4031df861fd777db837abd4877d8d899cc))

## 6.41.0 (2026-02-20)

Full Changelog: [v6.40.0...v6.41.0](https://github.com/team-telnyx/telnyx-php/compare/v6.40.0...v6.41.0)

### Features

* **api:** manual updates ([c85d5a7](https://github.com/team-telnyx/telnyx-php/commit/c85d5a7e1cb222ab69255f5853ab6481e362c8f0))


### Bug Fixes

* move unsupported string formats to x-format ([f9c971c](https://github.com/team-telnyx/telnyx-php/commit/f9c971ca947479144bbbf28e45718c715cdf2dde))

## 6.40.0 (2026-02-20)

Full Changelog: [v6.39.0...v6.40.0](https://github.com/team-telnyx/telnyx-php/compare/v6.39.0...v6.40.0)

### Features

* fix-stainless-sdk-timeout ([1e36246](https://github.com/team-telnyx/telnyx-php/commit/1e362467290edc4e128b418b1e669e6aa6f82a17))

## 6.39.0 (2026-02-20)

Full Changelog: [v6.38.0...v6.39.0](https://github.com/team-telnyx/telnyx-php/compare/v6.38.0...v6.39.0)

### Features

* **api:** manual updates ([463607b](https://github.com/team-telnyx/telnyx-php/commit/463607b8105232ef121c711fbd7b0f607ebf5680))

## 6.38.0 (2026-02-20)

Full Changelog: [v6.37.0...v6.38.0](https://github.com/team-telnyx/telnyx-php/compare/v6.37.0...v6.38.0)

### Features

* TELAPPS Add ApplicationSid param ([81da0dc](https://github.com/team-telnyx/telnyx-php/commit/81da0dc3336c528e3a89c5cc405e36b67421012f))

## 6.37.0 (2026-02-20)

Full Changelog: [v6.36.0...v6.37.0](https://github.com/team-telnyx/telnyx-php/compare/v6.36.0...v6.37.0)

### Features

* **api:** manual updates ([8397ab2](https://github.com/team-telnyx/telnyx-php/commit/8397ab21671715170bcf47bd460238d536d9561c))

## 6.36.0 (2026-02-20)

Full Changelog: [v6.35.0...v6.36.0](https://github.com/team-telnyx/telnyx-php/compare/v6.35.0...v6.36.0)

### Features

* **api:** manual updates ([c507ef2](https://github.com/team-telnyx/telnyx-php/commit/c507ef20d475ec9aac2daa7fe10df52f06f8639b))

## 6.35.0 (2026-02-20)

Full Changelog: [v6.34.0...v6.35.0](https://github.com/team-telnyx/telnyx-php/compare/v6.34.0...v6.35.0)

### Features

* **api:** manual updates ([b9cfdc3](https://github.com/team-telnyx/telnyx-php/commit/b9cfdc3f649bfe22c056069a7836eb90c1149e13))


### Documentation

* add service_provider_login_url to authentication provider settings ([3a95495](https://github.com/team-telnyx/telnyx-php/commit/3a95495fc590c59d1ed7c9ea107970c338eb7cb6))

## 6.34.0 (2026-02-19)

Full Changelog: [v6.33.0...v6.34.0](https://github.com/team-telnyx/telnyx-php/compare/v6.33.0...v6.34.0)

### Features

* TELAPPS Add interim_results to deepgram config ([dcceeec](https://github.com/team-telnyx/telnyx-php/commit/dcceeecb5757b9331714a2948da1c19a4f3a822f))


### Chores

* **internal:** remove mock server code ([f940ad1](https://github.com/team-telnyx/telnyx-php/commit/f940ad184c1ccf579b4ea83402b303a0323b55cd))
* **test:** update skip reason message ([5b73c75](https://github.com/team-telnyx/telnyx-php/commit/5b73c758d3eeef789630a33238a32114bb862fe0))
* update mock server docs ([80da762](https://github.com/team-telnyx/telnyx-php/commit/80da762f5aa3341b1889694c4e23d607aa9f9cd1))


### Documentation

* **call-control:** Add missing conference endpoints ([45928c3](https://github.com/team-telnyx/telnyx-php/commit/45928c336af8d276c6cb5ea91d281b2137054789))
* **call-control:** Add missing parameters to call control endpoints ([3f10a67](https://github.com/team-telnyx/telnyx-php/commit/3f10a6796853f3dca0ca39e1c2a052234d93d330))
* **call-scripting:** add Timeout and TimeLimit to InitiateTexmlCall ([8eb8c6f](https://github.com/team-telnyx/telnyx-php/commit/8eb8c6f9e626cfe72b63e5177bb606b13e2cf2a8))

## 6.33.0 (2026-02-19)

Full Changelog: [v6.32.0...v6.33.0](https://github.com/team-telnyx/telnyx-php/compare/v6.32.0...v6.33.0)

### Features

* **api:** manual updates ([615e7d1](https://github.com/team-telnyx/telnyx-php/commit/615e7d16757d2f109409bec4d00c2489feec47e3))

## 6.32.0 (2026-02-19)

Full Changelog: [v6.31.0...v6.32.0](https://github.com/team-telnyx/telnyx-php/compare/v6.31.0...v6.32.0)

### Features

* **api:** manual updates ([44009a2](https://github.com/team-telnyx/telnyx-php/commit/44009a272e7453874b6d6e05a5170bd34645a49d))

## 6.31.0 (2026-02-19)

Full Changelog: [v6.30.0...v6.31.0](https://github.com/team-telnyx/telnyx-php/compare/v6.30.0...v6.31.0)

### Features

* **api:** manual updates ([e71b87d](https://github.com/team-telnyx/telnyx-php/commit/e71b87dc42ab9e8cfd59fc06f145dbd022e4823b))

## 6.30.0 (2026-02-18)

Full Changelog: [v6.29.0...v6.30.0](https://github.com/team-telnyx/telnyx-php/compare/v6.29.0...v6.30.0)

### Features

* **api:** manual updates ([640e094](https://github.com/team-telnyx/telnyx-php/commit/640e0944c742a5852f3e4d823c7bddc79f39a25f))
* **api:** manual updates ([20d8e8b](https://github.com/team-telnyx/telnyx-php/commit/20d8e8b6e56d872bf2d9e4b3804675462e6a3944))

## 6.29.0 (2026-02-18)

Full Changelog: [v6.28.0...v6.29.0](https://github.com/team-telnyx/telnyx-php/compare/v6.28.0...v6.29.0)

### Features

* AI-2093: Add language_boost to MiniMax voice settings ([abf9c5e](https://github.com/team-telnyx/telnyx-php/commit/abf9c5ee3e9c04147e9a65ef1ca743f2a24d9c5c))

## 6.28.0 (2026-02-18)

Full Changelog: [v6.27.0...v6.28.0](https://github.com/team-telnyx/telnyx-php/compare/v6.27.0...v6.28.0)

### Features

* **api:** manual updates ([2c82bae](https://github.com/team-telnyx/telnyx-php/commit/2c82bae5523030d4704b152a3af156ca8b2d755f))
* **api:** manual updates ([0190880](https://github.com/team-telnyx/telnyx-php/commit/0190880a2f06f1cd61e22cedb59a733fa3baa242))
* **api:** manual updates ([b245e3a](https://github.com/team-telnyx/telnyx-php/commit/b245e3a73a2ba4318303fdd43ac21d2386558695))


### Chores

* **release:** add packagist trigger on published release ([656a7a5](https://github.com/team-telnyx/telnyx-php/commit/656a7a53da76ebb33310421c2da79bed0effa1fa))

## 6.27.0 (2026-02-18)

Full Changelog: [v6.26.0...v6.27.0](https://github.com/team-telnyx/telnyx-php/compare/v6.26.0...v6.27.0)

### Features

* Add smart encoding fields to messaging API spec ([46a383c](https://github.com/team-telnyx/telnyx-php/commit/46a383c81df759e08b212c69f851f3964239cf37))
* **api:** manual updates ([d0df599](https://github.com/team-telnyx/telnyx-php/commit/d0df599002bee06394b13295bb88fb59707cb3f0))

## 6.26.0 (2026-02-18)

Full Changelog: [v6.25.0...v6.26.0](https://github.com/team-telnyx/telnyx-php/compare/v6.25.0...v6.26.0)

### Features

* **api:** manual updates ([5dfece9](https://github.com/team-telnyx/telnyx-php/commit/5dfece96c7542003c065576118adbbfa7e8077c8))

## 6.25.0 (2026-02-18)

Full Changelog: [v6.24.0...v6.25.0](https://github.com/team-telnyx/telnyx-php/compare/v6.24.0...v6.25.0)

### Features

* **api:** manual updates ([5bb680c](https://github.com/team-telnyx/telnyx-php/commit/5bb680cbb9643c584be0f418adae1802c4f74502))

## 6.24.0 (2026-02-18)

Full Changelog: [v6.23.0...v6.24.0](https://github.com/team-telnyx/telnyx-php/compare/v6.23.0...v6.24.0)

### Features

* **api:** manual updates ([46ca4d4](https://github.com/team-telnyx/telnyx-php/commit/46ca4d48cdb4b2babe1cbfcf5e2e25fccf4fe5a4))

## 6.23.0 (2026-02-17)

Full Changelog: [v6.22.0...v6.23.0](https://github.com/team-telnyx/telnyx-php/compare/v6.22.0...v6.23.0)

### Features

* Align transfer tool AMD spec with portal: premium mode, drop continue actions ([adba8c4](https://github.com/team-telnyx/telnyx-php/commit/adba8c49e16779d6019868cb4a92270ea4acb510))

## 6.22.0 (2026-02-17)

Full Changelog: [v6.21.0...v6.22.0](https://github.com/team-telnyx/telnyx-php/compare/v6.21.0...v6.22.0)

### Features

* Add Minimax and Resemble voice providers for speak commands ([8c4ea1e](https://github.com/team-telnyx/telnyx-php/commit/8c4ea1e15636830b22922e1b309831ca8422e93c))

## 6.21.0 (2026-02-13)

Full Changelog: [v6.20.0...v6.21.0](https://github.com/team-telnyx/telnyx-php/compare/v6.20.0...v6.21.0)

### Features

* AI-2090: Add skip_turn tool type to assistant config schema ([b7e4325](https://github.com/team-telnyx/telnyx-php/commit/b7e43254d44d0d3ef0b83bfdd14f749790f9b460))

## 6.20.0 (2026-02-13)

Full Changelog: [v6.19.0...v6.20.0](https://github.com/team-telnyx/telnyx-php/compare/v6.19.0...v6.20.0)

### Features

* Add Label parameter to Dial Conference Participant endpoint ([5e5507e](https://github.com/team-telnyx/telnyx-php/commit/5e5507e4662181ec17770d02cdfcc5990fc774e0))

## 6.19.0 (2026-02-13)

Full Changelog: [v6.18.0...v6.19.0](https://github.com/team-telnyx/telnyx-php/compare/v6.18.0...v6.19.0)

### Features

* ENGDESK-49554: Add quail_voice_focus to noise suppression engine enums ([8a84876](https://github.com/team-telnyx/telnyx-php/commit/8a84876c2ece1c2de7ab54459e87ad505f629981))

## 6.18.0 (2026-02-12)

Full Changelog: [v6.17.0...v6.18.0](https://github.com/team-telnyx/telnyx-php/compare/v6.17.0...v6.18.0)

### Features

* **api:** manual updates ([30711fc](https://github.com/team-telnyx/telnyx-php/commit/30711fc1c870ba67788f33d199e5691d31904f4f))

## 6.17.0 (2026-02-12)

Full Changelog: [v6.16.0...v6.17.0](https://github.com/team-telnyx/telnyx-php/compare/v6.16.0...v6.17.0)

### Features

* **api:** manual updates ([90a80fb](https://github.com/team-telnyx/telnyx-php/commit/90a80fb9c3b5ab0ce14c9c692d18bd69142e158d))

## 6.16.0 (2026-02-12)

Full Changelog: [v6.15.0...v6.16.0](https://github.com/team-telnyx/telnyx-php/compare/v6.15.0...v6.16.0)

### Features

* **api:** manual updates to include models ([ecadabe](https://github.com/team-telnyx/telnyx-php/commit/ecadabeecf6f54ce9e6149240989ee6c48642b7d))

## 6.15.0 (2026-02-11)

Full Changelog: [v6.14.0...v6.15.0](https://github.com/team-telnyx/telnyx-php/compare/v6.14.0...v6.15.0)

### Features

* AI-2086: Add AI Missions endpoints to inference spec ([2fa1686](https://github.com/team-telnyx/telnyx-php/commit/2fa168665c126bb1a3421f81b59bc2850ef06552))


### Bug Fixes

* **client:** revert change to certain pagination metadata types ([f31387d](https://github.com/team-telnyx/telnyx-php/commit/f31387d83721197c37e143801d552dabfb4a3a35))

## 6.14.0 (2026-02-11)

Full Changelog: [v6.13.0...v6.14.0](https://github.com/team-telnyx/telnyx-php/compare/v6.13.0...v6.14.0)

### Features

* Add OpenAI-compatible embeddings API spec ([c9b7c1b](https://github.com/team-telnyx/telnyx-php/commit/c9b7c1bd4238b54e8951c73724d49eb22e805ad5))

## 6.13.0 (2026-02-11)

Full Changelog: [v6.12.1...v6.13.0](https://github.com/team-telnyx/telnyx-php/compare/v6.12.1...v6.13.0)

### Features

* Add dynamic_variables field to scheduled event schemas ([dedf7ab](https://github.com/team-telnyx/telnyx-php/commit/dedf7ab24fbb5c06dcd3cc9ee3972f4ccdb409a0))

## 6.12.1 (2026-02-11)

Full Changelog: [v6.12.0...v6.12.1](https://github.com/team-telnyx/telnyx-php/compare/v6.12.0...v6.12.1)

### Bug Fixes

* remove invalid discriminators from string enum schemas ([3c5c42a](https://github.com/team-telnyx/telnyx-php/commit/3c5c42a7f65ea44fbed513c8765d5965e6540871))

## 6.12.0 (2026-02-11)

Full Changelog: [v6.11.0...v6.12.0](https://github.com/team-telnyx/telnyx-php/compare/v6.11.0...v6.12.0)

### Features

* fix schema in emergency address schema ([6503bdf](https://github.com/team-telnyx/telnyx-php/commit/6503bdf2913af9ef76823506bf554f92d789a842))

## 6.11.0 (2026-02-11)

Full Changelog: [v6.10.0...v6.11.0](https://github.com/team-telnyx/telnyx-php/compare/v6.10.0...v6.11.0)

### Features

* Limit detection_mode enum to disabled and detect only ([f7d6971](https://github.com/team-telnyx/telnyx-php/commit/f7d69714e1ed48689beae528924d2e5612439841))

## 6.10.0 (2026-02-09)

Full Changelog: [v6.9.0...v6.10.0](https://github.com/team-telnyx/telnyx-php/compare/v6.9.0...v6.10.0)

### Features

* AI-2078 Feature: API endpoint to disable AI assistant mid-conversation ([59aed4a](https://github.com/team-telnyx/telnyx-php/commit/59aed4a784ae21d72b947aa6357fbd1e648ca95e))

## 6.9.0 (2026-02-09)

Full Changelog: [v6.8.0...v6.9.0](https://github.com/team-telnyx/telnyx-php/compare/v6.8.0...v6.9.0)

### Features

* Add ED25519 webhook signature verification ([98147de](https://github.com/team-telnyx/telnyx-php/commit/98147de9336e47cf3006f2c53c39969a7914c2f4))


### Bug Fixes

* add [@var](https://github.com/var) annotations for coerce return types ([33534ad](https://github.com/team-telnyx/telnyx-php/commit/33534ad23d04d4095f5dcd69a005eb2a7eff4de6))
* inline parsing to satisfy PHPStan return types ([bb86a94](https://github.com/team-telnyx/telnyx-php/commit/bb86a94902f1f20fca0f1ecf1ce49d362e702e61))
* PHPStan lint errors ([16c8941](https://github.com/team-telnyx/telnyx-php/commit/16c8941fbbe3fafcc3ea3e1c807893940074a2ba))
* Use proper converter pattern and fix test key format ([58eef7a](https://github.com/team-telnyx/telnyx-php/commit/58eef7a27abaff1044f908cf8d3b78ca744d9351))

## 6.8.0 (2026-02-06)

Full Changelog: [v6.7.0...v6.8.0](https://github.com/team-telnyx/telnyx-php/compare/v6.7.0...v6.8.0)

### Features

* Revert "fix emergency settings -schema" ([9fdb65c](https://github.com/team-telnyx/telnyx-php/commit/9fdb65cb962f3035a1151ccb5d7642a42e78b989))

## 6.7.0 (2026-02-05)

Full Changelog: [v6.6.0...v6.7.0](https://github.com/team-telnyx/telnyx-php/compare/v6.6.0...v6.7.0)

### Features

* **api:** manual updates ([5d1d564](https://github.com/team-telnyx/telnyx-php/commit/5d1d56425900ae57a2b37e1fa31d929d3d9c05c4))
* **api:** Merge pull request [#23](https://github.com/team-telnyx/telnyx-php/issues/23) from stainless-sdks/fix/deepgram-nova3-enum-duplicates ([a3bd17a](https://github.com/team-telnyx/telnyx-php/commit/a3bd17ad18a62c7bfb58c12baae5e6ecae190f1a))

## 6.6.0 (2026-02-05)

Full Changelog: [v6.5.0...v6.6.0](https://github.com/team-telnyx/telnyx-php/compare/v6.5.0...v6.6.0)

### Features

* **api:** Merge pull request [#22](https://github.com/team-telnyx/telnyx-php/issues/22) from stainless-sdks/add-all-webhook-models ([c4ad4ef](https://github.com/team-telnyx/telnyx-php/commit/c4ad4efd99cc1ee4b59a1724ae43bf4754ed85d2))

## 6.5.0 (2026-02-04)

Full Changelog: [v6.4.0...v6.5.0](https://github.com/team-telnyx/telnyx-php/compare/v6.4.0...v6.5.0)

### Features

* Add Texml parameter to create call endpoint [ENGDESK-49187] ([124cbfa](https://github.com/team-telnyx/telnyx-php/commit/124cbfa1722993e0d44ad175fe66036a5dac7db6))

## 6.4.0 (2026-02-03)

Full Changelog: [v6.3.0...v6.4.0](https://github.com/team-telnyx/telnyx-php/compare/v6.3.0...v6.4.0)

### Features

* use `$_ENV` aware getenv helper ([713a6b7](https://github.com/team-telnyx/telnyx-php/commit/713a6b77fd4e9941364b042cde75e04c64aa16d2))


### Chores

* **internal:** php cs fixer should not be memory limited ([37c71d9](https://github.com/team-telnyx/telnyx-php/commit/37c71d93051a2998ad982c01a8b86d30cc87e39f))

## 6.3.0 (2026-01-30)

Full Changelog: [v6.2.2...v6.3.0](https://github.com/team-telnyx/telnyx-php/compare/v6.2.2...v6.3.0)

### Features

* **api:** manual updates ([1c614bb](https://github.com/team-telnyx/telnyx-php/commit/1c614bbf33faadf3d0f4d3dccb6e8f496dc4d8f6))

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
