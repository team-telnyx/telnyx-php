<?php

declare(strict_types=1);

namespace Telnyx\Networks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NetworkShape from \Telnyx\Networks\Network
 *
 * @phpstan-type NetworkNewResponseShape = array{data?: null|Network|NetworkShape}
 */
final class NetworkNewResponse implements BaseModel
{
    /** @use SdkModel<NetworkNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Network $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Network|NetworkShape|null $data
     */
    public static function with(Network|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Network|NetworkShape $data
     */
    public function withData(Network|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
