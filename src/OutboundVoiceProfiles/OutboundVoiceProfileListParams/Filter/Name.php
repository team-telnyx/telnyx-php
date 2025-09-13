<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Name filtering operations.
 *
 * @phpstan-type name_alias = array{contains?: string}
 */
final class Name implements BaseModel
{
    /** @use SdkModel<name_alias> */
    use SdkModel;

    /**
     * Optional filter on outbound voice profile name.
     */
    #[Api(optional: true)]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $contains = null): self
    {
        $obj = new self;

        null !== $contains && $obj->contains = $contains;

        return $obj;
    }

    /**
     * Optional filter on outbound voice profile name.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }
}
