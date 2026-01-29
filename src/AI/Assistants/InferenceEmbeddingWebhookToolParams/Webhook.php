<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams;

use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\BodyParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Header;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Method;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\PathParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\QueryParameters;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BodyParametersShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\BodyParameters
 * @phpstan-import-type HeaderShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Header
 * @phpstan-import-type PathParametersShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\PathParameters
 * @phpstan-import-type QueryParametersShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\QueryParameters
 *
 * @phpstan-type WebhookShape = array{
 *   description: string,
 *   name: string,
 *   url: string,
 *   async?: bool|null,
 *   bodyParameters?: null|BodyParameters|BodyParametersShape,
 *   headers?: list<Header|HeaderShape>|null,
 *   method?: null|Method|value-of<Method>,
 *   pathParameters?: null|PathParameters|PathParametersShape,
 *   queryParameters?: null|QueryParameters|QueryParametersShape,
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
     * The query parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the query of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    #[Optional('query_parameters')]
    public ?QueryParameters $queryParameters;

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
     * @param Method|value-of<Method>|null $method
     * @param PathParameters|PathParametersShape|null $pathParameters
     * @param QueryParameters|QueryParametersShape|null $queryParameters
     */
    public static function with(
        string $description,
        string $name,
        string $url,
        ?bool $async = null,
        BodyParameters|array|null $bodyParameters = null,
        ?array $headers = null,
        Method|string|null $method = null,
        PathParameters|array|null $pathParameters = null,
        QueryParameters|array|null $queryParameters = null,
        ?int $timeoutMs = null,
    ): self {
        $self = new self;

        $self['description'] = $description;
        $self['name'] = $name;
        $self['url'] = $url;

        null !== $async && $self['async'] = $async;
        null !== $bodyParameters && $self['bodyParameters'] = $bodyParameters;
        null !== $headers && $self['headers'] = $headers;
        null !== $method && $self['method'] = $method;
        null !== $pathParameters && $self['pathParameters'] = $pathParameters;
        null !== $queryParameters && $self['queryParameters'] = $queryParameters;
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
     * The maximum number of milliseconds to wait for the webhook to respond. Only applicable when async is false.
     */
    public function withTimeoutMs(int $timeoutMs): self
    {
        $self = clone $this;
        $self['timeoutMs'] = $timeoutMs;

        return $self;
    }
}
