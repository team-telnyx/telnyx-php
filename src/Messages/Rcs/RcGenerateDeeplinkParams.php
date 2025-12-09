<?php

declare(strict_types=1);

namespace Telnyx\Messages\Rcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Generate a deeplink URL that can be used to start an RCS conversation with a specific agent.
 *
 * @see Telnyx\Services\Messages\RcsService::generateDeeplink()
 *
 * @phpstan-type RcGenerateDeeplinkParamsShape = array{
 *   body?: string, phoneNumber?: string
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
    #[Optional]
    public ?string $body;

    /**
     * Phone number in E164 format (URL encoded).
     */
    #[Optional]
    public ?string $phoneNumber;

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
        ?string $phoneNumber = null
    ): self {
        $self = new self;

        null !== $body && $self['body'] = $body;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Pre-filled message body (URL encoded).
     */
    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * Phone number in E164 format (URL encoded).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
