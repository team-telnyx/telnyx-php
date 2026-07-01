<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthChecks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type GlobalIPHealthCheckShape from \Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheck
 *
 * @phpstan-type GlobalIPHealthCheckDeleteResponseShape = array{
 *   data?: null|GlobalIPHealthCheck|GlobalIPHealthCheckShape
 * }
 */
final class GlobalIPHealthCheckDeleteResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPHealthCheckDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?GlobalIPHealthCheck $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GlobalIPHealthCheck|GlobalIPHealthCheckShape|null $data
     */
    public static function with(GlobalIPHealthCheck|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param GlobalIPHealthCheck|GlobalIPHealthCheckShape $data
     */
    public function withData(GlobalIPHealthCheck|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
