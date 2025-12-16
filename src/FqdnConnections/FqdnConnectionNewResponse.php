<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FqdnConnectionShape from \Telnyx\FqdnConnections\FqdnConnection
 *
 * @phpstan-type FqdnConnectionNewResponseShape = array{
 *   data?: null|FqdnConnection|FqdnConnectionShape
 * }
 */
final class FqdnConnectionNewResponse implements BaseModel
{
    /** @use SdkModel<FqdnConnectionNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?FqdnConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FqdnConnectionShape $data
     */
    public static function with(FqdnConnection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param FqdnConnectionShape $data
     */
    public function withData(FqdnConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
