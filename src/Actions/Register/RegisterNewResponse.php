<?php

declare(strict_types=1);

namespace Telnyx\Actions\Register;

use Telnyx\Actions\Register\RegisterNewResponse\Error;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimpleSimCard;

/**
 * @phpstan-type register_new_response = array{
 *   data?: list<SimpleSimCard>|null, errors?: list<Error>|null
 * }
 */
final class RegisterNewResponse implements BaseModel
{
    /** @use SdkModel<register_new_response> */
    use SdkModel;

    /**
     * Successfully registered SIM cards.
     *
     * @var list<SimpleSimCard>|null $data
     */
    #[Api(list: SimpleSimCard::class, optional: true)]
    public ?array $data;

    /** @var list<Error>|null $errors */
    #[Api(list: Error::class, optional: true)]
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
     * @param list<SimpleSimCard> $data
     * @param list<Error> $errors
     */
    public static function with(?array $data = null, ?array $errors = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $errors && $obj->errors = $errors;

        return $obj;
    }

    /**
     * Successfully registered SIM cards.
     *
     * @param list<SimpleSimCard> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<Error> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }
}
