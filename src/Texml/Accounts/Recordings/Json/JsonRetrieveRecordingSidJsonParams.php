<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Recordings\Json;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new JsonRetrieveRecordingSidJsonParams); // set properties as needed
 * $client->texml.accounts.recordings.json->retrieveRecordingSidJson(...$params->toArray());
 * ```
 * Returns recording resource identified by recording id.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.recordings.json->retrieveRecordingSidJson(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Recordings\Json->retrieveRecordingSidJson
 *
 * @phpstan-type json_retrieve_recording_sid_json_params = array{
 *   accountSid: string
 * }
 */
final class JsonRetrieveRecordingSidJsonParams implements BaseModel
{
    /** @use SdkModel<json_retrieve_recording_sid_json_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    /**
     * `new JsonRetrieveRecordingSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JsonRetrieveRecordingSidJsonParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JsonRetrieveRecordingSidJsonParams)->withAccountSid(...)
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
