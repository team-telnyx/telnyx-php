<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\BodyParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\BodyParameters\Type;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Header;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Method;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\PathParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\QueryParameters;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InferenceEmbeddingWebhookToolParamsShape = array{
 *   description: string,
 *   name: string,
 *   url: string,
 *   bodyParameters?: BodyParameters|null,
 *   headers?: list<Header>|null,
 *   method?: value-of<Method>|null,
 *   pathParameters?: PathParameters|null,
 *   queryParameters?: QueryParameters|null,
 * }
 */
final class InferenceEmbeddingWebhookToolParams implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingWebhookToolParamsShape> */
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
     * `new InferenceEmbeddingWebhookToolParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbeddingWebhookToolParams::with(description: ..., name: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InferenceEmbeddingWebhookToolParams)
     *   ->withDescription(...)
     *   ->withName(...)
     *   ->withURL(...)
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
     * @param BodyParameters|array{
     *   properties?: array<string,mixed>|null,
     *   required?: list<string>|null,
     *   type?: value-of<Type>|null,
     * } $bodyParameters
     * @param list<Header|array{name?: string|null, value?: string|null}> $headers
     * @param Method|value-of<Method> $method
     * @param PathParameters|array{
     *   properties?: array<string,mixed>|null,
     *   required?: list<string>|null,
     *   type?: value-of<PathParameters\Type>|null,
     * } $pathParameters
     * @param QueryParameters|array{
     *   properties?: array<string,mixed>|null,
     *   required?: list<string>|null,
     *   type?: value-of<QueryParameters\Type>|null,
     * } $queryParameters
     */
    public static function with(
        string $description,
        string $name,
        string $url,
        BodyParameters|array|null $bodyParameters = null,
        ?array $headers = null,
        Method|string|null $method = null,
        PathParameters|array|null $pathParameters = null,
        QueryParameters|array|null $queryParameters = null,
    ): self {
        $obj = new self;

        $obj['description'] = $description;
        $obj['name'] = $name;
        $obj['url'] = $url;

        null !== $bodyParameters && $obj['bodyParameters'] = $bodyParameters;
        null !== $headers && $obj['headers'] = $headers;
        null !== $method && $obj['method'] = $method;
        null !== $pathParameters && $obj['pathParameters'] = $pathParameters;
        null !== $queryParameters && $obj['queryParameters'] = $queryParameters;

        return $obj;
    }

    /**
     * The description of the tool.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * The name of the tool.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The URL of the external tool to be called. This URL is going to be used by the assistant. The URL can be templated like: `https://example.com/api/v1/{id}`, where `{id}` is a placeholder for a value that will be provided by the assistant if `path_parameters` are provided with the `id` attribute.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }

    /**
     * The body parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the body of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     *
     * @param BodyParameters|array{
     *   properties?: array<string,mixed>|null,
     *   required?: list<string>|null,
     *   type?: value-of<Type>|null,
     * } $bodyParameters
     */
    public function withBodyParameters(
        BodyParameters|array $bodyParameters
    ): self {
        $obj = clone $this;
        $obj['bodyParameters'] = $bodyParameters;

        return $obj;
    }

    /**
     * The headers to be sent to the external tool.
     *
     * @param list<Header|array{name?: string|null, value?: string|null}> $headers
     */
    public function withHeaders(array $headers): self
    {
        $obj = clone $this;
        $obj['headers'] = $headers;

        return $obj;
    }

    /**
     * The HTTP method to be used when calling the external tool.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $obj = clone $this;
        $obj['method'] = $method;

        return $obj;
    }

    /**
     * The path parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the path of the request if the URL contains a placeholder for a value. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     *
     * @param PathParameters|array{
     *   properties?: array<string,mixed>|null,
     *   required?: list<string>|null,
     *   type?: value-of<PathParameters\Type>|null,
     * } $pathParameters
     */
    public function withPathParameters(
        PathParameters|array $pathParameters
    ): self {
        $obj = clone $this;
        $obj['pathParameters'] = $pathParameters;

        return $obj;
    }

    /**
     * The query parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the query of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     *
     * @param QueryParameters|array{
     *   properties?: array<string,mixed>|null,
     *   required?: list<string>|null,
     *   type?: value-of<QueryParameters\Type>|null,
     * } $queryParameters
     */
    public function withQueryParameters(
        QueryParameters|array $queryParameters
    ): self {
        $obj = clone $this;
        $obj['queryParameters'] = $queryParameters;

        return $obj;
    }
}
