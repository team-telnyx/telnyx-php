<?php

declare(strict_types=1);

namespace Telnyx\Messages\Rcs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse\Data;

/**
 * @phpstan-type RcGenerateDeeplinkResponseShape = array{data: Data}
 */
final class RcGenerateDeeplinkResponse implements BaseModel
{
    /** @use SdkModel<RcGenerateDeeplinkResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new RcGenerateDeeplinkResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcGenerateDeeplinkResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RcGenerateDeeplinkResponse)->withData(...)
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
     * @param Data|array{url: string} $data
     */
    public static function with(Data|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{url: string} $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
