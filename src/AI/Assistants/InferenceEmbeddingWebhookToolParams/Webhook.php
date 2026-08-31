<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams;

use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\BodyParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Header;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Message;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Method;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\PathParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\QueryParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\StoreFieldsAsVariable;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MessageVariants from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Message
 * @phpstan-import-type BodyParametersShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\BodyParameters
 * @phpstan-import-type HeaderShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Header
 * @phpstan-import-type MessageShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Message
 * @phpstan-import-type PathParametersShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\PathParameters
 * @phpstan-import-type QueryParametersShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\QueryParameters
 * @phpstan-import-type StoreFieldsAsVariableShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\StoreFieldsAsVariable
 *
 * @phpstan-type WebhookShape = array{
 *   description: string,
 *   name: string,
 *   url: string,
 *   async?: bool|null,
 *   asyncTimeoutMs?: int|null,
 *   bodyParameters?: null|BodyParameters|BodyParametersShape,
 *   headers?: list<Header|HeaderShape>|null,
 *   messages?: list<MessageShape>|null,
 *   method?: null|Method|value-of<Method>,
 *   pathParameters?: null|PathParameters|PathParametersShape,
 *   presetBodyFields?: array<string,mixed>|null,
 *   presetQueryParams?: array<string,mixed>|null,
 *   queryParameters?: null|QueryParameters|QueryParametersShape,
 *   storeFieldsAsVariables?: list<StoreFieldsAsVariable|StoreFieldsAsVariableShape>|null,
 *   timeoutMs?: int|null,
 * }
 */
final class Webhook implements BaseModel
{
    /** @use SdkModel<WebhookShape> */
    use SdkModel;

    /**
     * The description of the tool.
     */
    #[Required]
    public string $description;

    /**
     * The name of the tool.
     */
    #[Required]
    public string $name;

    /**
     * The URL of the external tool to be called. This URL is going to be used by the assistant. The URL can be templated like: `https://example.com/api/v1/{id}`, where `{id}` is a placeholder for a value that will be provided by the assistant if `path_parameters` are provided with the `id` attribute.
     */
    #[Required]
    public string $url;

    /**
     * If async, the assistant will move forward without waiting for your server to respond.
     */
    #[Optional]
    public ?bool $async;

    /**
     * Maximum time in milliseconds that the conversation worker waits for an async webhook response before returning "Submitted" to the LLM. If unset, the platform default (currently 300ms) is used.
     */
    #[Optional('async_timeout_ms')]
    public ?int $asyncTimeoutMs;

    /**
     * The body parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the body of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    #[Optional('body_parameters')]
    public ?BodyParameters $bodyParameters;

    /**
     * The headers to be sent to the external tool.
     *
     * @var list<Header>|null $headers
     */
    #[Optional(list: Header::class)]
    public ?array $headers;

    /**
     * Filler messages spoken while a synchronous webhook request is in progress. `request_start` messages are spoken immediately when the request begins. `request_response_delayed` messages are spoken after `timing_ms` has elapsed only if the webhook response is still pending. Filler messages are not used for asynchronous webhooks.
     *
     * @var list<MessageVariants>|null $messages
     */
    #[Optional(list: Message::class)]
    public ?array $messages;

    /**
     * The HTTP method to be used when calling the external tool.
     *
     * @var value-of<Method>|null $method
     */
    #[Optional(enum: Method::class)]
    public ?string $method;

    /**
     * The path parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the path of the request if the URL contains a placeholder for a value. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    #[Optional('path_parameters')]
    public ?PathParameters $pathParameters;

    /**
     * Body fields supplied by the assistant configuration rather than by the model. They are never advertised in the tool definition, so the LLM can neither see nor set them, and they take precedence over a `body_parameters` value of the same name. Values support mustache templating, so they can hold dynamic variables (`{{customer_id}}`) and integration secrets (`{{#integration_secret}}my-secret{{/integration_secret}}`). Not sent on `GET` requests, which carry no body.
     *
     * @var array<string,mixed>|null $presetBodyFields
     */
    #[Optional('preset_body_fields', map: 'mixed')]
    public ?array $presetBodyFields;

    /**
     * Query string parameters supplied by the assistant configuration rather than by the model. They are never advertised in the tool definition, so the LLM can neither see nor set them, and they take precedence over a `query_parameters` value of the same name. Values support mustache templating, so they can hold dynamic variables (`{{telnyx_end_user_target}}`) and integration secrets (`{{#integration_secret}}my-secret{{/integration_secret}}`). Unlike values templated directly into the `url`, these are percent-encoded, so a value such as `+15551234567` survives the round trip.
     *
     * @var array<string,mixed>|null $presetQueryParams
     */
    #[Optional('preset_query_params', map: 'mixed')]
    public ?array $presetQueryParams;

    /**
     * The query parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the query of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    #[Optional('query_parameters')]
    public ?QueryParameters $queryParameters;

    /**
     * A list of mappings that extract values from the webhook response and store them as dynamic variables. Each mapping specifies a dynamic variable name and a dot-notation path to the value in the response body.
     *
     * @var list<StoreFieldsAsVariable>|null $storeFieldsAsVariables
     */
    #[Optional('store_fields_as_variables', list: StoreFieldsAsVariable::class)]
    public ?array $storeFieldsAsVariables;

    /**
     * The maximum number of milliseconds to wait for the webhook to respond. Only applicable when async is false.
     */
    #[Optional('timeout_ms')]
    public ?int $timeoutMs;

    /**
     * `new Webhook()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Webhook::with(description: ..., name: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Webhook)->withDescription(...)->withName(...)->withURL(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BodyParameters|BodyParametersShape|null $bodyParameters
     * @param list<Header|HeaderShape>|null $headers
     * @param list<MessageShape>|null $messages
     * @param Method|value-of<Method>|null $method
     * @param PathParameters|PathParametersShape|null $pathParameters
     * @param array<string,mixed>|null $presetBodyFields
     * @param array<string,mixed>|null $presetQueryParams
     * @param QueryParameters|QueryParametersShape|null $queryParameters
     * @param list<StoreFieldsAsVariable|StoreFieldsAsVariableShape>|null $storeFieldsAsVariables
     */
    public static function with(
        string $description,
        string $name,
        string $url,
        ?bool $async = null,
        ?int $asyncTimeoutMs = null,
        BodyParameters|array|null $bodyParameters = null,
        ?array $headers = null,
        ?array $messages = null,
        Method|string|null $method = null,
        PathParameters|array|null $pathParameters = null,
        ?array $presetBodyFields = null,
        ?array $presetQueryParams = null,
        QueryParameters|array|null $queryParameters = null,
        ?array $storeFieldsAsVariables = null,
        ?int $timeoutMs = null,
    ): self {
        $self = new self;

        $self['description'] = $description;
        $self['name'] = $name;
        $self['url'] = $url;

        null !== $async && $self['async'] = $async;
        null !== $asyncTimeoutMs && $self['asyncTimeoutMs'] = $asyncTimeoutMs;
        null !== $bodyParameters && $self['bodyParameters'] = $bodyParameters;
        null !== $headers && $self['headers'] = $headers;
        null !== $messages && $self['messages'] = $messages;
        null !== $method && $self['method'] = $method;
        null !== $pathParameters && $self['pathParameters'] = $pathParameters;
        null !== $presetBodyFields && $self['presetBodyFields'] = $presetBodyFields;
        null !== $presetQueryParams && $self['presetQueryParams'] = $presetQueryParams;
        null !== $queryParameters && $self['queryParameters'] = $queryParameters;
        null !== $storeFieldsAsVariables && $self['storeFieldsAsVariables'] = $storeFieldsAsVariables;
        null !== $timeoutMs && $self['timeoutMs'] = $timeoutMs;

        return $self;
    }

    /**
     * The description of the tool.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The name of the tool.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The URL of the external tool to be called. This URL is going to be used by the assistant. The URL can be templated like: `https://example.com/api/v1/{id}`, where `{id}` is a placeholder for a value that will be provided by the assistant if `path_parameters` are provided with the `id` attribute.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * If async, the assistant will move forward without waiting for your server to respond.
     */
    public function withAsync(bool $async): self
    {
        $self = clone $this;
        $self['async'] = $async;

        return $self;
    }

    /**
     * Maximum time in milliseconds that the conversation worker waits for an async webhook response before returning "Submitted" to the LLM. If unset, the platform default (currently 300ms) is used.
     */
    public function withAsyncTimeoutMs(int $asyncTimeoutMs): self
    {
        $self = clone $this;
        $self['asyncTimeoutMs'] = $asyncTimeoutMs;

        return $self;
    }

    /**
     * The body parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the body of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     *
     * @param BodyParameters|BodyParametersShape $bodyParameters
     */
    public function withBodyParameters(
        BodyParameters|array $bodyParameters
    ): self {
        $self = clone $this;
        $self['bodyParameters'] = $bodyParameters;

        return $self;
    }

    /**
     * The headers to be sent to the external tool.
     *
     * @param list<Header|HeaderShape> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    /**
     * Filler messages spoken while a synchronous webhook request is in progress. `request_start` messages are spoken immediately when the request begins. `request_response_delayed` messages are spoken after `timing_ms` has elapsed only if the webhook response is still pending. Filler messages are not used for asynchronous webhooks.
     *
     * @param list<MessageShape> $messages
     */
    public function withMessages(array $messages): self
    {
        $self = clone $this;
        $self['messages'] = $messages;

        return $self;
    }

    /**
     * The HTTP method to be used when calling the external tool.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $self = clone $this;
        $self['method'] = $method;

        return $self;
    }

    /**
     * The path parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the path of the request if the URL contains a placeholder for a value. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     *
     * @param PathParameters|PathParametersShape $pathParameters
     */
    public function withPathParameters(
        PathParameters|array $pathParameters
    ): self {
        $self = clone $this;
        $self['pathParameters'] = $pathParameters;

        return $self;
    }

    /**
     * Body fields supplied by the assistant configuration rather than by the model. They are never advertised in the tool definition, so the LLM can neither see nor set them, and they take precedence over a `body_parameters` value of the same name. Values support mustache templating, so they can hold dynamic variables (`{{customer_id}}`) and integration secrets (`{{#integration_secret}}my-secret{{/integration_secret}}`). Not sent on `GET` requests, which carry no body.
     *
     * @param array<string,mixed> $presetBodyFields
     */
    public function withPresetBodyFields(array $presetBodyFields): self
    {
        $self = clone $this;
        $self['presetBodyFields'] = $presetBodyFields;

        return $self;
    }

    /**
     * Query string parameters supplied by the assistant configuration rather than by the model. They are never advertised in the tool definition, so the LLM can neither see nor set them, and they take precedence over a `query_parameters` value of the same name. Values support mustache templating, so they can hold dynamic variables (`{{telnyx_end_user_target}}`) and integration secrets (`{{#integration_secret}}my-secret{{/integration_secret}}`). Unlike values templated directly into the `url`, these are percent-encoded, so a value such as `+15551234567` survives the round trip.
     *
     * @param array<string,mixed> $presetQueryParams
     */
    public function withPresetQueryParams(array $presetQueryParams): self
    {
        $self = clone $this;
        $self['presetQueryParams'] = $presetQueryParams;

        return $self;
    }

    /**
     * The query parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the query of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     *
     * @param QueryParameters|QueryParametersShape $queryParameters
     */
    public function withQueryParameters(
        QueryParameters|array $queryParameters
    ): self {
        $self = clone $this;
        $self['queryParameters'] = $queryParameters;

        return $self;
    }

    /**
     * A list of mappings that extract values from the webhook response and store them as dynamic variables. Each mapping specifies a dynamic variable name and a dot-notation path to the value in the response body.
     *
     * @param list<StoreFieldsAsVariable|StoreFieldsAsVariableShape> $storeFieldsAsVariables
     */
    public function withStoreFieldsAsVariables(
        array $storeFieldsAsVariables
    ): self {
        $self = clone $this;
        $self['storeFieldsAsVariables'] = $storeFieldsAsVariables;

        return $self;
    }

    /**
     * The maximum number of milliseconds to wait for the webhook to respond. Only applicable when async is false.
     */
    public function withTimeoutMs(int $timeoutMs): self
    {
        $self = clone $this;
        $self['timeoutMs'] = $timeoutMs;

        return $self;
    }
}
