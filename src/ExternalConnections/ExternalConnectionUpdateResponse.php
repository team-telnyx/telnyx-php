<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalConnectionShape from \Telnyx\ExternalConnections\ExternalConnection
 *
 * @phpstan-type ExternalConnectionUpdateResponseShape = array{
 *   data?: null|ExternalConnection|ExternalConnectionShape
 * }
 */
final class ExternalConnectionUpdateResponse implements BaseModel
{
    /** @use SdkModel<ExternalConnectionUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ExternalConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExternalConnectionShape $data
     */
    public static function with(ExternalConnection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ExternalConnectionShape $data
     */
    public function withData(ExternalConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
