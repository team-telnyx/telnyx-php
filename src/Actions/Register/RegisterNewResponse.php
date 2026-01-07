<?php

declare(strict_types=1);

namespace Telnyx\Actions\Register;

use Telnyx\Actions\Register\RegisterNewResponse\Error;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimpleSimCard;

/**
 * @phpstan-import-type SimpleSimCardShape from \Telnyx\SimpleSimCard
 * @phpstan-import-type ErrorShape from \Telnyx\Actions\Register\RegisterNewResponse\Error
 *
 * @phpstan-type RegisterNewResponseShape = array{
 *   data?: list<SimpleSimCard|SimpleSimCardShape>|null,
 *   errors?: list<Error|ErrorShape>|null,
 * }
 */
final class RegisterNewResponse implements BaseModel
{
    /** @use SdkModel<RegisterNewResponseShape> */
    use SdkModel;

    /**
     * Successfully registered SIM cards.
     *
     * @var list<SimpleSimCard>|null $data
     */
    #[Optional(list: SimpleSimCard::class)]
    public ?array $data;

    /** @var list<Error>|null $errors */
    #[Optional(list: Error::class)]
    public ?array $errors;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<SimpleSimCard|SimpleSimCardShape>|null $data
     * @param list<Error|ErrorShape>|null $errors
     */
    public static function with(?array $data = null, ?array $errors = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $errors && $self['errors'] = $errors;

        return $self;
    }

    /**
     * Successfully registered SIM cards.
     *
     * @param list<SimpleSimCard|SimpleSimCardShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Error|ErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }
}
