<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\RecordingsJson;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RecordingsJsonRetrieveRecordingsJsonParams); // set properties as needed
 * $client->texml.accounts.calls.recordingsJson->retrieveRecordingsJson(...$params->toArray());
 * ```
 * Returns recordings for a call identified by call_sid.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.calls.recordingsJson->retrieveRecordingsJson(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Calls\RecordingsJson->retrieveRecordingsJson
 *
 * @phpstan-type recordings_json_retrieve_recordings_json_params = array{
 *   accountSid: string
 * }
 */
final class RecordingsJsonRetrieveRecordingsJsonParams implements BaseModel
{
    /** @use SdkModel<recordings_json_retrieve_recordings_json_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
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
