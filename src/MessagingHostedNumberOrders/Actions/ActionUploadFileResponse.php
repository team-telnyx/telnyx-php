<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\MessagingHostedNumberOrder;

/**
 * @phpstan-type action_upload_file_response = array{
 *   data?: MessagingHostedNumberOrder
 * }
 */
final class ActionUploadFileResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<action_upload_file_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?MessagingHostedNumberOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?MessagingHostedNumberOrder $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(MessagingHostedNumberOrder $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
