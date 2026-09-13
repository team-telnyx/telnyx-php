<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumber;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type OutboundShape = array{
 *   interceptionAppID?: string|null, interceptionAppName?: string|null
 * }
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<OutboundShape> */
    use SdkModel;

    /**
     * The ID of the app that will intercept outbound calls.
     */
    #[Optional('interception_app_id', nullable: true)]
    public ?string $interceptionAppID;

    /**
     * The name of the app that will intercept outbound calls.
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
        string|Omitted|null $interceptionAppID = Omitted::VALUE,
        string|Omitted|null $interceptionAppName = Omitted::VALUE,
    ): self {
        $self = new self;

        Omitted::VALUE !== $interceptionAppID && $self['interceptionAppID'] = $interceptionAppID;
        Omitted::VALUE !== $interceptionAppName && $self['interceptionAppName'] = $interceptionAppName;

        return $self;
    }

    /**
     * The ID of the app that will intercept outbound calls.
     */
    public function withInterceptionAppID(?string $interceptionAppID): self
    {
        $self = clone $this;
        $self['interceptionAppID'] = $interceptionAppID;

        return $self;
    }

    /**
     * The name of the app that will intercept outbound calls.
     */
    public function withInterceptionAppName(?string $interceptionAppName): self
    {
        $self = clone $this;
        $self['interceptionAppName'] = $interceptionAppName;

        return $self;
    }
}
