<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Filter\Name;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[name][contains].
 *
 * @phpstan-type filter_alias = array{name?: Name}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Name filtering operations.
     */
    #[Api(optional: true)]
    public ?Name $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Name $name = null): self
    {
        $obj = new self;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * Name filtering operations.
     */
    public function withName(Name $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
