<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Action;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ParametersShape = array{
 *   displayText?: string|null, url?: string|null
 * }
 */
final class Parameters implements BaseModel
{
    /** @use SdkModel<ParametersShape> */
    use SdkModel;

    /**
     * button label text, 20 character maximum.
     */
    #[Optional('display_text')]
    public ?string $displayText;

    /**
     * button URL to load when tapped by the user.
     */
    #[Optional]
    public ?string $url;

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
        ?string $displayText = null,
        ?string $url = null
    ): self {
        $self = new self;

        null !== $displayText && $self['displayText'] = $displayText;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * button label text, 20 character maximum.
     */
    public function withDisplayText(string $displayText): self
    {
        $self = clone $this;
        $self['displayText'] = $displayText;

        return $self;
    }

    /**
     * button URL to load when tapped by the user.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
