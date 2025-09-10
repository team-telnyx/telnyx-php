<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer;

use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\SipHeader\Name;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type sip_header = array{
 *   name?: value-of<Name>|null, value?: string|null
 * }
 */
final class SipHeader implements BaseModel
{
    /** @use SdkModel<sip_header> */
    use SdkModel;

    /** @var value-of<Name>|null $name */
    #[Api(enum: Name::class, optional: true)]
    public ?string $name;

    /**
     * The value of the header. Note that we support mustache templating for the value. For example you can use `{{#integration_secret}}test-secret{{/integration_secret}}` to pass the value of the integration secret.
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
     *
     * @param Name|value-of<Name> $name
     */
    public static function with(
        Name|string|null $name = null,
        ?string $value = null
    ): self {
        $obj = new self;

        null !== $name && $obj->name = $name instanceof Name ? $name->value : $name;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * @param Name|value-of<Name> $name
     */
    public function withName(Name|string $name): self
    {
        $obj = clone $this;
        $obj->name = $name instanceof Name ? $name->value : $name;

        return $obj;
    }

    /**
     * The value of the header. Note that we support mustache templating for the value. For example you can use `{{#integration_secret}}test-secret{{/integration_secret}}` to pass the value of the integration secret.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
