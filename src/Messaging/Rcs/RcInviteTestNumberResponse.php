<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Messaging\Rcs\RcInviteTestNumberResponse\Data
 *
 * @phpstan-type RcInviteTestNumberResponseShape = array{data: Data|DataShape}
 */
final class RcInviteTestNumberResponse implements BaseModel
{
    /** @use SdkModel<RcInviteTestNumberResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new RcInviteTestNumberResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcInviteTestNumberResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RcInviteTestNumberResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
