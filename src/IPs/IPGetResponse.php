<?php

declare(strict_types=1);

namespace Telnyx\IPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IPShape from \Telnyx\IPs\IP
 *
 * @phpstan-type IPGetResponseShape = array{data?: null|IP|IPShape}
 */
final class IPGetResponse implements BaseModel
{
    /** @use SdkModel<IPGetResponseShape> */
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
     * @param IP|IPShape|null $data
     */
    public static function with(IP|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param IP|IPShape $data
     */
    public function withData(IP|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
