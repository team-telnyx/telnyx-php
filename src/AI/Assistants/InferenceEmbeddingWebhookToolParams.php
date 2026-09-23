<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Type;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WebhookShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook
 *
 * @phpstan-type InferenceEmbeddingWebhookToolParamsShape = array{
 *   type: Type|value-of<Type>, webhook: Webhook|WebhookShape, shared?: bool|null
 * }
 */
final class InferenceEmbeddingWebhookToolParams implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingWebhookToolParamsShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
    public Webhook $webhook;

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

    /**
     * `new InferenceEmbeddingWebhookToolParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbeddingWebhookToolParams::with(type: ..., webhook: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InferenceEmbeddingWebhookToolParams)->withType(...)->withWebhook(...)
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
     * @param Webhook|WebhookShape $webhook
     */
    public static function with(
        Type|string $type,
        Webhook|array $webhook,
        ?bool $shared = null
    ): self {
        $self = new self;

        $self['type'] = $type;
        $self['webhook'] = $webhook;

        null !== $shared && $self['shared'] = $shared;

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
     * @param Webhook|WebhookShape $webhook
     */
    public function withWebhook(Webhook|array $webhook): self
    {
        $self = clone $this;
        $self['webhook'] = $webhook;

        return $self;
    }

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    public function withShared(bool $shared): self
    {
        $self = clone $this;
        $self['shared'] = $shared;

        return $self;
    }
}
