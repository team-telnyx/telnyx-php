<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type HeaderShape = array{name?: string|null, value?: string|null}
 */
final class Header implements BaseModel
{
    /** @use SdkModel<HeaderShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * The value of the header. Note that we support mustache templating for the value. For example you can use `Bearer {{#integration_secret}}test-secret{{/integration_secret}}` to pass the value of the integration secret as the bearer token. [Telnyx signature headers](https://developers.telnyx.com/docs/voice/programmable-voice/voice-api-webhooks) will be automatically added to the request.
     */
    #[Api(optional: true)]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $name = null, ?string $value = null): self
    {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The value of the header. Note that we support mustache templating for the value. For example you can use `Bearer {{#integration_secret}}test-secret{{/integration_secret}}` to pass the value of the integration secret as the bearer token. [Telnyx signature headers](https://developers.telnyx.com/docs/voice/programmable-voice/voice-api-webhooks) will be automatically added to the request.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
