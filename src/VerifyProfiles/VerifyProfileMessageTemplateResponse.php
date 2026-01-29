<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VerifyProfileMessageTemplateResponseShape = array{
 *   id?: string|null, text?: string|null
 * }
 */
final class VerifyProfileMessageTemplateResponse implements BaseModel
{
    /** @use SdkModel<VerifyProfileMessageTemplateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $text;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null, ?string $text = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
