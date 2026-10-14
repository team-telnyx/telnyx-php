<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\CallingRouting;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallingRoutingDataShape from \Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingData
 *
 * @phpstan-type CallingRoutingListResponseShape = array{
 *   data: CallingRoutingData|CallingRoutingDataShape
 * }
 */
final class CallingRoutingListResponse implements BaseModel
{
    /** @use SdkModel<CallingRoutingListResponseShape> */
    use SdkModel;

    #[Required]
    public CallingRoutingData $data;

    /**
     * `new CallingRoutingListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallingRoutingListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallingRoutingListResponse)->withData(...)
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
     * @param CallingRoutingData|CallingRoutingDataShape $data
     */
    public static function with(CallingRoutingData|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallingRoutingData|CallingRoutingDataShape $data
     */
    public function withData(CallingRoutingData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
