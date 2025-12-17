<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallControlApplicationShape from \Telnyx\CallControlApplications\CallControlApplication
 *
 * @phpstan-type CallControlApplicationUpdateResponseShape = array{
 *   data?: null|CallControlApplication|CallControlApplicationShape
 * }
 */
final class CallControlApplicationUpdateResponse implements BaseModel
{
    /** @use SdkModel<CallControlApplicationUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CallControlApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallControlApplication|CallControlApplicationShape|null $data
     */
    public static function with(CallControlApplication|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallControlApplication|CallControlApplicationShape $data
     */
    public function withData(CallControlApplication|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
