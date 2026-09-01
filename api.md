# Legacy

## Reporting

### BatchDetailRecords

#### Messaging

Methods:

- <code title="post /legacy/reporting/batch_detail_records/messaging">$client->legacy->reporting->batchDetailRecords->messaging-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/MessagingService.php">create</a>(...$params)</code>
- <code title="get /legacy/reporting/batch_detail_records/messaging/{id}">$client->legacy->reporting->batchDetailRecords->messaging-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/MessagingService.php">retrieve</a>(...$params)</code>
- <code title="get /legacy/reporting/batch_detail_records/messaging">$client->legacy->reporting->batchDetailRecords->messaging-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/MessagingService.php">list</a>()</code>
- <code title="delete /legacy/reporting/batch_detail_records/messaging/{id}">$client->legacy->reporting->batchDetailRecords->messaging-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/MessagingService.php">delete</a>(...$params)</code>

#### SpeechToText

Methods:

- <code title="post /legacy/reporting/batch_detail_records/speech_to_text">$client->legacy->reporting->batchDetailRecords->speechToText-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/SpeechToTextService.php">create</a>(...$params)</code>
- <code title="get /legacy/reporting/batch_detail_records/speech_to_text/{id}">$client->legacy->reporting->batchDetailRecords->speechToText-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/SpeechToTextService.php">retrieve</a>(...$params)</code>
- <code title="get /legacy/reporting/batch_detail_records/speech_to_text">$client->legacy->reporting->batchDetailRecords->speechToText-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/SpeechToTextService.php">list</a>()</code>
- <code title="delete /legacy/reporting/batch_detail_records/speech_to_text/{id}">$client->legacy->reporting->batchDetailRecords->speechToText-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/SpeechToTextService.php">delete</a>(...$params)</code>

#### Voice

Methods:

- <code title="post /legacy/reporting/batch_detail_records/voice">$client->legacy->reporting->batchDetailRecords->voice-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/VoiceService.php">create</a>(...$params)</code>
- <code title="get /legacy/reporting/batch_detail_records/voice/{id}">$client->legacy->reporting->batchDetailRecords->voice-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/VoiceService.php">retrieve</a>(...$params)</code>
- <code title="get /legacy/reporting/batch_detail_records/voice">$client->legacy->reporting->batchDetailRecords->voice-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/VoiceService.php">list</a>()</code>
- <code title="delete /legacy/reporting/batch_detail_records/voice/{id}">$client->legacy->reporting->batchDetailRecords->voice-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/VoiceService.php">delete</a>(...$params)</code>
- <code title="get /legacy/reporting/batch_detail_records/voice/fields">$client->legacy->reporting->batchDetailRecords->voice-><a href="./src/Services/Legacy/Reporting/BatchDetailRecords/VoiceService.php">retrieveFields</a>()</code>

### UsageReports

Methods:

- <code title="get /legacy/reporting/usage_reports/speech_to_text">$client->legacy->reporting->usageReports-><a href="./src/Services/Legacy/Reporting/UsageReportsService.php">retrieveSpeechToText</a>(...$params)</code>

#### Messaging

Methods:

- <code title="post /legacy/reporting/usage_reports/messaging">$client->legacy->reporting->usageReports->messaging-><a href="./src/Services/Legacy/Reporting/UsageReports/MessagingService.php">create</a>(...$params)</code>
- <code title="get /legacy/reporting/usage_reports/messaging/{id}">$client->legacy->reporting->usageReports->messaging-><a href="./src/Services/Legacy/Reporting/UsageReports/MessagingService.php">retrieve</a>(...$params)</code>
- <code title="get /legacy/reporting/usage_reports/messaging">$client->legacy->reporting->usageReports->messaging-><a href="./src/Services/Legacy/Reporting/UsageReports/MessagingService.php">list</a>(...$params)</code>
- <code title="delete /legacy/reporting/usage_reports/messaging/{id}">$client->legacy->reporting->usageReports->messaging-><a href="./src/Services/Legacy/Reporting/UsageReports/MessagingService.php">delete</a>(...$params)</code>

#### NumberLookup

Methods:

- <code title="post /legacy/reporting/usage_reports/number_lookup">$client->legacy->reporting->usageReports->numberLookup-><a href="./src/Services/Legacy/Reporting/UsageReports/NumberLookupService.php">create</a>(...$params)</code>
- <code title="get /legacy/reporting/usage_reports/number_lookup/{id}">$client->legacy->reporting->usageReports->numberLookup-><a href="./src/Services/Legacy/Reporting/UsageReports/NumberLookupService.php">retrieve</a>(...$params)</code>
- <code title="get /legacy/reporting/usage_reports/number_lookup">$client->legacy->reporting->usageReports->numberLookup-><a href="./src/Services/Legacy/Reporting/UsageReports/NumberLookupService.php">list</a>(...$params)</code>
- <code title="delete /legacy/reporting/usage_reports/number_lookup/{id}">$client->legacy->reporting->usageReports->numberLookup-><a href="./src/Services/Legacy/Reporting/UsageReports/NumberLookupService.php">delete</a>(...$params)</code>

#### Voice

Methods:

- <code title="post /legacy/reporting/usage_reports/voice">$client->legacy->reporting->usageReports->voice-><a href="./src/Services/Legacy/Reporting/UsageReports/VoiceService.php">create</a>(...$params)</code>
- <code title="get /legacy/reporting/usage_reports/voice/{id}">$client->legacy->reporting->usageReports->voice-><a href="./src/Services/Legacy/Reporting/UsageReports/VoiceService.php">retrieve</a>(...$params)</code>
- <code title="get /legacy/reporting/usage_reports/voice">$client->legacy->reporting->usageReports->voice-><a href="./src/Services/Legacy/Reporting/UsageReports/VoiceService.php">list</a>(...$params)</code>
- <code title="delete /legacy/reporting/usage_reports/voice/{id}">$client->legacy->reporting->usageReports->voice-><a href="./src/Services/Legacy/Reporting/UsageReports/VoiceService.php">delete</a>(...$params)</code>

# OAuth

Methods:

- <code title="get /oauth/consent/{consent_token}">$client->oauth-><a href="./src/Services/OAuthService.php">retrieve</a>(...$params)</code>
- <code title="post /oauth/grants">$client->oauth-><a href="./src/Services/OAuthService.php">grants</a>(...$params)</code>
- <code title="post /oauth/introspect">$client->oauth-><a href="./src/Services/OAuthService.php">introspect</a>(...$params)</code>
- <code title="post /oauth/register">$client->oauth-><a href="./src/Services/OAuthService.php">register</a>(...$params)</code>
- <code title="get /oauth/authorize">$client->oauth-><a href="./src/Services/OAuthService.php">retrieveAuthorize</a>(...$params)</code>
- <code title="get /oauth/jwks">$client->oauth-><a href="./src/Services/OAuthService.php">retrieveJwks</a>()</code>
- <code title="post /oauth/token">$client->oauth-><a href="./src/Services/OAuthService.php">token</a>(...$params)</code>

# OAuthClients

Methods:

- <code title="post /oauth_clients">$client->oauthClients-><a href="./src/Services/OAuthClientsService.php">create</a>(...$params)</code>
- <code title="get /oauth_clients/{id}">$client->oauthClients-><a href="./src/Services/OAuthClientsService.php">retrieve</a>(...$params)</code>
- <code title="put /oauth_clients/{id}">$client->oauthClients-><a href="./src/Services/OAuthClientsService.php">update</a>(...$params)</code>
- <code title="get /oauth_clients">$client->oauthClients-><a href="./src/Services/OAuthClientsService.php">list</a>(...$params)</code>
- <code title="delete /oauth_clients/{id}">$client->oauthClients-><a href="./src/Services/OAuthClientsService.php">delete</a>(...$params)</code>

# OAuthGrants

Methods:

- <code title="get /oauth_grants/{id}">$client->oauthGrants-><a href="./src/Services/OAuthGrantsService.php">retrieve</a>(...$params)</code>
- <code title="get /oauth_grants">$client->oauthGrants-><a href="./src/Services/OAuthGrantsService.php">list</a>(...$params)</code>
- <code title="delete /oauth_grants/{id}">$client->oauthGrants-><a href="./src/Services/OAuthGrantsService.php">delete</a>(...$params)</code>

# AccessIPAddress

Methods:

- <code title="post /access_ip_address">$client->accessIPAddress-><a href="./src/Services/AccessIPAddressService.php">create</a>(...$params)</code>
- <code title="get /access_ip_address/{access_ip_address_id}">$client->accessIPAddress-><a href="./src/Services/AccessIPAddressService.php">retrieve</a>(...$params)</code>
- <code title="get /access_ip_address">$client->accessIPAddress-><a href="./src/Services/AccessIPAddressService.php">list</a>(...$params)</code>
- <code title="delete /access_ip_address/{access_ip_address_id}">$client->accessIPAddress-><a href="./src/Services/AccessIPAddressService.php">delete</a>(...$params)</code>

# AccessIPRanges

Methods:

- <code title="post /access_ip_ranges">$client->accessIPRanges-><a href="./src/Services/AccessIPRangesService.php">create</a>(...$params)</code>
- <code title="get /access_ip_ranges">$client->accessIPRanges-><a href="./src/Services/AccessIPRangesService.php">list</a>(...$params)</code>
- <code title="delete /access_ip_ranges/{access_ip_range_id}">$client->accessIPRanges-><a href="./src/Services/AccessIPRangesService.php">delete</a>(...$params)</code>

# Actions

## Purchase

Methods:

- <code title="post /actions/purchase/esims">$client->actions->purchase-><a href="./src/Services/Actions/PurchaseService.php">create</a>(...$params)</code>

## Register

Methods:

- <code title="post /actions/register/sim_cards">$client->actions->register-><a href="./src/Services/Actions/RegisterService.php">create</a>(...$params)</code>

# Addresses

Methods:

- <code title="post /addresses">$client->addresses-><a href="./src/Services/AddressesService.php">create</a>(...$params)</code>
- <code title="get /addresses/{id}">$client->addresses-><a href="./src/Services/AddressesService.php">retrieve</a>(...$params)</code>
- <code title="get /addresses">$client->addresses-><a href="./src/Services/AddressesService.php">list</a>(...$params)</code>
- <code title="delete /addresses/{id}">$client->addresses-><a href="./src/Services/AddressesService.php">delete</a>(...$params)</code>

## Actions

Methods:

- <code title="post /addresses/{id}/actions/accept_suggestions">$client->addresses->actions-><a href="./src/Services/Addresses/ActionsService.php">acceptSuggestions</a>(...$params)</code>
- <code title="post /addresses/actions/validate">$client->addresses->actions-><a href="./src/Services/Addresses/ActionsService.php">validate</a>(...$params)</code>

# AdvancedOrders

Methods:

- <code title="post /advanced_orders">$client->advancedOrders-><a href="./src/Services/AdvancedOrdersService.php">create</a>(...$params)</code>
- <code title="get /advanced_orders/{order_id}">$client->advancedOrders-><a href="./src/Services/AdvancedOrdersService.php">retrieve</a>(...$params)</code>
- <code title="get /advanced_orders">$client->advancedOrders-><a href="./src/Services/AdvancedOrdersService.php">list</a>()</code>
- <code title="patch /advanced_orders/{advanced-order-id}/requirement_group">$client->advancedOrders-><a href="./src/Services/AdvancedOrdersService.php">updateRequirementGroup</a>(...$params)</code>

# AI

Methods:

- <code title="get /ai/conversation_histories">$client->ai-><a href="./src/Services/AIService.php">retrieveConversationHistories</a>(...$params)</code>
- <code title="post /ai/summarize">$client->ai-><a href="./src/Services/AIService.php">summarize</a>(...$params)</code>

## Assistants

Methods:

- <code title="post /ai/assistants">$client->ai->assistants-><a href="./src/Services/AI/AssistantsService.php">create</a>(...$params)</code>
- <code title="get /ai/assistants/{assistant_id}">$client->ai->assistants-><a href="./src/Services/AI/AssistantsService.php">retrieve</a>(...$params)</code>
- <code title="post /ai/assistants/{assistant_id}">$client->ai->assistants-><a href="./src/Services/AI/AssistantsService.php">update</a>(...$params)</code>
- <code title="get /ai/assistants">$client->ai->assistants-><a href="./src/Services/AI/AssistantsService.php">list</a>()</code>
- <code title="delete /ai/assistants/{assistant_id}">$client->ai->assistants-><a href="./src/Services/AI/AssistantsService.php">delete</a>(...$params)</code>
- <code title="post /ai/assistants/{assistant_id}/chat">$client->ai->assistants-><a href="./src/Services/AI/AssistantsService.php">chat</a>(...$params)</code>
- <code title="post /ai/assistants/{assistant_id}/clone">$client->ai->assistants-><a href="./src/Services/AI/AssistantsService.php">clone</a>(...$params)</code>
- <code title="get /ai/assistants/{assistant_id}/texml">$client->ai->assistants-><a href="./src/Services/AI/AssistantsService.php">getTexml</a>(...$params)</code>
- <code title="post /ai/assistants/import">$client->ai->assistants-><a href="./src/Services/AI/AssistantsService.php">imports</a>(...$params)</code>
- <code title="post /ai/assistants/{assistant_id}/chat/sms">$client->ai->assistants-><a href="./src/Services/AI/AssistantsService.php">sendSMS</a>(...$params)</code>

### Tests

Methods:

- <code title="post /ai/assistants/tests">$client->ai->assistants->tests-><a href="./src/Services/AI/Assistants/TestsService.php">create</a>(...$params)</code>
- <code title="get /ai/assistants/tests/{test_id}">$client->ai->assistants->tests-><a href="./src/Services/AI/Assistants/TestsService.php">retrieve</a>(...$params)</code>
- <code title="put /ai/assistants/tests/{test_id}">$client->ai->assistants->tests-><a href="./src/Services/AI/Assistants/TestsService.php">update</a>(...$params)</code>
- <code title="get /ai/assistants/tests">$client->ai->assistants->tests-><a href="./src/Services/AI/Assistants/TestsService.php">list</a>(...$params)</code>
- <code title="delete /ai/assistants/tests/{test_id}">$client->ai->assistants->tests-><a href="./src/Services/AI/Assistants/TestsService.php">delete</a>(...$params)</code>

#### TestSuites

Methods:

- <code title="get /ai/assistants/tests/test-suites">$client->ai->assistants->tests->testSuites-><a href="./src/Services/AI/Assistants/Tests/TestSuitesService.php">list</a>()</code>

##### Runs

Methods:

- <code title="get /ai/assistants/tests/test-suites/{suite_name}/runs">$client->ai->assistants->tests->testSuites->runs-><a href="./src/Services/AI/Assistants/Tests/TestSuites/RunsService.php">list</a>(...$params)</code>
- <code title="post /ai/assistants/tests/test-suites/{suite_name}/runs">$client->ai->assistants->tests->testSuites->runs-><a href="./src/Services/AI/Assistants/Tests/TestSuites/RunsService.php">trigger</a>(...$params)</code>

#### Runs

Methods:

- <code title="get /ai/assistants/tests/{test_id}/runs/{run_id}">$client->ai->assistants->tests->runs-><a href="./src/Services/AI/Assistants/Tests/RunsService.php">retrieve</a>(...$params)</code>
- <code title="get /ai/assistants/tests/{test_id}/runs">$client->ai->assistants->tests->runs-><a href="./src/Services/AI/Assistants/Tests/RunsService.php">list</a>(...$params)</code>
- <code title="post /ai/assistants/tests/{test_id}/runs">$client->ai->assistants->tests->runs-><a href="./src/Services/AI/Assistants/Tests/RunsService.php">trigger</a>(...$params)</code>

### CanaryDeploys

Methods:

- <code title="post /ai/assistants/{assistant_id}/canary-deploys">$client->ai->assistants->canaryDeploys-><a href="./src/Services/AI/Assistants/CanaryDeploysService.php">create</a>(...$params)</code>
- <code title="get /ai/assistants/{assistant_id}/canary-deploys">$client->ai->assistants->canaryDeploys-><a href="./src/Services/AI/Assistants/CanaryDeploysService.php">retrieve</a>(...$params)</code>
- <code title="put /ai/assistants/{assistant_id}/canary-deploys">$client->ai->assistants->canaryDeploys-><a href="./src/Services/AI/Assistants/CanaryDeploysService.php">update</a>(...$params)</code>
- <code title="delete /ai/assistants/{assistant_id}/canary-deploys">$client->ai->assistants->canaryDeploys-><a href="./src/Services/AI/Assistants/CanaryDeploysService.php">delete</a>(...$params)</code>

### ScheduledEvents

Methods:

- <code title="post /ai/assistants/{assistant_id}/scheduled_events">$client->ai->assistants->scheduledEvents-><a href="./src/Services/AI/Assistants/ScheduledEventsService.php">create</a>(...$params)</code>
- <code title="get /ai/assistants/{assistant_id}/scheduled_events/{event_id}">$client->ai->assistants->scheduledEvents-><a href="./src/Services/AI/Assistants/ScheduledEventsService.php">retrieve</a>(...$params)</code>
- <code title="get /ai/assistants/{assistant_id}/scheduled_events">$client->ai->assistants->scheduledEvents-><a href="./src/Services/AI/Assistants/ScheduledEventsService.php">list</a>(...$params)</code>
- <code title="delete /ai/assistants/{assistant_id}/scheduled_events/{event_id}">$client->ai->assistants->scheduledEvents-><a href="./src/Services/AI/Assistants/ScheduledEventsService.php">delete</a>(...$params)</code>

### Tools

Methods:

- <code title="put /ai/assistants/{assistant_id}/tools/{tool_id}">$client->ai->assistants->tools-><a href="./src/Services/AI/Assistants/ToolsService.php">add</a>(...$params)</code>
- <code title="delete /ai/assistants/{assistant_id}/tools/{tool_id}">$client->ai->assistants->tools-><a href="./src/Services/AI/Assistants/ToolsService.php">remove</a>(...$params)</code>
- <code title="post /ai/assistants/{assistant_id}/tools/{tool_id}/test">$client->ai->assistants->tools-><a href="./src/Services/AI/Assistants/ToolsService.php">test</a>(...$params)</code>

### Versions

Methods:

- <code title="get /ai/assistants/{assistant_id}/versions/{version_id}">$client->ai->assistants->versions-><a href="./src/Services/AI/Assistants/VersionsService.php">retrieve</a>(...$params)</code>
- <code title="post /ai/assistants/{assistant_id}/versions/{version_id}">$client->ai->assistants->versions-><a href="./src/Services/AI/Assistants/VersionsService.php">update</a>(...$params)</code>
- <code title="get /ai/assistants/{assistant_id}/versions">$client->ai->assistants->versions-><a href="./src/Services/AI/Assistants/VersionsService.php">list</a>(...$params)</code>
- <code title="delete /ai/assistants/{assistant_id}/versions/{version_id}">$client->ai->assistants->versions-><a href="./src/Services/AI/Assistants/VersionsService.php">delete</a>(...$params)</code>
- <code title="post /ai/assistants/{assistant_id}/versions/{version_id}/promote">$client->ai->assistants->versions-><a href="./src/Services/AI/Assistants/VersionsService.php">promote</a>(...$params)</code>

### Tags

Methods:

- <code title="get /ai/assistants/tags">$client->ai->assistants->tags-><a href="./src/Services/AI/Assistants/TagsService.php">list</a>()</code>
- <code title="post /ai/assistants/{assistant_id}/tags">$client->ai->assistants->tags-><a href="./src/Services/AI/Assistants/TagsService.php">add</a>(...$params)</code>
- <code title="delete /ai/assistants/{assistant_id}/tags/{tag}">$client->ai->assistants->tags-><a href="./src/Services/AI/Assistants/TagsService.php">remove</a>(...$params)</code>

### Instructions

Methods:

- <code title="post /ai/assistants/{assistant_id}/instructions/enhance">$client->ai->assistants->instructions-><a href="./src/Services/AI/Assistants/InstructionsService.php">enhance</a>(...$params)</code>

## Audio

Methods:

- <code title="post /ai/audio/transcriptions">$client->ai->audio-><a href="./src/Services/AI/AudioService.php">transcribe</a>(...$params)</code>

## Clusters

Methods:

- <code title="get /ai/clusters/{task_id}">$client->ai->clusters-><a href="./src/Services/AI/ClustersService.php">retrieve</a>(...$params)</code>
- <code title="get /ai/clusters">$client->ai->clusters-><a href="./src/Services/AI/ClustersService.php">list</a>(...$params)</code>
- <code title="delete /ai/clusters/{task_id}">$client->ai->clusters-><a href="./src/Services/AI/ClustersService.php">delete</a>(...$params)</code>
- <code title="post /ai/clusters">$client->ai->clusters-><a href="./src/Services/AI/ClustersService.php">compute</a>(...$params)</code>
- <code title="get /ai/clusters/{task_id}/graph">$client->ai->clusters-><a href="./src/Services/AI/ClustersService.php">fetchGraph</a>(...$params)</code>

## Collections

Methods:

- <code title="post /ai/collections">$client->ai->collections-><a href="./src/Services/AI/CollectionsService.php">create</a>(...$params)</code>
- <code title="get /ai/collections/slug/{slug}">$client->ai->collections-><a href="./src/Services/AI/CollectionsService.php">retrieve</a>(...$params)</code>
- <code title="patch /ai/collections/{uuid}">$client->ai->collections-><a href="./src/Services/AI/CollectionsService.php">update</a>(...$params)</code>
- <code title="get /ai/collections">$client->ai->collections-><a href="./src/Services/AI/CollectionsService.php">list</a>(...$params)</code>
- <code title="delete /ai/collections/{uuid}">$client->ai->collections-><a href="./src/Services/AI/CollectionsService.php">delete</a>(...$params)</code>
- <code title="get /ai/collections/{uuid}">$client->ai->collections-><a href="./src/Services/AI/CollectionsService.php">retrieveByID</a>(...$params)</code>

### Settings

Methods:

- <code title="put /ai/collections/{uuid}/settings">$client->ai->collections->settings-><a href="./src/Services/AI/Collections/SettingsService.php">create</a>(...$params)</code>
- <code title="get /ai/collections/{uuid}/settings">$client->ai->collections->settings-><a href="./src/Services/AI/Collections/SettingsService.php">list</a>(...$params)</code>
- <code title="patch /ai/collections/{uuid}/settings">$client->ai->collections->settings-><a href="./src/Services/AI/Collections/SettingsService.php">patchAll</a>(...$params)</code>

### Sources

Methods:

- <code title="post /ai/collections/{uuid}/sources">$client->ai->collections->sources-><a href="./src/Services/AI/Collections/SourcesService.php">create</a>(...$params)</code>
- <code title="get /ai/collections/{uuid}/sources">$client->ai->collections->sources-><a href="./src/Services/AI/Collections/SourcesService.php">list</a>(...$params)</code>
- <code title="delete /ai/collections/{uuid}/sources/{sourceId}">$client->ai->collections->sources-><a href="./src/Services/AI/Collections/SourcesService.php">delete</a>(...$params)</code>
- <code title="put /ai/collections/{uuid}/sources">$client->ai->collections->sources-><a href="./src/Services/AI/Collections/SourcesService.php">replace</a>(...$params)</code>

## Conversations

Methods:

- <code title="post /ai/conversations">$client->ai->conversations-><a href="./src/Services/AI/ConversationsService.php">create</a>(...$params)</code>
- <code title="get /ai/conversations/{conversation_id}">$client->ai->conversations-><a href="./src/Services/AI/ConversationsService.php">retrieve</a>(...$params)</code>
- <code title="put /ai/conversations/{conversation_id}">$client->ai->conversations-><a href="./src/Services/AI/ConversationsService.php">update</a>(...$params)</code>
- <code title="get /ai/conversations">$client->ai->conversations-><a href="./src/Services/AI/ConversationsService.php">list</a>(...$params)</code>
- <code title="delete /ai/conversations/{conversation_id}">$client->ai->conversations-><a href="./src/Services/AI/ConversationsService.php">delete</a>(...$params)</code>
- <code title="post /ai/conversations/{conversation_id}/message">$client->ai->conversations-><a href="./src/Services/AI/ConversationsService.php">addMessage</a>(...$params)</code>
- <code title="get /ai/conversations/{conversation_id}/conversations-insights">$client->ai->conversations-><a href="./src/Services/AI/ConversationsService.php">retrieveConversationsInsights</a>(...$params)</code>

### InsightGroups

Methods:

- <code title="get /ai/conversations/insight-groups/{group_id}">$client->ai->conversations->insightGroups-><a href="./src/Services/AI/Conversations/InsightGroupsService.php">retrieve</a>(...$params)</code>
- <code title="put /ai/conversations/insight-groups/{group_id}">$client->ai->conversations->insightGroups-><a href="./src/Services/AI/Conversations/InsightGroupsService.php">update</a>(...$params)</code>
- <code title="delete /ai/conversations/insight-groups/{group_id}">$client->ai->conversations->insightGroups-><a href="./src/Services/AI/Conversations/InsightGroupsService.php">delete</a>(...$params)</code>
- <code title="post /ai/conversations/insight-groups">$client->ai->conversations->insightGroups-><a href="./src/Services/AI/Conversations/InsightGroupsService.php">insightGroups</a>(...$params)</code>
- <code title="get /ai/conversations/insight-groups">$client->ai->conversations->insightGroups-><a href="./src/Services/AI/Conversations/InsightGroupsService.php">retrieveInsightGroups</a>(...$params)</code>

#### Insights

Methods:

- <code title="post /ai/conversations/insight-groups/{group_id}/insights/{insight_id}/assign">$client->ai->conversations->insightGroups->insights-><a href="./src/Services/AI/Conversations/InsightGroups/InsightsService.php">assign</a>(...$params)</code>
- <code title="delete /ai/conversations/insight-groups/{group_id}/insights/{insight_id}/unassign">$client->ai->conversations->insightGroups->insights-><a href="./src/Services/AI/Conversations/InsightGroups/InsightsService.php">deleteUnassign</a>(...$params)</code>

### Insights

Methods:

- <code title="post /ai/conversations/insights">$client->ai->conversations->insights-><a href="./src/Services/AI/Conversations/InsightsService.php">create</a>(...$params)</code>
- <code title="get /ai/conversations/insights/{insight_id}">$client->ai->conversations->insights-><a href="./src/Services/AI/Conversations/InsightsService.php">retrieve</a>(...$params)</code>
- <code title="put /ai/conversations/insights/{insight_id}">$client->ai->conversations->insights-><a href="./src/Services/AI/Conversations/InsightsService.php">update</a>(...$params)</code>
- <code title="get /ai/conversations/insights">$client->ai->conversations->insights-><a href="./src/Services/AI/Conversations/InsightsService.php">list</a>(...$params)</code>
- <code title="delete /ai/conversations/insights/{insight_id}">$client->ai->conversations->insights-><a href="./src/Services/AI/Conversations/InsightsService.php">delete</a>(...$params)</code>

### Messages

Methods:

- <code title="get /ai/conversations/{conversation_id}/messages">$client->ai->conversations->messages-><a href="./src/Services/AI/Conversations/MessagesService.php">list</a>(...$params)</code>

### ConversationInsights

Methods:

- <code title="get /ai/conversations/conversation-insights/aggregates">$client->ai->conversations->conversationInsights-><a href="./src/Services/AI/Conversations/ConversationInsightsService.php">retrieveAggregates</a>(...$params)</code>

## Embeddings

Methods:

- <code title="post /ai/embeddings">$client->ai->embeddings-><a href="./src/Services/AI/EmbeddingsService.php">create</a>(...$params)</code>
- <code title="get /ai/embeddings/{task_id}">$client->ai->embeddings-><a href="./src/Services/AI/EmbeddingsService.php">retrieve</a>(...$params)</code>
- <code title="get /ai/embeddings">$client->ai->embeddings-><a href="./src/Services/AI/EmbeddingsService.php">list</a>(...$params)</code>
- <code title="post /ai/embeddings/similarity-search">$client->ai->embeddings-><a href="./src/Services/AI/EmbeddingsService.php">similaritySearch</a>(...$params)</code>
- <code title="post /ai/embeddings/url">$client->ai->embeddings-><a href="./src/Services/AI/EmbeddingsService.php">url</a>(...$params)</code>

### Buckets

Methods:

- <code title="get /ai/embeddings/buckets/{bucket_name}">$client->ai->embeddings->buckets-><a href="./src/Services/AI/Embeddings/BucketsService.php">retrieve</a>(...$params)</code>
- <code title="get /ai/embeddings/buckets">$client->ai->embeddings->buckets-><a href="./src/Services/AI/Embeddings/BucketsService.php">list</a>()</code>
- <code title="delete /ai/embeddings/buckets/{bucket_name}">$client->ai->embeddings->buckets-><a href="./src/Services/AI/Embeddings/BucketsService.php">delete</a>(...$params)</code>

## FineTuning

### Jobs

Methods:

- <code title="post /ai/fine_tuning/jobs">$client->ai->fineTuning->jobs-><a href="./src/Services/AI/FineTuning/JobsService.php">create</a>(...$params)</code>
- <code title="get /ai/fine_tuning/jobs/{job_id}">$client->ai->fineTuning->jobs-><a href="./src/Services/AI/FineTuning/JobsService.php">retrieve</a>(...$params)</code>
- <code title="get /ai/fine_tuning/jobs">$client->ai->fineTuning->jobs-><a href="./src/Services/AI/FineTuning/JobsService.php">list</a>()</code>
- <code title="post /ai/fine_tuning/jobs/{job_id}/cancel">$client->ai->fineTuning->jobs-><a href="./src/Services/AI/FineTuning/JobsService.php">cancel</a>(...$params)</code>

## Integrations

Methods:

- <code title="get /ai/integrations/{integration_id}">$client->ai->integrations-><a href="./src/Services/AI/IntegrationsService.php">retrieve</a>(...$params)</code>
- <code title="get /ai/integrations">$client->ai->integrations-><a href="./src/Services/AI/IntegrationsService.php">list</a>()</code>

### Connections

Methods:

- <code title="get /ai/integrations/connections/{user_connection_id}">$client->ai->integrations->connections-><a href="./src/Services/AI/Integrations/ConnectionsService.php">retrieve</a>(...$params)</code>
- <code title="get /ai/integrations/connections">$client->ai->integrations->connections-><a href="./src/Services/AI/Integrations/ConnectionsService.php">list</a>()</code>
- <code title="delete /ai/integrations/connections/{user_connection_id}">$client->ai->integrations->connections-><a href="./src/Services/AI/Integrations/ConnectionsService.php">delete</a>(...$params)</code>

## McpServers

Methods:

- <code title="post /ai/mcp_servers">$client->ai->mcpServers-><a href="./src/Services/AI/McpServersService.php">create</a>(...$params)</code>
- <code title="get /ai/mcp_servers/{mcp_server_id}">$client->ai->mcpServers-><a href="./src/Services/AI/McpServersService.php">retrieve</a>(...$params)</code>
- <code title="put /ai/mcp_servers/{mcp_server_id}">$client->ai->mcpServers-><a href="./src/Services/AI/McpServersService.php">update</a>(...$params)</code>
- <code title="get /ai/mcp_servers">$client->ai->mcpServers-><a href="./src/Services/AI/McpServersService.php">list</a>(...$params)</code>
- <code title="delete /ai/mcp_servers/{mcp_server_id}">$client->ai->mcpServers-><a href="./src/Services/AI/McpServersService.php">delete</a>(...$params)</code>

## Missions

Methods:

- <code title="post /ai/missions">$client->ai->missions-><a href="./src/Services/AI/MissionsService.php">create</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}">$client->ai->missions-><a href="./src/Services/AI/MissionsService.php">retrieve</a>(...$params)</code>
- <code title="get /ai/missions">$client->ai->missions-><a href="./src/Services/AI/MissionsService.php">list</a>(...$params)</code>
- <code title="post /ai/missions/{mission_id}/clone">$client->ai->missions-><a href="./src/Services/AI/MissionsService.php">cloneMission</a>(...$params)</code>
- <code title="delete /ai/missions/{mission_id}">$client->ai->missions-><a href="./src/Services/AI/MissionsService.php">deleteMission</a>(...$params)</code>
- <code title="get /ai/missions/events">$client->ai->missions-><a href="./src/Services/AI/MissionsService.php">listEvents</a>(...$params)</code>
- <code title="put /ai/missions/{mission_id}">$client->ai->missions-><a href="./src/Services/AI/MissionsService.php">updateMission</a>(...$params)</code>

### Runs

Methods:

- <code title="post /ai/missions/{mission_id}/runs">$client->ai->missions->runs-><a href="./src/Services/AI/Missions/RunsService.php">create</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/runs/{run_id}">$client->ai->missions->runs-><a href="./src/Services/AI/Missions/RunsService.php">retrieve</a>(...$params)</code>
- <code title="patch /ai/missions/{mission_id}/runs/{run_id}">$client->ai->missions->runs-><a href="./src/Services/AI/Missions/RunsService.php">update</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/runs">$client->ai->missions->runs-><a href="./src/Services/AI/Missions/RunsService.php">list</a>(...$params)</code>
- <code title="post /ai/missions/{mission_id}/runs/{run_id}/cancel">$client->ai->missions->runs-><a href="./src/Services/AI/Missions/RunsService.php">cancelRun</a>(...$params)</code>
- <code title="get /ai/missions/runs">$client->ai->missions->runs-><a href="./src/Services/AI/Missions/RunsService.php">listRuns</a>(...$params)</code>
- <code title="post /ai/missions/{mission_id}/runs/{run_id}/pause">$client->ai->missions->runs-><a href="./src/Services/AI/Missions/RunsService.php">pauseRun</a>(...$params)</code>
- <code title="post /ai/missions/{mission_id}/runs/{run_id}/resume">$client->ai->missions->runs-><a href="./src/Services/AI/Missions/RunsService.php">resumeRun</a>(...$params)</code>

#### Events

Methods:

- <code title="get /ai/missions/{mission_id}/runs/{run_id}/events">$client->ai->missions->runs->events-><a href="./src/Services/AI/Missions/Runs/EventsService.php">list</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/runs/{run_id}/events/{event_id}">$client->ai->missions->runs->events-><a href="./src/Services/AI/Missions/Runs/EventsService.php">getEventDetails</a>(...$params)</code>
- <code title="post /ai/missions/{mission_id}/runs/{run_id}/events">$client->ai->missions->runs->events-><a href="./src/Services/AI/Missions/Runs/EventsService.php">log</a>(...$params)</code>

#### Plan

Methods:

- <code title="post /ai/missions/{mission_id}/runs/{run_id}/plan">$client->ai->missions->runs->plan-><a href="./src/Services/AI/Missions/Runs/PlanService.php">create</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/runs/{run_id}/plan">$client->ai->missions->runs->plan-><a href="./src/Services/AI/Missions/Runs/PlanService.php">retrieve</a>(...$params)</code>
- <code title="post /ai/missions/{mission_id}/runs/{run_id}/plan/steps">$client->ai->missions->runs->plan-><a href="./src/Services/AI/Missions/Runs/PlanService.php">addStepsToPlan</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/runs/{run_id}/plan/steps/{step_id}">$client->ai->missions->runs->plan-><a href="./src/Services/AI/Missions/Runs/PlanService.php">getStepDetails</a>(...$params)</code>
- <code title="patch /ai/missions/{mission_id}/runs/{run_id}/plan/steps/{step_id}">$client->ai->missions->runs->plan-><a href="./src/Services/AI/Missions/Runs/PlanService.php">updateStep</a>(...$params)</code>

#### TelnyxAgents

Methods:

- <code title="get /ai/missions/{mission_id}/runs/{run_id}/telnyx-agents">$client->ai->missions->runs->telnyxAgents-><a href="./src/Services/AI/Missions/Runs/TelnyxAgentsService.php">list</a>(...$params)</code>
- <code title="post /ai/missions/{mission_id}/runs/{run_id}/telnyx-agents">$client->ai->missions->runs->telnyxAgents-><a href="./src/Services/AI/Missions/Runs/TelnyxAgentsService.php">link</a>(...$params)</code>
- <code title="delete /ai/missions/{mission_id}/runs/{run_id}/telnyx-agents/{telnyx_agent_id}">$client->ai->missions->runs->telnyxAgents-><a href="./src/Services/AI/Missions/Runs/TelnyxAgentsService.php">unlink</a>(...$params)</code>

### KnowledgeBases

Methods:

- <code title="post /ai/missions/{mission_id}/knowledge-bases">$client->ai->missions->knowledgeBases-><a href="./src/Services/AI/Missions/KnowledgeBasesService.php">createKnowledgeBase</a>(...$params)</code>
- <code title="delete /ai/missions/{mission_id}/knowledge-bases/{knowledge_base_id}">$client->ai->missions->knowledgeBases-><a href="./src/Services/AI/Missions/KnowledgeBasesService.php">deleteKnowledgeBase</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/knowledge-bases/{knowledge_base_id}">$client->ai->missions->knowledgeBases-><a href="./src/Services/AI/Missions/KnowledgeBasesService.php">getKnowledgeBase</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/knowledge-bases">$client->ai->missions->knowledgeBases-><a href="./src/Services/AI/Missions/KnowledgeBasesService.php">listKnowledgeBases</a>(...$params)</code>
- <code title="put /ai/missions/{mission_id}/knowledge-bases/{knowledge_base_id}">$client->ai->missions->knowledgeBases-><a href="./src/Services/AI/Missions/KnowledgeBasesService.php">updateKnowledgeBase</a>(...$params)</code>

### McpServers

Methods:

- <code title="post /ai/missions/{mission_id}/mcp-servers">$client->ai->missions->mcpServers-><a href="./src/Services/AI/Missions/McpServersService.php">createMcpServer</a>(...$params)</code>
- <code title="delete /ai/missions/{mission_id}/mcp-servers/{mcp_server_id}">$client->ai->missions->mcpServers-><a href="./src/Services/AI/Missions/McpServersService.php">deleteMcpServer</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/mcp-servers/{mcp_server_id}">$client->ai->missions->mcpServers-><a href="./src/Services/AI/Missions/McpServersService.php">getMcpServer</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/mcp-servers">$client->ai->missions->mcpServers-><a href="./src/Services/AI/Missions/McpServersService.php">listMcpServers</a>(...$params)</code>
- <code title="put /ai/missions/{mission_id}/mcp-servers/{mcp_server_id}">$client->ai->missions->mcpServers-><a href="./src/Services/AI/Missions/McpServersService.php">updateMcpServer</a>(...$params)</code>

### Tools

Methods:

- <code title="post /ai/missions/{mission_id}/tools">$client->ai->missions->tools-><a href="./src/Services/AI/Missions/ToolsService.php">createTool</a>(...$params)</code>
- <code title="delete /ai/missions/{mission_id}/tools/{tool_id}">$client->ai->missions->tools-><a href="./src/Services/AI/Missions/ToolsService.php">deleteTool</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/tools/{tool_id}">$client->ai->missions->tools-><a href="./src/Services/AI/Missions/ToolsService.php">getTool</a>(...$params)</code>
- <code title="get /ai/missions/{mission_id}/tools">$client->ai->missions->tools-><a href="./src/Services/AI/Missions/ToolsService.php">listTools</a>(...$params)</code>
- <code title="put /ai/missions/{mission_id}/tools/{tool_id}">$client->ai->missions->tools-><a href="./src/Services/AI/Missions/ToolsService.php">updateTool</a>(...$params)</code>

## OpenAI

Methods:

- <code title="post /ai/openai/responses">$client->ai->openai-><a href="./src/Services/AI/OpenAIService.php">createResponse</a>(...$params)</code>
- <code title="get /ai/openai/models">$client->ai->openai-><a href="./src/Services/AI/OpenAIService.php">listModels</a>()</code>

### Embeddings

Methods:

- <code title="post /ai/openai/embeddings">$client->ai->openai->embeddings-><a href="./src/Services/AI/OpenAI/EmbeddingsService.php">createEmbeddings</a>(...$params)</code>
- <code title="get /ai/openai/embeddings/models">$client->ai->openai->embeddings-><a href="./src/Services/AI/OpenAI/EmbeddingsService.php">listEmbeddingModels</a>()</code>

### Chat

Methods:

- <code title="post /ai/openai/chat/completions">$client->ai->openai->chat-><a href="./src/Services/AI/OpenAI/ChatService.php">createCompletion</a>(...$params)</code>

## Tools

Methods:

- <code title="post /ai/tools">$client->ai->tools-><a href="./src/Services/AI/ToolsService.php">create</a>(...$params)</code>
- <code title="get /ai/tools/{tool_id}">$client->ai->tools-><a href="./src/Services/AI/ToolsService.php">retrieve</a>(...$params)</code>
- <code title="patch /ai/tools/{tool_id}">$client->ai->tools-><a href="./src/Services/AI/ToolsService.php">update</a>(...$params)</code>
- <code title="get /ai/tools">$client->ai->tools-><a href="./src/Services/AI/ToolsService.php">list</a>(...$params)</code>
- <code title="delete /ai/tools/{tool_id}">$client->ai->tools-><a href="./src/Services/AI/ToolsService.php">delete</a>(...$params)</code>

## Anthropic

### V1

Methods:

- <code title="post /ai/anthropic/v1/messages">$client->ai->anthropic->v1-><a href="./src/Services/AI/Anthropic/V1Service.php">messages</a>(...$params)</code>

## Knowledge

### Collections

Methods:

- <code title="get /ai/knowledge/collections/{slug}/documents">$client->ai->knowledge->collections-><a href="./src/Services/AI/Knowledge/CollectionsService.php">retrieveDocuments</a>(...$params)</code>

# AuditEvents

Methods:

- <code title="get /audit_events">$client->auditEvents-><a href="./src/Services/AuditEventsService.php">list</a>(...$params)</code>

# AuthenticationProviders

Methods:

- <code title="post /authentication_providers">$client->authenticationProviders-><a href="./src/Services/AuthenticationProvidersService.php">create</a>(...$params)</code>
- <code title="get /authentication_providers/{id}">$client->authenticationProviders-><a href="./src/Services/AuthenticationProvidersService.php">retrieve</a>(...$params)</code>
- <code title="patch /authentication_providers/{id}">$client->authenticationProviders-><a href="./src/Services/AuthenticationProvidersService.php">update</a>(...$params)</code>
- <code title="get /authentication_providers">$client->authenticationProviders-><a href="./src/Services/AuthenticationProvidersService.php">list</a>(...$params)</code>
- <code title="delete /authentication_providers/{id}">$client->authenticationProviders-><a href="./src/Services/AuthenticationProvidersService.php">delete</a>(...$params)</code>

# AvailablePhoneNumberBlocks

Methods:

- <code title="get /available_phone_number_blocks">$client->availablePhoneNumberBlocks-><a href="./src/Services/AvailablePhoneNumberBlocksService.php">list</a>(...$params)</code>

# AvailablePhoneNumbers

Methods:

- <code title="get /available_phone_numbers">$client->availablePhoneNumbers-><a href="./src/Services/AvailablePhoneNumbersService.php">list</a>(...$params)</code>

# Balance

Methods:

- <code title="get /balance">$client->balance-><a href="./src/Services/BalanceService.php">retrieve</a>()</code>

# BillingGroups

Methods:

- <code title="post /billing_groups">$client->billingGroups-><a href="./src/Services/BillingGroupsService.php">create</a>(...$params)</code>
- <code title="get /billing_groups/{id}">$client->billingGroups-><a href="./src/Services/BillingGroupsService.php">retrieve</a>(...$params)</code>
- <code title="patch /billing_groups/{id}">$client->billingGroups-><a href="./src/Services/BillingGroupsService.php">update</a>(...$params)</code>
- <code title="get /billing_groups">$client->billingGroups-><a href="./src/Services/BillingGroupsService.php">list</a>(...$params)</code>
- <code title="delete /billing_groups/{id}">$client->billingGroups-><a href="./src/Services/BillingGroupsService.php">delete</a>(...$params)</code>

# BulkSimCardActions

Methods:

- <code title="get /bulk_sim_card_actions/{id}">$client->bulkSimCardActions-><a href="./src/Services/BulkSimCardActionsService.php">retrieve</a>(...$params)</code>
- <code title="get /bulk_sim_card_actions">$client->bulkSimCardActions-><a href="./src/Services/BulkSimCardActionsService.php">list</a>(...$params)</code>

# BundlePricing

## BillingBundles

Methods:

- <code title="get /bundle_pricing/billing_bundles/{bundle_id}">$client->bundlePricing->billingBundles-><a href="./src/Services/BundlePricing/BillingBundlesService.php">retrieve</a>(...$params)</code>
- <code title="get /bundle_pricing/billing_bundles">$client->bundlePricing->billingBundles-><a href="./src/Services/BundlePricing/BillingBundlesService.php">list</a>(...$params)</code>

## UserBundles

Methods:

- <code title="post /bundle_pricing/user_bundles/bulk">$client->bundlePricing->userBundles-><a href="./src/Services/BundlePricing/UserBundlesService.php">create</a>(...$params)</code>
- <code title="get /bundle_pricing/user_bundles/{user_bundle_id}">$client->bundlePricing->userBundles-><a href="./src/Services/BundlePricing/UserBundlesService.php">retrieve</a>(...$params)</code>
- <code title="get /bundle_pricing/user_bundles">$client->bundlePricing->userBundles-><a href="./src/Services/BundlePricing/UserBundlesService.php">list</a>(...$params)</code>
- <code title="delete /bundle_pricing/user_bundles/{user_bundle_id}">$client->bundlePricing->userBundles-><a href="./src/Services/BundlePricing/UserBundlesService.php">deactivate</a>(...$params)</code>
- <code title="get /bundle_pricing/user_bundles/{user_bundle_id}/resources">$client->bundlePricing->userBundles-><a href="./src/Services/BundlePricing/UserBundlesService.php">listResources</a>(...$params)</code>
- <code title="get /bundle_pricing/user_bundles/unused">$client->bundlePricing->userBundles-><a href="./src/Services/BundlePricing/UserBundlesService.php">listUnused</a>(...$params)</code>

# CallControlApplications

Methods:

- <code title="post /call_control_applications">$client->callControlApplications-><a href="./src/Services/CallControlApplicationsService.php">create</a>(...$params)</code>
- <code title="get /call_control_applications/{id}">$client->callControlApplications-><a href="./src/Services/CallControlApplicationsService.php">retrieve</a>(...$params)</code>
- <code title="patch /call_control_applications/{id}">$client->callControlApplications-><a href="./src/Services/CallControlApplicationsService.php">update</a>(...$params)</code>
- <code title="get /call_control_applications">$client->callControlApplications-><a href="./src/Services/CallControlApplicationsService.php">list</a>(...$params)</code>
- <code title="delete /call_control_applications/{id}">$client->callControlApplications-><a href="./src/Services/CallControlApplicationsService.php">delete</a>(...$params)</code>

# CallEvents

Methods:

- <code title="get /call_events">$client->callEvents-><a href="./src/Services/CallEventsService.php">list</a>(...$params)</code>

# Calls

Methods:

- <code title="post /calls">$client->calls-><a href="./src/Services/CallsService.php">dial</a>(...$params)</code>
- <code title="get /calls/{call_control_id}">$client->calls-><a href="./src/Services/CallsService.php">retrieveStatus</a>(...$params)</code>

## Actions

Methods:

- <code title="post /calls/{call_control_id}/actions/ai_assistant_add_messages">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">addAIAssistantMessages</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/answer">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">answer</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/bridge">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">bridge</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/enqueue">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">enqueue</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/gather">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">gather</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/gather_using_ai">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">gatherUsingAI</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/gather_using_audio">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">gatherUsingAudio</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/gather_using_speak">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">gatherUsingSpeak</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/hangup">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">hangup</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/ai_assistant_join">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">joinAIAssistant</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/leave_queue">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">leaveQueue</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/record_pause">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">pauseRecording</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/pay">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">pay</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/refer">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">refer</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/reject">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">reject</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/record_resume">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">resumeRecording</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/send_dtmf">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">sendDtmf</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/send_sip_info">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">sendSipInfo</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/speak">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">speak</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/ai_assistant_start">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">startAIAssistant</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/conversation_relay_start">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">startConversationRelay</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/fork_start">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">startForking</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/suppression_start">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">startNoiseSuppression</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/playback_start">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">startPlayback</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/record_start">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">startRecording</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/siprec_start">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">startSiprec</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/streaming_start">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">startStreaming</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/transcription_start">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">startTranscription</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/ai_assistant_stop">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">stopAIAssistant</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/conversation_relay_stop">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">stopConversationRelay</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/fork_stop">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">stopForking</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/gather_stop">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">stopGather</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/suppression_stop">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">stopNoiseSuppression</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/playback_stop">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">stopPlayback</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/record_stop">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">stopRecording</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/siprec_stop">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">stopSiprec</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/streaming_stop">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">stopStreaming</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/transcription_stop">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">stopTranscription</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/switch_supervisor_role">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">switchSupervisorRole</a>(...$params)</code>
- <code title="post /calls/{call_control_id}/actions/transfer">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">transfer</a>(...$params)</code>
- <code title="put /calls/{call_control_id}/actions/client_state_update">$client->calls->actions-><a href="./src/Services/Calls/ActionsService.php">updateClientState</a>(...$params)</code>

# ChannelZones

Methods:

- <code title="put /channel_zones/{channel_zone_id}">$client->channelZones-><a href="./src/Services/ChannelZonesService.php">update</a>(...$params)</code>
- <code title="get /channel_zones">$client->channelZones-><a href="./src/Services/ChannelZonesService.php">list</a>(...$params)</code>

# ChargesBreakdown

Methods:

- <code title="get /charges_breakdown">$client->chargesBreakdown-><a href="./src/Services/ChargesBreakdownService.php">retrieve</a>(...$params)</code>

# ChargesSummary

Methods:

- <code title="get /charges_summary">$client->chargesSummary-><a href="./src/Services/ChargesSummaryService.php">retrieve</a>(...$params)</code>

# Comments

Methods:

- <code title="post /comments">$client->comments-><a href="./src/Services/CommentsService.php">create</a>(...$params)</code>
- <code title="get /comments/{id}">$client->comments-><a href="./src/Services/CommentsService.php">retrieve</a>(...$params)</code>
- <code title="get /comments">$client->comments-><a href="./src/Services/CommentsService.php">list</a>(...$params)</code>
- <code title="patch /comments/{id}/read">$client->comments-><a href="./src/Services/CommentsService.php">markAsRead</a>(...$params)</code>

# Conferences

Methods:

- <code title="post /conferences">$client->conferences-><a href="./src/Services/ConferencesService.php">create</a>(...$params)</code>
- <code title="get /conferences/{id}">$client->conferences-><a href="./src/Services/ConferencesService.php">retrieve</a>(...$params)</code>
- <code title="get /conferences">$client->conferences-><a href="./src/Services/ConferencesService.php">list</a>(...$params)</code>
- <code title="get /conferences/{conference_id}/participants">$client->conferences-><a href="./src/Services/ConferencesService.php">listParticipants</a>(...$params)</code>
- <code title="get /conferences/{id}/participants/{participant_id}">$client->conferences-><a href="./src/Services/ConferencesService.php">retrieveParticipant</a>(...$params)</code>
- <code title="patch /conferences/{id}/participants/{participant_id}">$client->conferences-><a href="./src/Services/ConferencesService.php">updateParticipant</a>(...$params)</code>

## Actions

Methods:

- <code title="post /conferences/{id}/actions/update">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">update</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/end">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">endConference</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/gather_using_audio">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">gatherDtmfAudio</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/hold">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">hold</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/join">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">join</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/leave">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">leave</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/mute">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">mute</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/play">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">play</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/record_pause">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">recordPause</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/record_resume">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">recordResume</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/record_start">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">recordStart</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/record_stop">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">recordStop</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/send_dtmf">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">sendDtmf</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/speak">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">speak</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/stop">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">stop</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/unhold">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">unhold</a>(...$params)</code>
- <code title="post /conferences/{id}/actions/unmute">$client->conferences->actions-><a href="./src/Services/Conferences/ActionsService.php">unmute</a>(...$params)</code>

# Connections

Methods:

- <code title="get /connections/{id}">$client->connections-><a href="./src/Services/ConnectionsService.php">retrieve</a>(...$params)</code>
- <code title="get /connections">$client->connections-><a href="./src/Services/ConnectionsService.php">list</a>(...$params)</code>
- <code title="get /connections/{connection_id}/active_calls">$client->connections-><a href="./src/Services/ConnectionsService.php">listActiveCalls</a>(...$params)</code>

# CountryCoverage

Methods:

- <code title="get /country_coverage">$client->countryCoverage-><a href="./src/Services/CountryCoverageService.php">retrieve</a>()</code>
- <code title="get /country_coverage/countries/{country_code}">$client->countryCoverage-><a href="./src/Services/CountryCoverageService.php">retrieveCountry</a>(...$params)</code>

# CredentialConnections

Methods:

- <code title="post /credential_connections">$client->credentialConnections-><a href="./src/Services/CredentialConnectionsService.php">create</a>(...$params)</code>
- <code title="get /credential_connections/{id}">$client->credentialConnections-><a href="./src/Services/CredentialConnectionsService.php">retrieve</a>(...$params)</code>
- <code title="patch /credential_connections/{id}">$client->credentialConnections-><a href="./src/Services/CredentialConnectionsService.php">update</a>(...$params)</code>
- <code title="get /credential_connections">$client->credentialConnections-><a href="./src/Services/CredentialConnectionsService.php">list</a>(...$params)</code>
- <code title="delete /credential_connections/{id}">$client->credentialConnections-><a href="./src/Services/CredentialConnectionsService.php">delete</a>(...$params)</code>

## Actions

Methods:

- <code title="post /credential_connections/{id}/actions/check_registration_status">$client->credentialConnections->actions-><a href="./src/Services/CredentialConnections/ActionsService.php">checkRegistrationStatus</a>(...$params)</code>

# CustomStorageCredentials

Methods:

- <code title="post /custom_storage_credentials/{connection_id}">$client->customStorageCredentials-><a href="./src/Services/CustomStorageCredentialsService.php">create</a>(...$params)</code>
- <code title="get /custom_storage_credentials/{connection_id}">$client->customStorageCredentials-><a href="./src/Services/CustomStorageCredentialsService.php">retrieve</a>(...$params)</code>
- <code title="put /custom_storage_credentials/{connection_id}">$client->customStorageCredentials-><a href="./src/Services/CustomStorageCredentialsService.php">update</a>(...$params)</code>
- <code title="delete /custom_storage_credentials/{connection_id}">$client->customStorageCredentials-><a href="./src/Services/CustomStorageCredentialsService.php">delete</a>(...$params)</code>

# CustomerServiceRecords

Methods:

- <code title="post /customer_service_records">$client->customerServiceRecords-><a href="./src/Services/CustomerServiceRecordsService.php">create</a>(...$params)</code>
- <code title="get /customer_service_records/{customer_service_record_id}">$client->customerServiceRecords-><a href="./src/Services/CustomerServiceRecordsService.php">retrieve</a>(...$params)</code>
- <code title="get /customer_service_records">$client->customerServiceRecords-><a href="./src/Services/CustomerServiceRecordsService.php">list</a>(...$params)</code>
- <code title="post /customer_service_records/phone_number_coverages">$client->customerServiceRecords-><a href="./src/Services/CustomerServiceRecordsService.php">verifyPhoneNumberCoverage</a>(...$params)</code>

# DetailRecords

Methods:

- <code title="get /detail_records">$client->detailRecords-><a href="./src/Services/DetailRecordsService.php">list</a>(...$params)</code>

# DialogflowConnections

Methods:

- <code title="post /dialogflow_connections/{connection_id}">$client->dialogflowConnections-><a href="./src/Services/DialogflowConnectionsService.php">create</a>(...$params)</code>
- <code title="get /dialogflow_connections/{connection_id}">$client->dialogflowConnections-><a href="./src/Services/DialogflowConnectionsService.php">retrieve</a>(...$params)</code>
- <code title="put /dialogflow_connections/{connection_id}">$client->dialogflowConnections-><a href="./src/Services/DialogflowConnectionsService.php">update</a>(...$params)</code>
- <code title="delete /dialogflow_connections/{connection_id}">$client->dialogflowConnections-><a href="./src/Services/DialogflowConnectionsService.php">delete</a>(...$params)</code>

# DocumentLinks

Methods:

- <code title="get /document_links">$client->documentLinks-><a href="./src/Services/DocumentLinksService.php">list</a>(...$params)</code>

# Documents

Methods:

- <code title="get /documents/{id}">$client->documents-><a href="./src/Services/DocumentsService.php">retrieve</a>(...$params)</code>
- <code title="patch /documents/{id}">$client->documents-><a href="./src/Services/DocumentsService.php">update</a>(...$params)</code>
- <code title="get /documents">$client->documents-><a href="./src/Services/DocumentsService.php">list</a>(...$params)</code>
- <code title="delete /documents/{id}">$client->documents-><a href="./src/Services/DocumentsService.php">delete</a>(...$params)</code>
- <code title="get /documents/{id}/download">$client->documents-><a href="./src/Services/DocumentsService.php">download</a>(...$params)</code>
- <code title="get /documents/{id}/download_link">$client->documents-><a href="./src/Services/DocumentsService.php">generateDownloadLink</a>(...$params)</code>
- <code title="post /documents?content-type=multipart">$client->documents-><a href="./src/Services/DocumentsService.php">upload</a>(...$params)</code>
- <code title="post /documents">$client->documents-><a href="./src/Services/DocumentsService.php">uploadJson</a>(...$params)</code>

# DynamicEmergencyAddresses

Methods:

- <code title="post /dynamic_emergency_addresses">$client->dynamicEmergencyAddresses-><a href="./src/Services/DynamicEmergencyAddressesService.php">create</a>(...$params)</code>
- <code title="get /dynamic_emergency_addresses/{id}">$client->dynamicEmergencyAddresses-><a href="./src/Services/DynamicEmergencyAddressesService.php">retrieve</a>(...$params)</code>
- <code title="get /dynamic_emergency_addresses">$client->dynamicEmergencyAddresses-><a href="./src/Services/DynamicEmergencyAddressesService.php">list</a>(...$params)</code>
- <code title="delete /dynamic_emergency_addresses/{id}">$client->dynamicEmergencyAddresses-><a href="./src/Services/DynamicEmergencyAddressesService.php">delete</a>(...$params)</code>

# DynamicEmergencyEndpoints

Methods:

- <code title="post /dynamic_emergency_endpoints">$client->dynamicEmergencyEndpoints-><a href="./src/Services/DynamicEmergencyEndpointsService.php">create</a>(...$params)</code>
- <code title="get /dynamic_emergency_endpoints/{id}">$client->dynamicEmergencyEndpoints-><a href="./src/Services/DynamicEmergencyEndpointsService.php">retrieve</a>(...$params)</code>
- <code title="get /dynamic_emergency_endpoints">$client->dynamicEmergencyEndpoints-><a href="./src/Services/DynamicEmergencyEndpointsService.php">list</a>(...$params)</code>
- <code title="delete /dynamic_emergency_endpoints/{id}">$client->dynamicEmergencyEndpoints-><a href="./src/Services/DynamicEmergencyEndpointsService.php">delete</a>(...$params)</code>

# ExternalConnections

Methods:

- <code title="post /external_connections">$client->externalConnections-><a href="./src/Services/ExternalConnectionsService.php">create</a>(...$params)</code>
- <code title="get /external_connections/{id}">$client->externalConnections-><a href="./src/Services/ExternalConnectionsService.php">retrieve</a>(...$params)</code>
- <code title="patch /external_connections/{id}">$client->externalConnections-><a href="./src/Services/ExternalConnectionsService.php">update</a>(...$params)</code>
- <code title="get /external_connections">$client->externalConnections-><a href="./src/Services/ExternalConnectionsService.php">list</a>(...$params)</code>
- <code title="delete /external_connections/{id}">$client->externalConnections-><a href="./src/Services/ExternalConnectionsService.php">delete</a>(...$params)</code>
- <code title="patch /external_connections/{id}/locations/{location_id}">$client->externalConnections-><a href="./src/Services/ExternalConnectionsService.php">updateLocation</a>(...$params)</code>

## LogMessages

Methods:

- <code title="get /external_connections/log_messages/{id}">$client->externalConnections->logMessages-><a href="./src/Services/ExternalConnections/LogMessagesService.php">retrieve</a>(...$params)</code>
- <code title="get /external_connections/log_messages">$client->externalConnections->logMessages-><a href="./src/Services/ExternalConnections/LogMessagesService.php">list</a>(...$params)</code>
- <code title="delete /external_connections/log_messages/{id}">$client->externalConnections->logMessages-><a href="./src/Services/ExternalConnections/LogMessagesService.php">dismiss</a>(...$params)</code>

## CivicAddresses

Methods:

- <code title="get /external_connections/{id}/civic_addresses/{address_id}">$client->externalConnections->civicAddresses-><a href="./src/Services/ExternalConnections/CivicAddressesService.php">retrieve</a>(...$params)</code>
- <code title="get /external_connections/{id}/civic_addresses">$client->externalConnections->civicAddresses-><a href="./src/Services/ExternalConnections/CivicAddressesService.php">list</a>(...$params)</code>

## PhoneNumbers

Methods:

- <code title="get /external_connections/{id}/phone_numbers/{phone_number_id}">$client->externalConnections->phoneNumbers-><a href="./src/Services/ExternalConnections/PhoneNumbersService.php">retrieve</a>(...$params)</code>
- <code title="patch /external_connections/{id}/phone_numbers/{phone_number_id}">$client->externalConnections->phoneNumbers-><a href="./src/Services/ExternalConnections/PhoneNumbersService.php">update</a>(...$params)</code>
- <code title="get /external_connections/{id}/phone_numbers">$client->externalConnections->phoneNumbers-><a href="./src/Services/ExternalConnections/PhoneNumbersService.php">list</a>(...$params)</code>

## Releases

Methods:

- <code title="get /external_connections/{id}/releases/{release_id}">$client->externalConnections->releases-><a href="./src/Services/ExternalConnections/ReleasesService.php">retrieve</a>(...$params)</code>
- <code title="get /external_connections/{id}/releases">$client->externalConnections->releases-><a href="./src/Services/ExternalConnections/ReleasesService.php">list</a>(...$params)</code>

## Uploads

Methods:

- <code title="post /external_connections/{id}/uploads">$client->externalConnections->uploads-><a href="./src/Services/ExternalConnections/UploadsService.php">create</a>(...$params)</code>
- <code title="get /external_connections/{id}/uploads/{ticket_id}">$client->externalConnections->uploads-><a href="./src/Services/ExternalConnections/UploadsService.php">retrieve</a>(...$params)</code>
- <code title="get /external_connections/{id}/uploads">$client->externalConnections->uploads-><a href="./src/Services/ExternalConnections/UploadsService.php">list</a>(...$params)</code>
- <code title="get /external_connections/{id}/uploads/status">$client->externalConnections->uploads-><a href="./src/Services/ExternalConnections/UploadsService.php">pendingCount</a>(...$params)</code>
- <code title="post /external_connections/{id}/uploads/refresh">$client->externalConnections->uploads-><a href="./src/Services/ExternalConnections/UploadsService.php">refreshStatus</a>(...$params)</code>
- <code title="post /external_connections/{id}/uploads/{ticket_id}/retry">$client->externalConnections->uploads-><a href="./src/Services/ExternalConnections/UploadsService.php">retry</a>(...$params)</code>

# FaxApplications

Methods:

- <code title="post /fax_applications">$client->faxApplications-><a href="./src/Services/FaxApplicationsService.php">create</a>(...$params)</code>
- <code title="get /fax_applications/{id}">$client->faxApplications-><a href="./src/Services/FaxApplicationsService.php">retrieve</a>(...$params)</code>
- <code title="patch /fax_applications/{id}">$client->faxApplications-><a href="./src/Services/FaxApplicationsService.php">update</a>(...$params)</code>
- <code title="get /fax_applications">$client->faxApplications-><a href="./src/Services/FaxApplicationsService.php">list</a>(...$params)</code>
- <code title="delete /fax_applications/{id}">$client->faxApplications-><a href="./src/Services/FaxApplicationsService.php">delete</a>(...$params)</code>

# Faxes

Methods:

- <code title="post /faxes">$client->faxes-><a href="./src/Services/FaxesService.php">create</a>(...$params)</code>
- <code title="get /faxes/{id}">$client->faxes-><a href="./src/Services/FaxesService.php">retrieve</a>(...$params)</code>
- <code title="get /faxes">$client->faxes-><a href="./src/Services/FaxesService.php">list</a>(...$params)</code>
- <code title="delete /faxes/{id}">$client->faxes-><a href="./src/Services/FaxesService.php">delete</a>(...$params)</code>

## Actions

Methods:

- <code title="post /faxes/{id}/actions/cancel">$client->faxes->actions-><a href="./src/Services/Faxes/ActionsService.php">cancel</a>(...$params)</code>
- <code title="post /faxes/{id}/actions/refresh">$client->faxes->actions-><a href="./src/Services/Faxes/ActionsService.php">refresh</a>(...$params)</code>

# FqdnConnections

Methods:

- <code title="post /fqdn_connections">$client->fqdnConnections-><a href="./src/Services/FqdnConnectionsService.php">create</a>(...$params)</code>
- <code title="get /fqdn_connections/{id}">$client->fqdnConnections-><a href="./src/Services/FqdnConnectionsService.php">retrieve</a>(...$params)</code>
- <code title="patch /fqdn_connections/{id}">$client->fqdnConnections-><a href="./src/Services/FqdnConnectionsService.php">update</a>(...$params)</code>
- <code title="get /fqdn_connections">$client->fqdnConnections-><a href="./src/Services/FqdnConnectionsService.php">list</a>(...$params)</code>
- <code title="delete /fqdn_connections/{id}">$client->fqdnConnections-><a href="./src/Services/FqdnConnectionsService.php">delete</a>(...$params)</code>

## FqdnAuthentication

Methods:

- <code title="get /fqdn_connections/{fqdn_connection_id}/fqdn_authentication">$client->fqdnConnections->fqdnAuthentication-><a href="./src/Services/FqdnConnections/FqdnAuthenticationService.php">list</a>(...$params)</code>
- <code title="patch /fqdn_connections/{fqdn_connection_id}/fqdn_authentication">$client->fqdnConnections->fqdnAuthentication-><a href="./src/Services/FqdnConnections/FqdnAuthenticationService.php">patchAll</a>(...$params)</code>

# Fqdns

Methods:

- <code title="post /fqdns">$client->fqdns-><a href="./src/Services/FqdnsService.php">create</a>(...$params)</code>
- <code title="get /fqdns/{id}">$client->fqdns-><a href="./src/Services/FqdnsService.php">retrieve</a>(...$params)</code>
- <code title="patch /fqdns/{id}">$client->fqdns-><a href="./src/Services/FqdnsService.php">update</a>(...$params)</code>
- <code title="get /fqdns">$client->fqdns-><a href="./src/Services/FqdnsService.php">list</a>(...$params)</code>
- <code title="delete /fqdns/{id}">$client->fqdns-><a href="./src/Services/FqdnsService.php">delete</a>(...$params)</code>

# GlobalIPAllowedPorts

Methods:

- <code title="get /global_ip_allowed_ports">$client->globalIPAllowedPorts-><a href="./src/Services/GlobalIPAllowedPortsService.php">list</a>()</code>

# GlobalIPAssignmentHealth

Methods:

- <code title="get /global_ip_assignment_health">$client->globalIPAssignmentHealth-><a href="./src/Services/GlobalIPAssignmentHealthService.php">retrieve</a>(...$params)</code>

# GlobalIPAssignments

Methods:

- <code title="post /global_ip_assignments">$client->globalIPAssignments-><a href="./src/Services/GlobalIPAssignmentsService.php">create</a>()</code>
- <code title="get /global_ip_assignments/{id}">$client->globalIPAssignments-><a href="./src/Services/GlobalIPAssignmentsService.php">retrieve</a>(...$params)</code>
- <code title="patch /global_ip_assignments/{id}">$client->globalIPAssignments-><a href="./src/Services/GlobalIPAssignmentsService.php">update</a>(...$params)</code>
- <code title="get /global_ip_assignments">$client->globalIPAssignments-><a href="./src/Services/GlobalIPAssignmentsService.php">list</a>(...$params)</code>
- <code title="delete /global_ip_assignments/{id}">$client->globalIPAssignments-><a href="./src/Services/GlobalIPAssignmentsService.php">delete</a>(...$params)</code>

# GlobalIPAssignmentsUsage

Methods:

- <code title="get /global_ip_assignments_usage">$client->globalIPAssignmentsUsage-><a href="./src/Services/GlobalIPAssignmentsUsageService.php">retrieve</a>(...$params)</code>

# GlobalIPHealthCheckTypes

Methods:

- <code title="get /global_ip_health_check_types">$client->globalIPHealthCheckTypes-><a href="./src/Services/GlobalIPHealthCheckTypesService.php">list</a>()</code>

# GlobalIPHealthChecks

Methods:

- <code title="post /global_ip_health_checks">$client->globalIPHealthChecks-><a href="./src/Services/GlobalIPHealthChecksService.php">create</a>(...$params)</code>
- <code title="get /global_ip_health_checks/{id}">$client->globalIPHealthChecks-><a href="./src/Services/GlobalIPHealthChecksService.php">retrieve</a>(...$params)</code>
- <code title="get /global_ip_health_checks">$client->globalIPHealthChecks-><a href="./src/Services/GlobalIPHealthChecksService.php">list</a>(...$params)</code>
- <code title="delete /global_ip_health_checks/{id}">$client->globalIPHealthChecks-><a href="./src/Services/GlobalIPHealthChecksService.php">delete</a>(...$params)</code>

# GlobalIPLatency

Methods:

- <code title="get /global_ip_latency">$client->globalIPLatency-><a href="./src/Services/GlobalIPLatencyService.php">retrieve</a>(...$params)</code>

# GlobalIPProtocols

Methods:

- <code title="get /global_ip_protocols">$client->globalIPProtocols-><a href="./src/Services/GlobalIPProtocolsService.php">list</a>()</code>

# GlobalIPUsage

Methods:

- <code title="get /global_ip_usage">$client->globalIPUsage-><a href="./src/Services/GlobalIPUsageService.php">retrieve</a>(...$params)</code>

# GlobalIPs

Methods:

- <code title="post /global_ips">$client->globalIPs-><a href="./src/Services/GlobalIPsService.php">create</a>(...$params)</code>
- <code title="get /global_ips/{id}">$client->globalIPs-><a href="./src/Services/GlobalIPsService.php">retrieve</a>(...$params)</code>
- <code title="get /global_ips">$client->globalIPs-><a href="./src/Services/GlobalIPsService.php">list</a>(...$params)</code>
- <code title="delete /global_ips/{id}">$client->globalIPs-><a href="./src/Services/GlobalIPsService.php">delete</a>(...$params)</code>

# InboundChannels

Methods:

- <code title="patch /inbound_channels">$client->inboundChannels-><a href="./src/Services/InboundChannelsService.php">update</a>(...$params)</code>
- <code title="get /inbound_channels">$client->inboundChannels-><a href="./src/Services/InboundChannelsService.php">list</a>()</code>

# IntegrationSecrets

Methods:

- <code title="post /integration_secrets">$client->integrationSecrets-><a href="./src/Services/IntegrationSecretsService.php">create</a>(...$params)</code>
- <code title="get /integration_secrets">$client->integrationSecrets-><a href="./src/Services/IntegrationSecretsService.php">list</a>(...$params)</code>
- <code title="delete /integration_secrets/{id}">$client->integrationSecrets-><a href="./src/Services/IntegrationSecretsService.php">delete</a>(...$params)</code>

# InventoryCoverage

Methods:

- <code title="get /inventory_coverage">$client->inventoryCoverage-><a href="./src/Services/InventoryCoverageService.php">list</a>(...$params)</code>

# Invoices

Methods:

- <code title="get /invoices/{id}">$client->invoices-><a href="./src/Services/InvoicesService.php">retrieve</a>(...$params)</code>
- <code title="get /invoices">$client->invoices-><a href="./src/Services/InvoicesService.php">list</a>(...$params)</code>

# IPConnections

Methods:

- <code title="post /ip_connections">$client->ipConnections-><a href="./src/Services/IPConnectionsService.php">create</a>(...$params)</code>
- <code title="get /ip_connections/{id}">$client->ipConnections-><a href="./src/Services/IPConnectionsService.php">retrieve</a>(...$params)</code>
- <code title="patch /ip_connections/{id}">$client->ipConnections-><a href="./src/Services/IPConnectionsService.php">update</a>(...$params)</code>
- <code title="get /ip_connections">$client->ipConnections-><a href="./src/Services/IPConnectionsService.php">list</a>(...$params)</code>
- <code title="delete /ip_connections/{id}">$client->ipConnections-><a href="./src/Services/IPConnectionsService.php">delete</a>(...$params)</code>

# IPs

Methods:

- <code title="post /ips">$client->ips-><a href="./src/Services/IPsService.php">create</a>(...$params)</code>
- <code title="get /ips/{id}">$client->ips-><a href="./src/Services/IPsService.php">retrieve</a>(...$params)</code>
- <code title="patch /ips/{id}">$client->ips-><a href="./src/Services/IPsService.php">update</a>(...$params)</code>
- <code title="get /ips">$client->ips-><a href="./src/Services/IPsService.php">list</a>(...$params)</code>
- <code title="delete /ips/{id}">$client->ips-><a href="./src/Services/IPsService.php">delete</a>(...$params)</code>

# LedgerBillingGroupReports

Methods:

- <code title="post /ledger_billing_group_reports">$client->ledgerBillingGroupReports-><a href="./src/Services/LedgerBillingGroupReportsService.php">create</a>(...$params)</code>
- <code title="get /ledger_billing_group_reports/{id}">$client->ledgerBillingGroupReports-><a href="./src/Services/LedgerBillingGroupReportsService.php">retrieve</a>(...$params)</code>

# List

Methods:

- <code title="get /list">$client->list-><a href="./src/Services/ListService.php">retrieveAll</a>()</code>
- <code title="get /list/{channel_zone_id}">$client->list-><a href="./src/Services/ListService.php">retrieveByZone</a>(...$params)</code>

# ManagedAccounts

Methods:

- <code title="post /managed_accounts">$client->managedAccounts-><a href="./src/Services/ManagedAccountsService.php">create</a>(...$params)</code>
- <code title="get /managed_accounts/{id}">$client->managedAccounts-><a href="./src/Services/ManagedAccountsService.php">retrieve</a>(...$params)</code>
- <code title="patch /managed_accounts/{id}">$client->managedAccounts-><a href="./src/Services/ManagedAccountsService.php">update</a>(...$params)</code>
- <code title="get /managed_accounts">$client->managedAccounts-><a href="./src/Services/ManagedAccountsService.php">list</a>(...$params)</code>
- <code title="get /managed_accounts/allocatable_global_outbound_channels">$client->managedAccounts-><a href="./src/Services/ManagedAccountsService.php">getAllocatableGlobalOutboundChannels</a>()</code>
- <code title="patch /managed_accounts/{id}/update_global_channel_limit">$client->managedAccounts-><a href="./src/Services/ManagedAccountsService.php">updateGlobalChannelLimit</a>(...$params)</code>

## Actions

Methods:

- <code title="post /managed_accounts/{id}/actions/disable">$client->managedAccounts->actions-><a href="./src/Services/ManagedAccounts/ActionsService.php">disable</a>(...$params)</code>
- <code title="post /managed_accounts/{id}/actions/enable">$client->managedAccounts->actions-><a href="./src/Services/ManagedAccounts/ActionsService.php">enable</a>(...$params)</code>

# Media

Methods:

- <code title="get /media/{media_name}">$client->media-><a href="./src/Services/MediaService.php">retrieve</a>(...$params)</code>
- <code title="put /media/{media_name}">$client->media-><a href="./src/Services/MediaService.php">update</a>(...$params)</code>
- <code title="get /media">$client->media-><a href="./src/Services/MediaService.php">list</a>(...$params)</code>
- <code title="delete /media/{media_name}">$client->media-><a href="./src/Services/MediaService.php">delete</a>(...$params)</code>
- <code title="get /media/{media_name}/download">$client->media-><a href="./src/Services/MediaService.php">download</a>(...$params)</code>
- <code title="post /media">$client->media-><a href="./src/Services/MediaService.php">upload</a>(...$params)</code>

# Messages

Methods:

- <code title="get /messages/{id}">$client->messages-><a href="./src/Services/MessagesService.php">retrieve</a>(...$params)</code>
- <code title="delete /messages/{id}">$client->messages-><a href="./src/Services/MessagesService.php">cancelScheduled</a>(...$params)</code>
- <code title="get /messages/group/{message_id}">$client->messages-><a href="./src/Services/MessagesService.php">retrieveGroupMessages</a>(...$params)</code>
- <code title="post /messages/schedule">$client->messages-><a href="./src/Services/MessagesService.php">schedule</a>(...$params)</code>
- <code title="post /messages">$client->messages-><a href="./src/Services/MessagesService.php">send</a>(...$params)</code>
- <code title="post /messages/group_mms">$client->messages-><a href="./src/Services/MessagesService.php">sendGroupMms</a>(...$params)</code>
- <code title="post /messages/long_code">$client->messages-><a href="./src/Services/MessagesService.php">sendLongCode</a>(...$params)</code>
- <code title="post /messages/number_pool">$client->messages-><a href="./src/Services/MessagesService.php">sendNumberPool</a>(...$params)</code>
- <code title="post /messages/short_code">$client->messages-><a href="./src/Services/MessagesService.php">sendShortCode</a>(...$params)</code>
- <code title="post /messages/alphanumeric_sender_id">$client->messages-><a href="./src/Services/MessagesService.php">sendWithAlphanumericSender</a>(...$params)</code>
- <code title="post /messages/whatsapp">$client->messages-><a href="./src/Services/MessagesService.php">whatsapp</a>(...$params)</code>

## Rcs

Methods:

- <code title="get /messages/rcs/deeplinks/{agent_id}">$client->messages->rcs-><a href="./src/Services/Messages/RcsService.php">generateDeeplink</a>(...$params)</code>
- <code title="post /messages/rcs">$client->messages->rcs-><a href="./src/Services/Messages/RcsService.php">send</a>(...$params)</code>

# Messaging

## Rcs

Methods:

- <code title="put /messaging/rcs/test_number_invite/{id}/{phone_number}">$client->messaging->rcs-><a href="./src/Services/Messaging/RcsService.php">inviteTestNumber</a>(...$params)</code>
- <code title="post /messaging/rcs/bulk_capabilities">$client->messaging->rcs-><a href="./src/Services/Messaging/RcsService.php">listBulkCapabilities</a>(...$params)</code>
- <code title="get /messaging/rcs/capabilities/{agent_id}/{phone_number}">$client->messaging->rcs-><a href="./src/Services/Messaging/RcsService.php">retrieveCapabilities</a>(...$params)</code>

### Agents

Methods:

- <code title="get /messaging/rcs/agents/{id}">$client->messaging->rcs->agents-><a href="./src/Services/Messaging/Rcs/AgentsService.php">retrieve</a>(...$params)</code>
- <code title="patch /messaging/rcs/agents/{id}">$client->messaging->rcs->agents-><a href="./src/Services/Messaging/Rcs/AgentsService.php">update</a>(...$params)</code>
- <code title="get /messaging/rcs/agents">$client->messaging->rcs->agents-><a href="./src/Services/Messaging/Rcs/AgentsService.php">list</a>(...$params)</code>

# MessagingHostedNumberOrders

Methods:

- <code title="post /messaging_hosted_number_orders">$client->messagingHostedNumberOrders-><a href="./src/Services/MessagingHostedNumberOrdersService.php">create</a>(...$params)</code>
- <code title="get /messaging_hosted_number_orders/{id}">$client->messagingHostedNumberOrders-><a href="./src/Services/MessagingHostedNumberOrdersService.php">retrieve</a>(...$params)</code>
- <code title="get /messaging_hosted_number_orders">$client->messagingHostedNumberOrders-><a href="./src/Services/MessagingHostedNumberOrdersService.php">list</a>(...$params)</code>
- <code title="delete /messaging_hosted_number_orders/{id}">$client->messagingHostedNumberOrders-><a href="./src/Services/MessagingHostedNumberOrdersService.php">delete</a>(...$params)</code>
- <code title="post /messaging_hosted_number_orders/eligibility_numbers_check">$client->messagingHostedNumberOrders-><a href="./src/Services/MessagingHostedNumberOrdersService.php">checkEligibility</a>(...$params)</code>
- <code title="post /messaging_hosted_number_orders/{id}/verification_codes">$client->messagingHostedNumberOrders-><a href="./src/Services/MessagingHostedNumberOrdersService.php">createVerificationCodes</a>(...$params)</code>
- <code title="post /messaging_hosted_number_orders/{id}/validation_codes">$client->messagingHostedNumberOrders-><a href="./src/Services/MessagingHostedNumberOrdersService.php">validateCodes</a>(...$params)</code>

## Actions

Methods:

- <code title="post /messaging_hosted_number_orders/{id}/actions/file_upload">$client->messagingHostedNumberOrders->actions-><a href="./src/Services/MessagingHostedNumberOrders/ActionsService.php">uploadFile</a>(...$params)</code>

# MessagingHostedNumbers

Methods:

- <code title="get /messaging_hosted_numbers/{id}">$client->messagingHostedNumbers-><a href="./src/Services/MessagingHostedNumbersService.php">retrieve</a>(...$params)</code>
- <code title="patch /messaging_hosted_numbers/{id}">$client->messagingHostedNumbers-><a href="./src/Services/MessagingHostedNumbersService.php">update</a>(...$params)</code>
- <code title="get /messaging_hosted_numbers">$client->messagingHostedNumbers-><a href="./src/Services/MessagingHostedNumbersService.php">list</a>(...$params)</code>
- <code title="delete /messaging_hosted_numbers/{id}">$client->messagingHostedNumbers-><a href="./src/Services/MessagingHostedNumbersService.php">delete</a>(...$params)</code>

# MessagingNumbersBulkUpdates

Methods:

- <code title="post /messaging_numbers_bulk_updates">$client->messagingNumbersBulkUpdates-><a href="./src/Services/MessagingNumbersBulkUpdatesService.php">create</a>(...$params)</code>
- <code title="get /messaging_numbers_bulk_updates/{order_id}">$client->messagingNumbersBulkUpdates-><a href="./src/Services/MessagingNumbersBulkUpdatesService.php">retrieve</a>(...$params)</code>

# MessagingOptouts

Methods:

- <code title="get /messaging_optouts">$client->messagingOptouts-><a href="./src/Services/MessagingOptoutsService.php">list</a>(...$params)</code>

# MessagingProfiles

Methods:

- <code title="post /messaging_profiles">$client->messagingProfiles-><a href="./src/Services/MessagingProfilesService.php">create</a>(...$params)</code>
- <code title="get /messaging_profiles/{id}">$client->messagingProfiles-><a href="./src/Services/MessagingProfilesService.php">retrieve</a>(...$params)</code>
- <code title="patch /messaging_profiles/{id}">$client->messagingProfiles-><a href="./src/Services/MessagingProfilesService.php">update</a>(...$params)</code>
- <code title="get /messaging_profiles">$client->messagingProfiles-><a href="./src/Services/MessagingProfilesService.php">list</a>(...$params)</code>
- <code title="delete /messaging_profiles/{id}">$client->messagingProfiles-><a href="./src/Services/MessagingProfilesService.php">delete</a>(...$params)</code>
- <code title="get /messaging_profiles/{id}/alphanumeric_sender_ids">$client->messagingProfiles-><a href="./src/Services/MessagingProfilesService.php">listAlphanumericSenderIDs</a>(...$params)</code>
- <code title="get /messaging_profiles/{id}/phone_numbers">$client->messagingProfiles-><a href="./src/Services/MessagingProfilesService.php">listPhoneNumbers</a>(...$params)</code>
- <code title="get /messaging_profiles/{id}/short_codes">$client->messagingProfiles-><a href="./src/Services/MessagingProfilesService.php">listShortCodes</a>(...$params)</code>
- <code title="get /messaging_profiles/{id}/metrics">$client->messagingProfiles-><a href="./src/Services/MessagingProfilesService.php">retrieveMetrics</a>(...$params)</code>

## AutorespConfigs

Methods:

- <code title="post /messaging_profiles/{profile_id}/autoresp_configs">$client->messagingProfiles->autorespConfigs-><a href="./src/Services/MessagingProfiles/AutorespConfigsService.php">create</a>(...$params)</code>
- <code title="get /messaging_profiles/{profile_id}/autoresp_configs/{autoresp_cfg_id}">$client->messagingProfiles->autorespConfigs-><a href="./src/Services/MessagingProfiles/AutorespConfigsService.php">retrieve</a>(...$params)</code>
- <code title="put /messaging_profiles/{profile_id}/autoresp_configs/{autoresp_cfg_id}">$client->messagingProfiles->autorespConfigs-><a href="./src/Services/MessagingProfiles/AutorespConfigsService.php">update</a>(...$params)</code>
- <code title="get /messaging_profiles/{profile_id}/autoresp_configs">$client->messagingProfiles->autorespConfigs-><a href="./src/Services/MessagingProfiles/AutorespConfigsService.php">list</a>(...$params)</code>
- <code title="delete /messaging_profiles/{profile_id}/autoresp_configs/{autoresp_cfg_id}">$client->messagingProfiles->autorespConfigs-><a href="./src/Services/MessagingProfiles/AutorespConfigsService.php">delete</a>(...$params)</code>

## Actions

Methods:

- <code title="post /messaging_profiles/{id}/actions/regenerate_secret">$client->messagingProfiles->actions-><a href="./src/Services/MessagingProfiles/ActionsService.php">regenerateSecret</a>(...$params)</code>

# MessagingTollfree

## Verification

### Requests

Methods:

- <code title="post /messaging_tollfree/verification/requests">$client->messagingTollfree->verification->requests-><a href="./src/Services/MessagingTollfree/Verification/RequestsService.php">create</a>(...$params)</code>
- <code title="get /messaging_tollfree/verification/requests/{id}">$client->messagingTollfree->verification->requests-><a href="./src/Services/MessagingTollfree/Verification/RequestsService.php">retrieve</a>(...$params)</code>
- <code title="patch /messaging_tollfree/verification/requests/{id}">$client->messagingTollfree->verification->requests-><a href="./src/Services/MessagingTollfree/Verification/RequestsService.php">update</a>(...$params)</code>
- <code title="get /messaging_tollfree/verification/requests">$client->messagingTollfree->verification->requests-><a href="./src/Services/MessagingTollfree/Verification/RequestsService.php">list</a>(...$params)</code>
- <code title="delete /messaging_tollfree/verification/requests/{id}">$client->messagingTollfree->verification->requests-><a href="./src/Services/MessagingTollfree/Verification/RequestsService.php">delete</a>(...$params)</code>
- <code title="get /messaging_tollfree/verification/requests/{id}/status_history">$client->messagingTollfree->verification->requests-><a href="./src/Services/MessagingTollfree/Verification/RequestsService.php">retrieveStatusHistory</a>(...$params)</code>

# MessagingURLDomains

Methods:

- <code title="get /messaging_url_domains">$client->messagingURLDomains-><a href="./src/Services/MessagingURLDomainsService.php">list</a>(...$params)</code>

# MobileNetworkOperators

Methods:

- <code title="get /mobile_network_operators">$client->mobileNetworkOperators-><a href="./src/Services/MobileNetworkOperatorsService.php">list</a>(...$params)</code>

# MobilePushCredentials

Methods:

- <code title="post /mobile_push_credentials">$client->mobilePushCredentials-><a href="./src/Services/MobilePushCredentialsService.php">create</a>(...$params)</code>
- <code title="get /mobile_push_credentials/{push_credential_id}">$client->mobilePushCredentials-><a href="./src/Services/MobilePushCredentialsService.php">retrieve</a>(...$params)</code>
- <code title="get /mobile_push_credentials">$client->mobilePushCredentials-><a href="./src/Services/MobilePushCredentialsService.php">list</a>(...$params)</code>
- <code title="delete /mobile_push_credentials/{push_credential_id}">$client->mobilePushCredentials-><a href="./src/Services/MobilePushCredentialsService.php">delete</a>(...$params)</code>

# NetworkCoverage

Methods:

- <code title="get /network_coverage">$client->networkCoverage-><a href="./src/Services/NetworkCoverageService.php">list</a>(...$params)</code>

# Networks

Methods:

- <code title="post /networks">$client->networks-><a href="./src/Services/NetworksService.php">create</a>(...$params)</code>
- <code title="get /networks/{id}">$client->networks-><a href="./src/Services/NetworksService.php">retrieve</a>(...$params)</code>
- <code title="patch /networks/{id}">$client->networks-><a href="./src/Services/NetworksService.php">update</a>(...$params)</code>
- <code title="get /networks">$client->networks-><a href="./src/Services/NetworksService.php">list</a>(...$params)</code>
- <code title="delete /networks/{id}">$client->networks-><a href="./src/Services/NetworksService.php">delete</a>(...$params)</code>
- <code title="get /networks/{id}/network_interfaces">$client->networks-><a href="./src/Services/NetworksService.php">listInterfaces</a>(...$params)</code>

## DefaultGateway

Methods:

- <code title="post /networks/{id}/default_gateway">$client->networks->defaultGateway-><a href="./src/Services/Networks/DefaultGatewayService.php">create</a>(...$params)</code>
- <code title="get /networks/{id}/default_gateway">$client->networks->defaultGateway-><a href="./src/Services/Networks/DefaultGatewayService.php">retrieve</a>(...$params)</code>
- <code title="delete /networks/{id}/default_gateway">$client->networks->defaultGateway-><a href="./src/Services/Networks/DefaultGatewayService.php">delete</a>(...$params)</code>

# NotificationChannels

Methods:

- <code title="post /notification_channels">$client->notificationChannels-><a href="./src/Services/NotificationChannelsService.php">create</a>(...$params)</code>
- <code title="get /notification_channels/{id}">$client->notificationChannels-><a href="./src/Services/NotificationChannelsService.php">retrieve</a>(...$params)</code>
- <code title="patch /notification_channels/{id}">$client->notificationChannels-><a href="./src/Services/NotificationChannelsService.php">update</a>(...$params)</code>
- <code title="get /notification_channels">$client->notificationChannels-><a href="./src/Services/NotificationChannelsService.php">list</a>(...$params)</code>
- <code title="delete /notification_channels/{id}">$client->notificationChannels-><a href="./src/Services/NotificationChannelsService.php">delete</a>(...$params)</code>

# NotificationEventConditions

Methods:

- <code title="get /notification_event_conditions">$client->notificationEventConditions-><a href="./src/Services/NotificationEventConditionsService.php">list</a>(...$params)</code>

# NotificationEvents

Methods:

- <code title="get /notification_events">$client->notificationEvents-><a href="./src/Services/NotificationEventsService.php">list</a>(...$params)</code>

# NotificationProfiles

Methods:

- <code title="post /notification_profiles">$client->notificationProfiles-><a href="./src/Services/NotificationProfilesService.php">create</a>(...$params)</code>
- <code title="get /notification_profiles/{id}">$client->notificationProfiles-><a href="./src/Services/NotificationProfilesService.php">retrieve</a>(...$params)</code>
- <code title="patch /notification_profiles/{id}">$client->notificationProfiles-><a href="./src/Services/NotificationProfilesService.php">update</a>(...$params)</code>
- <code title="get /notification_profiles">$client->notificationProfiles-><a href="./src/Services/NotificationProfilesService.php">list</a>(...$params)</code>
- <code title="delete /notification_profiles/{id}">$client->notificationProfiles-><a href="./src/Services/NotificationProfilesService.php">delete</a>(...$params)</code>

# NotificationSettings

Methods:

- <code title="post /notification_settings">$client->notificationSettings-><a href="./src/Services/NotificationSettingsService.php">create</a>(...$params)</code>
- <code title="get /notification_settings/{id}">$client->notificationSettings-><a href="./src/Services/NotificationSettingsService.php">retrieve</a>(...$params)</code>
- <code title="get /notification_settings">$client->notificationSettings-><a href="./src/Services/NotificationSettingsService.php">list</a>(...$params)</code>
- <code title="delete /notification_settings/{id}">$client->notificationSettings-><a href="./src/Services/NotificationSettingsService.php">delete</a>(...$params)</code>

# NumberBlockOrders

Methods:

- <code title="post /number_block_orders">$client->numberBlockOrders-><a href="./src/Services/NumberBlockOrdersService.php">create</a>(...$params)</code>
- <code title="get /number_block_orders/{number_block_order_id}">$client->numberBlockOrders-><a href="./src/Services/NumberBlockOrdersService.php">retrieve</a>(...$params)</code>
- <code title="get /number_block_orders">$client->numberBlockOrders-><a href="./src/Services/NumberBlockOrdersService.php">list</a>(...$params)</code>

# NumberLookup

Methods:

- <code title="get /number_lookup/{phone_number}">$client->numberLookup-><a href="./src/Services/NumberLookupService.php">retrieve</a>(...$params)</code>

# NumberOrderPhoneNumbers

Methods:

- <code title="get /number_order_phone_numbers/{number_order_phone_number_id}">$client->numberOrderPhoneNumbers-><a href="./src/Services/NumberOrderPhoneNumbersService.php">retrieve</a>(...$params)</code>
- <code title="get /number_order_phone_numbers">$client->numberOrderPhoneNumbers-><a href="./src/Services/NumberOrderPhoneNumbersService.php">list</a>(...$params)</code>
- <code title="post /number_order_phone_numbers/{id}/requirement_group">$client->numberOrderPhoneNumbers-><a href="./src/Services/NumberOrderPhoneNumbersService.php">updateRequirementGroup</a>(...$params)</code>
- <code title="patch /number_order_phone_numbers/{number_order_phone_number_id}">$client->numberOrderPhoneNumbers-><a href="./src/Services/NumberOrderPhoneNumbersService.php">updateRequirements</a>(...$params)</code>

# NumberOrders

Methods:

- <code title="post /number_orders">$client->numberOrders-><a href="./src/Services/NumberOrdersService.php">create</a>(...$params)</code>
- <code title="get /number_orders/{number_order_id}">$client->numberOrders-><a href="./src/Services/NumberOrdersService.php">retrieve</a>(...$params)</code>
- <code title="patch /number_orders/{number_order_id}">$client->numberOrders-><a href="./src/Services/NumberOrdersService.php">update</a>(...$params)</code>
- <code title="get /number_orders">$client->numberOrders-><a href="./src/Services/NumberOrdersService.php">list</a>(...$params)</code>

# NumberReservations

Methods:

- <code title="post /number_reservations">$client->numberReservations-><a href="./src/Services/NumberReservationsService.php">create</a>(...$params)</code>
- <code title="get /number_reservations/{number_reservation_id}">$client->numberReservations-><a href="./src/Services/NumberReservationsService.php">retrieve</a>(...$params)</code>
- <code title="get /number_reservations">$client->numberReservations-><a href="./src/Services/NumberReservationsService.php">list</a>(...$params)</code>

## Actions

Methods:

- <code title="post /number_reservations/{number_reservation_id}/actions/extend">$client->numberReservations->actions-><a href="./src/Services/NumberReservations/ActionsService.php">extend</a>(...$params)</code>

# NumbersFeatures

Methods:

- <code title="post /numbers_features">$client->numbersFeatures-><a href="./src/Services/NumbersFeaturesService.php">create</a>(...$params)</code>

# OperatorConnect

## Actions

Methods:

- <code title="post /operator_connect/actions/refresh">$client->operatorConnect->actions-><a href="./src/Services/OperatorConnect/ActionsService.php">refresh</a>()</code>

# OtaUpdates

Methods:

- <code title="get /ota_updates/{id}">$client->otaUpdates-><a href="./src/Services/OtaUpdatesService.php">retrieve</a>(...$params)</code>
- <code title="get /ota_updates">$client->otaUpdates-><a href="./src/Services/OtaUpdatesService.php">list</a>(...$params)</code>

# OutboundVoiceProfiles

Methods:

- <code title="post /outbound_voice_profiles">$client->outboundVoiceProfiles-><a href="./src/Services/OutboundVoiceProfilesService.php">create</a>(...$params)</code>
- <code title="get /outbound_voice_profiles/{id}">$client->outboundVoiceProfiles-><a href="./src/Services/OutboundVoiceProfilesService.php">retrieve</a>(...$params)</code>
- <code title="patch /outbound_voice_profiles/{id}">$client->outboundVoiceProfiles-><a href="./src/Services/OutboundVoiceProfilesService.php">update</a>(...$params)</code>
- <code title="get /outbound_voice_profiles">$client->outboundVoiceProfiles-><a href="./src/Services/OutboundVoiceProfilesService.php">list</a>(...$params)</code>
- <code title="delete /outbound_voice_profiles/{id}">$client->outboundVoiceProfiles-><a href="./src/Services/OutboundVoiceProfilesService.php">delete</a>(...$params)</code>

# Payment

Methods:

- <code title="post /v2/payment/stored_payment_transactions">$client->payment-><a href="./src/Services/PaymentService.php">createStoredPaymentTransaction</a>(...$params)</code>

## AutoRechargePrefs

Methods:

- <code title="patch /payment/auto_recharge_prefs">$client->payment->autoRechargePrefs-><a href="./src/Services/Payment/AutoRechargePrefsService.php">update</a>(...$params)</code>
- <code title="get /payment/auto_recharge_prefs">$client->payment->autoRechargePrefs-><a href="./src/Services/Payment/AutoRechargePrefsService.php">list</a>()</code>

# PhoneNumberBlocks

## Jobs

Methods:

- <code title="get /phone_number_blocks/jobs/{id}">$client->phoneNumberBlocks->jobs-><a href="./src/Services/PhoneNumberBlocks/JobsService.php">retrieve</a>(...$params)</code>
- <code title="get /phone_number_blocks/jobs">$client->phoneNumberBlocks->jobs-><a href="./src/Services/PhoneNumberBlocks/JobsService.php">list</a>(...$params)</code>
- <code title="post /phone_number_blocks/jobs/delete_phone_number_block">$client->phoneNumberBlocks->jobs-><a href="./src/Services/PhoneNumberBlocks/JobsService.php">deletePhoneNumberBlock</a>(...$params)</code>

# PhoneNumbers

Methods:

- <code title="get /phone_numbers/{id}">$client->phoneNumbers-><a href="./src/Services/PhoneNumbersService.php">retrieve</a>(...$params)</code>
- <code title="patch /phone_numbers/{id}">$client->phoneNumbers-><a href="./src/Services/PhoneNumbersService.php">update</a>(...$params)</code>
- <code title="get /phone_numbers">$client->phoneNumbers-><a href="./src/Services/PhoneNumbersService.php">list</a>(...$params)</code>
- <code title="delete /phone_numbers/{id}">$client->phoneNumbers-><a href="./src/Services/PhoneNumbersService.php">delete</a>(...$params)</code>
- <code title="get /phone_numbers/slim">$client->phoneNumbers-><a href="./src/Services/PhoneNumbersService.php">slimList</a>(...$params)</code>

## Actions

Methods:

- <code title="patch /phone_numbers/{id}/actions/bundle_status_change">$client->phoneNumbers->actions-><a href="./src/Services/PhoneNumbers/ActionsService.php">changeBundleStatus</a>(...$params)</code>
- <code title="post /phone_numbers/{id}/actions/enable_emergency">$client->phoneNumbers->actions-><a href="./src/Services/PhoneNumbers/ActionsService.php">enableEmergency</a>(...$params)</code>
- <code title="post /phone_numbers/actions/verify_ownership">$client->phoneNumbers->actions-><a href="./src/Services/PhoneNumbers/ActionsService.php">verifyOwnership</a>(...$params)</code>

## CsvDownloads

Methods:

- <code title="post /phone_numbers/csv_downloads">$client->phoneNumbers->csvDownloads-><a href="./src/Services/PhoneNumbers/CsvDownloadsService.php">create</a>(...$params)</code>
- <code title="get /phone_numbers/csv_downloads/{id}">$client->phoneNumbers->csvDownloads-><a href="./src/Services/PhoneNumbers/CsvDownloadsService.php">retrieve</a>(...$params)</code>
- <code title="get /phone_numbers/csv_downloads">$client->phoneNumbers->csvDownloads-><a href="./src/Services/PhoneNumbers/CsvDownloadsService.php">list</a>(...$params)</code>

## Jobs

Methods:

- <code title="get /phone_numbers/jobs/{id}">$client->phoneNumbers->jobs-><a href="./src/Services/PhoneNumbers/JobsService.php">retrieve</a>(...$params)</code>
- <code title="get /phone_numbers/jobs">$client->phoneNumbers->jobs-><a href="./src/Services/PhoneNumbers/JobsService.php">list</a>(...$params)</code>
- <code title="post /phone_numbers/jobs/delete_phone_numbers">$client->phoneNumbers->jobs-><a href="./src/Services/PhoneNumbers/JobsService.php">deleteBatch</a>(...$params)</code>
- <code title="post /phone_numbers/jobs/update_phone_numbers">$client->phoneNumbers->jobs-><a href="./src/Services/PhoneNumbers/JobsService.php">updateBatch</a>(...$params)</code>
- <code title="post /phone_numbers/jobs/update_emergency_settings">$client->phoneNumbers->jobs-><a href="./src/Services/PhoneNumbers/JobsService.php">updateEmergencySettingsBatch</a>(...$params)</code>

## Messaging

Methods:

- <code title="get /phone_numbers/{id}/messaging">$client->phoneNumbers->messaging-><a href="./src/Services/PhoneNumbers/MessagingService.php">retrieve</a>(...$params)</code>
- <code title="patch /phone_numbers/{id}/messaging">$client->phoneNumbers->messaging-><a href="./src/Services/PhoneNumbers/MessagingService.php">update</a>(...$params)</code>
- <code title="get /phone_numbers/messaging">$client->phoneNumbers->messaging-><a href="./src/Services/PhoneNumbers/MessagingService.php">list</a>(...$params)</code>

## Voice

Methods:

- <code title="get /phone_numbers/{id}/voice">$client->phoneNumbers->voice-><a href="./src/Services/PhoneNumbers/VoiceService.php">retrieve</a>(...$params)</code>
- <code title="patch /phone_numbers/{id}/voice">$client->phoneNumbers->voice-><a href="./src/Services/PhoneNumbers/VoiceService.php">update</a>(...$params)</code>
- <code title="get /phone_numbers/voice">$client->phoneNumbers->voice-><a href="./src/Services/PhoneNumbers/VoiceService.php">list</a>(...$params)</code>

## Voicemail

Methods:

- <code title="post /phone_numbers/{phone_number_id}/voicemail">$client->phoneNumbers->voicemail-><a href="./src/Services/PhoneNumbers/VoicemailService.php">create</a>(...$params)</code>
- <code title="get /phone_numbers/{phone_number_id}/voicemail">$client->phoneNumbers->voicemail-><a href="./src/Services/PhoneNumbers/VoicemailService.php">retrieve</a>(...$params)</code>
- <code title="patch /phone_numbers/{phone_number_id}/voicemail">$client->phoneNumbers->voicemail-><a href="./src/Services/PhoneNumbers/VoicemailService.php">update</a>(...$params)</code>

# PhoneNumbersRegulatoryRequirements

Methods:

- <code title="get /phone_numbers_regulatory_requirements">$client->phoneNumbersRegulatoryRequirements-><a href="./src/Services/PhoneNumbersRegulatoryRequirementsService.php">retrieve</a>(...$params)</code>

# PortabilityChecks

Methods:

- <code title="post /portability_checks">$client->portabilityChecks-><a href="./src/Services/PortabilityChecksService.php">run</a>(...$params)</code>

# Porting

Methods:

- <code title="get /porting/uk_carriers">$client->porting-><a href="./src/Services/PortingService.php">listUkCarriers</a>()</code>

## Events

Methods:

- <code title="get /porting/events/{id}">$client->porting->events-><a href="./src/Services/Porting/EventsService.php">retrieve</a>(...$params)</code>
- <code title="get /porting/events">$client->porting->events-><a href="./src/Services/Porting/EventsService.php">list</a>(...$params)</code>
- <code title="post /porting/events/{id}/republish">$client->porting->events-><a href="./src/Services/Porting/EventsService.php">republish</a>(...$params)</code>

## Reports

Methods:

- <code title="post /porting/reports">$client->porting->reports-><a href="./src/Services/Porting/ReportsService.php">create</a>(...$params)</code>
- <code title="get /porting/reports/{id}">$client->porting->reports-><a href="./src/Services/Porting/ReportsService.php">retrieve</a>(...$params)</code>
- <code title="get /porting/reports">$client->porting->reports-><a href="./src/Services/Porting/ReportsService.php">list</a>(...$params)</code>

## LoaConfigurations

Methods:

- <code title="post /porting/loa_configurations">$client->porting->loaConfigurations-><a href="./src/Services/Porting/LoaConfigurationsService.php">create</a>(...$params)</code>
- <code title="get /porting/loa_configurations/{id}">$client->porting->loaConfigurations-><a href="./src/Services/Porting/LoaConfigurationsService.php">retrieve</a>(...$params)</code>
- <code title="patch /porting/loa_configurations/{id}">$client->porting->loaConfigurations-><a href="./src/Services/Porting/LoaConfigurationsService.php">update</a>(...$params)</code>
- <code title="get /porting/loa_configurations">$client->porting->loaConfigurations-><a href="./src/Services/Porting/LoaConfigurationsService.php">list</a>(...$params)</code>
- <code title="delete /porting/loa_configurations/{id}">$client->porting->loaConfigurations-><a href="./src/Services/Porting/LoaConfigurationsService.php">delete</a>(...$params)</code>
- <code title="post /porting/loa_configurations/preview">$client->porting->loaConfigurations-><a href="./src/Services/Porting/LoaConfigurationsService.php">preview</a>(...$params)</code>
- <code title="post /porting/loa_configurations/preview">$client->porting->loaConfigurations-><a href="./src/Services/Porting/LoaConfigurationsService.php">preview0</a>(...$params)</code>
- <code title="get /porting/loa_configurations/{id}/preview">$client->porting->loaConfigurations-><a href="./src/Services/Porting/LoaConfigurationsService.php">preview1</a>(...$params)</code>

# PortingOrders

Methods:

- <code title="post /porting_orders">$client->portingOrders-><a href="./src/Services/PortingOrdersService.php">create</a>(...$params)</code>
- <code title="get /porting_orders/{id}">$client->portingOrders-><a href="./src/Services/PortingOrdersService.php">retrieve</a>(...$params)</code>
- <code title="patch /porting_orders/{id}">$client->portingOrders-><a href="./src/Services/PortingOrdersService.php">update</a>(...$params)</code>
- <code title="get /porting_orders">$client->portingOrders-><a href="./src/Services/PortingOrdersService.php">list</a>(...$params)</code>
- <code title="delete /porting_orders/{id}">$client->portingOrders-><a href="./src/Services/PortingOrdersService.php">delete</a>(...$params)</code>
- <code title="get /porting_orders/{id}/allowed_foc_windows">$client->portingOrders-><a href="./src/Services/PortingOrdersService.php">retrieveAllowedFocWindows</a>(...$params)</code>
- <code title="get /porting_orders/exception_types">$client->portingOrders-><a href="./src/Services/PortingOrdersService.php">retrieveExceptionTypes</a>()</code>
- <code title="get /porting_orders/{id}/loa_template">$client->portingOrders-><a href="./src/Services/PortingOrdersService.php">retrieveLoaTemplate</a>(...$params)</code>
- <code title="get /porting_orders/{id}/requirements">$client->portingOrders-><a href="./src/Services/PortingOrdersService.php">retrieveRequirements</a>(...$params)</code>
- <code title="get /porting_orders/{id}/sub_request">$client->portingOrders-><a href="./src/Services/PortingOrdersService.php">retrieveSubRequest</a>(...$params)</code>

## PhoneNumberConfigurations

Methods:

- <code title="post /porting_orders/phone_number_configurations">$client->portingOrders->phoneNumberConfigurations-><a href="./src/Services/PortingOrders/PhoneNumberConfigurationsService.php">create</a>(...$params)</code>
- <code title="get /porting_orders/phone_number_configurations">$client->portingOrders->phoneNumberConfigurations-><a href="./src/Services/PortingOrders/PhoneNumberConfigurationsService.php">list</a>(...$params)</code>

## Actions

Methods:

- <code title="post /porting_orders/{id}/actions/activate">$client->portingOrders->actions-><a href="./src/Services/PortingOrders/ActionsService.php">activate</a>(...$params)</code>
- <code title="post /porting_orders/{id}/actions/cancel">$client->portingOrders->actions-><a href="./src/Services/PortingOrders/ActionsService.php">cancel</a>(...$params)</code>
- <code title="post /porting_orders/{id}/actions/confirm">$client->portingOrders->actions-><a href="./src/Services/PortingOrders/ActionsService.php">confirm</a>(...$params)</code>
- <code title="post /porting_orders/{id}/actions/share">$client->portingOrders->actions-><a href="./src/Services/PortingOrders/ActionsService.php">share</a>(...$params)</code>

## ActivationJobs

Methods:

- <code title="get /porting_orders/{id}/activation_jobs/{activationJobId}">$client->portingOrders->activationJobs-><a href="./src/Services/PortingOrders/ActivationJobsService.php">retrieve</a>(...$params)</code>
- <code title="patch /porting_orders/{id}/activation_jobs/{activationJobId}">$client->portingOrders->activationJobs-><a href="./src/Services/PortingOrders/ActivationJobsService.php">update</a>(...$params)</code>
- <code title="get /porting_orders/{id}/activation_jobs">$client->portingOrders->activationJobs-><a href="./src/Services/PortingOrders/ActivationJobsService.php">list</a>(...$params)</code>

## AdditionalDocuments

Methods:

- <code title="post /porting_orders/{id}/additional_documents">$client->portingOrders->additionalDocuments-><a href="./src/Services/PortingOrders/AdditionalDocumentsService.php">create</a>(...$params)</code>
- <code title="get /porting_orders/{id}/additional_documents">$client->portingOrders->additionalDocuments-><a href="./src/Services/PortingOrders/AdditionalDocumentsService.php">list</a>(...$params)</code>
- <code title="delete /porting_orders/{id}/additional_documents/{additional_document_id}">$client->portingOrders->additionalDocuments-><a href="./src/Services/PortingOrders/AdditionalDocumentsService.php">delete</a>(...$params)</code>

## Comments

Methods:

- <code title="post /porting_orders/{id}/comments">$client->portingOrders->comments-><a href="./src/Services/PortingOrders/CommentsService.php">create</a>(...$params)</code>
- <code title="get /porting_orders/{id}/comments">$client->portingOrders->comments-><a href="./src/Services/PortingOrders/CommentsService.php">list</a>(...$params)</code>

## VerificationCodes

Methods:

- <code title="get /porting_orders/{id}/verification_codes">$client->portingOrders->verificationCodes-><a href="./src/Services/PortingOrders/VerificationCodesService.php">list</a>(...$params)</code>
- <code title="post /porting_orders/{id}/verification_codes/send">$client->portingOrders->verificationCodes-><a href="./src/Services/PortingOrders/VerificationCodesService.php">send</a>(...$params)</code>
- <code title="post /porting_orders/{id}/verification_codes/verify">$client->portingOrders->verificationCodes-><a href="./src/Services/PortingOrders/VerificationCodesService.php">verify</a>(...$params)</code>

## ActionRequirements

Methods:

- <code title="get /porting_orders/{porting_order_id}/action_requirements">$client->portingOrders->actionRequirements-><a href="./src/Services/PortingOrders/ActionRequirementsService.php">list</a>(...$params)</code>
- <code title="post /porting_orders/{porting_order_id}/action_requirements/{id}/initiate">$client->portingOrders->actionRequirements-><a href="./src/Services/PortingOrders/ActionRequirementsService.php">initiate</a>(...$params)</code>

## AssociatedPhoneNumbers

Methods:

- <code title="post /porting_orders/{porting_order_id}/associated_phone_numbers">$client->portingOrders->associatedPhoneNumbers-><a href="./src/Services/PortingOrders/AssociatedPhoneNumbersService.php">create</a>(...$params)</code>
- <code title="get /porting_orders/{porting_order_id}/associated_phone_numbers">$client->portingOrders->associatedPhoneNumbers-><a href="./src/Services/PortingOrders/AssociatedPhoneNumbersService.php">list</a>(...$params)</code>
- <code title="delete /porting_orders/{porting_order_id}/associated_phone_numbers/{id}">$client->portingOrders->associatedPhoneNumbers-><a href="./src/Services/PortingOrders/AssociatedPhoneNumbersService.php">delete</a>(...$params)</code>

## PhoneNumberBlocks

Methods:

- <code title="post /porting_orders/{porting_order_id}/phone_number_blocks">$client->portingOrders->phoneNumberBlocks-><a href="./src/Services/PortingOrders/PhoneNumberBlocksService.php">create</a>(...$params)</code>
- <code title="get /porting_orders/{porting_order_id}/phone_number_blocks">$client->portingOrders->phoneNumberBlocks-><a href="./src/Services/PortingOrders/PhoneNumberBlocksService.php">list</a>(...$params)</code>
- <code title="delete /porting_orders/{porting_order_id}/phone_number_blocks/{id}">$client->portingOrders->phoneNumberBlocks-><a href="./src/Services/PortingOrders/PhoneNumberBlocksService.php">delete</a>(...$params)</code>

## PhoneNumberExtensions

Methods:

- <code title="post /porting_orders/{porting_order_id}/phone_number_extensions">$client->portingOrders->phoneNumberExtensions-><a href="./src/Services/PortingOrders/PhoneNumberExtensionsService.php">create</a>(...$params)</code>
- <code title="get /porting_orders/{porting_order_id}/phone_number_extensions">$client->portingOrders->phoneNumberExtensions-><a href="./src/Services/PortingOrders/PhoneNumberExtensionsService.php">list</a>(...$params)</code>
- <code title="delete /porting_orders/{porting_order_id}/phone_number_extensions/{id}">$client->portingOrders->phoneNumberExtensions-><a href="./src/Services/PortingOrders/PhoneNumberExtensionsService.php">delete</a>(...$params)</code>

# PortingPhoneNumbers

Methods:

- <code title="get /porting_phone_numbers">$client->portingPhoneNumbers-><a href="./src/Services/PortingPhoneNumbersService.php">list</a>(...$params)</code>

# Portouts

Methods:

- <code title="get /portouts/{id}">$client->portouts-><a href="./src/Services/PortoutsService.php">retrieve</a>(...$params)</code>
- <code title="get /portouts">$client->portouts-><a href="./src/Services/PortoutsService.php">list</a>(...$params)</code>
- <code title="get /portouts/rejections/{portout_id}">$client->portouts-><a href="./src/Services/PortoutsService.php">listRejectionCodes</a>(...$params)</code>
- <code title="patch /portouts/{id}/{status}">$client->portouts-><a href="./src/Services/PortoutsService.php">updateStatus</a>(...$params)</code>

## Events

Methods:

- <code title="get /portouts/events/{id}">$client->portouts->events-><a href="./src/Services/Portouts/EventsService.php">retrieve</a>(...$params)</code>
- <code title="get /portouts/events">$client->portouts->events-><a href="./src/Services/Portouts/EventsService.php">list</a>(...$params)</code>
- <code title="post /portouts/events/{id}/republish">$client->portouts->events-><a href="./src/Services/Portouts/EventsService.php">republish</a>(...$params)</code>

## Reports

Methods:

- <code title="post /portouts/reports">$client->portouts->reports-><a href="./src/Services/Portouts/ReportsService.php">create</a>(...$params)</code>
- <code title="get /portouts/reports/{id}">$client->portouts->reports-><a href="./src/Services/Portouts/ReportsService.php">retrieve</a>(...$params)</code>
- <code title="get /portouts/reports">$client->portouts->reports-><a href="./src/Services/Portouts/ReportsService.php">list</a>(...$params)</code>

## Comments

Methods:

- <code title="post /portouts/{id}/comments">$client->portouts->comments-><a href="./src/Services/Portouts/CommentsService.php">create</a>(...$params)</code>
- <code title="get /portouts/{id}/comments">$client->portouts->comments-><a href="./src/Services/Portouts/CommentsService.php">list</a>(...$params)</code>

## SupportingDocuments

Methods:

- <code title="post /portouts/{id}/supporting_documents">$client->portouts->supportingDocuments-><a href="./src/Services/Portouts/SupportingDocumentsService.php">create</a>(...$params)</code>
- <code title="get /portouts/{id}/supporting_documents">$client->portouts->supportingDocuments-><a href="./src/Services/Portouts/SupportingDocumentsService.php">list</a>(...$params)</code>

# PrivateWirelessGateways

Methods:

- <code title="post /private_wireless_gateways">$client->privateWirelessGateways-><a href="./src/Services/PrivateWirelessGatewaysService.php">create</a>(...$params)</code>
- <code title="get /private_wireless_gateways/{id}">$client->privateWirelessGateways-><a href="./src/Services/PrivateWirelessGatewaysService.php">retrieve</a>(...$params)</code>
- <code title="get /private_wireless_gateways">$client->privateWirelessGateways-><a href="./src/Services/PrivateWirelessGatewaysService.php">list</a>(...$params)</code>
- <code title="delete /private_wireless_gateways/{id}">$client->privateWirelessGateways-><a href="./src/Services/PrivateWirelessGatewaysService.php">delete</a>(...$params)</code>

# PublicInternetGateways

Methods:

- <code title="post /public_internet_gateways">$client->publicInternetGateways-><a href="./src/Services/PublicInternetGatewaysService.php">create</a>(...$params)</code>
- <code title="get /public_internet_gateways/{id}">$client->publicInternetGateways-><a href="./src/Services/PublicInternetGatewaysService.php">retrieve</a>(...$params)</code>
- <code title="get /public_internet_gateways">$client->publicInternetGateways-><a href="./src/Services/PublicInternetGatewaysService.php">list</a>(...$params)</code>
- <code title="delete /public_internet_gateways/{id}">$client->publicInternetGateways-><a href="./src/Services/PublicInternetGatewaysService.php">delete</a>(...$params)</code>

# Queues

Methods:

- <code title="post /queues">$client->queues-><a href="./src/Services/QueuesService.php">create</a>(...$params)</code>
- <code title="get /queues/{queue_name}">$client->queues-><a href="./src/Services/QueuesService.php">retrieve</a>(...$params)</code>
- <code title="post /queues/{queue_name}">$client->queues-><a href="./src/Services/QueuesService.php">update</a>(...$params)</code>
- <code title="get /queues">$client->queues-><a href="./src/Services/QueuesService.php">list</a>(...$params)</code>
- <code title="delete /queues/{queue_name}">$client->queues-><a href="./src/Services/QueuesService.php">delete</a>(...$params)</code>

## Calls

Methods:

- <code title="get /queues/{queue_name}/calls/{call_control_id}">$client->queues->calls-><a href="./src/Services/Queues/CallsService.php">retrieve</a>(...$params)</code>
- <code title="patch /queues/{queue_name}/calls/{call_control_id}">$client->queues->calls-><a href="./src/Services/Queues/CallsService.php">update</a>(...$params)</code>
- <code title="get /queues/{queue_name}/calls">$client->queues->calls-><a href="./src/Services/Queues/CallsService.php">list</a>(...$params)</code>
- <code title="delete /queues/{queue_name}/calls/{call_control_id}">$client->queues->calls-><a href="./src/Services/Queues/CallsService.php">remove</a>(...$params)</code>

# Rcs

## Agents

Methods:

- <code title="post /rcs/agents">$client->rcs->agents-><a href="./src/Services/Rcs/AgentsService.php">create</a>(...$params)</code>
- <code title="get /rcs/agents/{id}">$client->rcs->agents-><a href="./src/Services/Rcs/AgentsService.php">retrieve</a>(...$params)</code>
- <code title="patch /rcs/agents/{id}">$client->rcs->agents-><a href="./src/Services/Rcs/AgentsService.php">update</a>(...$params)</code>
- <code title="get /rcs/agents">$client->rcs->agents-><a href="./src/Services/Rcs/AgentsService.php">list</a>(...$params)</code>
- <code title="post /rcs/agents/{id}/launch">$client->rcs->agents-><a href="./src/Services/Rcs/AgentsService.php">launch</a>(...$params)</code>
- <code title="get /rcs/agents/{id}/carrier_approvals">$client->rcs->agents-><a href="./src/Services/Rcs/AgentsService.php">retrieveCarrierApprovals</a>(...$params)</code>
- <code title="post /rcs/agents/{id}/submit">$client->rcs->agents-><a href="./src/Services/Rcs/AgentsService.php">submit</a>(...$params)</code>

### TestDevices

Methods:

- <code title="post /rcs/agents/{id}/test_devices">$client->rcs->agents->testDevices-><a href="./src/Services/Rcs/Agents/TestDevicesService.php">create</a>(...$params)</code>
- <code title="get /rcs/agents/{id}/test_devices">$client->rcs->agents->testDevices-><a href="./src/Services/Rcs/Agents/TestDevicesService.php">list</a>(...$params)</code>
- <code title="delete /rcs/agents/{id}/test_devices/{test_device_id}">$client->rcs->agents->testDevices-><a href="./src/Services/Rcs/Agents/TestDevicesService.php">delete</a>(...$params)</code>

## Brands

Methods:

- <code title="post /rcs/brands">$client->rcs->brands-><a href="./src/Services/Rcs/BrandsService.php">create</a>(...$params)</code>
- <code title="get /rcs/brands/{id}">$client->rcs->brands-><a href="./src/Services/Rcs/BrandsService.php">retrieve</a>(...$params)</code>
- <code title="patch /rcs/brands/{id}">$client->rcs->brands-><a href="./src/Services/Rcs/BrandsService.php">update</a>(...$params)</code>
- <code title="get /rcs/brands">$client->rcs->brands-><a href="./src/Services/Rcs/BrandsService.php">list</a>()</code>
- <code title="post /rcs/brands/{id}/submit">$client->rcs->brands-><a href="./src/Services/Rcs/BrandsService.php">submit</a>(...$params)</code>

# RecordingTranscriptions

Methods:

- <code title="get /recording_transcriptions/{recording_transcription_id}">$client->recordingTranscriptions-><a href="./src/Services/RecordingTranscriptionsService.php">retrieve</a>(...$params)</code>
- <code title="get /recording_transcriptions">$client->recordingTranscriptions-><a href="./src/Services/RecordingTranscriptionsService.php">list</a>(...$params)</code>
- <code title="delete /recording_transcriptions/{recording_transcription_id}">$client->recordingTranscriptions-><a href="./src/Services/RecordingTranscriptionsService.php">delete</a>(...$params)</code>

# Recordings

Methods:

- <code title="get /recordings/{recording_id}">$client->recordings-><a href="./src/Services/RecordingsService.php">retrieve</a>(...$params)</code>
- <code title="get /recordings">$client->recordings-><a href="./src/Services/RecordingsService.php">list</a>(...$params)</code>
- <code title="delete /recordings/{recording_id}">$client->recordings-><a href="./src/Services/RecordingsService.php">delete</a>(...$params)</code>

## Actions

Methods:

- <code title="post /recordings/actions/delete">$client->recordings->actions-><a href="./src/Services/Recordings/ActionsService.php">delete</a>(...$params)</code>

# Regions

Methods:

- <code title="get /regions">$client->regions-><a href="./src/Services/RegionsService.php">list</a>()</code>

# RegulatoryRequirements

Methods:

- <code title="get /regulatory_requirements">$client->regulatoryRequirements-><a href="./src/Services/RegulatoryRequirementsService.php">retrieve</a>(...$params)</code>

# Reports

Methods:

- <code title="get /reports/mdrs">$client->reports-><a href="./src/Services/ReportsService.php">listMdrs</a>(...$params)</code>
- <code title="get /reports/wdrs">$client->reports-><a href="./src/Services/ReportsService.php">listWdrs</a>(...$params)</code>

## CdrUsageReports

Methods:

- <code title="get /reports/cdr_usage_reports/sync">$client->reports->cdrUsageReports-><a href="./src/Services/Reports/CdrUsageReportsService.php">fetchSync</a>(...$params)</code>

## MdrUsageReports

Methods:

- <code title="post /reports/mdr_usage_reports">$client->reports->mdrUsageReports-><a href="./src/Services/Reports/MdrUsageReportsService.php">create</a>(...$params)</code>
- <code title="get /reports/mdr_usage_reports/{id}">$client->reports->mdrUsageReports-><a href="./src/Services/Reports/MdrUsageReportsService.php">retrieve</a>(...$params)</code>
- <code title="get /reports/mdr_usage_reports">$client->reports->mdrUsageReports-><a href="./src/Services/Reports/MdrUsageReportsService.php">list</a>(...$params)</code>
- <code title="delete /reports/mdr_usage_reports/{id}">$client->reports->mdrUsageReports-><a href="./src/Services/Reports/MdrUsageReportsService.php">delete</a>(...$params)</code>
- <code title="get /reports/mdr_usage_reports/sync">$client->reports->mdrUsageReports-><a href="./src/Services/Reports/MdrUsageReportsService.php">fetchSync</a>(...$params)</code>

# SpeechToText

Methods:

- <code title="get /speech-to-text/providers">$client->speechToText-><a href="./src/Services/SpeechToTextService.php">listProviders</a>(...$params)</code>
- <code title="get /speech-to-text/transcription">$client->speechToText-><a href="./src/Services/SpeechToTextService.php">retrieveTranscription</a>(...$params)</code>

# RequirementGroups

Methods:

- <code title="post /requirement_groups">$client->requirementGroups-><a href="./src/Services/RequirementGroupsService.php">create</a>(...$params)</code>
- <code title="get /requirement_groups/{id}">$client->requirementGroups-><a href="./src/Services/RequirementGroupsService.php">retrieve</a>(...$params)</code>
- <code title="patch /requirement_groups/{id}">$client->requirementGroups-><a href="./src/Services/RequirementGroupsService.php">update</a>(...$params)</code>
- <code title="get /requirement_groups">$client->requirementGroups-><a href="./src/Services/RequirementGroupsService.php">list</a>(...$params)</code>
- <code title="delete /requirement_groups/{id}">$client->requirementGroups-><a href="./src/Services/RequirementGroupsService.php">delete</a>(...$params)</code>
- <code title="post /requirement_groups/{id}/submit_for_approval">$client->requirementGroups-><a href="./src/Services/RequirementGroupsService.php">submitForApproval</a>(...$params)</code>

# RequirementTypes

Methods:

- <code title="get /requirement_types/{id}">$client->requirementTypes-><a href="./src/Services/RequirementTypesService.php">retrieve</a>(...$params)</code>
- <code title="get /requirement_types">$client->requirementTypes-><a href="./src/Services/RequirementTypesService.php">list</a>(...$params)</code>

# Requirements

Methods:

- <code title="get /requirements/{id}">$client->requirements-><a href="./src/Services/RequirementsService.php">retrieve</a>(...$params)</code>
- <code title="get /requirements">$client->requirements-><a href="./src/Services/RequirementsService.php">list</a>(...$params)</code>

# RoomCompositions

Methods:

- <code title="post /room_compositions">$client->roomCompositions-><a href="./src/Services/RoomCompositionsService.php">create</a>(...$params)</code>
- <code title="get /room_compositions/{room_composition_id}">$client->roomCompositions-><a href="./src/Services/RoomCompositionsService.php">retrieve</a>(...$params)</code>
- <code title="get /room_compositions">$client->roomCompositions-><a href="./src/Services/RoomCompositionsService.php">list</a>(...$params)</code>
- <code title="delete /room_compositions/{room_composition_id}">$client->roomCompositions-><a href="./src/Services/RoomCompositionsService.php">delete</a>(...$params)</code>

# RoomParticipants

Methods:

- <code title="get /room_participants/{room_participant_id}">$client->roomParticipants-><a href="./src/Services/RoomParticipantsService.php">retrieve</a>(...$params)</code>
- <code title="get /room_participants">$client->roomParticipants-><a href="./src/Services/RoomParticipantsService.php">list</a>(...$params)</code>

# RoomRecordings

Methods:

- <code title="get /room_recordings/{room_recording_id}">$client->roomRecordings-><a href="./src/Services/RoomRecordingsService.php">retrieve</a>(...$params)</code>
- <code title="get /room_recordings">$client->roomRecordings-><a href="./src/Services/RoomRecordingsService.php">list</a>(...$params)</code>
- <code title="delete /room_recordings/{room_recording_id}">$client->roomRecordings-><a href="./src/Services/RoomRecordingsService.php">delete</a>(...$params)</code>
- <code title="delete /room_recordings">$client->roomRecordings-><a href="./src/Services/RoomRecordingsService.php">deleteBulk</a>(...$params)</code>

# Rooms

Methods:

- <code title="post /rooms">$client->rooms-><a href="./src/Services/RoomsService.php">create</a>(...$params)</code>
- <code title="get /rooms/{room_id}">$client->rooms-><a href="./src/Services/RoomsService.php">retrieve</a>(...$params)</code>
- <code title="patch /rooms/{room_id}">$client->rooms-><a href="./src/Services/RoomsService.php">update</a>(...$params)</code>
- <code title="get /rooms">$client->rooms-><a href="./src/Services/RoomsService.php">list</a>(...$params)</code>
- <code title="delete /rooms/{room_id}">$client->rooms-><a href="./src/Services/RoomsService.php">delete</a>(...$params)</code>

## Actions

Methods:

- <code title="post /rooms/{room_id}/actions/generate_join_client_token">$client->rooms->actions-><a href="./src/Services/Rooms/ActionsService.php">generateJoinClientToken</a>(...$params)</code>
- <code title="post /rooms/{room_id}/actions/refresh_client_token">$client->rooms->actions-><a href="./src/Services/Rooms/ActionsService.php">refreshClientToken</a>(...$params)</code>

## Sessions

Methods:

- <code title="get /room_sessions/{room_session_id}">$client->rooms->sessions-><a href="./src/Services/Rooms/SessionsService.php">retrieve</a>(...$params)</code>
- <code title="get /room_sessions">$client->rooms->sessions-><a href="./src/Services/Rooms/SessionsService.php">list0</a>(...$params)</code>
- <code title="get /rooms/{room_id}/sessions">$client->rooms->sessions-><a href="./src/Services/Rooms/SessionsService.php">list1</a>(...$params)</code>
- <code title="get /room_sessions/{room_session_id}/participants">$client->rooms->sessions-><a href="./src/Services/Rooms/SessionsService.php">retrieveParticipants</a>(...$params)</code>

### Actions

Methods:

- <code title="post /room_sessions/{room_session_id}/actions/end">$client->rooms->sessions->actions-><a href="./src/Services/Rooms/Sessions/ActionsService.php">end</a>(...$params)</code>
- <code title="post /room_sessions/{room_session_id}/actions/kick">$client->rooms->sessions->actions-><a href="./src/Services/Rooms/Sessions/ActionsService.php">kick</a>(...$params)</code>
- <code title="post /room_sessions/{room_session_id}/actions/mute">$client->rooms->sessions->actions-><a href="./src/Services/Rooms/Sessions/ActionsService.php">mute</a>(...$params)</code>
- <code title="post /room_sessions/{room_session_id}/actions/unmute">$client->rooms->sessions->actions-><a href="./src/Services/Rooms/Sessions/ActionsService.php">unmute</a>(...$params)</code>

# Seti

Methods:

- <code title="get /seti/black_box_test_results">$client->seti-><a href="./src/Services/SetiService.php">retrieveBlackBoxTestResults</a>(...$params)</code>

# ShortCodes

Methods:

- <code title="get /short_codes/{id}">$client->shortCodes-><a href="./src/Services/ShortCodesService.php">retrieve</a>(...$params)</code>
- <code title="patch /short_codes/{id}">$client->shortCodes-><a href="./src/Services/ShortCodesService.php">update</a>(...$params)</code>
- <code title="get /short_codes">$client->shortCodes-><a href="./src/Services/ShortCodesService.php">list</a>(...$params)</code>

# SimCardDataUsageNotifications

Methods:

- <code title="post /sim_card_data_usage_notifications">$client->simCardDataUsageNotifications-><a href="./src/Services/SimCardDataUsageNotificationsService.php">create</a>(...$params)</code>
- <code title="get /sim_card_data_usage_notifications/{id}">$client->simCardDataUsageNotifications-><a href="./src/Services/SimCardDataUsageNotificationsService.php">retrieve</a>(...$params)</code>
- <code title="patch /sim_card_data_usage_notifications/{id}">$client->simCardDataUsageNotifications-><a href="./src/Services/SimCardDataUsageNotificationsService.php">update</a>(...$params)</code>
- <code title="get /sim_card_data_usage_notifications">$client->simCardDataUsageNotifications-><a href="./src/Services/SimCardDataUsageNotificationsService.php">list</a>(...$params)</code>
- <code title="delete /sim_card_data_usage_notifications/{id}">$client->simCardDataUsageNotifications-><a href="./src/Services/SimCardDataUsageNotificationsService.php">delete</a>(...$params)</code>

# SimCardGroups

Methods:

- <code title="post /sim_card_groups">$client->simCardGroups-><a href="./src/Services/SimCardGroupsService.php">create</a>(...$params)</code>
- <code title="get /sim_card_groups/{id}">$client->simCardGroups-><a href="./src/Services/SimCardGroupsService.php">retrieve</a>(...$params)</code>
- <code title="patch /sim_card_groups/{id}">$client->simCardGroups-><a href="./src/Services/SimCardGroupsService.php">update</a>(...$params)</code>
- <code title="get /sim_card_groups">$client->simCardGroups-><a href="./src/Services/SimCardGroupsService.php">list</a>(...$params)</code>
- <code title="delete /sim_card_groups/{id}">$client->simCardGroups-><a href="./src/Services/SimCardGroupsService.php">delete</a>(...$params)</code>

## Actions

Methods:

- <code title="get /sim_card_group_actions/{id}">$client->simCardGroups->actions-><a href="./src/Services/SimCardGroups/ActionsService.php">retrieve</a>(...$params)</code>
- <code title="get /sim_card_group_actions">$client->simCardGroups->actions-><a href="./src/Services/SimCardGroups/ActionsService.php">list</a>(...$params)</code>
- <code title="post /sim_card_groups/{id}/actions/remove_private_wireless_gateway">$client->simCardGroups->actions-><a href="./src/Services/SimCardGroups/ActionsService.php">removePrivateWirelessGateway</a>(...$params)</code>
- <code title="post /sim_card_groups/{id}/actions/remove_wireless_blocklist">$client->simCardGroups->actions-><a href="./src/Services/SimCardGroups/ActionsService.php">removeWirelessBlocklist</a>(...$params)</code>
- <code title="post /sim_card_groups/{id}/actions/set_private_wireless_gateway">$client->simCardGroups->actions-><a href="./src/Services/SimCardGroups/ActionsService.php">setPrivateWirelessGateway</a>(...$params)</code>
- <code title="post /sim_card_groups/{id}/actions/set_wireless_blocklist">$client->simCardGroups->actions-><a href="./src/Services/SimCardGroups/ActionsService.php">setWirelessBlocklist</a>(...$params)</code>

# SimCardOrderPreview

Methods:

- <code title="post /sim_card_order_preview">$client->simCardOrderPreview-><a href="./src/Services/SimCardOrderPreviewService.php">preview</a>(...$params)</code>

# SimCardOrders

Methods:

- <code title="post /sim_card_orders">$client->simCardOrders-><a href="./src/Services/SimCardOrdersService.php">create</a>(...$params)</code>
- <code title="get /sim_card_orders/{id}">$client->simCardOrders-><a href="./src/Services/SimCardOrdersService.php">retrieve</a>(...$params)</code>
- <code title="get /sim_card_orders">$client->simCardOrders-><a href="./src/Services/SimCardOrdersService.php">list</a>(...$params)</code>

# SimCards

Methods:

- <code title="get /sim_cards/{id}">$client->simCards-><a href="./src/Services/SimCardsService.php">retrieve</a>(...$params)</code>
- <code title="patch /sim_cards/{id}">$client->simCards-><a href="./src/Services/SimCardsService.php">update</a>(...$params)</code>
- <code title="get /sim_cards">$client->simCards-><a href="./src/Services/SimCardsService.php">list</a>(...$params)</code>
- <code title="delete /sim_cards/{id}">$client->simCards-><a href="./src/Services/SimCardsService.php">delete</a>(...$params)</code>
- <code title="get /sim_cards/{id}/activation_code">$client->simCards-><a href="./src/Services/SimCardsService.php">getActivationCode</a>(...$params)</code>
- <code title="get /sim_cards/{id}/device_details">$client->simCards-><a href="./src/Services/SimCardsService.php">getDeviceDetails</a>(...$params)</code>
- <code title="get /sim_cards/{id}/public_ip">$client->simCards-><a href="./src/Services/SimCardsService.php">getPublicIP</a>(...$params)</code>
- <code title="get /sim_cards/{id}/wireless_connectivity_logs">$client->simCards-><a href="./src/Services/SimCardsService.php">listWirelessConnectivityLogs</a>(...$params)</code>

## Actions

Methods:

- <code title="get /sim_card_actions/{id}">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">retrieve</a>(...$params)</code>
- <code title="get /sim_card_actions">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">list</a>(...$params)</code>
- <code title="post /sim_cards/actions/bulk_disable_voice">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">bulkDisableVoice</a>(...$params)</code>
- <code title="post /sim_cards/actions/bulk_enable_voice">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">bulkEnableVoice</a>(...$params)</code>
- <code title="post /sim_cards/actions/bulk_set_public_ips">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">bulkSetPublicIPs</a>(...$params)</code>
- <code title="post /sim_cards/{id}/actions/disable">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">disable</a>(...$params)</code>
- <code title="post /sim_cards/{id}/actions/disable_voice">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">disableVoice</a>(...$params)</code>
- <code title="post /sim_cards/{id}/actions/enable">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">enable</a>(...$params)</code>
- <code title="post /sim_cards/{id}/actions/enable_voice">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">enableVoice</a>(...$params)</code>
- <code title="post /sim_cards/{id}/actions/remove_public_ip">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">removePublicIP</a>(...$params)</code>
- <code title="post /sim_cards/{id}/actions/set_public_ip">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">setPublicIP</a>(...$params)</code>
- <code title="post /sim_cards/{id}/actions/set_standby">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">setStandby</a>(...$params)</code>
- <code title="post /sim_cards/actions/validate_registration_codes">$client->simCards->actions-><a href="./src/Services/SimCards/ActionsService.php">validateRegistrationCodes</a>(...$params)</code>

# SiprecConnectors

Methods:

- <code title="post /siprec_connectors">$client->siprecConnectors-><a href="./src/Services/SiprecConnectorsService.php">create</a>(...$params)</code>
- <code title="get /siprec_connectors/{connector_name}">$client->siprecConnectors-><a href="./src/Services/SiprecConnectorsService.php">retrieve</a>(...$params)</code>
- <code title="put /siprec_connectors/{connector_name}">$client->siprecConnectors-><a href="./src/Services/SiprecConnectorsService.php">update</a>(...$params)</code>
- <code title="delete /siprec_connectors/{connector_name}">$client->siprecConnectors-><a href="./src/Services/SiprecConnectorsService.php">delete</a>(...$params)</code>

# Storage

Methods:

- <code title="get /storage/migration_source_coverage">$client->storage-><a href="./src/Services/StorageService.php">listMigrationSourceCoverage</a>()</code>

## Buckets

Methods:

- <code title="post /storage/buckets/{bucketName}/{objectName}/presigned_url">$client->storage->buckets-><a href="./src/Services/Storage/BucketsService.php">createPresignedURL</a>(...$params)</code>

### SslCertificate

Methods:

- <code title="put /storage/buckets/{bucketName}/ssl_certificate">$client->storage->buckets->sslCertificate-><a href="./src/Services/Storage/Buckets/SslCertificateService.php">create</a>(...$params)</code>
- <code title="get /storage/buckets/{bucketName}/ssl_certificate">$client->storage->buckets->sslCertificate-><a href="./src/Services/Storage/Buckets/SslCertificateService.php">retrieve</a>(...$params)</code>
- <code title="delete /storage/buckets/{bucketName}/ssl_certificate">$client->storage->buckets->sslCertificate-><a href="./src/Services/Storage/Buckets/SslCertificateService.php">delete</a>(...$params)</code>

### Usage

Methods:

- <code title="get /storage/buckets/{bucketName}/usage/api">$client->storage->buckets->usage-><a href="./src/Services/Storage/Buckets/UsageService.php">getAPIUsage</a>(...$params)</code>
- <code title="get /storage/buckets/{bucketName}/usage/storage">$client->storage->buckets->usage-><a href="./src/Services/Storage/Buckets/UsageService.php">getBucketUsage</a>(...$params)</code>

## MigrationSources

Methods:

- <code title="post /storage/migration_sources">$client->storage->migrationSources-><a href="./src/Services/Storage/MigrationSourcesService.php">create</a>(...$params)</code>
- <code title="get /storage/migration_sources/{id}">$client->storage->migrationSources-><a href="./src/Services/Storage/MigrationSourcesService.php">retrieve</a>(...$params)</code>
- <code title="get /storage/migration_sources">$client->storage->migrationSources-><a href="./src/Services/Storage/MigrationSourcesService.php">list</a>()</code>
- <code title="delete /storage/migration_sources/{id}">$client->storage->migrationSources-><a href="./src/Services/Storage/MigrationSourcesService.php">delete</a>(...$params)</code>

## Migrations

Methods:

- <code title="post /storage/migrations">$client->storage->migrations-><a href="./src/Services/Storage/MigrationsService.php">create</a>(...$params)</code>
- <code title="get /storage/migrations/{id}">$client->storage->migrations-><a href="./src/Services/Storage/MigrationsService.php">retrieve</a>(...$params)</code>
- <code title="get /storage/migrations">$client->storage->migrations-><a href="./src/Services/Storage/MigrationsService.php">list</a>()</code>

### Actions

Methods:

- <code title="post /storage/migrations/{id}/actions/stop">$client->storage->migrations->actions-><a href="./src/Services/Storage/Migrations/ActionsService.php">stop</a>(...$params)</code>

## Kvs

Methods:

- <code title="post /storage/kvs">$client->storage->kvs-><a href="./src/Services/Storage/KvsService.php">create</a>(...$params)</code>
- <code title="get /storage/kvs/{id}">$client->storage->kvs-><a href="./src/Services/Storage/KvsService.php">retrieve</a>(...$params)</code>
- <code title="get /storage/kvs">$client->storage->kvs-><a href="./src/Services/Storage/KvsService.php">list</a>(...$params)</code>
- <code title="delete /storage/kvs/{id}">$client->storage->kvs-><a href="./src/Services/Storage/KvsService.php">delete</a>(...$params)</code>

### Keys

Methods:

- <code title="get /storage/kvs/{id}/keys/{key}">$client->storage->kvs->keys-><a href="./src/Services/Storage/Kvs/KeysService.php">retrieve</a>(...$params)</code>
- <code title="put /storage/kvs/{id}/keys/{key}">$client->storage->kvs->keys-><a href="./src/Services/Storage/Kvs/KeysService.php">update</a>(...$params)</code>
- <code title="get /storage/kvs/{id}/keys">$client->storage->kvs->keys-><a href="./src/Services/Storage/Kvs/KeysService.php">list</a>(...$params)</code>
- <code title="delete /storage/kvs/{id}/keys/{key}">$client->storage->kvs->keys-><a href="./src/Services/Storage/Kvs/KeysService.php">delete</a>(...$params)</code>

## Cloudfs

Methods:

- <code title="post /storage/cloudfs">$client->storage->cloudfs-><a href="./src/Services/Storage/CloudfsService.php">create</a>(...$params)</code>
- <code title="get /storage/cloudfs/{id}">$client->storage->cloudfs-><a href="./src/Services/Storage/CloudfsService.php">retrieve</a>(...$params)</code>
- <code title="patch /storage/cloudfs/{id}">$client->storage->cloudfs-><a href="./src/Services/Storage/CloudfsService.php">update</a>(...$params)</code>
- <code title="get /storage/cloudfs">$client->storage->cloudfs-><a href="./src/Services/Storage/CloudfsService.php">list</a>(...$params)</code>
- <code title="delete /storage/cloudfs/{id}">$client->storage->cloudfs-><a href="./src/Services/Storage/CloudfsService.php">delete</a>(...$params)</code>

### Actions

Methods:

- <code title="post /storage/cloudfs/{id}/actions/rotate-meta-token">$client->storage->cloudfs->actions-><a href="./src/Services/Storage/Cloudfs/ActionsService.php">rotateMetaToken</a>(...$params)</code>

## Sqldbs

Methods:

- <code title="post /storage/sqldbs">$client->storage->sqldbs-><a href="./src/Services/Storage/SqldbsService.php">create</a>(...$params)</code>
- <code title="get /storage/sqldbs/{id}">$client->storage->sqldbs-><a href="./src/Services/Storage/SqldbsService.php">retrieve</a>(...$params)</code>
- <code title="get /storage/sqldbs">$client->storage->sqldbs-><a href="./src/Services/Storage/SqldbsService.php">list</a>(...$params)</code>
- <code title="delete /storage/sqldbs/{id}">$client->storage->sqldbs-><a href="./src/Services/Storage/SqldbsService.php">delete</a>(...$params)</code>

### Actions

Methods:

- <code title="post /storage/sqldbs/{id}/actions/query">$client->storage->sqldbs->actions-><a href="./src/Services/Storage/Sqldbs/ActionsService.php">query</a>(...$params)</code>

# SubNumberOrders

Methods:

- <code title="get /sub_number_orders/{sub_number_order_id}">$client->subNumberOrders-><a href="./src/Services/SubNumberOrdersService.php">retrieve</a>(...$params)</code>
- <code title="patch /sub_number_orders/{sub_number_order_id}">$client->subNumberOrders-><a href="./src/Services/SubNumberOrdersService.php">update</a>(...$params)</code>
- <code title="get /sub_number_orders">$client->subNumberOrders-><a href="./src/Services/SubNumberOrdersService.php">list</a>(...$params)</code>
- <code title="patch /sub_number_orders/{sub_number_order_id}/cancel">$client->subNumberOrders-><a href="./src/Services/SubNumberOrdersService.php">cancel</a>(...$params)</code>
- <code title="post /sub_number_orders/{id}/requirement_group">$client->subNumberOrders-><a href="./src/Services/SubNumberOrdersService.php">updateRequirementGroup</a>(...$params)</code>

# SubNumberOrdersReport

Methods:

- <code title="post /sub_number_orders_report">$client->subNumberOrdersReport-><a href="./src/Services/SubNumberOrdersReportService.php">create</a>(...$params)</code>
- <code title="get /sub_number_orders_report/{report_id}">$client->subNumberOrdersReport-><a href="./src/Services/SubNumberOrdersReportService.php">retrieve</a>(...$params)</code>
- <code title="get /sub_number_orders_report/{report_id}/download">$client->subNumberOrdersReport-><a href="./src/Services/SubNumberOrdersReportService.php">download</a>(...$params)</code>

# TelephonyCredentials

Methods:

- <code title="post /telephony_credentials">$client->telephonyCredentials-><a href="./src/Services/TelephonyCredentialsService.php">create</a>(...$params)</code>
- <code title="get /telephony_credentials/{id}">$client->telephonyCredentials-><a href="./src/Services/TelephonyCredentialsService.php">retrieve</a>(...$params)</code>
- <code title="patch /telephony_credentials/{id}">$client->telephonyCredentials-><a href="./src/Services/TelephonyCredentialsService.php">update</a>(...$params)</code>
- <code title="get /telephony_credentials">$client->telephonyCredentials-><a href="./src/Services/TelephonyCredentialsService.php">list</a>(...$params)</code>
- <code title="delete /telephony_credentials/{id}">$client->telephonyCredentials-><a href="./src/Services/TelephonyCredentialsService.php">delete</a>(...$params)</code>
- <code title="post /telephony_credentials/{id}/token">$client->telephonyCredentials-><a href="./src/Services/TelephonyCredentialsService.php">createToken</a>(...$params)</code>

# Texml

Methods:

- <code title="post /texml/ai_calls/{connection_id}">$client->texml-><a href="./src/Services/TexmlService.php">initiateAICall</a>(...$params)</code>
- <code title="post /texml/secrets">$client->texml-><a href="./src/Services/TexmlService.php">secrets</a>(...$params)</code>

## Accounts

Methods:

- <code title="get /texml/Accounts/{account_sid}/Recordings.json">$client->texml->accounts-><a href="./src/Services/Texml/AccountsService.php">retrieveRecordingsJson</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Transcriptions.json">$client->texml->accounts-><a href="./src/Services/Texml/AccountsService.php">retrieveTranscriptionsJson</a>(...$params)</code>

### Calls

Methods:

- <code title="get /texml/Accounts/{account_sid}/Calls/{call_sid}">$client->texml->accounts->calls-><a href="./src/Services/Texml/Accounts/CallsService.php">retrieve</a>(...$params)</code>
- <code title="post /texml/Accounts/{account_sid}/Calls/{call_sid}">$client->texml->accounts->calls-><a href="./src/Services/Texml/Accounts/CallsService.php">update</a>(...$params)</code>
- <code title="post /texml/Accounts/{account_sid}/Calls">$client->texml->accounts->calls-><a href="./src/Services/Texml/Accounts/CallsService.php">calls</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Calls">$client->texml->accounts->calls-><a href="./src/Services/Texml/Accounts/CallsService.php">retrieveCalls</a>(...$params)</code>
- <code title="post /texml/Accounts/{account_sid}/Calls/{call_sid}/Siprec.json">$client->texml->accounts->calls-><a href="./src/Services/Texml/Accounts/CallsService.php">siprecJson</a>(...$params)</code>
- <code title="post /texml/Accounts/{account_sid}/Calls/{call_sid}/Streams.json">$client->texml->accounts->calls-><a href="./src/Services/Texml/Accounts/CallsService.php">streamsJson</a>(...$params)</code>

#### RecordingsJson

Methods:

- <code title="post /texml/Accounts/{account_sid}/Calls/{call_sid}/Recordings.json">$client->texml->accounts->calls->recordingsJson-><a href="./src/Services/Texml/Accounts/Calls/RecordingsJsonService.php">recordingsJson</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Calls/{call_sid}/Recordings.json">$client->texml->accounts->calls->recordingsJson-><a href="./src/Services/Texml/Accounts/Calls/RecordingsJsonService.php">retrieveRecordingsJson</a>(...$params)</code>

#### Recordings

Methods:

- <code title="post /texml/Accounts/{account_sid}/Calls/{call_sid}/Recordings/{recording_sid}.json">$client->texml->accounts->calls->recordings-><a href="./src/Services/Texml/Accounts/Calls/RecordingsService.php">recordingSidJson</a>(...$params)</code>

#### Siprec

Methods:

- <code title="post /texml/Accounts/{account_sid}/Calls/{call_sid}/Siprec/{siprec_sid}.json">$client->texml->accounts->calls->siprec-><a href="./src/Services/Texml/Accounts/Calls/SiprecService.php">siprecSidJson</a>(...$params)</code>

#### Streams

Methods:

- <code title="post /texml/Accounts/{account_sid}/Calls/{call_sid}/Streams/{streaming_sid}.json">$client->texml->accounts->calls->streams-><a href="./src/Services/Texml/Accounts/Calls/StreamsService.php">streamingSidJson</a>(...$params)</code>

### Conferences

Methods:

- <code title="get /texml/Accounts/{account_sid}/Conferences/{conference_sid}">$client->texml->accounts->conferences-><a href="./src/Services/Texml/Accounts/ConferencesService.php">retrieve</a>(...$params)</code>
- <code title="post /texml/Accounts/{account_sid}/Conferences/{conference_sid}">$client->texml->accounts->conferences-><a href="./src/Services/Texml/Accounts/ConferencesService.php">update</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Conferences">$client->texml->accounts->conferences-><a href="./src/Services/Texml/Accounts/ConferencesService.php">retrieveConferences</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Conferences/{conference_sid}/Recordings">$client->texml->accounts->conferences-><a href="./src/Services/Texml/Accounts/ConferencesService.php">retrieveRecordings</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Conferences/{conference_sid}/Recordings.json">$client->texml->accounts->conferences-><a href="./src/Services/Texml/Accounts/ConferencesService.php">retrieveRecordingsJson</a>(...$params)</code>

#### Participants

Methods:

- <code title="get /texml/Accounts/{account_sid}/Conferences/{conference_sid}/Participants/{call_sid_or_participant_label}">$client->texml->accounts->conferences->participants-><a href="./src/Services/Texml/Accounts/Conferences/ParticipantsService.php">retrieve</a>(...$params)</code>
- <code title="post /texml/Accounts/{account_sid}/Conferences/{conference_sid}/Participants/{call_sid_or_participant_label}">$client->texml->accounts->conferences->participants-><a href="./src/Services/Texml/Accounts/Conferences/ParticipantsService.php">update</a>(...$params)</code>
- <code title="delete /texml/Accounts/{account_sid}/Conferences/{conference_sid}/Participants/{call_sid_or_participant_label}">$client->texml->accounts->conferences->participants-><a href="./src/Services/Texml/Accounts/Conferences/ParticipantsService.php">delete</a>(...$params)</code>
- <code title="post /texml/Accounts/{account_sid}/Conferences/{conference_sid}/Participants">$client->texml->accounts->conferences->participants-><a href="./src/Services/Texml/Accounts/Conferences/ParticipantsService.php">participants</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Conferences/{conference_sid}/Participants">$client->texml->accounts->conferences->participants-><a href="./src/Services/Texml/Accounts/Conferences/ParticipantsService.php">retrieveParticipants</a>(...$params)</code>

### Recordings

#### Json

Methods:

- <code title="delete /texml/Accounts/{account_sid}/Recordings/{recording_sid}.json">$client->texml->accounts->recordings->json-><a href="./src/Services/Texml/Accounts/Recordings/JsonService.php">deleteRecordingSidJson</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Recordings/{recording_sid}.json">$client->texml->accounts->recordings->json-><a href="./src/Services/Texml/Accounts/Recordings/JsonService.php">retrieveRecordingSidJson</a>(...$params)</code>

### Transcriptions

#### Json

Methods:

- <code title="delete /texml/Accounts/{account_sid}/Transcriptions/{recording_transcription_sid}.json">$client->texml->accounts->transcriptions->json-><a href="./src/Services/Texml/Accounts/Transcriptions/JsonService.php">deleteRecordingTranscriptionSidJson</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Transcriptions/{recording_transcription_sid}.json">$client->texml->accounts->transcriptions->json-><a href="./src/Services/Texml/Accounts/Transcriptions/JsonService.php">retrieveRecordingTranscriptionSidJson</a>(...$params)</code>

### Queues

Methods:

- <code title="post /texml/Accounts/{account_sid}/Queues">$client->texml->accounts->queues-><a href="./src/Services/Texml/Accounts/QueuesService.php">create</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Queues/{queue_sid}">$client->texml->accounts->queues-><a href="./src/Services/Texml/Accounts/QueuesService.php">retrieve</a>(...$params)</code>
- <code title="post /texml/Accounts/{account_sid}/Queues/{queue_sid}">$client->texml->accounts->queues-><a href="./src/Services/Texml/Accounts/QueuesService.php">update</a>(...$params)</code>
- <code title="get /texml/Accounts/{account_sid}/Queues">$client->texml->accounts->queues-><a href="./src/Services/Texml/Accounts/QueuesService.php">list</a>(...$params)</code>
- <code title="delete /texml/Accounts/{account_sid}/Queues/{queue_sid}">$client->texml->accounts->queues-><a href="./src/Services/Texml/Accounts/QueuesService.php">delete</a>(...$params)</code>

# TexmlApplications

Methods:

- <code title="post /texml_applications">$client->texmlApplications-><a href="./src/Services/TexmlApplicationsService.php">create</a>(...$params)</code>
- <code title="get /texml_applications/{id}">$client->texmlApplications-><a href="./src/Services/TexmlApplicationsService.php">retrieve</a>(...$params)</code>
- <code title="patch /texml_applications/{id}">$client->texmlApplications-><a href="./src/Services/TexmlApplicationsService.php">update</a>(...$params)</code>
- <code title="get /texml_applications">$client->texmlApplications-><a href="./src/Services/TexmlApplicationsService.php">list</a>(...$params)</code>
- <code title="delete /texml_applications/{id}">$client->texmlApplications-><a href="./src/Services/TexmlApplicationsService.php">delete</a>(...$params)</code>

# TextToSpeech

Methods:

- <code title="post /text-to-speech/speech">$client->textToSpeech-><a href="./src/Services/TextToSpeechService.php">generateSpeech</a>(...$params)</code>
- <code title="get /text-to-speech/voices">$client->textToSpeech-><a href="./src/Services/TextToSpeechService.php">listVoices</a>(...$params)</code>
- <code title="get /text-to-speech/speech">$client->textToSpeech-><a href="./src/Services/TextToSpeechService.php">retrieveSpeech</a>(...$params)</code>

# UsageReports

Methods:

- <code title="get /usage_reports">$client->usageReports-><a href="./src/Services/UsageReportsService.php">list</a>(...$params)</code>
- <code title="get /usage_reports/options">$client->usageReports-><a href="./src/Services/UsageReportsService.php">getOptions</a>(...$params)</code>

# UserAddresses

Methods:

- <code title="post /user_addresses">$client->userAddresses-><a href="./src/Services/UserAddressesService.php">create</a>(...$params)</code>
- <code title="get /user_addresses/{id}">$client->userAddresses-><a href="./src/Services/UserAddressesService.php">retrieve</a>(...$params)</code>
- <code title="get /user_addresses">$client->userAddresses-><a href="./src/Services/UserAddressesService.php">list</a>(...$params)</code>

# UserTags

Methods:

- <code title="get /user_tags">$client->userTags-><a href="./src/Services/UserTagsService.php">list</a>(...$params)</code>

# Verifications

Methods:

- <code title="get /verifications/{verification_id}">$client->verifications-><a href="./src/Services/VerificationsService.php">retrieve</a>(...$params)</code>
- <code title="post /verifications/call">$client->verifications-><a href="./src/Services/VerificationsService.php">triggerCall</a>(...$params)</code>
- <code title="post /verifications/flashcall">$client->verifications-><a href="./src/Services/VerificationsService.php">triggerFlashcall</a>(...$params)</code>
- <code title="post /verifications/sms">$client->verifications-><a href="./src/Services/VerificationsService.php">triggerSMS</a>(...$params)</code>
- <code title="post /verifications/whatsapp">$client->verifications-><a href="./src/Services/VerificationsService.php">triggerWhatsappVerification</a>(...$params)</code>

## ByPhoneNumber

Methods:

- <code title="get /verifications/by_phone_number/{phone_number}">$client->verifications->byPhoneNumber-><a href="./src/Services/Verifications/ByPhoneNumberService.php">list</a>(...$params)</code>

### Actions

Methods:

- <code title="post /verifications/by_phone_number/{phone_number}/actions/verify">$client->verifications->byPhoneNumber->actions-><a href="./src/Services/Verifications/ByPhoneNumber/ActionsService.php">verify</a>(...$params)</code>

## Actions

Methods:

- <code title="post /verifications/{verification_id}/actions/verify">$client->verifications->actions-><a href="./src/Services/Verifications/ActionsService.php">verify</a>(...$params)</code>

# VerifiedNumbers

Methods:

- <code title="post /verified_numbers">$client->verifiedNumbers-><a href="./src/Services/VerifiedNumbersService.php">create</a>(...$params)</code>
- <code title="get /verified_numbers/{phone_number}">$client->verifiedNumbers-><a href="./src/Services/VerifiedNumbersService.php">retrieve</a>(...$params)</code>
- <code title="get /verified_numbers">$client->verifiedNumbers-><a href="./src/Services/VerifiedNumbersService.php">list</a>(...$params)</code>
- <code title="delete /verified_numbers/{phone_number}">$client->verifiedNumbers-><a href="./src/Services/VerifiedNumbersService.php">delete</a>(...$params)</code>

## Actions

Methods:

- <code title="post /verified_numbers/{phone_number}/actions/verify">$client->verifiedNumbers->actions-><a href="./src/Services/VerifiedNumbers/ActionsService.php">submitVerificationCode</a>(...$params)</code>

# VerifyProfiles

Methods:

- <code title="post /verify_profiles">$client->verifyProfiles-><a href="./src/Services/VerifyProfilesService.php">create</a>(...$params)</code>
- <code title="get /verify_profiles/{verify_profile_id}">$client->verifyProfiles-><a href="./src/Services/VerifyProfilesService.php">retrieve</a>(...$params)</code>
- <code title="patch /verify_profiles/{verify_profile_id}">$client->verifyProfiles-><a href="./src/Services/VerifyProfilesService.php">update</a>(...$params)</code>
- <code title="get /verify_profiles">$client->verifyProfiles-><a href="./src/Services/VerifyProfilesService.php">list</a>(...$params)</code>
- <code title="delete /verify_profiles/{verify_profile_id}">$client->verifyProfiles-><a href="./src/Services/VerifyProfilesService.php">delete</a>(...$params)</code>
- <code title="post /verify_profiles/templates">$client->verifyProfiles-><a href="./src/Services/VerifyProfilesService.php">createTemplate</a>(...$params)</code>
- <code title="get /verify_profiles/templates">$client->verifyProfiles-><a href="./src/Services/VerifyProfilesService.php">retrieveTemplates</a>()</code>
- <code title="patch /verify_profiles/templates/{template_id}">$client->verifyProfiles-><a href="./src/Services/VerifyProfilesService.php">updateTemplate</a>(...$params)</code>

# VirtualCrossConnects

Methods:

- <code title="post /virtual_cross_connects">$client->virtualCrossConnects-><a href="./src/Services/VirtualCrossConnectsService.php">create</a>(...$params)</code>
- <code title="get /virtual_cross_connects/{id}">$client->virtualCrossConnects-><a href="./src/Services/VirtualCrossConnectsService.php">retrieve</a>(...$params)</code>
- <code title="patch /virtual_cross_connects/{id}">$client->virtualCrossConnects-><a href="./src/Services/VirtualCrossConnectsService.php">update</a>(...$params)</code>
- <code title="get /virtual_cross_connects">$client->virtualCrossConnects-><a href="./src/Services/VirtualCrossConnectsService.php">list</a>(...$params)</code>
- <code title="delete /virtual_cross_connects/{id}">$client->virtualCrossConnects-><a href="./src/Services/VirtualCrossConnectsService.php">delete</a>(...$params)</code>

# VirtualCrossConnectsCoverage

Methods:

- <code title="get /virtual_cross_connects_coverage">$client->virtualCrossConnectsCoverage-><a href="./src/Services/VirtualCrossConnectsCoverageService.php">list</a>(...$params)</code>

# WebhookDeliveries

Methods:

- <code title="get /webhook_deliveries/{id}">$client->webhookDeliveries-><a href="./src/Services/WebhookDeliveriesService.php">retrieve</a>(...$params)</code>
- <code title="get /webhook_deliveries">$client->webhookDeliveries-><a href="./src/Services/WebhookDeliveriesService.php">list</a>(...$params)</code>

# WireguardInterfaces

Methods:

- <code title="post /wireguard_interfaces">$client->wireguardInterfaces-><a href="./src/Services/WireguardInterfacesService.php">create</a>(...$params)</code>
- <code title="get /wireguard_interfaces/{id}">$client->wireguardInterfaces-><a href="./src/Services/WireguardInterfacesService.php">retrieve</a>(...$params)</code>
- <code title="get /wireguard_interfaces">$client->wireguardInterfaces-><a href="./src/Services/WireguardInterfacesService.php">list</a>(...$params)</code>
- <code title="delete /wireguard_interfaces/{id}">$client->wireguardInterfaces-><a href="./src/Services/WireguardInterfacesService.php">delete</a>(...$params)</code>

# WireguardPeers

Methods:

- <code title="post /wireguard_peers">$client->wireguardPeers-><a href="./src/Services/WireguardPeersService.php">create</a>(...$params)</code>
- <code title="get /wireguard_peers/{id}">$client->wireguardPeers-><a href="./src/Services/WireguardPeersService.php">retrieve</a>(...$params)</code>
- <code title="patch /wireguard_peers/{id}">$client->wireguardPeers-><a href="./src/Services/WireguardPeersService.php">update</a>(...$params)</code>
- <code title="get /wireguard_peers">$client->wireguardPeers-><a href="./src/Services/WireguardPeersService.php">list</a>(...$params)</code>
- <code title="delete /wireguard_peers/{id}">$client->wireguardPeers-><a href="./src/Services/WireguardPeersService.php">delete</a>(...$params)</code>
- <code title="get /wireguard_peers/{id}/config">$client->wireguardPeers-><a href="./src/Services/WireguardPeersService.php">retrieveConfig</a>(...$params)</code>

# Wireless

Methods:

- <code title="get /wireless/regions">$client->wireless-><a href="./src/Services/WirelessService.php">retrieveRegions</a>(...$params)</code>

## DetailRecordsReports

Methods:

- <code title="post /wireless/detail_records_reports">$client->wireless->detailRecordsReports-><a href="./src/Services/Wireless/DetailRecordsReportsService.php">create</a>(...$params)</code>
- <code title="get /wireless/detail_records_reports/{id}">$client->wireless->detailRecordsReports-><a href="./src/Services/Wireless/DetailRecordsReportsService.php">retrieve</a>(...$params)</code>
- <code title="get /wireless/detail_records_reports">$client->wireless->detailRecordsReports-><a href="./src/Services/Wireless/DetailRecordsReportsService.php">list</a>(...$params)</code>
- <code title="delete /wireless/detail_records_reports/{id}">$client->wireless->detailRecordsReports-><a href="./src/Services/Wireless/DetailRecordsReportsService.php">delete</a>(...$params)</code>

# WirelessBlocklistValues

Methods:

- <code title="get /wireless_blocklist_values">$client->wirelessBlocklistValues-><a href="./src/Services/WirelessBlocklistValuesService.php">list</a>(...$params)</code>

# WirelessBlocklists

Methods:

- <code title="post /wireless_blocklists">$client->wirelessBlocklists-><a href="./src/Services/WirelessBlocklistsService.php">create</a>(...$params)</code>
- <code title="get /wireless_blocklists/{id}">$client->wirelessBlocklists-><a href="./src/Services/WirelessBlocklistsService.php">retrieve</a>(...$params)</code>
- <code title="patch /wireless_blocklists/{id}">$client->wirelessBlocklists-><a href="./src/Services/WirelessBlocklistsService.php">update</a>(...$params)</code>
- <code title="get /wireless_blocklists">$client->wirelessBlocklists-><a href="./src/Services/WirelessBlocklistsService.php">list</a>(...$params)</code>
- <code title="delete /wireless_blocklists/{id}">$client->wirelessBlocklists-><a href="./src/Services/WirelessBlocklistsService.php">delete</a>(...$params)</code>

# WellKnown

Methods:

- <code title="get /.well-known/oauth-authorization-server">$client->wellKnown-><a href="./src/Services/WellKnownService.php">retrieveAuthorizationServerMetadata</a>()</code>
- <code title="get /.well-known/oauth-protected-resource">$client->wellKnown-><a href="./src/Services/WellKnownService.php">retrieveProtectedResourceMetadata</a>()</code>

# InexplicitNumberOrders

Methods:

- <code title="post /inexplicit_number_orders">$client->inexplicitNumberOrders-><a href="./src/Services/InexplicitNumberOrdersService.php">create</a>(...$params)</code>
- <code title="get /inexplicit_number_orders/{id}">$client->inexplicitNumberOrders-><a href="./src/Services/InexplicitNumberOrdersService.php">retrieve</a>(...$params)</code>
- <code title="get /inexplicit_number_orders">$client->inexplicitNumberOrders-><a href="./src/Services/InexplicitNumberOrdersService.php">list</a>(...$params)</code>

# MobilePhoneNumbers

Methods:

- <code title="get /v2/mobile_phone_numbers/{id}">$client->mobilePhoneNumbers-><a href="./src/Services/MobilePhoneNumbersService.php">retrieve</a>(...$params)</code>
- <code title="patch /v2/mobile_phone_numbers/{id}">$client->mobilePhoneNumbers-><a href="./src/Services/MobilePhoneNumbersService.php">update</a>(...$params)</code>
- <code title="get /v2/mobile_phone_numbers">$client->mobilePhoneNumbers-><a href="./src/Services/MobilePhoneNumbersService.php">list</a>(...$params)</code>

## Messaging

Methods:

- <code title="get /mobile_phone_numbers/{id}/messaging">$client->mobilePhoneNumbers->messaging-><a href="./src/Services/MobilePhoneNumbers/MessagingService.php">retrieve</a>(...$params)</code>
- <code title="get /mobile_phone_numbers/messaging">$client->mobilePhoneNumbers->messaging-><a href="./src/Services/MobilePhoneNumbers/MessagingService.php">list</a>(...$params)</code>

# MobileVoiceConnections

Methods:

- <code title="post /v2/mobile_voice_connections">$client->mobileVoiceConnections-><a href="./src/Services/MobileVoiceConnectionsService.php">create</a>(...$params)</code>
- <code title="get /v2/mobile_voice_connections/{id}">$client->mobileVoiceConnections-><a href="./src/Services/MobileVoiceConnectionsService.php">retrieve</a>(...$params)</code>
- <code title="patch /v2/mobile_voice_connections/{id}">$client->mobileVoiceConnections-><a href="./src/Services/MobileVoiceConnectionsService.php">update</a>(...$params)</code>
- <code title="get /v2/mobile_voice_connections">$client->mobileVoiceConnections-><a href="./src/Services/MobileVoiceConnectionsService.php">list</a>(...$params)</code>
- <code title="delete /v2/mobile_voice_connections/{id}">$client->mobileVoiceConnections-><a href="./src/Services/MobileVoiceConnectionsService.php">delete</a>(...$params)</code>

# Messaging10dlc

Methods:

- <code title="get /10dlc/enum/{endpoint}">$client->messaging10dlc-><a href="./src/Services/Messaging10dlcService.php">getEnum</a>(...$params)</code>

## Brand

Methods:

- <code title="post /10dlc/brand">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">create</a>(...$params)</code>
- <code title="get /10dlc/brand/{brandId}">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">retrieve</a>(...$params)</code>
- <code title="put /10dlc/brand/{brandId}">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">update</a>(...$params)</code>
- <code title="get /10dlc/brand">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">list</a>(...$params)</code>
- <code title="delete /10dlc/brand/{brandId}">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">delete</a>(...$params)</code>
- <code title="get /10dlc/brand/feedback/{brandId}">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">getFeedback</a>(...$params)</code>
- <code title="get /10dlc/brand/smsOtp/{referenceId}">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">getSMSOtpByReference</a>(...$params)</code>
- <code title="post /10dlc/brand/{brandId}/2faEmail">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">resend2faEmail</a>(...$params)</code>
- <code title="get /10dlc/brand/{brandId}/smsOtp">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">retrieveSMSOtpStatus</a>(...$params)</code>
- <code title="put /10dlc/brand/{brandId}/revet">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">revet</a>(...$params)</code>
- <code title="post /10dlc/brand/{brandId}/smsOtp">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">triggerSMSOtp</a>(...$params)</code>
- <code title="put /10dlc/brand/{brandId}/smsOtp">$client->messaging10dlc->brand-><a href="./src/Services/Messaging10dlc/BrandService.php">verifySMSOtp</a>(...$params)</code>

### ExternalVetting

Methods:

- <code title="get /10dlc/brand/{brandId}/externalVetting">$client->messaging10dlc->brand->externalVetting-><a href="./src/Services/Messaging10dlc/Brand/ExternalVettingService.php">list</a>(...$params)</code>
- <code title="put /10dlc/brand/{brandId}/externalVetting">$client->messaging10dlc->brand->externalVetting-><a href="./src/Services/Messaging10dlc/Brand/ExternalVettingService.php">imports</a>(...$params)</code>
- <code title="post /10dlc/brand/{brandId}/externalVetting">$client->messaging10dlc->brand->externalVetting-><a href="./src/Services/Messaging10dlc/Brand/ExternalVettingService.php">order</a>(...$params)</code>

## Campaign

Methods:

- <code title="get /10dlc/campaign/{campaignId}">$client->messaging10dlc->campaign-><a href="./src/Services/Messaging10dlc/CampaignService.php">retrieve</a>(...$params)</code>
- <code title="put /10dlc/campaign/{campaignId}">$client->messaging10dlc->campaign-><a href="./src/Services/Messaging10dlc/CampaignService.php">update</a>(...$params)</code>
- <code title="get /10dlc/campaign">$client->messaging10dlc->campaign-><a href="./src/Services/Messaging10dlc/CampaignService.php">list</a>(...$params)</code>
- <code title="post /10dlc/campaign/acceptSharing/{campaignId}">$client->messaging10dlc->campaign-><a href="./src/Services/Messaging10dlc/CampaignService.php">acceptSharing</a>(...$params)</code>
- <code title="delete /10dlc/campaign/{campaignId}">$client->messaging10dlc->campaign-><a href="./src/Services/Messaging10dlc/CampaignService.php">deactivate</a>(...$params)</code>
- <code title="get /10dlc/campaign/{campaignId}/mnoMetadata">$client->messaging10dlc->campaign-><a href="./src/Services/Messaging10dlc/CampaignService.php">getMnoMetadata</a>(...$params)</code>
- <code title="get /10dlc/campaign/{campaignId}/operationStatus">$client->messaging10dlc->campaign-><a href="./src/Services/Messaging10dlc/CampaignService.php">getOperationStatus</a>(...$params)</code>
- <code title="get /10dlc/campaign/{campaignId}/sharing">$client->messaging10dlc->campaign-><a href="./src/Services/Messaging10dlc/CampaignService.php">getSharingStatus</a>(...$params)</code>
- <code title="post /10dlc/campaign/{campaignId}/appeal">$client->messaging10dlc->campaign-><a href="./src/Services/Messaging10dlc/CampaignService.php">submitAppeal</a>(...$params)</code>

### Usecase

Methods:

- <code title="get /10dlc/campaign/usecase/cost">$client->messaging10dlc->campaign->usecase-><a href="./src/Services/Messaging10dlc/Campaign/UsecaseService.php">getCost</a>(...$params)</code>

### Osr

Methods:

- <code title="get /10dlc/campaign/{campaignId}/osr/attributes">$client->messaging10dlc->campaign->osr-><a href="./src/Services/Messaging10dlc/Campaign/OsrService.php">getAttributes</a>(...$params)</code>

## CampaignBuilder

Methods:

- <code title="post /10dlc/campaignBuilder">$client->messaging10dlc->campaignBuilder-><a href="./src/Services/Messaging10dlc/CampaignBuilderService.php">submit</a>(...$params)</code>

### Brand

Methods:

- <code title="get /10dlc/campaignBuilder/brand/{brandId}/usecase/{usecase}">$client->messaging10dlc->campaignBuilder->brand-><a href="./src/Services/Messaging10dlc/CampaignBuilder/BrandService.php">qualifyByUsecase</a>(...$params)</code>

## PartnerCampaigns

Methods:

- <code title="get /10dlc/partner_campaigns/{campaignId}">$client->messaging10dlc->partnerCampaigns-><a href="./src/Services/Messaging10dlc/PartnerCampaignsService.php">retrieve</a>(...$params)</code>
- <code title="patch /10dlc/partner_campaigns/{campaignId}">$client->messaging10dlc->partnerCampaigns-><a href="./src/Services/Messaging10dlc/PartnerCampaignsService.php">update</a>(...$params)</code>
- <code title="get /10dlc/partner_campaigns">$client->messaging10dlc->partnerCampaigns-><a href="./src/Services/Messaging10dlc/PartnerCampaignsService.php">list</a>(...$params)</code>
- <code title="get /10dlc/partnerCampaign/sharedByMe">$client->messaging10dlc->partnerCampaigns-><a href="./src/Services/Messaging10dlc/PartnerCampaignsService.php">listSharedByMe</a>(...$params)</code>
- <code title="get /10dlc/partnerCampaign/{campaignId}/sharing">$client->messaging10dlc->partnerCampaigns-><a href="./src/Services/Messaging10dlc/PartnerCampaignsService.php">retrieveSharingStatus</a>(...$params)</code>

## PhoneNumberCampaigns

Methods:

- <code title="post /10dlc/phone_number_campaigns">$client->messaging10dlc->phoneNumberCampaigns-><a href="./src/Services/Messaging10dlc/PhoneNumberCampaignsService.php">create</a>(...$params)</code>
- <code title="get /10dlc/phone_number_campaigns/{phoneNumber}">$client->messaging10dlc->phoneNumberCampaigns-><a href="./src/Services/Messaging10dlc/PhoneNumberCampaignsService.php">retrieve</a>(...$params)</code>
- <code title="put /10dlc/phone_number_campaigns/{phoneNumber}">$client->messaging10dlc->phoneNumberCampaigns-><a href="./src/Services/Messaging10dlc/PhoneNumberCampaignsService.php">update</a>(...$params)</code>
- <code title="get /10dlc/phone_number_campaigns">$client->messaging10dlc->phoneNumberCampaigns-><a href="./src/Services/Messaging10dlc/PhoneNumberCampaignsService.php">list</a>(...$params)</code>
- <code title="delete /10dlc/phone_number_campaigns/{phoneNumber}">$client->messaging10dlc->phoneNumberCampaigns-><a href="./src/Services/Messaging10dlc/PhoneNumberCampaignsService.php">delete</a>(...$params)</code>

## PhoneNumberAssignmentByProfile

Methods:

- <code title="post /10dlc/phoneNumberAssignmentByProfile">$client->messaging10dlc->phoneNumberAssignmentByProfile-><a href="./src/Services/Messaging10dlc/PhoneNumberAssignmentByProfileService.php">assign</a>(...$params)</code>
- <code title="get /10dlc/phoneNumberAssignmentByProfile/{taskId}/phoneNumbers">$client->messaging10dlc->phoneNumberAssignmentByProfile-><a href="./src/Services/Messaging10dlc/PhoneNumberAssignmentByProfileService.php">listPhoneNumberStatus</a>(...$params)</code>
- <code title="get /10dlc/phoneNumberAssignmentByProfile/{taskId}/phoneNumbers">$client->messaging10dlc->phoneNumberAssignmentByProfile-><a href="./src/Services/Messaging10dlc/PhoneNumberAssignmentByProfileService.php">retrievePhoneNumberStatus</a>(...$params)</code>
- <code title="get /10dlc/phoneNumberAssignmentByProfile/{taskId}">$client->messaging10dlc->phoneNumberAssignmentByProfile-><a href="./src/Services/Messaging10dlc/PhoneNumberAssignmentByProfileService.php">retrieveStatus</a>(...$params)</code>

# Organizations

## Users

Methods:

- <code title="get /organizations/users/{id}">$client->organizations->users-><a href="./src/Services/Organizations/UsersService.php">retrieve</a>(...$params)</code>
- <code title="get /organizations/users">$client->organizations->users-><a href="./src/Services/Organizations/UsersService.php">list</a>(...$params)</code>
- <code title="get /organizations/users/users_groups_report">$client->organizations->users-><a href="./src/Services/Organizations/UsersService.php">getGroupsReport</a>(...$params)</code>

### Actions

Methods:

- <code title="post /organizations/users/{id}/actions/remove">$client->organizations->users->actions-><a href="./src/Services/Organizations/Users/ActionsService.php">remove</a>(...$params)</code>

# AlphanumericSenderIDs

Methods:

- <code title="post /alphanumeric_sender_ids">$client->alphanumericSenderIDs-><a href="./src/Services/AlphanumericSenderIDsService.php">create</a>(...$params)</code>
- <code title="get /alphanumeric_sender_ids/{id}">$client->alphanumericSenderIDs-><a href="./src/Services/AlphanumericSenderIDsService.php">retrieve</a>(...$params)</code>
- <code title="get /alphanumeric_sender_ids">$client->alphanumericSenderIDs-><a href="./src/Services/AlphanumericSenderIDsService.php">list</a>(...$params)</code>
- <code title="delete /alphanumeric_sender_ids/{id}">$client->alphanumericSenderIDs-><a href="./src/Services/AlphanumericSenderIDsService.php">delete</a>(...$params)</code>

# MessagingProfileMetrics

Methods:

- <code title="get /messaging_profile_metrics">$client->messagingProfileMetrics-><a href="./src/Services/MessagingProfileMetricsService.php">list</a>(...$params)</code>

# SessionAnalysis

Methods:

- <code title="get /session_analysis/{record_type}/{event_id}">$client->sessionAnalysis-><a href="./src/Services/SessionAnalysisService.php">retrieve</a>(...$params)</code>

## Metadata

Methods:

- <code title="get /session_analysis/metadata">$client->sessionAnalysis->metadata-><a href="./src/Services/SessionAnalysis/MetadataService.php">retrieve</a>()</code>
- <code title="get /session_analysis/metadata/{record_type}">$client->sessionAnalysis->metadata-><a href="./src/Services/SessionAnalysis/MetadataService.php">retrieveRecordType</a>(...$params)</code>

# Whatsapp

## BusinessAccounts

Methods:

- <code title="get /v2/whatsapp/business_accounts/{id}">$client->whatsapp->businessAccounts-><a href="./src/Services/Whatsapp/BusinessAccountsService.php">retrieve</a>(...$params)</code>
- <code title="get /v2/whatsapp/business_accounts">$client->whatsapp->businessAccounts-><a href="./src/Services/Whatsapp/BusinessAccountsService.php">list</a>(...$params)</code>
- <code title="delete /v2/whatsapp/business_accounts/{id}">$client->whatsapp->businessAccounts-><a href="./src/Services/Whatsapp/BusinessAccountsService.php">delete</a>(...$params)</code>

### PhoneNumbers

Methods:

- <code title="get /v2/whatsapp/business_accounts/{id}/phone_numbers">$client->whatsapp->businessAccounts->phoneNumbers-><a href="./src/Services/Whatsapp/BusinessAccounts/PhoneNumbersService.php">list</a>(...$params)</code>
- <code title="post /v2/whatsapp/business_accounts/{id}/phone_numbers">$client->whatsapp->businessAccounts->phoneNumbers-><a href="./src/Services/Whatsapp/BusinessAccounts/PhoneNumbersService.php">initializeVerification</a>(...$params)</code>

### Settings

Methods:

- <code title="get /v2/whatsapp/business_accounts/{id}/settings">$client->whatsapp->businessAccounts->settings-><a href="./src/Services/Whatsapp/BusinessAccounts/SettingsService.php">retrieve</a>(...$params)</code>
- <code title="patch /v2/whatsapp/business_accounts/{id}/settings">$client->whatsapp->businessAccounts->settings-><a href="./src/Services/Whatsapp/BusinessAccounts/SettingsService.php">update</a>(...$params)</code>

## Templates

Methods:

- <code title="post /v2/whatsapp/message_templates">$client->whatsapp->templates-><a href="./src/Services/Whatsapp/TemplatesService.php">create</a>(...$params)</code>
- <code title="get /v2/whatsapp/message_templates">$client->whatsapp->templates-><a href="./src/Services/Whatsapp/TemplatesService.php">list</a>(...$params)</code>

## PhoneNumbers

Methods:

- <code title="get /v2/whatsapp/phone_numbers">$client->whatsapp->phoneNumbers-><a href="./src/Services/Whatsapp/PhoneNumbersService.php">list</a>(...$params)</code>
- <code title="delete /v2/whatsapp/phone_numbers/{phone_number}">$client->whatsapp->phoneNumbers-><a href="./src/Services/Whatsapp/PhoneNumbersService.php">delete</a>(...$params)</code>
- <code title="get /whatsapp/phone_numbers">$client->whatsapp->phoneNumbers-><a href="./src/Services/Whatsapp/PhoneNumbersService.php">get</a>(...$params)</code>
- <code title="post /v2/whatsapp/phone_numbers/{phone_number}/resend_verification">$client->whatsapp->phoneNumbers-><a href="./src/Services/Whatsapp/PhoneNumbersService.php">resendVerification</a>(...$params)</code>
- <code title="get /v2/whatsapp/phone_numbers/{phone_number}/conversation_window">$client->whatsapp->phoneNumbers-><a href="./src/Services/Whatsapp/PhoneNumbersService.php">retrieveConversationWindow</a>(...$params)</code>
- <code title="post /v2/whatsapp/phone_numbers/{phone_number}/verify">$client->whatsapp->phoneNumbers-><a href="./src/Services/Whatsapp/PhoneNumbersService.php">verify</a>(...$params)</code>

### CallingSettings

Methods:

- <code title="get /v2/whatsapp/phone_numbers/{phone_number}/calling_settings">$client->whatsapp->phoneNumbers->callingSettings-><a href="./src/Services/Whatsapp/PhoneNumbers/CallingSettingsService.php">retrieve</a>(...$params)</code>
- <code title="patch /v2/whatsapp/phone_numbers/{phone_number}/calling_settings">$client->whatsapp->phoneNumbers->callingSettings-><a href="./src/Services/Whatsapp/PhoneNumbers/CallingSettingsService.php">update</a>(...$params)</code>

### Profile

Methods:

- <code title="get /v2/whatsapp/phone_numbers/{phone_number}/profile">$client->whatsapp->phoneNumbers->profile-><a href="./src/Services/Whatsapp/PhoneNumbers/ProfileService.php">retrieve</a>(...$params)</code>
- <code title="patch /v2/whatsapp/phone_numbers/{phone_number}/profile">$client->whatsapp->phoneNumbers->profile-><a href="./src/Services/Whatsapp/PhoneNumbers/ProfileService.php">update</a>(...$params)</code>

#### Photo

Methods:

- <code title="get /v2/whatsapp/phone_numbers/{phone_number}/profile/photo">$client->whatsapp->phoneNumbers->profile->photo-><a href="./src/Services/Whatsapp/PhoneNumbers/Profile/PhotoService.php">retrieve</a>(...$params)</code>
- <code title="delete /v2/whatsapp/phone_numbers/{phone_number}/profile/photo">$client->whatsapp->phoneNumbers->profile->photo-><a href="./src/Services/Whatsapp/PhoneNumbers/Profile/PhotoService.php">delete</a>(...$params)</code>
- <code title="post /v2/whatsapp/phone_numbers/{phone_number}/profile/photo">$client->whatsapp->phoneNumbers->profile->photo-><a href="./src/Services/Whatsapp/PhoneNumbers/Profile/PhotoService.php">upload</a>(...$params)</code>

### ConversationalComponents

Methods:

- <code title="get /v2/whatsapp/phone_numbers/{phone_number}/conversational_components">$client->whatsapp->phoneNumbers->conversationalComponents-><a href="./src/Services/Whatsapp/PhoneNumbers/ConversationalComponentsService.php">list</a>(...$params)</code>
- <code title="patch /v2/whatsapp/phone_numbers/{phone_number}/conversational_components">$client->whatsapp->phoneNumbers->conversationalComponents-><a href="./src/Services/Whatsapp/PhoneNumbers/ConversationalComponentsService.php">patchAll</a>(...$params)</code>

## UserData

Methods:

- <code title="get /v2/whatsapp/user_data">$client->whatsapp->userData-><a href="./src/Services/Whatsapp/UserDataService.php">retrieve</a>()</code>
- <code title="patch /v2/whatsapp/user_data">$client->whatsapp->userData-><a href="./src/Services/Whatsapp/UserDataService.php">update</a>(...$params)</code>

# WhatsappMessageTemplates

Methods:

- <code title="get /v2/whatsapp_message_templates/{id}">$client->whatsappMessageTemplates-><a href="./src/Services/WhatsappMessageTemplatesService.php">retrieve</a>(...$params)</code>
- <code title="patch /v2/whatsapp_message_templates/{id}">$client->whatsappMessageTemplates-><a href="./src/Services/WhatsappMessageTemplatesService.php">update</a>(...$params)</code>
- <code title="delete /v2/whatsapp_message_templates/{id}">$client->whatsappMessageTemplates-><a href="./src/Services/WhatsappMessageTemplatesService.php">delete</a>(...$params)</code>

# X402

## CreditAccount

Methods:

- <code title="post /v2/x402/credit_account/quote">$client->x402->creditAccount-><a href="./src/Services/X402/CreditAccountService.php">createQuote</a>(...$params)</code>
- <code title="post /v2/x402/credit_account">$client->x402->creditAccount-><a href="./src/Services/X402/CreditAccountService.php">settle</a>(...$params)</code>

# VoiceClones

Methods:

- <code title="post /voice_clones">$client->voiceClones-><a href="./src/Services/VoiceClonesService.php">create</a>(...$params)</code>
- <code title="patch /voice_clones/{id}">$client->voiceClones-><a href="./src/Services/VoiceClonesService.php">update</a>(...$params)</code>
- <code title="get /voice_clones">$client->voiceClones-><a href="./src/Services/VoiceClonesService.php">list</a>(...$params)</code>
- <code title="delete /voice_clones/{id}">$client->voiceClones-><a href="./src/Services/VoiceClonesService.php">delete</a>(...$params)</code>
- <code title="post /voice_clones/from_upload">$client->voiceClones-><a href="./src/Services/VoiceClonesService.php">createFromUpload</a>(...$params)</code>
- <code title="get /voice_clones/{id}/sample">$client->voiceClones-><a href="./src/Services/VoiceClonesService.php">downloadSample</a>(...$params)</code>

# VoiceDesigns

Methods:

- <code title="post /voice_designs">$client->voiceDesigns-><a href="./src/Services/VoiceDesignsService.php">create</a>(...$params)</code>
- <code title="get /voice_designs/{id}">$client->voiceDesigns-><a href="./src/Services/VoiceDesignsService.php">retrieve</a>(...$params)</code>
- <code title="get /voice_designs">$client->voiceDesigns-><a href="./src/Services/VoiceDesignsService.php">list</a>(...$params)</code>
- <code title="delete /voice_designs/{id}">$client->voiceDesigns-><a href="./src/Services/VoiceDesignsService.php">delete</a>(...$params)</code>
- <code title="delete /voice_designs/{id}/versions/{version}">$client->voiceDesigns-><a href="./src/Services/VoiceDesignsService.php">deleteVersion</a>(...$params)</code>
- <code title="get /voice_designs/{id}/sample">$client->voiceDesigns-><a href="./src/Services/VoiceDesignsService.php">downloadSample</a>(...$params)</code>
- <code title="patch /voice_designs/{id}">$client->voiceDesigns-><a href="./src/Services/VoiceDesignsService.php">rename</a>(...$params)</code>

# TrafficPolicyProfiles

Methods:

- <code title="post /traffic_policy_profiles">$client->trafficPolicyProfiles-><a href="./src/Services/TrafficPolicyProfilesService.php">create</a>(...$params)</code>
- <code title="get /traffic_policy_profiles/{id}">$client->trafficPolicyProfiles-><a href="./src/Services/TrafficPolicyProfilesService.php">retrieve</a>(...$params)</code>
- <code title="patch /traffic_policy_profiles/{id}">$client->trafficPolicyProfiles-><a href="./src/Services/TrafficPolicyProfilesService.php">update</a>(...$params)</code>
- <code title="get /traffic_policy_profiles">$client->trafficPolicyProfiles-><a href="./src/Services/TrafficPolicyProfilesService.php">list</a>(...$params)</code>
- <code title="delete /traffic_policy_profiles/{id}">$client->trafficPolicyProfiles-><a href="./src/Services/TrafficPolicyProfilesService.php">delete</a>(...$params)</code>
- <code title="get /traffic_policy_profiles/services">$client->trafficPolicyProfiles-><a href="./src/Services/TrafficPolicyProfilesService.php">listServices</a>(...$params)</code>

# Enterprises

Methods:

- <code title="post /enterprises">$client->enterprises-><a href="./src/Services/EnterprisesService.php">create</a>(...$params)</code>
- <code title="get /enterprises/{enterprise_id}">$client->enterprises-><a href="./src/Services/EnterprisesService.php">retrieve</a>(...$params)</code>
- <code title="put /enterprises/{enterprise_id}">$client->enterprises-><a href="./src/Services/EnterprisesService.php">update</a>(...$params)</code>
- <code title="get /enterprises">$client->enterprises-><a href="./src/Services/EnterprisesService.php">list</a>(...$params)</code>
- <code title="delete /enterprises/{enterprise_id}">$client->enterprises-><a href="./src/Services/EnterprisesService.php">delete</a>(...$params)</code>
- <code title="post /enterprises/{enterprise_id}/branded_calling">$client->enterprises-><a href="./src/Services/EnterprisesService.php">brandedCalling</a>(...$params)</code>

## Reputation

Methods:

- <code title="get /enterprises/{enterprise_id}/reputation">$client->enterprises->reputation-><a href="./src/Services/Enterprises/ReputationService.php">retrieve</a>(...$params)</code>
- <code title="delete /enterprises/{enterprise_id}/reputation">$client->enterprises->reputation-><a href="./src/Services/Enterprises/ReputationService.php">disable</a>(...$params)</code>
- <code title="post /enterprises/{enterprise_id}/reputation">$client->enterprises->reputation-><a href="./src/Services/Enterprises/ReputationService.php">enable</a>(...$params)</code>
- <code title="patch /enterprises/{enterprise_id}/reputation/frequency">$client->enterprises->reputation-><a href="./src/Services/Enterprises/ReputationService.php">updateFrequency</a>(...$params)</code>

### Numbers

Methods:

- <code title="get /enterprises/{enterprise_id}/reputation/numbers/{phone_number}">$client->enterprises->reputation->numbers-><a href="./src/Services/Enterprises/Reputation/NumbersService.php">retrieve</a>(...$params)</code>
- <code title="get /enterprises/{enterprise_id}/reputation/numbers">$client->enterprises->reputation->numbers-><a href="./src/Services/Enterprises/Reputation/NumbersService.php">list</a>(...$params)</code>
- <code title="post /enterprises/{enterprise_id}/reputation/numbers">$client->enterprises->reputation->numbers-><a href="./src/Services/Enterprises/Reputation/NumbersService.php">associate</a>(...$params)</code>
- <code title="delete /enterprises/{enterprise_id}/reputation/numbers/{phone_number}">$client->enterprises->reputation->numbers-><a href="./src/Services/Enterprises/Reputation/NumbersService.php">disassociate</a>(...$params)</code>
- <code title="post /enterprises/{enterprise_id}/reputation/numbers/refresh">$client->enterprises->reputation->numbers-><a href="./src/Services/Enterprises/Reputation/NumbersService.php">refresh</a>(...$params)</code>

### Loa

Methods:

- <code title="patch /enterprises/{enterprise_id}/reputation/loa">$client->enterprises->reputation->loa-><a href="./src/Services/Enterprises/Reputation/LoaService.php">update</a>(...$params)</code>
- <code title="post /enterprises/{enterprise_id}/reputation/loa">$client->enterprises->reputation->loa-><a href="./src/Services/Enterprises/Reputation/LoaService.php">render</a>(...$params)</code>

### Remediation

Methods:

- <code title="post /enterprises/{enterprise_id}/reputation/remediation">$client->enterprises->reputation->remediation-><a href="./src/Services/Enterprises/Reputation/RemediationService.php">create</a>(...$params)</code>
- <code title="get /enterprises/{enterprise_id}/reputation/remediation/{remediation_id}">$client->enterprises->reputation->remediation-><a href="./src/Services/Enterprises/Reputation/RemediationService.php">retrieve</a>(...$params)</code>
- <code title="get /enterprises/{enterprise_id}/reputation/remediation">$client->enterprises->reputation->remediation-><a href="./src/Services/Enterprises/Reputation/RemediationService.php">list</a>(...$params)</code>

## Dir

Methods:

- <code title="post /enterprises/{enterprise_id}/dir">$client->enterprises->dir-><a href="./src/Services/Enterprises/DirService.php">create</a>(...$params)</code>
- <code title="get /enterprises/{enterprise_id}/dir">$client->enterprises->dir-><a href="./src/Services/Enterprises/DirService.php">list</a>(...$params)</code>

# Reputation

## Numbers

Methods:

- <code title="get /reputation/numbers/{phone_number}">$client->reputation->numbers-><a href="./src/Services/Reputation/NumbersService.php">retrieve</a>(...$params)</code>
- <code title="get /reputation/numbers">$client->reputation->numbers-><a href="./src/Services/Reputation/NumbersService.php">list</a>(...$params)</code>
- <code title="delete /reputation/numbers/{phone_number}">$client->reputation->numbers-><a href="./src/Services/Reputation/NumbersService.php">delete</a>(...$params)</code>

# TermsOfService

Methods:

- <code title="get /terms_of_service/info">$client->termsOfService-><a href="./src/Services/TermsOfServiceService.php">retrieveInfo</a>(...$params)</code>
- <code title="get /terms_of_service/status">$client->termsOfService-><a href="./src/Services/TermsOfServiceService.php">retrieveStatus</a>(...$params)</code>

## NumberReputation

Methods:

- <code title="post /terms_of_service/number_reputation/agree">$client->termsOfService->numberReputation-><a href="./src/Services/TermsOfService/NumberReputationService.php">agree</a>()</code>

## Agreements

Methods:

- <code title="get /terms_of_service/agreements/{agreement_id}">$client->termsOfService->agreements-><a href="./src/Services/TermsOfService/AgreementsService.php">retrieve</a>(...$params)</code>
- <code title="get /terms_of_service/agreements">$client->termsOfService->agreements-><a href="./src/Services/TermsOfService/AgreementsService.php">list</a>(...$params)</code>

## BrandedCalling

Methods:

- <code title="post /terms_of_service/branded_calling/agree">$client->termsOfService->brandedCalling-><a href="./src/Services/TermsOfService/BrandedCallingService.php">agree</a>()</code>

# PronunciationDicts

Methods:

- <code title="post /pronunciation_dicts">$client->pronunciationDicts-><a href="./src/Services/PronunciationDictsService.php">create</a>(...$params)</code>
- <code title="get /pronunciation_dicts/{id}">$client->pronunciationDicts-><a href="./src/Services/PronunciationDictsService.php">retrieve</a>(...$params)</code>
- <code title="patch /pronunciation_dicts/{id}">$client->pronunciationDicts-><a href="./src/Services/PronunciationDictsService.php">update</a>(...$params)</code>
- <code title="get /pronunciation_dicts">$client->pronunciationDicts-><a href="./src/Services/PronunciationDictsService.php">list</a>(...$params)</code>
- <code title="delete /pronunciation_dicts/{id}">$client->pronunciationDicts-><a href="./src/Services/PronunciationDictsService.php">delete</a>(...$params)</code>

# UacConnections

Methods:

- <code title="post /uac_connections">$client->uacConnections-><a href="./src/Services/UacConnectionsService.php">create</a>(...$params)</code>
- <code title="get /uac_connections/{id}">$client->uacConnections-><a href="./src/Services/UacConnectionsService.php">retrieve</a>(...$params)</code>
- <code title="patch /uac_connections/{id}">$client->uacConnections-><a href="./src/Services/UacConnectionsService.php">update</a>(...$params)</code>
- <code title="get /uac_connections">$client->uacConnections-><a href="./src/Services/UacConnectionsService.php">list</a>(...$params)</code>
- <code title="delete /uac_connections/{id}">$client->uacConnections-><a href="./src/Services/UacConnectionsService.php">delete</a>(...$params)</code>

## Actions

Methods:

- <code title="post /uac_connections/{id}/actions/check_registration_status">$client->uacConnections->actions-><a href="./src/Services/UacConnections/ActionsService.php">checkRegistrationStatus</a>(...$params)</code>

# VoiceSDKCallReports

Methods:

- <code title="get /voice_sdk_call_reports/{call_id}">$client->voiceSDKCallReports-><a href="./src/Services/VoiceSDKCallReportsService.php">retrieve</a>(...$params)</code>
- <code title="get /voice_sdk_call_reports">$client->voiceSDKCallReports-><a href="./src/Services/VoiceSDKCallReportsService.php">list</a>(...$params)</code>

# SipRegistrationStatus

Methods:

- <code title="get /sip_registration_status">$client->sipRegistrationStatus-><a href="./src/Services/SipRegistrationStatusService.php">retrieve</a>(...$params)</code>

# CallReasons

Methods:

- <code title="get /call_reasons">$client->callReasons-><a href="./src/Services/CallReasonsService.php">list</a>(...$params)</code>
- <code title="post /call_reasons/validate">$client->callReasons-><a href="./src/Services/CallReasonsService.php">validate</a>(...$params)</code>

# Dir

Methods:

- <code title="get /dir/{dir_id}">$client->dir-><a href="./src/Services/DirService.php">retrieve</a>(...$params)</code>
- <code title="patch /dir/{dir_id}">$client->dir-><a href="./src/Services/DirService.php">update</a>(...$params)</code>
- <code title="get /dir">$client->dir-><a href="./src/Services/DirService.php">list</a>(...$params)</code>
- <code title="delete /dir/{dir_id}">$client->dir-><a href="./src/Services/DirService.php">delete</a>(...$params)</code>
- <code title="get /dir/document_types">$client->dir-><a href="./src/Services/DirService.php">listDocumentTypes</a>()</code>
- <code title="get /dir/{dir_id}/infringement_claims">$client->dir-><a href="./src/Services/DirService.php">listInfringementClaims</a>(...$params)</code>
- <code title="post /dir/{dir_id}/loa">$client->dir-><a href="./src/Services/DirService.php">newLoa</a>(...$params)</code>
- <code title="post /dir/{dir_id}/submit">$client->dir-><a href="./src/Services/DirService.php">submit</a>(...$params)</code>
- <code title="put /dir/{dir_id}/infringement_update">$client->dir-><a href="./src/Services/DirService.php">updateInfringement</a>(...$params)</code>

## Comments

Methods:

- <code title="post /dir/{dir_id}/comments">$client->dir->comments-><a href="./src/Services/Dir/CommentsService.php">create</a>(...$params)</code>
- <code title="get /dir/{dir_id}/comments">$client->dir->comments-><a href="./src/Services/Dir/CommentsService.php">list</a>(...$params)</code>

## PhoneNumberBatches

Methods:

- <code title="get /dir/{dir_id}/phone_number_batches/{batch_id}">$client->dir->phoneNumberBatches-><a href="./src/Services/Dir/PhoneNumberBatchesService.php">retrieve</a>(...$params)</code>
- <code title="get /dir/{dir_id}/phone_number_batches">$client->dir->phoneNumberBatches-><a href="./src/Services/Dir/PhoneNumberBatchesService.php">list</a>(...$params)</code>

## PhoneNumbers

Methods:

- <code title="get /dir/{dir_id}/phone_numbers">$client->dir->phoneNumbers-><a href="./src/Services/Dir/PhoneNumbersService.php">list</a>(...$params)</code>
- <code title="post /dir/{dir_id}/phone_numbers">$client->dir->phoneNumbers-><a href="./src/Services/Dir/PhoneNumbersService.php">add</a>(...$params)</code>
- <code title="delete /dir/{dir_id}/phone_numbers">$client->dir->phoneNumbers-><a href="./src/Services/Dir/PhoneNumbersService.php">remove</a>(...$params)</code>

## References

Methods:

- <code title="post /dir/{dir_id}/references">$client->dir->references-><a href="./src/Services/Dir/ReferencesService.php">create</a>(...$params)</code>
- <code title="patch /dir/{dir_id}/references/{ref_type}/{slot}">$client->dir->references-><a href="./src/Services/Dir/ReferencesService.php">update</a>(...$params)</code>
- <code title="get /dir/{dir_id}/references">$client->dir->references-><a href="./src/Services/Dir/ReferencesService.php">list</a>(...$params)</code>

## VerifyEmail

Methods:

- <code title="post /dir/{dir_id}/verify_email">$client->dir->verifyEmail-><a href="./src/Services/Dir/VerifyEmailService.php">create</a>(...$params)</code>
- <code title="get /dir/{dir_id}/verify_email">$client->dir->verifyEmail-><a href="./src/Services/Dir/VerifyEmailService.php">list</a>(...$params)</code>
- <code title="post /dir/{dir_id}/verify_email/confirm">$client->dir->verifyEmail-><a href="./src/Services/Dir/VerifyEmailService.php">confirm</a>(...$params)</code>

# InfringementClaims

Methods:

- <code title="get /infringement_claims/{claim_id}">$client->infringementClaims-><a href="./src/Services/InfringementClaimsService.php">retrieve</a>(...$params)</code>
- <code title="post /infringement_claims/{claim_id}/contest">$client->infringementClaims-><a href="./src/Services/InfringementClaimsService.php">contest</a>(...$params)</code>

# EmailBlocks

Methods:

- <code title="post /email_blocks">$client->emailBlocks-><a href="./src/Services/EmailBlocksService.php">create</a>(...$params)</code>
- <code title="get /email_blocks/{id}">$client->emailBlocks-><a href="./src/Services/EmailBlocksService.php">retrieve</a>(...$params)</code>
- <code title="get /email_blocks">$client->emailBlocks-><a href="./src/Services/EmailBlocksService.php">list</a>(...$params)</code>
- <code title="delete /email_blocks/{id}">$client->emailBlocks-><a href="./src/Services/EmailBlocksService.php">delete</a>(...$params)</code>
- <code title="get /email_blocks/{id}/events">$client->emailBlocks-><a href="./src/Services/EmailBlocksService.php">retrieveEvents</a>(...$params)</code>
- <code title="get /email_blocks/export">$client->emailBlocks-><a href="./src/Services/EmailBlocksService.php">retrieveExport</a>(...$params)</code>

## Imports

Methods:

- <code title="post /email_blocks/import">$client->emailBlocks->imports-><a href="./src/Services/EmailBlocks/ImportsService.php">create</a>(...$params)</code>
- <code title="get /email_blocks/import/{id}">$client->emailBlocks->imports-><a href="./src/Services/EmailBlocks/ImportsService.php">retrieve</a>(...$params)</code>

# EmailDomains

Methods:

- <code title="post /email_domains">$client->emailDomains-><a href="./src/Services/EmailDomainsService.php">create</a>(...$params)</code>
- <code title="get /email_domains/{id}">$client->emailDomains-><a href="./src/Services/EmailDomainsService.php">retrieve</a>(...$params)</code>
- <code title="patch /email_domains/{id}">$client->emailDomains-><a href="./src/Services/EmailDomainsService.php">update</a>(...$params)</code>
- <code title="get /email_domains">$client->emailDomains-><a href="./src/Services/EmailDomainsService.php">list</a>(...$params)</code>
- <code title="delete /email_domains/{id}">$client->emailDomains-><a href="./src/Services/EmailDomainsService.php">delete</a>(...$params)</code>
- <code title="get /email_domains/{domain_id}/dns_records">$client->emailDomains-><a href="./src/Services/EmailDomainsService.php">retrieveDNSRecords</a>(...$params)</code>
- <code title="get /email_domains/{id}/health">$client->emailDomains-><a href="./src/Services/EmailDomainsService.php">retrieveHealth</a>(...$params)</code>
- <code title="post /email_domains/{domain_id}/verify">$client->emailDomains-><a href="./src/Services/EmailDomainsService.php">verify</a>(...$params)</code>

## Webhooks

Methods:

- <code title="post /email_domains/{domain_id}/webhooks">$client->emailDomains->webhooks-><a href="./src/Services/EmailDomains/WebhooksService.php">create</a>(...$params)</code>
- <code title="get /email_domains/{domain_id}/webhooks/{id}">$client->emailDomains->webhooks-><a href="./src/Services/EmailDomains/WebhooksService.php">retrieve</a>(...$params)</code>
- <code title="patch /email_domains/{domain_id}/webhooks/{id}">$client->emailDomains->webhooks-><a href="./src/Services/EmailDomains/WebhooksService.php">update</a>(...$params)</code>
- <code title="get /email_domains/{domain_id}/webhooks">$client->emailDomains->webhooks-><a href="./src/Services/EmailDomains/WebhooksService.php">list</a>(...$params)</code>
- <code title="delete /email_domains/{domain_id}/webhooks/{id}">$client->emailDomains->webhooks-><a href="./src/Services/EmailDomains/WebhooksService.php">delete</a>(...$params)</code>

# EmailEvents

Methods:

- <code title="get /email_events">$client->emailEvents-><a href="./src/Services/EmailEventsService.php">list</a>(...$params)</code>
- <code title="get /email_events/stats">$client->emailEvents-><a href="./src/Services/EmailEventsService.php">retrieveStats</a>(...$params)</code>

# EmailInboxes

Methods:

- <code title="post /email_inboxes">$client->emailInboxes-><a href="./src/Services/EmailInboxesService.php">create</a>(...$params)</code>
- <code title="get /email_inboxes/{id}">$client->emailInboxes-><a href="./src/Services/EmailInboxesService.php">retrieve</a>(...$params)</code>
- <code title="get /email_inboxes">$client->emailInboxes-><a href="./src/Services/EmailInboxesService.php">list</a>(...$params)</code>
- <code title="delete /email_inboxes/{id}">$client->emailInboxes-><a href="./src/Services/EmailInboxesService.php">delete</a>(...$params)</code>

## Drafts

Methods:

- <code title="post /email_inboxes/{inbox_id}/drafts">$client->emailInboxes->drafts-><a href="./src/Services/EmailInboxes/DraftsService.php">create</a>(...$params)</code>
- <code title="get /email_inboxes/{inbox_id}/drafts/{draft_id}">$client->emailInboxes->drafts-><a href="./src/Services/EmailInboxes/DraftsService.php">retrieve</a>(...$params)</code>
- <code title="put /email_inboxes/{inbox_id}/drafts/{draft_id}">$client->emailInboxes->drafts-><a href="./src/Services/EmailInboxes/DraftsService.php">update</a>(...$params)</code>
- <code title="get /email_inboxes/{inbox_id}/drafts">$client->emailInboxes->drafts-><a href="./src/Services/EmailInboxes/DraftsService.php">list</a>(...$params)</code>
- <code title="delete /email_inboxes/{inbox_id}/drafts/{draft_id}">$client->emailInboxes->drafts-><a href="./src/Services/EmailInboxes/DraftsService.php">delete</a>(...$params)</code>
- <code title="patch /email_inboxes/{inbox_id}/drafts/{draft_id}">$client->emailInboxes->drafts-><a href="./src/Services/EmailInboxes/DraftsService.php">patch</a>(...$params)</code>
- <code title="post /email_inboxes/{inbox_id}/drafts/{draft_id}/send">$client->emailInboxes->drafts-><a href="./src/Services/EmailInboxes/DraftsService.php">send</a>(...$params)</code>

## Filters

Methods:

- <code title="get /email_inboxes/{inbox_id}/filters">$client->emailInboxes->filters-><a href="./src/Services/EmailInboxes/FiltersService.php">list</a>(...$params)</code>
- <code title="post /email_inboxes/{inbox_id}/filters">$client->emailInboxes->filters-><a href="./src/Services/EmailInboxes/FiltersService.php">add</a>(...$params)</code>
- <code title="delete /email_inboxes/{inbox_id}/filters">$client->emailInboxes->filters-><a href="./src/Services/EmailInboxes/FiltersService.php">deleteAll</a>(...$params)</code>
- <code title="put /email_inboxes/{inbox_id}/filters">$client->emailInboxes->filters-><a href="./src/Services/EmailInboxes/FiltersService.php">replace</a>(...$params)</code>

## Messages

Methods:

- <code title="patch /email_inboxes/{inbox_id}/messages/{message_id}">$client->emailInboxes->messages-><a href="./src/Services/EmailInboxes/MessagesService.php">update</a>(...$params)</code>
- <code title="get /email_inboxes/{inbox_id}/messages">$client->emailInboxes->messages-><a href="./src/Services/EmailInboxes/MessagesService.php">list</a>(...$params)</code>
- <code title="post /email_inboxes/{inbox_id}/messages/{message_id}/drafts">$client->emailInboxes->messages-><a href="./src/Services/EmailInboxes/MessagesService.php">drafts</a>(...$params)</code>

### Actions

Methods:

- <code title="post /email_inboxes/{inbox_id}/messages/{message_id}/actions/forward">$client->emailInboxes->messages->actions-><a href="./src/Services/EmailInboxes/Messages/ActionsService.php">forward</a>(...$params)</code>
- <code title="post /email_inboxes/{inbox_id}/messages/{message_id}/actions/reply">$client->emailInboxes->messages->actions-><a href="./src/Services/EmailInboxes/Messages/ActionsService.php">reply</a>(...$params)</code>
- <code title="post /email_inboxes/{inbox_id}/messages/{message_id}/actions/reply_all">$client->emailInboxes->messages->actions-><a href="./src/Services/EmailInboxes/Messages/ActionsService.php">replyAll</a>(...$params)</code>

### Labels

Methods:

- <code title="post /email_inboxes/{inbox_id}/messages/{message_id}/labels">$client->emailInboxes->messages->labels-><a href="./src/Services/EmailInboxes/Messages/LabelsService.php">create</a>(...$params)</code>
- <code title="delete /email_inboxes/{inbox_id}/messages/{message_id}/labels">$client->emailInboxes->messages->labels-><a href="./src/Services/EmailInboxes/Messages/LabelsService.php">deleteAll</a>(...$params)</code>

## Threads

Methods:

- <code title="get /email_inboxes/{inbox_id}/threads/{thread_id}">$client->emailInboxes->threads-><a href="./src/Services/EmailInboxes/ThreadsService.php">retrieve</a>(...$params)</code>
- <code title="get /email_inboxes/{inbox_id}/threads">$client->emailInboxes->threads-><a href="./src/Services/EmailInboxes/ThreadsService.php">list</a>(...$params)</code>

### Labels

Methods:

- <code title="post /email_inboxes/{inbox_id}/threads/{thread_id}/labels">$client->emailInboxes->threads->labels-><a href="./src/Services/EmailInboxes/Threads/LabelsService.php">create</a>(...$params)</code>
- <code title="delete /email_inboxes/{inbox_id}/threads/{thread_id}/labels">$client->emailInboxes->threads->labels-><a href="./src/Services/EmailInboxes/Threads/LabelsService.php">deleteAll</a>(...$params)</code>

# EmailMessages

Methods:

- <code title="post /email_messages">$client->emailMessages-><a href="./src/Services/EmailMessagesService.php">create</a>(...$params)</code>
- <code title="get /email_messages/{id}">$client->emailMessages-><a href="./src/Services/EmailMessagesService.php">retrieve</a>(...$params)</code>
- <code title="get /email_messages">$client->emailMessages-><a href="./src/Services/EmailMessagesService.php">list</a>(...$params)</code>
- <code title="delete /email_messages/{id}">$client->emailMessages-><a href="./src/Services/EmailMessagesService.php">delete</a>(...$params)</code>
- <code title="post /email_messages/batch">$client->emailMessages-><a href="./src/Services/EmailMessagesService.php">batch</a>(...$params)</code>
- <code title="delete /email_messages">$client->emailMessages-><a href="./src/Services/EmailMessagesService.php">deleteAll</a>(...$params)</code>
- <code title="delete /email_messages/{email_id}/schedule">$client->emailMessages-><a href="./src/Services/EmailMessagesService.php">deleteSchedule</a>(...$params)</code>
- <code title="get /email_messages/{email_id}/events">$client->emailMessages-><a href="./src/Services/EmailMessagesService.php">retrieveEvents</a>(...$params)</code>

## Recipients

Methods:

- <code title="get /email_messages/{email_id}/recipients/{recipient_id}">$client->emailMessages->recipients-><a href="./src/Services/EmailMessages/RecipientsService.php">retrieve</a>(...$params)</code>
- <code title="get /email_messages/{email_id}/recipients">$client->emailMessages->recipients-><a href="./src/Services/EmailMessages/RecipientsService.php">list</a>(...$params)</code>

# EmailTemplates

Methods:

- <code title="post /email_templates">$client->emailTemplates-><a href="./src/Services/EmailTemplatesService.php">create</a>(...$params)</code>
- <code title="get /email_templates/{id}">$client->emailTemplates-><a href="./src/Services/EmailTemplatesService.php">retrieve</a>(...$params)</code>
- <code title="patch /email_templates/{id}">$client->emailTemplates-><a href="./src/Services/EmailTemplatesService.php">update</a>(...$params)</code>
- <code title="get /email_templates">$client->emailTemplates-><a href="./src/Services/EmailTemplatesService.php">list</a>(...$params)</code>
- <code title="delete /email_templates/{id}">$client->emailTemplates-><a href="./src/Services/EmailTemplatesService.php">delete</a>(...$params)</code>
- <code title="post /email_templates/{id}/render">$client->emailTemplates-><a href="./src/Services/EmailTemplatesService.php">render</a>(...$params)</code>
- <code title="put /email_templates/{id}">$client->emailTemplates-><a href="./src/Services/EmailTemplatesService.php">replace</a>(...$params)</code>

# EmailThreads

Methods:

- <code title="get /email_threads/{thread_id}">$client->emailThreads-><a href="./src/Services/EmailThreadsService.php">retrieve</a>(...$params)</code>
- <code title="get /email_threads">$client->emailThreads-><a href="./src/Services/EmailThreadsService.php">list</a>(...$params)</code>

# EmailUnsubscribeGroups

Methods:

- <code title="post /email_unsubscribe_groups">$client->emailUnsubscribeGroups-><a href="./src/Services/EmailUnsubscribeGroupsService.php">create</a>(...$params)</code>
- <code title="get /email_unsubscribe_groups/{id}">$client->emailUnsubscribeGroups-><a href="./src/Services/EmailUnsubscribeGroupsService.php">retrieve</a>(...$params)</code>
- <code title="patch /email_unsubscribe_groups/{id}">$client->emailUnsubscribeGroups-><a href="./src/Services/EmailUnsubscribeGroupsService.php">update</a>(...$params)</code>
- <code title="get /email_unsubscribe_groups">$client->emailUnsubscribeGroups-><a href="./src/Services/EmailUnsubscribeGroupsService.php">list</a>(...$params)</code>
- <code title="delete /email_unsubscribe_groups/{id}">$client->emailUnsubscribeGroups-><a href="./src/Services/EmailUnsubscribeGroupsService.php">delete</a>(...$params)</code>

## Suppressions

Methods:

- <code title="post /email_unsubscribe_groups/{id}/suppressions">$client->emailUnsubscribeGroups->suppressions-><a href="./src/Services/EmailUnsubscribeGroups/SuppressionsService.php">create</a>(...$params)</code>
- <code title="get /email_unsubscribe_groups/{id}/suppressions">$client->emailUnsubscribeGroups->suppressions-><a href="./src/Services/EmailUnsubscribeGroups/SuppressionsService.php">list</a>(...$params)</code>
- <code title="delete /email_unsubscribe_groups/{id}/suppressions/{email}">$client->emailUnsubscribeGroups->suppressions-><a href="./src/Services/EmailUnsubscribeGroups/SuppressionsService.php">delete</a>(...$params)</code>

# EmailValidations

Methods:

- <code title="post /email_validations">$client->emailValidations-><a href="./src/Services/EmailValidationsService.php">create</a>(...$params)</code>

## Batch

Methods:

- <code title="post /email_validations/batch">$client->emailValidations->batch-><a href="./src/Services/EmailValidations/BatchService.php">create</a>(...$params)</code>
- <code title="get /email_validations/batch/{id}">$client->emailValidations->batch-><a href="./src/Services/EmailValidations/BatchService.php">retrieve</a>(...$params)</code>

# Pricing

## Products

Methods:

- <code title="get /pricing/products/{slug}">$client->pricing->products-><a href="./src/Services/Pricing/ProductsService.php">retrieve</a>(...$params)</code>
- <code title="get /pricing/products">$client->pricing->products-><a href="./src/Services/Pricing/ProductsService.php">list</a>(...$params)</code>

# WebSearch

Methods:

- <code title="post /web_search">$client->webSearch-><a href="./src/Services/WebSearchService.php">create</a>(...$params)</code>
- <code title="post /web_search/contents">$client->webSearch-><a href="./src/Services/WebSearchService.php">contents</a>(...$params)</code>

## Research

Methods:

- <code title="post /web_search/research">$client->webSearch->research-><a href="./src/Services/WebSearch/ResearchService.php">create</a>(...$params)</code>
- <code title="get /web_search/research/{task_id}">$client->webSearch->research-><a href="./src/Services/WebSearch/ResearchService.php">retrieve</a>(...$params)</code>

# MeetingSessions

Methods:

- <code title="post /meeting_sessions">$client->meetingSessions-><a href="./src/Services/MeetingSessionsService.php">create</a>(...$params)</code>
- <code title="get /meeting_sessions/{id}">$client->meetingSessions-><a href="./src/Services/MeetingSessionsService.php">retrieve</a>(...$params)</code>
- <code title="patch /meeting_sessions/{id}">$client->meetingSessions-><a href="./src/Services/MeetingSessionsService.php">update</a>(...$params)</code>
- <code title="get /meeting_sessions">$client->meetingSessions-><a href="./src/Services/MeetingSessionsService.php">list</a>(...$params)</code>
- <code title="delete /meeting_sessions/{id}">$client->meetingSessions-><a href="./src/Services/MeetingSessionsService.php">delete</a>(...$params)</code>
- <code title="delete /meeting_sessions/{id}/recording_media">$client->meetingSessions-><a href="./src/Services/MeetingSessionsService.php">deleteRecordingMedia</a>(...$params)</code>
- <code title="get /meeting_sessions/{id}/events">$client->meetingSessions-><a href="./src/Services/MeetingSessionsService.php">retrieveEvents</a>(...$params)</code>
- <code title="get /meeting_sessions/{id}/recordings">$client->meetingSessions-><a href="./src/Services/MeetingSessionsService.php">retrieveRecordings</a>(...$params)</code>
- <code title="get /meeting_sessions/{id}/transcript">$client->meetingSessions-><a href="./src/Services/MeetingSessionsService.php">retrieveTranscript</a>(...$params)</code>

## Actions

Methods:

- <code title="post /meeting_sessions/{id}/actions/send_chat">$client->meetingSessions->actions-><a href="./src/Services/MeetingSessions/ActionsService.php">sendChat</a>(...$params)</code>
- <code title="post /meeting_sessions/{id}/actions/speak">$client->meetingSessions->actions-><a href="./src/Services/MeetingSessions/ActionsService.php">speak</a>(...$params)</code>
- <code title="post /meeting_sessions/{id}/actions/stop_speaking">$client->meetingSessions->actions-><a href="./src/Services/MeetingSessions/ActionsService.php">stopSpeaking</a>(...$params)</code>

## Artifacts

Methods:

- <code title="post /meeting_sessions/{id}/artifacts">$client->meetingSessions->artifacts-><a href="./src/Services/MeetingSessions/ArtifactsService.php">create</a>(...$params)</code>
- <code title="get /meeting_sessions/{id}/artifacts/{artifact_id}">$client->meetingSessions->artifacts-><a href="./src/Services/MeetingSessions/ArtifactsService.php">retrieve</a>(...$params)</code>
- <code title="get /meeting_sessions/{id}/artifacts">$client->meetingSessions->artifacts-><a href="./src/Services/MeetingSessions/ArtifactsService.php">list</a>(...$params)</code>

# ExternalRequirements

## SubNumberOrders

Methods:

- <code title="get /external_requirements/{regulatory_requirement_id}/sub_number_orders/{sub_number_order_id}">$client->externalRequirements->subNumberOrders-><a href="./src/Services/ExternalRequirements/SubNumberOrdersService.php">retrieve</a>(...$params)</code>
- <code title="post /external_requirements/{regulatory_requirement_id}/sub_number_orders/{sub_number_order_id}">$client->externalRequirements->subNumberOrders-><a href="./src/Services/ExternalRequirements/SubNumberOrdersService.php">update</a>(...$params)</code>
