<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type GlobalIPShape from \Telnyx\GlobalIPs\GlobalIP
 *
 * @phpstan-type GlobalIPGetResponseShape = array{
 *   data?: null|GlobalIP|GlobalIPShape
 * }
 */
final class GlobalIPGetResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?GlobalIP $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GlobalIP|GlobalIPShape|null $data
     */
    public static function with(GlobalIP|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param GlobalIP|GlobalIPShape $data
     */
    public function withData(GlobalIP|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
