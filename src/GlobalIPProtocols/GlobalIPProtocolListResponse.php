<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPProtocols;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPProtocols\GlobalIPProtocolListResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\GlobalIPProtocols\GlobalIPProtocolListResponse\Data
 *
 * @phpstan-type GlobalIPProtocolListResponseShape = array{
 *   data?: list<DataShape>|null
 * }
 */
final class GlobalIPProtocolListResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPProtocolListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<DataShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
