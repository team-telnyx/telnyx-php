<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse\Data\Found;

/**
 * @phpstan-type DataShape = array{
 *   found?: list<Found>|null,
 *   not_found?: list<string>|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The list of phone numbers which you own and are in an editable state.
     *
     * @var list<Found>|null $found
     */
    #[Api(list: Found::class, optional: true)]
    public ?array $found;

    /**
     * Phone numbers that are not found in the account.
     *
     * @var list<string>|null $not_found
     */
    #[Api(list: 'string', optional: true)]
    public ?array $not_found;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Found> $found
     * @param list<string> $not_found
     */
    public static function with(
        ?array $found = null,
        ?array $not_found = null,
        ?string $record_type = null
    ): self {
        $obj = new self;

        null !== $found && $obj->found = $found;
        null !== $not_found && $obj->not_found = $not_found;
        null !== $record_type && $obj->record_type = $record_type;

        return $obj;
    }

    /**
     * The list of phone numbers which you own and are in an editable state.
     *
     * @param list<Found> $found
     */
    public function withFound(array $found): self
    {
        $obj = clone $this;
        $obj->found = $found;

        return $obj;
    }

    /**
     * Phone numbers that are not found in the account.
     *
     * @param list<string> $notFound
     */
    public function withNotFound(array $notFound): self
    {
        $obj = clone $this;
        $obj->not_found = $notFound;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }
}
