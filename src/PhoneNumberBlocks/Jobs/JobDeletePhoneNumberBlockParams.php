<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new background job to delete all the phone numbers associated with the given block. We will only consider the phone number block as deleted after all phone numbers associated with it are removed, so multiple executions of this job may be necessary in case some of the phone numbers present errors during the deletion process.
 *
 * @see Telnyx\Services\PhoneNumberBlocks\JobsService::deletePhoneNumberBlock()
 *
 * @phpstan-type JobDeletePhoneNumberBlockParamsShape = array{
 *   phone_number_block_id: string
 * }
 */
final class JobDeletePhoneNumberBlockParams implements BaseModel
{
    /** @use SdkModel<JobDeletePhoneNumberBlockParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $phone_number_block_id;

    /**
     * `new JobDeletePhoneNumberBlockParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobDeletePhoneNumberBlockParams::with(phone_number_block_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JobDeletePhoneNumberBlockParams)->withPhoneNumberBlockID(...)
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
     */
    public static function with(string $phone_number_block_id): self
    {
        $obj = new self;

        $obj->phone_number_block_id = $phone_number_block_id;

        return $obj;
    }

    public function withPhoneNumberBlockID(string $phoneNumberBlockID): self
    {
        $obj = clone $this;
        $obj->phone_number_block_id = $phoneNumberBlockID;

        return $obj;
    }
}
