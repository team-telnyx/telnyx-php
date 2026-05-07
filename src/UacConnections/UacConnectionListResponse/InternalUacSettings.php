<?php

declare(strict_types=1);

namespace Telnyx\UacConnections\UacConnectionListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Internal Telnyx-side settings for a UAC connection.
 *
 * @phpstan-type InternalUacSettingsShape = array{destinationUri?: string|null}
 */
final class InternalUacSettings implements BaseModel
{
    /** @use SdkModel<InternalUacSettingsShape> */
    use SdkModel;

    /**
     * The SIP URI that Telnyx will call when handling an inbound request from the external peer. Do not include a `sip:` prefix. The value must be in the format `userinfo@[subdomain.]sip.telnyx.com` or `userinfo@[subdomain.]sipdev.telnyx.com`; the userinfo portion may contain only letters, digits, hyphens, and underscores.
     */
    #[Optional('destination_uri')]
    public ?string $destinationUri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $destinationUri = null): self
    {
        $self = new self;

        null !== $destinationUri && $self['destinationUri'] = $destinationUri;

        return $self;
    }

    /**
     * The SIP URI that Telnyx will call when handling an inbound request from the external peer. Do not include a `sip:` prefix. The value must be in the format `userinfo@[subdomain.]sip.telnyx.com` or `userinfo@[subdomain.]sipdev.telnyx.com`; the userinfo portion may contain only letters, digits, hyphens, and underscores.
     */
    public function withDestinationUri(string $destinationUri): self
    {
        $self = clone $this;
        $self['destinationUri'] = $destinationUri;

        return $self;
    }
}
