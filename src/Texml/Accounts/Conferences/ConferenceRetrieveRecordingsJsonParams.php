<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns recordings for a conference identified by conference_sid.
 *
 * @see Telnyx\Services\Texml\Accounts\ConferencesService::retrieveRecordingsJson()
 *
 * @phpstan-type ConferenceRetrieveRecordingsJsonParamsShape = array{
 *   account_sid: string
 * }
 */
final class ConferenceRetrieveRecordingsJsonParams implements BaseModel
{
    /** @use SdkModel<ConferenceRetrieveRecordingsJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $account_sid;

    /**
     * `new ConferenceRetrieveRecordingsJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceRetrieveRecordingsJsonParams::with(account_sid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceRetrieveRecordingsJsonParams)->withAccountSid(...)
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

        $obj['account_sid'] = $account_sid;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }
}
