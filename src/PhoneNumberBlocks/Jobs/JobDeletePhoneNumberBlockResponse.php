<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type job_delete_phone_number_block_response = array{data?: Job}
 */
final class JobDeletePhoneNumberBlockResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<job_delete_phone_number_block_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?Job $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Job $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(Job $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
