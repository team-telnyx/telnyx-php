<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SimCardGroupShape from \Telnyx\SimCardGroups\SimCardGroup
 *
 * @phpstan-type SimCardGroupUpdateResponseShape = array{
 *   data?: null|SimCardGroup|SimCardGroupShape
 * }
 */
final class SimCardGroupUpdateResponse implements BaseModel
{
    /** @use SdkModel<SimCardGroupUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?SimCardGroup $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCardGroupShape $data
     */
    public static function with(SimCardGroup|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param SimCardGroupShape $data
     */
    public function withData(SimCardGroup|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
