<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\BodyParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Header;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Method;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\PathParameters;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\QueryParameters;
use Telnyx\AI\Assistants\WebhookTool\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookToolShape = array{
 *   type: value-of<Type>, webhook: InferenceEmbeddingWebhookToolParams
 * }
 */
final class WebhookTool implements BaseModel
{
    /** @use SdkModel<WebhookToolShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
    public InferenceEmbeddingWebhookToolParams $webhook;

    /**
     * `new WebhookTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookTool::with(type: ..., webhook: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookTool)->withType(...)->withWebhook(...)
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
     * @param Type|value-of<Type> $type
     * @param InferenceEmbeddingWebhookToolParams|array{
     *   description: string,
     *   name: string,
     *   url: string,
     *   bodyParameters?: BodyParameters|null,
     *   headers?: list<Header>|null,
     *   method?: value-of<Method>|null,
     *   pathParameters?: PathParameters|null,
     *   queryParameters?: QueryParameters|null,
     * } $webhook
     */
    public static function with(
        Type|string $type,
        InferenceEmbeddingWebhookToolParams|array $webhook
    ): self {
        $self = new self;

        $self['type'] = $type;
        $self['webhook'] = $webhook;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param InferenceEmbeddingWebhookToolParams|array{
     *   description: string,
     *   name: string,
     *   url: string,
     *   bodyParameters?: BodyParameters|null,
     *   headers?: list<Header>|null,
     *   method?: value-of<Method>|null,
     *   pathParameters?: PathParameters|null,
     *   queryParameters?: QueryParameters|null,
     * } $webhook
     */
    public function withWebhook(
        InferenceEmbeddingWebhookToolParams|array $webhook
    ): self {
        $self = clone $this;
        $self['webhook'] = $webhook;

        return $self;
    }
}
