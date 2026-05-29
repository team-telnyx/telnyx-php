<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Internal routing target the connection delivers calls to.
 *
 * @phpstan-type InternalUacSettingsShape = array{destinationUri?: string|null}
 */
final class InternalUacSettings implements BaseModel
{
    /** @use SdkModel<InternalUacSettingsShape> */
    use SdkModel;

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

    public function withDestinationUri(string $destinationUri): self
    {
        $self = clone $this;
        $self['destinationUri'] = $destinationUri;

        return $self;
    }
}
