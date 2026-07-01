<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type VirtualCrossConnectCombinedShape from \Telnyx\VirtualCrossConnects\VirtualCrossConnectCombined
 *
 * @phpstan-type VirtualCrossConnectNewResponseShape = array{
 *   data?: null|VirtualCrossConnectCombined|VirtualCrossConnectCombinedShape
 * }
 */
final class VirtualCrossConnectNewResponse implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?VirtualCrossConnectCombined $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VirtualCrossConnectCombined|VirtualCrossConnectCombinedShape|null $data
     */
    public static function with(
        VirtualCrossConnectCombined|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param VirtualCrossConnectCombined|VirtualCrossConnectCombinedShape $data
     */
    public function withData(VirtualCrossConnectCombined|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
