<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\WebhookTool\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type webhook_tool = array{
 *   type: value-of<Type>, webhook: InferenceEmbeddingWebhookToolParams
 * }
 */
final class WebhookTool implements BaseModel
{
    /** @use SdkModel<webhook_tool> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
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
     */
    public static function with(
        Type|string $type,
        InferenceEmbeddingWebhookToolParams $webhook
    ): self {
        $obj = new self;

        $obj['type'] = $type;
        $obj->webhook = $webhook;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withWebhook(
        InferenceEmbeddingWebhookToolParams $webhook
    ): self {
        $obj = clone $this;
        $obj->webhook = $webhook;

        return $obj;
    }
}
