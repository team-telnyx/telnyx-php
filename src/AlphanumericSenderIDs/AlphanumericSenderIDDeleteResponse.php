<?php

declare(strict_types=1);

namespace Telnyx\AlphanumericSenderIDs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AlphanumericSenderIDShape from \Telnyx\AlphanumericSenderIDs\AlphanumericSenderID
 *
 * @phpstan-type AlphanumericSenderIDDeleteResponseShape = array{
 *   data?: null|AlphanumericSenderID|AlphanumericSenderIDShape
 * }
 */
final class AlphanumericSenderIDDeleteResponse implements BaseModel
{
    /** @use SdkModel<AlphanumericSenderIDDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?AlphanumericSenderID $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AlphanumericSenderID|AlphanumericSenderIDShape|null $data
     */
    public static function with(AlphanumericSenderID|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param AlphanumericSenderID|AlphanumericSenderIDShape $data
     */
    public function withData(AlphanumericSenderID|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
