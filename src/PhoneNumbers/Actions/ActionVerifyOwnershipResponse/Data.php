<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse\Data\Found;

/**
 * @phpstan-import-type FoundShape from \Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse\Data\Found
 *
 * @phpstan-type DataShape = array{
 *   found?: list<FoundShape>|null,
 *   notFound?: list<string>|null,
 *   recordType?: string|null,
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
    #[Optional(list: Found::class)]
    public ?array $found;

    /**
     * Phone numbers that are not found in the account.
     *
     * @var list<string>|null $notFound
     */
    #[Optional('not_found', list: 'string')]
    public ?array $notFound;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
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
     * @param list<FoundShape>|null $found
     * @param list<string>|null $notFound
     */
    public static function with(
        ?array $found = null,
        ?array $notFound = null,
        ?string $recordType = null
    ): self {
        $self = new self;

        null !== $found && $self['found'] = $found;
        null !== $notFound && $self['notFound'] = $notFound;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The list of phone numbers which you own and are in an editable state.
     *
     * @param list<FoundShape> $found
     */
    public function withFound(array $found): self
    {
        $self = clone $this;
        $self['found'] = $found;

        return $self;
    }

    /**
     * Phone numbers that are not found in the account.
     *
     * @param list<string> $notFound
     */
    public function withNotFound(array $notFound): self
    {
        $self = clone $this;
        $self['notFound'] = $notFound;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
