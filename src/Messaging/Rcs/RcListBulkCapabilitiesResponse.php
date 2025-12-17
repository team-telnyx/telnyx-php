<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RcsCapabilitiesShape from \Telnyx\Messaging\Rcs\RcsCapabilities
 *
 * @phpstan-type RcListBulkCapabilitiesResponseShape = array{
 *   data?: list<RcsCapabilitiesShape>|null
 * }
 */
final class RcListBulkCapabilitiesResponse implements BaseModel
{
    /** @use SdkModel<RcListBulkCapabilitiesResponseShape> */
    use SdkModel;

    /** @var list<RcsCapabilities>|null $data */
    #[Optional(list: RcsCapabilities::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RcsCapabilitiesShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<RcsCapabilitiesShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
