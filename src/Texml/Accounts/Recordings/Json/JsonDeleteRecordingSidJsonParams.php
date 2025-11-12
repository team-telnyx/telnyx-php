<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Recordings\Json;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes recording resource identified by recording id.
 *
 * @see Telnyx\STAINLESS_FIXME_Texml\STAINLESS_FIXME_Accounts\STAINLESS_FIXME_Recordings\JsonService::deleteRecordingSidJson()
 *
 * @phpstan-type JsonDeleteRecordingSidJsonParamsShape = array{account_sid: string}
 */
final class JsonDeleteRecordingSidJsonParams implements BaseModel
{
    /** @use SdkModel<JsonDeleteRecordingSidJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $account_sid;

    /**
     * `new JsonDeleteRecordingSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JsonDeleteRecordingSidJsonParams::with(account_sid: ...)
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
    public static function with(string $account_sid): self
    {
        $obj = new self;

        $obj->account_sid = $account_sid;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->account_sid = $accountSid;

        return $obj;
    }
}
