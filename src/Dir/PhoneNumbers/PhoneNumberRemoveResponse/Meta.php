<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse\Meta\Error;

/**
 * @phpstan-import-type ErrorShape from \Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse\Meta\Error
 *
 * @phpstan-type MetaShape = array{errors: list<Error|ErrorShape>}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Per-number failures that did not block the call. Each entry has `phone_number`, `code`, `title`, `detail`.
     *
     * @var list<Error> $errors
     */
    #[Required(list: Error::class)]
    public array $errors;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(errors: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)->withErrors(...)
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
     *
     * @param list<Error|ErrorShape> $errors
     */
    public static function with(array $errors): self
    {
        $self = new self;

        $self['errors'] = $errors;

        return $self;
    }

    /**
     * Per-number failures that did not block the call. Each entry has `phone_number`, `code`, `title`, `detail`.
     *
     * @param list<Error|ErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }
}
