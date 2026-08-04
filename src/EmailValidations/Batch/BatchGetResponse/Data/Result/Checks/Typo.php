<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations\Batch\BatchGetResponse\Data\Result\Checks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TypoShape = array{
 *   pass: bool, details?: string|null, suggestion?: string|null
 * }
 */
final class Typo implements BaseModel
{
    /** @use SdkModel<TypoShape> */
    use SdkModel;

    #[Required]
    public bool $pass;

    /**
     * Human-readable check detail. Omitted when nil.
     */
    #[Optional]
    public ?string $details;

    /**
     * Suggested correction for common typos. Omitted when nil.
     */
    #[Optional]
    public ?string $suggestion;

    /**
     * `new Typo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Typo::with(pass: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Typo)->withPass(...)
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
    public static function with(
        bool $pass,
        ?string $details = null,
        ?string $suggestion = null
    ): self {
        $self = new self;

        $self['pass'] = $pass;

        null !== $details && $self['details'] = $details;
        null !== $suggestion && $self['suggestion'] = $suggestion;

        return $self;
    }

    public function withPass(bool $pass): self
    {
        $self = clone $this;
        $self['pass'] = $pass;

        return $self;
    }

    /**
     * Human-readable check detail. Omitted when nil.
     */
    public function withDetails(string $details): self
    {
        $self = clone $this;
        $self['details'] = $details;

        return $self;
    }

    /**
     * Suggested correction for common typos. Omitted when nil.
     */
    public function withSuggestion(string $suggestion): self
    {
        $self = clone $this;
        $self['suggestion'] = $suggestion;

        return $self;
    }
}
