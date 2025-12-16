<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RcsCapabilitiesShape from \Telnyx\Messaging\Rcs\RcsCapabilities
 *
 * @phpstan-type RcGetCapabilitiesResponseShape = array{
 *   data?: null|RcsCapabilities|RcsCapabilitiesShape
 * }
 */
final class RcGetCapabilitiesResponse implements BaseModel
{
    /** @use SdkModel<RcGetCapabilitiesResponseShape> */
    use SdkModel;

    #[Optional]
    public ?RcsCapabilities $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RcsCapabilitiesShape $data
     */
    public static function with(RcsCapabilities|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RcsCapabilitiesShape $data
     */
    public function withData(RcsCapabilities|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
