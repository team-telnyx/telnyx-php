<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CallRetrieveParams); // set properties as needed
 * $client->texml.accounts.calls->retrieve(...$params->toArray());
 * ```
 * Returns an individual call identified by its CallSid. This endpoint is eventually consistent.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.calls->retrieve(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Calls->retrieve
 *
 * @phpstan-type call_retrieve_params = array{accountSid: string}
 */
final class CallRetrieveParams implements BaseModel
{
    /** @use SdkModel<call_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    /**
     * `new CallRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallRetrieveParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallRetrieveParams)->withAccountSid(...)
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
