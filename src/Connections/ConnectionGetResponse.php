<?php

declare(strict_types=1);

namespace Telnyx\Connections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConnectionShape from \Telnyx\Connections\Connection
 *
 * @phpstan-type ConnectionGetResponseShape = array{
 *   data?: null|Connection|ConnectionShape
 * }
 */
final class ConnectionGetResponse implements BaseModel
{
    /** @use SdkModel<ConnectionGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Connection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Connection|ConnectionShape|null $data
     */
    public static function with(Connection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Connection|ConnectionShape $data
     */
    public function withData(Connection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
