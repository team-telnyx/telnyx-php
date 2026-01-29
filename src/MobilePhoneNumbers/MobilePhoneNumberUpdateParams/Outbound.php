<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OutboundShape = array{interceptionAppID?: string|null}
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<OutboundShape> */
    use SdkModel;

    /**
     * The ID of the CallControl or TeXML Application that will intercept outbound calls.
     */
    #[Optional('interception_app_id', nullable: true)]
    public ?string $interceptionAppID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $interceptionAppID = null): self
    {
        $self = new self;

        null !== $interceptionAppID && $self['interceptionAppID'] = $interceptionAppID;

        return $self;
    }

    /**
     * The ID of the CallControl or TeXML Application that will intercept outbound calls.
     */
    public function withInterceptionAppID(?string $interceptionAppID): self
    {
        $self = clone $this;
        $self['interceptionAppID'] = $interceptionAppID;

        return $self;
    }
}
