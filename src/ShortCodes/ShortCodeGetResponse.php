<?php

declare(strict_types=1);

namespace Telnyx\ShortCodes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ShortCode;

/**
 * @phpstan-import-type ShortCodeShape from \Telnyx\ShortCode
 *
 * @phpstan-type ShortCodeGetResponseShape = array{
 *   data?: null|ShortCode|ShortCodeShape
 * }
 */
final class ShortCodeGetResponse implements BaseModel
{
    /** @use SdkModel<ShortCodeGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ShortCode $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ShortCode|ShortCodeShape|null $data
     */
    public static function with(ShortCode|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ShortCode|ShortCodeShape $data
     */
    public function withData(ShortCode|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
