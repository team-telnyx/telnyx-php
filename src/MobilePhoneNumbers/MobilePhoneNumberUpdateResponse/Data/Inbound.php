<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data;

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
        $obj = new self;

        null !== $interceptionAppID && $obj['interceptionAppID'] = $interceptionAppID;
        null !== $interceptionAppName && $obj['interceptionAppName'] = $interceptionAppName;

        return $obj;
    }

    /**
     * The ID of the app that will intercept inbound calls.
     */
    public function withInterceptionAppID(?string $interceptionAppID): self
    {
        $obj = clone $this;
        $obj['interceptionAppID'] = $interceptionAppID;

        return $obj;
    }

    /**
     * The name of the app that will intercept inbound calls.
     */
    public function withInterceptionAppName(?string $interceptionAppName): self
    {
        $obj = clone $this;
        $obj['interceptionAppName'] = $interceptionAppName;

        return $obj;
    }
}
