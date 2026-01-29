<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a conference resource.
 *
 * @see Telnyx\Services\Texml\Accounts\ConferencesService::retrieve()
 *
 * @phpstan-type ConferenceRetrieveParamsShape = array{accountSid: string}
 */
final class ConferenceRetrieveParams implements BaseModel
{
    /** @use SdkModel<ConferenceRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
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
        $self = new self;

        $self['accountSid'] = $accountSid;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }
}
