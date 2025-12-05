<?php

declare(strict_types=1);

namespace Telnyx\Messages\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Generate a deeplink URL that can be used to start an RCS conversation with a specific agent.
 *
 * @see Telnyx\Services\Messages\RcsService::generateDeeplink()
 *
 * @phpstan-type RcGenerateDeeplinkParamsShape = array{
 *   body?: string, phone_number?: string
 * }
 */
final class RcGenerateDeeplinkParams implements BaseModel
{
    /** @use SdkModel<RcGenerateDeeplinkParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Pre-filled message body (URL encoded).
     */
    #[Api(optional: true)]
    public ?string $body;

    /**
     * Phone number in E164 format (URL encoded).
     */
    #[Api(optional: true)]
    public ?string $phone_number;

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
        ?string $body = null,
        ?string $phone_number = null
    ): self {
        $obj = new self;

        null !== $body && $obj['body'] = $body;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * Pre-filled message body (URL encoded).
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj['body'] = $body;

        return $obj;
    }

    /**
     * Phone number in E164 format (URL encoded).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
