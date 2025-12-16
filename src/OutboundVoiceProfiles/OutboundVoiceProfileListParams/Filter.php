<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Filter\Name;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[name][contains].
 *
 * @phpstan-import-type NameShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Filter\Name
 *
 * @phpstan-type FilterShape = array{name?: null|Name|NameShape}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Name filtering operations.
     */
    #[Optional]
    public ?Name $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NameShape $name
     */
    public static function with(Name|array|null $name = null): self
    {
        $self = new self;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Name filtering operations.
     *
     * @param NameShape $name
     */
    public function withName(Name|array $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
