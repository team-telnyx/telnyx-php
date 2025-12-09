<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Recordings\Json;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns recording resource identified by recording id.
 *
 * @see Telnyx\Services\Texml\Accounts\Recordings\JsonService::retrieveRecordingSidJson()
 *
 * @phpstan-type JsonRetrieveRecordingSidJsonParamsShape = array{
 *   accountSid: string
 * }
 */
final class JsonRetrieveRecordingSidJsonParams implements BaseModel
{
    /** @use SdkModel<JsonRetrieveRecordingSidJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
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

        $obj['accountSid'] = $accountSid;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['accountSid'] = $accountSid;

        return $obj;
    }
}
