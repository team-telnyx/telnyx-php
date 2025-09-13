<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse\Data\Found;

/**
 * @phpstan-type data_alias = array{
 *   found?: list<Found>, notFound?: list<string>, recordType?: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
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
     * @var list<string>|null $notFound
     */
    #[Api('not_found', list: 'string', optional: true)]
    public ?array $notFound;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

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
     * @param list<string> $notFound
     */
    public static function with(
        ?array $found = null,
        ?array $notFound = null,
        ?string $recordType = null
    ): self {
        $obj = new self;

        null !== $found && $obj->found = $found;
        null !== $notFound && $obj->notFound = $notFound;
        null !== $recordType && $obj->recordType = $recordType;

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
        $obj->notFound = $notFound;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
