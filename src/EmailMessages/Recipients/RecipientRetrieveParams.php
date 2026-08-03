<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\Recipients;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the current delivery state of a single recipient, including status,
 * billable flag, SMTP detail, and lifecycle timestamps.
 * BCC recipient addresses are redacted (returned as null).
 *
 * @see Telnyx\Services\EmailMessages\RecipientsService::retrieve()
 *
 * @phpstan-type RecipientRetrieveParamsShape = array{emailID: string}
 */
final class RecipientRetrieveParams implements BaseModel
{
    /** @use SdkModel<RecipientRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $emailID;

    /**
     * `new RecipientRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecipientRetrieveParams::with(emailID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecipientRetrieveParams)->withEmailID(...)
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
    public static function with(string $emailID): self
    {
        $self = new self;

        $self['emailID'] = $emailID;

        return $self;
    }

    public function withEmailID(string $emailID): self
    {
        $self = clone $this;
        $self['emailID'] = $emailID;

        return $self;
    }
}
