<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\RecordingsJson;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns recordings for a call identified by call_sid.
 *
 * @see Telnyx\Services\Texml\Accounts\Calls\RecordingsJsonService::retrieveRecordingsJson()
 *
 * @phpstan-type RecordingsJsonRetrieveRecordingsJsonParamsShape = array{
 *   accountSid: string
 * }
 */
final class RecordingsJsonRetrieveRecordingsJsonParams implements BaseModel
{
    /** @use SdkModel<RecordingsJsonRetrieveRecordingsJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    /**
     * `new RecordingsJsonRetrieveRecordingsJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordingsJsonRetrieveRecordingsJsonParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordingsJsonRetrieveRecordingsJsonParams)->withAccountSid(...)
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
        $self = new self;

        $self['accountSid'] = $accountSid;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }
}
