<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type customer_service_record_get_response = array{
 *   data?: CustomerServiceRecord
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CustomerServiceRecordGetResponse implements BaseModel
{
    /** @use SdkModel<customer_service_record_get_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CustomerServiceRecord $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?CustomerServiceRecord $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(CustomerServiceRecord $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
