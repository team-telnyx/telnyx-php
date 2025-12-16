<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SimCardShape from \Telnyx\SimCards\SimCard
 *
 * @phpstan-type SimCardGetResponseShape = array{data?: null|SimCard|SimCardShape}
 */
final class SimCardGetResponse implements BaseModel
{
    /** @use SdkModel<SimCardGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?SimCard $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCardShape $data
     */
    public static function with(SimCard|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param SimCardShape $data
     */
    public function withData(SimCard|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
