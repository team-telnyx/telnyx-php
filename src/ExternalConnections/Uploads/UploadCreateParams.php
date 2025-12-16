<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\AdditionalUsage;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\Usage;

/**
 * Creates a new Upload request to Microsoft teams with the included phone numbers. Only one of civic_address_id or location_id must be provided, not both. The maximum allowed phone numbers for the numbers_ids array is 1000.
 *
 * @see Telnyx\Services\ExternalConnections\UploadsService::create()
 *
 * @phpstan-type UploadCreateParamsShape = array{
 *   numberIDs: list<string>,
 *   additionalUsages?: list<AdditionalUsage|value-of<AdditionalUsage>>|null,
 *   civicAddressID?: string|null,
 *   locationID?: string|null,
 *   usage?: null|Usage|value-of<Usage>,
 * }
 */
final class UploadCreateParams implements BaseModel
{
    /** @use SdkModel<UploadCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $numberIDs */
    #[Required('number_ids', list: 'string')]
    public array $numberIDs;

    /** @var list<value-of<AdditionalUsage>>|null $additionalUsages */
    #[Optional('additional_usages', list: AdditionalUsage::class)]
    public ?array $additionalUsages;

    /**
     * Identifies the civic address to assign all phone numbers to.
     */
    #[Optional('civic_address_id')]
    public ?string $civicAddressID;

    /**
     * Identifies the location to assign all phone numbers to.
     */
    #[Optional('location_id')]
    public ?string $locationID;

    /**
     * The use case of the upload request. NOTE: `calling_user_assignment` is not supported for toll free numbers.
     *
     * @var value-of<Usage>|null $usage
     */
    #[Optional(enum: Usage::class)]
    public ?string $usage;

    /**
     * `new UploadCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UploadCreateParams::with(numberIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UploadCreateParams)->withNumberIDs(...)
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
     * @param list<string> $numberIDs
     * @param list<AdditionalUsage|value-of<AdditionalUsage>> $additionalUsages
     * @param Usage|value-of<Usage> $usage
     */
    public static function with(
        array $numberIDs,
        ?array $additionalUsages = null,
        ?string $civicAddressID = null,
        ?string $locationID = null,
        Usage|string|null $usage = null,
    ): self {
        $self = new self;

        $self['numberIDs'] = $numberIDs;

        null !== $additionalUsages && $self['additionalUsages'] = $additionalUsages;
        null !== $civicAddressID && $self['civicAddressID'] = $civicAddressID;
        null !== $locationID && $self['locationID'] = $locationID;
        null !== $usage && $self['usage'] = $usage;

        return $self;
    }

    /**
     * @param list<string> $numberIDs
     */
    public function withNumberIDs(array $numberIDs): self
    {
        $self = clone $this;
        $self['numberIDs'] = $numberIDs;

        return $self;
    }

    /**
     * @param list<AdditionalUsage|value-of<AdditionalUsage>> $additionalUsages
     */
    public function withAdditionalUsages(array $additionalUsages): self
    {
        $self = clone $this;
        $self['additionalUsages'] = $additionalUsages;

        return $self;
    }

    /**
     * Identifies the civic address to assign all phone numbers to.
     */
    public function withCivicAddressID(string $civicAddressID): self
    {
        $self = clone $this;
        $self['civicAddressID'] = $civicAddressID;

        return $self;
    }

    /**
     * Identifies the location to assign all phone numbers to.
     */
    public function withLocationID(string $locationID): self
    {
        $self = clone $this;
        $self['locationID'] = $locationID;

        return $self;
    }

    /**
     * The use case of the upload request. NOTE: `calling_user_assignment` is not supported for toll free numbers.
     *
     * @param Usage|value-of<Usage> $usage
     */
    public function withUsage(Usage|string $usage): self
    {
        $self = clone $this;
        $self['usage'] = $usage;

        return $self;
    }
}
