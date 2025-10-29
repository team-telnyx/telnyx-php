<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists conference recordings.
 *
 * @see Telnyx\Texml\Accounts\Conferences->retrieveRecordings
 *
 * @phpstan-type ConferenceRetrieveRecordingsParamsShape = array{
 *   accountSid: string
 * }
 */
final class ConferenceRetrieveRecordingsParams implements BaseModel
{
    /** @use SdkModel<ConferenceRetrieveRecordingsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    /**
     * `new ConferenceRetrieveRecordingsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceRetrieveRecordingsParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceRetrieveRecordingsParams)->withAccountSid(...)
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
    public static function with(string $accountSid): self
    {
        $obj = new self;

        $obj->accountSid = $accountSid;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }
}
