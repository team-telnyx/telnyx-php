<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a conference resource.
 *
 * @see Telnyx\Texml\Accounts\Conferences->retrieve
 *
 * @phpstan-type conference_retrieve_params = array{accountSid: string}
 */
final class ConferenceRetrieveParams implements BaseModel
{
    /** @use SdkModel<conference_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    /**
     * `new ConferenceRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceRetrieveParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceRetrieveParams)->withAccountSid(...)
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
