<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OutboundShape = array{interception_app_id?: string|null}
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<OutboundShape> */
    use SdkModel;

    /**
     * The ID of the CallControl or TeXML Application that will intercept outbound calls.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $interception_app_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $interception_app_id = null): self
    {
        $obj = new self;

        null !== $interception_app_id && $obj->interception_app_id = $interception_app_id;

        return $obj;
    }

    /**
     * The ID of the CallControl or TeXML Application that will intercept outbound calls.
     */
    public function withInterceptionAppID(?string $interceptionAppID): self
    {
        $obj = clone $this;
        $obj->interception_app_id = $interceptionAppID;

        return $obj;
    }
}
