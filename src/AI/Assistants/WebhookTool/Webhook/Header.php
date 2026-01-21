<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\WebhookTool\Webhook;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type HeaderShape = array{name?: string|null, value?: string|null}
 */
final class Header implements BaseModel
{
    /** @use SdkModel<HeaderShape> */
    use SdkModel;

    #[Optional]
    public ?string $name;

    /**
     * The value of the header. Note that we support mustache templating for the value. For example you can use `Bearer {{#integration_secret}}test-secret{{/integration_secret}}` to pass the value of the integration secret as the bearer token.
     */
    #[Optional]
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
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The value of the header. Note that we support mustache templating for the value. For example you can use `Bearer {{#integration_secret}}test-secret{{/integration_secret}}` to pass the value of the integration secret as the bearer token.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
