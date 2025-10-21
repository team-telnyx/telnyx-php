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
 * @see Telnyx\PhoneNumberBlocks\Jobs->deletePhoneNumberBlock
 *
 * @phpstan-type job_delete_phone_number_block_params = array{
 *   phoneNumberBlockID: string
 * }
 */
final class JobDeletePhoneNumberBlockParams implements BaseModel
{
    /** @use SdkModel<job_delete_phone_number_block_params> */
    use SdkModel;
    use SdkParams;

    #[Api('phone_number_block_id')]
    public string $phoneNumberBlockID;

    /**
     * `new JobDeletePhoneNumberBlockParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobDeletePhoneNumberBlockParams::with(phoneNumberBlockID: ...)
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
    public static function with(string $phoneNumberBlockID): self
    {
        $obj = new self;

        $obj->phoneNumberBlockID = $phoneNumberBlockID;

        return $obj;
    }

    public function withPhoneNumberBlockID(string $phoneNumberBlockID): self
    {
        $obj = clone $this;
        $obj->phoneNumberBlockID = $phoneNumberBlockID;

        return $obj;
    }
}
