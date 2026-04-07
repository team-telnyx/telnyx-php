<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappMessageContent\Template;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Template language. Required unless template_id is provided.
 *
 * @phpstan-type LanguageShape = array{code: string, policy?: string|null}
 */
final class Language implements BaseModel
{
    /** @use SdkModel<LanguageShape> */
    use SdkModel;

    /**
     * Language code (e.g. en_US).
     */
    #[Required]
    public string $code;

    #[Optional]
    public ?string $policy;

    /**
     * `new Language()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Language::with(code: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Language)->withCode(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $code, ?string $policy = null): self
    {
        $self = new self;

        $self['code'] = $code;

        null !== $policy && $self['policy'] = $policy;

        return $self;
    }

    /**
     * Language code (e.g. en_US).
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withPolicy(string $policy): self
    {
        $self = clone $this;
        $self['policy'] = $policy;

        return $self;
    }
}
