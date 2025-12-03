<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OutboundShape = array{
 *   interception_app_id?: string|null, interception_app_name?: string|null
 * }
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<OutboundShape> */
    use SdkModel;

    /**
     * The ID of the app that will intercept outbound calls.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $interception_app_id;

    /**
     * The name of the app that will intercept outbound calls.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $interception_app_name;

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
        ?string $interception_app_id = null,
        ?string $interception_app_name = null
    ): self {
        $obj = new self;

        null !== $interception_app_id && $obj->interception_app_id = $interception_app_id;
        null !== $interception_app_name && $obj->interception_app_name = $interception_app_name;

        return $obj;
    }

    /**
     * The ID of the app that will intercept outbound calls.
     */
    public function withInterceptionAppID(?string $interceptionAppID): self
    {
        $obj = clone $this;
        $obj->interception_app_id = $interceptionAppID;

        return $obj;
    }

    /**
     * The name of the app that will intercept outbound calls.
     */
    public function withInterceptionAppName(?string $interceptionAppName): self
    {
        $obj = clone $this;
        $obj->interception_app_name = $interceptionAppName;

        return $obj;
    }
}
