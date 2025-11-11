<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\BodyParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Header;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Method;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\PathParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\QueryParameters;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InferenceEmbeddingWebhookToolParamsShape = array{
 *   description: string,
 *   name: string,
 *   url: string,
 *   body_parameters?: BodyParameters|null,
 *   headers?: list<Header>|null,
 *   method?: value-of<Method>|null,
 *   path_parameters?: PathParameters|null,
 *   query_parameters?: QueryParameters|null,
 * }
 */
final class InferenceEmbeddingWebhookToolParams implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingWebhookToolParamsShape> */
    use SdkModel;

    /**
     * The description of the tool.
     */
    #[Api]
    public string $description;

    /**
     * The name of the tool.
     */
    #[Api]
    public string $name;

    /**
     * The URL of the external tool to be called. This URL is going to be used by the assistant. The URL can be templated like: `https://example.com/api/v1/{id}`, where `{id}` is a placeholder for a value that will be provided by the assistant if `path_parameters` are provided with the `id` attribute.
     */
    #[Api]
    public string $url;

    /**
     * The body parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the body of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    #[Api(optional: true)]
    public ?BodyParameters $body_parameters;

    /**
     * The headers to be sent to the external tool.
     *
     * @var list<Header>|null $headers
     */
    #[Api(list: Header::class, optional: true)]
    public ?array $headers;

    /**
     * The HTTP method to be used when calling the external tool.
     *
     * @var value-of<Method>|null $method
     */
    #[Api(enum: Method::class, optional: true)]
    public ?string $method;

    /**
     * The path parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the path of the request if the URL contains a placeholder for a value. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    #[Api(optional: true)]
    public ?PathParameters $path_parameters;

    /**
     * The query parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the query of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    #[Api(optional: true)]
    public ?QueryParameters $query_parameters;

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
     * @param list<Header> $headers
     * @param Method|value-of<Method> $method
     */
    public static function with(
        string $description,
        string $name,
        string $url,
        ?BodyParameters $body_parameters = null,
        ?array $headers = null,
        Method|string|null $method = null,
        ?PathParameters $path_parameters = null,
        ?QueryParameters $query_parameters = null,
    ): self {
        $obj = new self;

        $obj->description = $description;
        $obj->name = $name;
        $obj->url = $url;

        null !== $body_parameters && $obj->body_parameters = $body_parameters;
        null !== $headers && $obj->headers = $headers;
        null !== $method && $obj['method'] = $method;
        null !== $path_parameters && $obj->path_parameters = $path_parameters;
        null !== $query_parameters && $obj->query_parameters = $query_parameters;

        return $obj;
    }

    /**
     * The description of the tool.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * The name of the tool.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The URL of the external tool to be called. This URL is going to be used by the assistant. The URL can be templated like: `https://example.com/api/v1/{id}`, where `{id}` is a placeholder for a value that will be provided by the assistant if `path_parameters` are provided with the `id` attribute.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * The body parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the body of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    public function withBodyParameters(BodyParameters $bodyParameters): self
    {
        $obj = clone $this;
        $obj->body_parameters = $bodyParameters;

        return $obj;
    }

    /**
     * The headers to be sent to the external tool.
     *
     * @param list<Header> $headers
     */
    public function withHeaders(array $headers): self
    {
        $obj = clone $this;
        $obj->headers = $headers;

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
     */
    public function withPathParameters(PathParameters $pathParameters): self
    {
        $obj = clone $this;
        $obj->path_parameters = $pathParameters;

        return $obj;
    }

    /**
     * The query parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the query of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    public function withQueryParameters(QueryParameters $queryParameters): self
    {
        $obj = clone $this;
        $obj->query_parameters = $queryParameters;

        return $obj;
    }
}
