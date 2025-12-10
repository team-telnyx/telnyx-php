<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Brand\SMSOtp;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response after successfully triggering a Brand SMS OTP.
 *
 * @phpstan-type SMSOtpTriggerResponseShape = array{
 *   brandID: string, referenceID: string
 * }
 */
final class SMSOtpTriggerResponse implements BaseModel
{
    /** @use SdkModel<SMSOtpTriggerResponseShape> */
    use SdkModel;

    /**
     * The Brand ID for which the OTP was triggered.
     */
    #[Required('brandId')]
    public string $brandID;

    /**
     * The reference ID that can be used to check OTP status.
     */
    #[Required('referenceId')]
    public string $referenceID;

    /**
     * `new SMSOtpTriggerResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SMSOtpTriggerResponse::with(brandID: ..., referenceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SMSOtpTriggerResponse)->withBrandID(...)->withReferenceID(...)
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
    public static function with(string $brandID, string $referenceID): self
    {
        $self = new self;

        $self['brandID'] = $brandID;
        $self['referenceID'] = $referenceID;

        return $self;
    }

    /**
     * The Brand ID for which the OTP was triggered.
     */
    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * The reference ID that can be used to check OTP status.
     */
    public function withReferenceID(string $referenceID): self
    {
        $self = clone $this;
        $self['referenceID'] = $referenceID;

        return $self;
    }
}
