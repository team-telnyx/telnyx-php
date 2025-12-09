<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InboundShape = array{
 *   interceptionAppID?: string|null, interceptionAppName?: string|null
 * }
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<InboundShape> */
    use SdkModel;

    /**
     * The ID of the app that will intercept inbound calls.
     */
    #[Optional('interception_app_id', nullable: true)]
    public ?string $interceptionAppID;

    /**
     * The name of the app that will intercept inbound calls.
     */
    #[Optional('interception_app_name', nullable: true)]
    public ?string $interceptionAppName;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $interceptionAppID = null,
        ?string $interceptionAppName = null
    ): self {
        $self = new self;

        null !== $interceptionAppID && $self['interceptionAppID'] = $interceptionAppID;
        null !== $interceptionAppName && $self['interceptionAppName'] = $interceptionAppName;

        return $self;
    }

    /**
     * The ID of the app that will intercept inbound calls.
     */
    public function withInterceptionAppID(?string $interceptionAppID): self
    {
        $self = clone $this;
        $self['interceptionAppID'] = $interceptionAppID;

        return $self;
    }

    /**
     * The name of the app that will intercept inbound calls.
     */
    public function withInterceptionAppName(?string $interceptionAppName): self
    {
        $self = clone $this;
        $self['interceptionAppName'] = $interceptionAppName;

        return $self;
    }
}
