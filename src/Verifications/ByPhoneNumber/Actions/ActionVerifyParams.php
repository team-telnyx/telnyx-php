<?php

declare(strict_types=1);

namespace Telnyx\Verifications\ByPhoneNumber\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Verify verification code by phone number.
 *
 * @see Telnyx\Verifications\ByPhoneNumber\Actions->verify
 *
 * @phpstan-type action_verify_params = array{
 *   code: string, verifyProfileID: string
 * }
 */
final class ActionVerifyParams implements BaseModel
{
    /** @use SdkModel<action_verify_params> */
    use SdkModel;
    use SdkParams;

    /**
     * This is the code the user submits for verification.
     */
    #[Api]
    public string $code;

    /**
     * The identifier of the associated Verify profile.
     */
    #[Api('verify_profile_id')]
    public string $verifyProfileID;

    /**
     * `new ActionVerifyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionVerifyParams::with(code: ..., verifyProfileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionVerifyParams)->withCode(...)->withVerifyProfileID(...)
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
    public static function with(string $code, string $verifyProfileID): self
    {
        $obj = new self;

        $obj->code = $code;
        $obj->verifyProfileID = $verifyProfileID;

        return $obj;
    }

    /**
     * This is the code the user submits for verification.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * The identifier of the associated Verify profile.
     */
    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $obj = clone $this;
        $obj->verifyProfileID = $verifyProfileID;

        return $obj;
    }
}
