<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingWebhookTool\Webhook;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WebhookShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingWebhookTool\Webhook
 *
 * @phpstan-type InferenceEmbeddingWebhookToolShape = array{
 *   type: 'webhook', webhook: Webhook|WebhookShape
 * }
 */
final class InferenceEmbeddingWebhookTool implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingWebhookToolShape> */
    use SdkModel;

    /** @var 'webhook' $type */
    #[Required]
    public string $type = 'webhook';

    #[Required]
    public Webhook $webhook;

    /**
     * `new InferenceEmbeddingWebhookTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbeddingWebhookTool::with(webhook: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InferenceEmbeddingWebhookTool)->withWebhook(...)
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
     * @param Webhook|WebhookShape $webhook
     */
    public static function with(Webhook|array $webhook): self
    {
        $self = new self;

        $self['webhook'] = $webhook;

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
}
