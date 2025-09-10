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
 * $params = (new JsonDeleteRecordingSidJsonParams); // set properties as needed
 * $client->texml.accounts.recordings.json->deleteRecordingSidJson(...$params->toArray());
 * ```
 * Deletes recording resource identified by recording id.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.recordings.json->deleteRecordingSidJson(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Recordings\Json->deleteRecordingSidJson
 *
 * @phpstan-type json_delete_recording_sid_json_params = array{accountSid: string}
 */
final class JsonDeleteRecordingSidJsonParams implements BaseModel
{
    /** @use SdkModel<json_delete_recording_sid_json_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    /**
     * `new JsonDeleteRecordingSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JsonDeleteRecordingSidJsonParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JsonDeleteRecordingSidJsonParams)->withAccountSid(...)
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
