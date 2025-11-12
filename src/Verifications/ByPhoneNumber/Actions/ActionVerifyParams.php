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
 * @see Telnyx\STAINLESS_FIXME_Verifications\STAINLESS_FIXME_ByPhoneNumber\ActionsService::verify()
 *
 * @phpstan-type ActionVerifyParamsShape = array{
 *   code: string, verify_profile_id: string
 * }
 */
final class ActionVerifyParams implements BaseModel
{
    /** @use SdkModel<ActionVerifyParamsShape> */
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
    #[Api]
    public string $verify_profile_id;

    /**
     * `new ActionVerifyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionVerifyParams::with(code: ..., verify_profile_id: ...)
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
    public static function with(string $code, string $verify_profile_id): self
    {
        $obj = new self;

        $obj->code = $code;
        $obj->verify_profile_id = $verify_profile_id;

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
        $obj->verify_profile_id = $verifyProfileID;

        return $obj;
    }
}
