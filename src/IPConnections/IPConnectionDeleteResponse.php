<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IPConnectionShape from \Telnyx\IPConnections\IPConnection
 *
 * @phpstan-type IPConnectionDeleteResponseShape = array{
 *   data?: null|IPConnection|IPConnectionShape
 * }
 */
final class IPConnectionDeleteResponse implements BaseModel
{
    /** @use SdkModel<IPConnectionDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?IPConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IPConnection|IPConnectionShape|null $data
     */
    public static function with(IPConnection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param IPConnection|IPConnectionShape $data
     */
    public function withData(IPConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
