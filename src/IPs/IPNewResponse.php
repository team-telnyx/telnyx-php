<?php

declare(strict_types=1);

namespace Telnyx\IPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IPShape from \Telnyx\IPs\IP
 *
 * @phpstan-type IPNewResponseShape = array{data?: null|IP|IPShape}
 */
final class IPNewResponse implements BaseModel
{
    /** @use SdkModel<IPNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?IP $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IPShape $data
     */
    public static function with(IP|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param IPShape $data
     */
    public function withData(IP|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
